@extends('admin.layouts.app')

@section('content')

    <div class="flex-1 lg:ml-64 p-8 overflow-y-auto">
        <!-- Navbar for Small Screens -->
        <div class="lg:hidden bg-blue-800 text-white p-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold">Admin Panel</h2>
            @include('admin.layouts.sidebar-toggle-btn')
        </div>            
        <div class="bg-white shadow-md p-4 mb-6 flex items-center justify-between rounded-md">
            <div class="text-xl font-semibold">Users</div>                
        </div>

        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-1">
            <!-- Total Users Card -->
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <table class="min-w-full table-auto bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="px-4 py-2 text-left text-gray-600">ID</th>
                            <th class="px-4 py-2 text-left text-gray-600">Name</th>
                            <th class="px-4 py-2 text-left text-gray-600">Email</th>
                            <th class="px-4 py-2 text-left text-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2 text-gray-800">{{ $user->id }}</td>
                                <td class="px-4 py-2 text-gray-800">{{ $user->name }}</td>
                                <td class="px-4 py-2 text-gray-800">{{ $user->email }}</td>
                                <td class="px-4 py-2 text-gray-800 space-x-4">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                    <a href="{{ route('admin.users.destroy', $user->id) }}" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
            
        </div>    
    </div>

@stop
