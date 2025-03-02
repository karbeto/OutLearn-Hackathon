<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Course;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\CourseResource;
use App\Http\Resources\InterestsResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\ModuleResource;
use App\Models\Interest;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Role;

class ApiController extends Controller
{
    use ApiResponses;

    public function courses(Request $request)
    {
        $limit = $request->input("limit", null);
        //bolean
        $withProfessors = !$request->has("professors");

        $courses = Course::with('modules')
            ->when($withProfessors, function ($query) {
                $query->with('professors');
            })
            ->when(!is_null($limit), function ($query) use ($limit) {
                $query->limit($limit);
            })
            ->get();

        return $this->dataResponse(CourseResource::collection($courses));
    }

    public function user($user)
    {
        $user = User::find($user);

        if (!$user) {
            return $this->error('Resource not found', 404);
        }

        return $this->dataResponse(new UserResource($user));
    }

    public function professors(Request $request)
    {
        $limit = $request->input("limit", null);
        $profesorRoleId = Role::where("name", "professor")->first()->id;

        $professors = User::with('professorData')->when(!is_null($limit), function ($query) use ($limit) {
            $query->limit($limit);
        })
            ->where("role_id", $profesorRoleId)
            ->get();

        return $this->dataResponse(UserResource::collection($professors));
    }

    public function students(Request $request)
    {
        $limit = $request->input("limit", null);
        $profesorRoleId = Role::where("name", "student")->first()->id;

        $professors = User::with('studentData')->when(!is_null($limit), function ($query) use ($limit) {
            $query->limit($limit);
        })
            ->where("role_id", $profesorRoleId)
            ->get();

        return $this->dataResponse(UserResource::collection($professors));
    }

    public function course($course)
    {
        $course = Course::find($course);

        if (!$course) {
            return $this->error('Resource not found', 404);
        }

        $course->load('modules', 'professors'); // Load modules and professors if necessary

        return $this->dataResponse(new CourseResource($course));
    }

    public function module($module)
    {
        $module = Module::find($module);

        if (!$module) {
            return $this->error('Resource not found', 404);
        }

        $module->load("lessons");

        return $this->dataResponse(new ModuleResource($module));
    }

    public function lesson($lesson)
    {
        $lesson = Lesson::find($lesson);

        if (!$lesson) {
            return $this->error('Resource not found', 404);
        }

        $lesson->load("module");

        return $this->dataResponse(new LessonResource($lesson));
    }


    public function interests()
    {
        $interests = Interest::all();

        return $this->dataResponse(InterestsResource::collection($interests));
    }

    public function professorDashboard($professorId)
    {
        $professor = User::with('role', "professorData", "profesorCourses")->whereHas('role', function ($query) {
            $query->where('name', 'professor');
        })->where('id', $professorId)->first();

        if (!$professor) {
            return $this->error('Resource not found', 404);
        }

        $totalLessons = $professor->profesorCourses->flatMap(function ($course) {
            return $course->modules->flatMap(function ($module) {
                return $module->lessons;
            });
        })->count();

        $data = [
            $professor,
            $totalLessons
        ];

        return $this->dataResponse($data);
    }
}
