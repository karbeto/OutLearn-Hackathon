<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = [
            ['course_id' => 1, 'name' => 'Introduction to JavaScript', 'order' => 1],
            ['course_id' => 1, 'name' => 'Functions and Control Flow', 'order' => 2],
            ['course_id' => 1, 'name' => 'DOM Manipulation and Event Handling', 'order' => 3],
            ['course_id' => 2, 'name' => 'Control Flow and Functions', 'order' => 1],
            ['course_id' => 2, 'name' => 'Introduction to Object-Oriented Programming', 'order' => 2],
        ];

        foreach ($modules as $module) {
            Module::insert($module);
        }
    }
}
