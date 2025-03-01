@extends('admin-dashboard')

@section('title', 'Create Interest')

@section('custom-content')
<div class="p-6 text-black">
    <h1 class="text-2xl font-bold text-blue-900 mb-4">Create Interest</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('interests.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-blue-900">Interest Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-semibold text-blue-900">Description</label>
                <textarea name="description" id="description" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Create Interest</button>
        </form>
    </div>
</div>
@endsection
