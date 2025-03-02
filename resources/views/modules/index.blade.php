@extends('admin-dashboard')

@section('title', 'Manage Modules')

@section('custom-content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-blue-900">Manage Modules for {{ $course->title }} </h1>
        <a href="{{ route('modules.create',$course) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Add Module
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200 text-blue-900">
                    <th class="p-3 border">Module Name</th>
                    <th class="p-3 border">Module Order</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($course->modules as $module)
                <tr class="border-b text-black">
                    <td class="p-3 border">{{ $module->name }}</td>
                    <td class="p-3 border">{{ $module->order }}</td>
                    <td class="p-3 border">
                        <a href="{{ route('lessons.index', ['module_id' => $module->id]) }}" class="text-blue-500 hover:underline">Manage Lessons</a>
                        <a href="{{ route('modules.edit', $module) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('modules.destroy', $module) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection