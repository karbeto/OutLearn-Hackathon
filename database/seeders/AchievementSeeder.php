<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $achievements = [
            ['name' => 'First Login', 'description' => 'Awarded for logging in for the first time.'],
            ['name' => 'Course Completion', 'description' => 'Awarded for completing your first course.'],
            ['name' => 'Quiz Master', 'description' => 'Awarded for achieving 90% or higher on a quiz.'],
            ['name' => 'Top Scorer', 'description' => 'Awarded for scoring the highest in a course exam.'],
            ['name' => 'Milestone Reached', 'description' => 'Awarded for completing 5 lessons in a single course.'],
            ['name' => 'Community Contributor', 'description' => 'Awarded for contributing to the forum with 10 helpful posts.'],
            ['name' => 'Advanced Learner', 'description' => 'Awarded for completing 10 advanced-level courses.'],
            ['name' => 'Early Adopter', 'description' => 'Awarded for joining the platform within the first month of launch.'],
            ['name' => 'Perfectionist', 'description' => 'Awarded for completing a course with a perfect score.'],
            ['name' => 'Certification Earned', 'description' => 'Awarded for earning a certificate in any course.'],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}
