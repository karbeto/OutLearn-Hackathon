<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function index($module_id)
    {
        $module = Module::findOrFail($module_id);

        $lessons = Lesson::where('module_id', $module_id)->orderBy('order_number', 'asc')->get();


        return view('lessons.index', compact('lessons', 'module'));
    }

    public function create($module_id)
    {
        $modules = Module::all();
        return view('lessons.create', compact('modules', 'module_id'));
    }

    public function store(Request $request, $module_id)
    {
        $request->validate([
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

    public function edit(Module $module, Lesson $lesson)
    {
        $modules = Module::all();
        return view('lessons.edit', compact('lesson', 'modules', "module"));
    }

    public function destroy(Module $module, Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index', $module->id)->with('success', 'Lesson deleted successfully.');
    }

    public function update(Request $request, Module $module, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'order_number' => 'required|integer',
            'video' => 'nullable|mimes:mp4,avi,mov|max:10000',
        ]);

        if ($request->hasFile('video')) {
            if ($lesson->video_url) {
                Storage::disk('public')->delete($lesson->video_url);
            }

            // Store the new video
            $videoPath = $request->file('video')->store('lesson-videos', 'public');
            $lesson->video_url = $videoPath;
        }

        // Update other fields
        $lesson->update([
            'title' => $request->title,
            'content' => $request->content,
            'order_number' => $request->order_number,
        ]);

        return redirect()->route('lessons.index', ['module_id' => $module->id])
            ->with('success', 'Lesson updated successfully.');
    }
}
