<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Interest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve the total counts for each category
        $totalCourses = Course::count();
        $totalModules = Module::count();
        $totalLessons = Lesson::count();
        $totalInterests = Interest::count();

        // Pass the data to the view
        return view('home', compact('totalCourses', 'totalModules', 'totalLessons', 'totalInterests'));
    }
}
