@extends('admin-dashboard')

@section('title', 'Edit Module')

@section('custom-content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-blue-900 mb-4">Edit Module</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('modules.update', $module) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4 text-black">
                <label for="name" class="block text-sm mb-2 font-semibold text-blue-900">Module Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $module->name) }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4 text-black">
                <label for="order" class="block text-sm mb-2 font-semibold text-blue-900">Module Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', $module->order) }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Update Module
            </button>
        </form>
    </div>
</div>
@endsection
