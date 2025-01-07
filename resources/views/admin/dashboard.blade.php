@extends('admin.layouts.app')

@section('content')
<div class="flex-1 lg:ml-64 p-8 overflow-y-auto">
    <!-- Navbar for Small Screens -->
    <div class="lg:hidden bg-blue-800 text-white p-4 flex items-center justify-between">
        <h2 class="text-lg font-semibold">Admin Panel</h2>
        @include('admin.layouts.sidebar-toggle-btn')
    </div>

    <!-- Admin Dashboard Header -->
    <div class="bg-white shadow-md p-4 mb-6 flex items-center justify-between rounded-md">
        <div class="text-xl font-semibold">Admin Dashboard</div>
    </div>

    <!-- Dashboard Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Users Card -->
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-start">
            <h6 class="text-xl font-semibold text-gray-800">Total Users</h6>
            <p class="text-blue-600 text-2xl">{{ $userCount }}</p>
            <a href="{{ route('admin.users.index') }}" class="mt-2 text-blue-500 hover:text-blue-700">View All</a>
        </div>

        <!-- Total Tasks Card -->
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-start">
            <h6 class="text-xl font-semibold text-gray-800">Total Tasks</h6>
            <p class="text-blue-600 text-2xl">{{ $taskCount }}</p>
            <a href="{{ route('admin.tasks.index') }}" class="mt-2 text-blue-500 hover:text-blue-700">View All</a>
        </div>

        <!-- Pending Tasks Card -->
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-start">
            <h6 class="text-xl font-semibold text-gray-800">Pending Tasks</h6>
            <p class="text-yellow-600 text-2xl">{{ $pendingCount }}</p>
            <a href="{{ route('admin.tasks.index', ['status' => 'pending']) }}" class="mt-2 text-blue-500 hover:text-blue-700">View Pending</a>
        </div>

        <!-- Completed Tasks Card -->
        <div class="bg-white p-6 shadow-lg rounded-lg flex flex-col items-start">
            <h6 class="text-xl font-semibold text-gray-800">Completed Tasks</h6>
            <p class="text-green-600 text-2xl">{{ $completedCount }}</p>
            <a href="{{ route('admin.tasks.index', ['status' => 'completed']) }}" class="mt-2 text-blue-500 hover:text-blue-700">View Completed</a>
        </div>
    </div>
</div>
@endsection
