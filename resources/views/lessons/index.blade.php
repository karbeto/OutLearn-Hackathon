@extends('admin-dashboard')

@section('title', 'Manage Lessons')

@section('custom-content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-blue-900">Manage Lessons for module {{ $module->name }}</h1>
        <a href="{{ route('lessons.create', ['module_id' => $module->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Add Lesson
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200 text-blue-900">
                    <th class="p-3 border">Lesson Title</th>
                    <th class="p-3 border">Lesson Description</th>
                    <th class="p-3 border">Order Number</th>
                    <th class="p-3 border">Video Url</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $lesson)
                <tr class="border-b text-black">
                    <td class="p-3 border">{{ $lesson->title }}</td>
                    <td class="p-3 border truncate max-w-xs">{{ $lesson->content }}</td>
                    <td class="p-3 border">{{ $lesson->order_number }}</td>
                    @if (!is_null($lesson->video_url) || strlen($lesson->video_url) > 0)
                        <td class="p-3 border"><iframe src="{{asset('storage/' . $lesson->video_url)}}" frameborder="0"></iframe></td>
                    @else
                    <td class="p-3 border">No video provided yet.</td>
                    @endif
                    <td class="p-3 border">
                        <a href="{{ route('lessons.edit', ['module' => $module, 'lesson' => $lesson]) }}" class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('lessons.destroy', ['module' => $module, 'lesson' => $lesson]) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
