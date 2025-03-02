@extends('admin-dashboard')

@section('title', 'Manage Courses')

@section('custom-content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-blue-900">Manage Courses</h1>
        <a href="{{ route('courses.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Add Course
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200 text-blue-900">
                <th class="p-3 border">Course title</th>
                <th class="p-3 border">Course description</th>
                <th class="p-3 border">Category</th>
                <th class="p-3 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
            <tr class="border-b text-black">
                <td class="p-3 border">{{ $course->title }}</td>
                <td class="p-3 border truncate max-w-xs" style="max-width: 250px;">{{ $course->description }}</td>
                <td class="p-3 border">{{ $course->category->name }}</td>
   

                    <td class="p-3 border space-x-2">
                        <a href="{{ route('modules.index', $course) }}" 
                            class="bg-blue-200 text-blue-700 px-4 py-2 rounded hover:bg-blue-300 transition duration-300">
                            Manage Modules
                         </a>
                        <a href="{{ route('courses.edit', $course) }}" 
                            class="bg-blue-200 text-blue-700 px-4 py-2 rounded hover:bg-blue-300 transition duration-300">
                             Edit
                         </a>
                         
                        <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-200 text-red-700 px-4 py-2 rounded hover:bg-red-300 transition duration-300">
                                Delete
                            </button>
                            
                        </form>
                    </td>
           
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection