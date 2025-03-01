@extends('admin-dashboard')

@section('title', 'Create Module')

@section('custom-content')
<div class="p-6 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-blue-900 mb-4 text-center">Create Module</h1>

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

        <form action="{{ route('modules.create',$course) }}" method="POST">
            @csrf

            <div class="mb-4 text-black">
                <label for="name" class="block text-sm mb-2 font-semibold text-blue-900">Module Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4 text-black">
                <label for="order" class="block text-sm mb-2 font-semibold text-blue-900">Module Order</label>
                <input type="number" name="order" id="order" value="{{ old('order') }}" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('modules.index',$course) }}" class="text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Add Module
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
