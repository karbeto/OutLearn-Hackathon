@extends('admin-dashboard')

@section('title', 'Manage Categories')

@section('custom-content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-blue-900 mb-4">Create New Category</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-4 text-black">
                <label for="name" class="block text-sm font-semibold mb-2 text-gray-700">Category Name</label>
                <input type="text" name="name" id="name" class="w-full p-2 border rounded-lg" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Create Category
            </button>
        </form>
    </div>
</div>
@endsection
