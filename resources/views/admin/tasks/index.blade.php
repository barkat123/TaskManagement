@extends('admin.layouts.app')

@section('content')

<div class="flex-1 lg:ml-64 p-8 overflow-y-auto">
        <!-- Navbar for Small Screens -->
        <div class="lg:hidden bg-blue-800 text-white p-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Admin Panel</h2>
            @include('admin.layouts.sidebar-toggle-btn')
        </div>          
          
        <div class="bg-white shadow-md p-4 mb-6 flex items-center justify-between rounded-md">
            <div class="text-xl font-semibold">Tasks</div>                
        </div>

        <!-- Filter Form -->
        <div class="bg-white shadow-md p-4 mb-6 rounded-md">
            <form method="GET" action="{{ route('admin.tasks.index') }}" class="flex space-x-4">
                <!-- Title (Name) Filter -->
                <div class="flex-1">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                    <input type="text" id="title" name="title" 
                           value="{{ request()->get('title') }}" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Status Filter -->
                <div class="flex-1">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                    <select id="status" name="status" 
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Status</option>
                        <option value="pending" {{ request()->get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ request()->get('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ request()->get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <!-- User Filter -->
                <div class="flex-1">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User:</label>
                    <select id="user_id" name="user_id" 
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request()->get('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filter Button -->
                <div class="flex items-end">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Tasks Table -->
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1">
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <table class="min-w-full table-auto border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="px-4 py-2 border-b">ID</th>
                            <th class="px-4 py-2 border-b">Title</th>
                            <th class="px-4 py-2 border-b">Description</th>
                            <th class="px-4 py-2 border-b">Status</th>
                            <th class="px-4 py-2 border-b">Assigned User</th> <!-- Added User Column -->
                            <th class="px-4 py-2 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr class="odd:bg-white even:bg-gray-50 hover:bg-gray-100">
                                <td class="px-4 py-2 border-b">{{ $task->id }}</td>
                                <td class="px-4 py-2 border-b">{{ $task->title }}</td>
                                <td class="px-4 py-2 border-b">{{ $task->description }}</td>
                                <td class="px-4 py-2 border-b">{{ $task->status }}</td>
                                <td class="px-4 py-2 border-b">{{ $task->user->name ?? 'No User' }}</td> <!-- Display User's Name -->
                                <td class="px-4 py-2 border-b">
                                    <a href="{{ route('admin.tasks.edit', $task->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                    <a href="{{ route('admin.tasks.destroy', $task->id) }}" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $tasks->appends(request()->all())->links() }}
                </div>
            </div>
        </div>    
    </div>
@stop
