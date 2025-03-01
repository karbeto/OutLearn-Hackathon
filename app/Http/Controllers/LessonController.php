<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($module_id)
    {
        $module = Module::findOrFail($module_id);
    
        $lessons = Lesson::where('module_id', $module_id)->get();
    
        return view('lessons.index', compact('lessons', 'module'));
    }

    public function create()
    {
        $modules = Module::all();
        return view('lessons.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'module_id' => 'required|exists:modules,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order_number' => 'required|integer',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10000', 
        ]);

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('lesson-videos', 'public');
        }

        Lesson::create([
            'module_id' => $request->module_id,
            'title' => $request->title,
            'content' => $request->content,
            'video_url' => $videoPath, 
            'order_number' => $request->order_number,
        ]);

        return redirect()->route('lessons.index', ['module_id' => $request->module_id])
                         ->with('success', 'Lesson created successfully.');
    }

    public function edit(Lesson $lesson)
    {
        $modules = Module::all();
        return view('lessons.edit', compact('lesson', 'modules'));
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully.');
    }
    
}
