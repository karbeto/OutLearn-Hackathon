<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with("category")->get();

        return view("course.index", compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $professors = User::with(["professorData", "role"])
            ->whereHas("role", function ($query) {
                $query->where("name", "professor");
            })
            ->get();
        return view("course.create", compact("categories", "professors"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'professor_ids' => 'required|array',
            'professor_ids.*' => 'exists:users,id',
        ]);

        $course = Course::create($validatedData);

        $course->professors()->sync($request->professor_ids);

        return redirect()->route("courses.index")->with('success', 'Course created successfully!');;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $categories = Category::all();

        return view('course.edit', compact('course', 'categories'));
    }

    // Update Course
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);


        $course->update($validatedData);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }
}
