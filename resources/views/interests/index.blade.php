@extends('admin-dashboard')

@section('title', 'Manage Interests')

@section('custom-content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-blue-900">Manage Interests</h1>
        <a href="{{ route('interests.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            + Add Interest
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200 text-blue-900">
                    <th class="p-3 border">Interest Name</th>
                    <th class="p-3 border">Description</th>
                    <th class="p-3 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($interests as $interest)
                    <tr class="border-b text-black">
                        <td class="p-3 border">{{ $interest->name }}</td>
                        <td class="p-3 border">{{ $interest->description }}</td>
                    
                        <td class="p-3 border w-40">
                            <div class="flex justify-center space-x-2">
                                <a href="{{  route('interests.edit', $interest->id) }}" 
                                    class="bg-blue-200 text-blue-700 px-4 py-2 rounded hover:bg-blue-300 transition duration-300">
                                    Edit
                                </a>
                                
                                <form action="{{route('interests.destroy', $interest->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-200 text-red-700 px-4 py-2 rounded hover:bg-red-300 transition duration-300">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
