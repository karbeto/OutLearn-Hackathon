<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Course;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\CourseResource;
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

    public function user(User $user)
    {

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

    public function course(Course $course)
    {
        $course->load('modules', 'professors'); // Load modules and professors if necessary

        return new CourseResource($course);
    }
}
