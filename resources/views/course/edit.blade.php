<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-700 text-center mb-6">Edit Course</h2>

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

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium" for="title">Course Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium" for="description">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required>{{ old('description', $course->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-600 text-sm font-medium" for="category_id">Category</label>
                <select id="category_id" name="category_id" class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:border-blue-500" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('courses.index') }}" class="text-gray-600 hover:text-gray-800 text-sm">Cancel</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">Update Course</button>
            </div>
        </form>
    </div>

</body>
</html>
