@extends('admin-dashboard')

@section('title', 'Create Lesson')

@section('custom-content')
<div class="p-6 text-black">
    <h1 class="text-2xl font-bold text-blue-900">Create a New Lesson</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 mb-4 rounded">
            <strong>Whoops! Something went wrong.</strong>
            <ul class="list-disc pl-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('lessons.store', $module_id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full border rounded p-2 @error('title') border-red-500 @enderror" required value="{{ old('title') }}" />
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" rows="4" class="mt-1 block w-full border rounded p-2 @error('content') border-red-500 @enderror" required>{{ old('content') }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="order_number" class="block text-sm font-medium text-gray-700">Order Number</label>
            <input type="number" name="order_number" id="order_number" class="mt-1 block w-full border rounded p-2 @error('order_number') border-red-500 @enderror" required value="{{ old('order_number') }}" />
            @error('order_number')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="video" class="block text-sm font-medium text-gray-700">Upload Video</label>
            <input type="file" name="video" id="video" class="mt-1 block w-full border rounded p-2 @error('video') border-red-500 @enderror" />
            @error('video')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Lesson</button>
    </form>
</div>
@endsection
