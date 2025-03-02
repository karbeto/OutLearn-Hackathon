<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class LessonSeeder extends Seeder
{
    public function run()
    {
        // Get all courses
        $modules = Module::all();

        foreach ($modules as $module) {
            $lessons = [
                [
                    'module_id' => $module->id,
                    'title' => 'Introduction to ' . $module->name,
                    'content' => 'This is the first lesson for ' . $module->name . '. It covers the basics.',
                    'video_url' => '',
                    'order_number' => 1,
                ],
                [
                    'module_id' => $module->id,
                    'title' => 'Intermediate ' . $module->name,
                    'content' => 'This lesson dives deeper into the topic of ' . $module->name . '.',
                    'video_url' => '',
                    'order_number' => 2,
                ],
                [
                    'module_id' => $module->id,
                    'title' => 'Advanced ' . $module->name,
                    'content' => 'The final lesson of ' . $module->name . ' takes a deeper look into advanced concepts.',
                    'video_url' => '',
                    'order_number' => 3,
                ]
            ];

            foreach ($lessons as $lesson) {
                Lesson::create($lesson);
            }
        }
    }
}
