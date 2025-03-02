<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::insert([
            [
                "module_id" => 1,
                "title" => "Advanced Quantum",
                "content" => "Description",
                "video_url"  => "",
                "order_number"  => 1
            ],
            [
                "module_id" => 1,
                "title" => "Advanced Quantum2",
                "content" => "Description2",
                "video_url"  => "",
                "order_number"  => 2
            ],
            [
                "module_id" => 2,
                "title" => "Advanced Quantum3",
                "content" => "Description3",
                "video_url"  => "",
                "order_number"  => 1
            ]
        ]);
    }
}
