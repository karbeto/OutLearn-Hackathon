<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index(Course $course)
    {
        $course->load(['modules' => function ($query) {
            $query->orderBy('order', 'asc');  // Or 'desc' if you want descending order
        }]);

        return view("modules.index", compact('course'));
    }

    public function edit(Module $module)
    {
        return view("modules.edit", compact("module"));
    }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
        ]);


        $module->update([
            'name' => $validated['name'],
            'order' => $validated['order'],
        ]);

        return redirect()->route('modules.index', $module->course)->with('success', 'Module updated successfully!');
    }


    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route("modules.index", $module->course)->with("message", "Module deleted successfully.");
    }

    public function create(Course $course)
    {
        return view("modules.create", compact("course"));
    }

    public function store(Course $course, Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
        ]);

        Module::create([
            "name" => $validatedData['name'],
            "order" => $validatedData["order"],
            "course_id" => $course->id
        ]);


        return redirect()->route('modules.index', $course)->with('success', 'Module created successfully!');
    }
}
