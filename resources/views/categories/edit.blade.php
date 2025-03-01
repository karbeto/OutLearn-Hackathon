@extends('admin-dashboard')

@section('title', 'Manage Categories')

@section('custom-content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-blue-900 mb-4">Edit Category</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4 text-black">
                <label for="name" class="block text-sm mb-2 font-semibold text-blue-900">Category Name</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="w-full p-2 border rounded-lg" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update Category
            </button>
        </form>
    </div>
</div>
@endsection
