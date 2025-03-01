@extends('admin-dashboard')

@section('title', 'Create Lesson')

@section('custom-content')
<div class="p-6 text-black">
    <h1 class="text-2xl font-bold text-blue-900">Create a New Lesson</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full" required />
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" rows="4" class="mt-1 block w-full" required></textarea>
        </div>

        <div class="mb-4">
            <label for="order_number" class="block text-sm font-medium text-gray-700">Order Number</label>
            <input type="number" name="order_number" id="order_number" class="mt-1 block w-full" required />
        </div>

        <div class="mb-4">
            <label for="video" class="block text-sm font-medium text-gray-700">Upload Video</label>
            <input type="file" name="video" id="video" class="mt-1 block w-full" />
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Lesson</button>
    </form>
</div>
@endsection
