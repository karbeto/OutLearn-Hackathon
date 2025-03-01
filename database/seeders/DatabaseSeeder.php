<?php

namespace Database\Seeders;

use App\Models\ProfessorData;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StudentDataSeeder::class);
        $this->call(ProfesorDataSeeder::class);
        $this->call(AchievementSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(NewsletterSeeder::class);
        $this->call(InterestSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(LessonSeeder::class);
    }
}
