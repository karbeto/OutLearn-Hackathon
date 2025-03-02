@extends('admin-dashboard')

@section('title', 'Manage Courses')

@section('custom-content')
<div class="p-6 text-black flex-col justify-center items-center w-full h-vh text-center">
   <h2 class="text-xl font-semibold">Welcome {{ Auth::user()->name }}</h2>
   <h2>Here you can manage courses,categories,interests</h2>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mx-10">
    <!-- Total Courses -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-700">Total Courses</h2>
        <p class="text-4xl text-blue-600 mt-4">{{ $totalCourses }}</p>
    </div>

    <!-- Total Modules -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-700">Total Modules</h2>
        <p class="text-4xl text-blue-600 mt-4">{{ $totalModules }}</p>
    </div>

    <!-- Total Lessons -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-700">Total Lessons</h2>
        <p class="text-4xl text-blue-600 mt-4">{{ $totalLessons }}</p>
    </div>

    <!-- Total Interests -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-700">Total Interests</h2>
        <p class="text-4xl text-blue-600 mt-4">{{ $totalInterests }}</p>
    </div>
</div>

@endsection