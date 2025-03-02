@extends('admin-dashboard')

@section('title', 'Overview - Platform Dashboard')

@section('custom-content')
<div class="p-6 text-black flex flex-col justify-between items-center w-full h-screen text-center">
    <div class="mb-8">
        <h2 class="text-3xl font-semibold text-gray-800">Welcome Back, {{ Auth::user()->name }}!</h2>
        <p class="text-lg text-gray-600 mt-2">This is your overview page where you can manage all the courses, modules, and lessons for your platform. Stay organized and keep track of your progress efficiently!</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 mx-10 mb-12">
        <div class="bg-gradient-to-r from-blue-800 to-blue-400 p-6 rounded-lg shadow-lg text-white course-pointer h-fit">
            <h3 class="text-2xl font-semibold">Total Courses</h3>
            <p class="text-4xl font-bold mt-4">{{ $totalCourses }}</p>
            <p class="mt-2">The number of courses available on the platform.</p>
        </div>

        <div class="bg-gradient-to-r from-green-500 to-yellow-500 p-6 rounded-lg shadow-lg text-white course-pointer h-fit">
            <h3 class="text-2xl font-semibold">Total Modules</h3>
            <p class="text-4xl font-bold mt-4">{{ $totalModules }}</p>
            <p class="mt-2">Total number of modules across all courses.</p>
        </div>

        <div class="bg-gradient-to-r from-red-800 to-red-400 p-6 rounded-lg shadow-lg text-white course-pointer h-fit">
            <h3 class="text-2xl font-semibold">Total Lessons</h3>
            <p class="text-4xl font-bold mt-4">{{ $totalLessons }}</p>
            <p class="mt-2">The total number of lessons available in the modules.</p>
        </div>
    </div>

    <div class="mt-auto text-center">
        <h3 class="text-xl font-semibold text-gray-800">Manage Your Platform Effortlessly</h3>
        <p class="text-lg text-gray-600 mt-2">With easy-to-use features, you can add, modify, and track the progress of your courses, modules, and lessons all in one place. Keep everything organized and up to date!</p>
    </div>
</div>

@endsection
