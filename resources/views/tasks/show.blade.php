<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Task Information Card -->
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Task Details</h5>
                        </div>
                        <div class="card-body">

                            <p><strong>Title:</strong> {{ $task->title }}</p>
                            <!-- Status -->
                            <p><strong>Status:</strong> 
                                <span class="badge 
                                    @if ($task->status == 'Pending') badge-warning 
                                    @elseif ($task->status == 'In Progress') badge-info 
                                    @else badge-success @endif">
                                    {{ $task->status }}
                                </span>
                            </p>
                            <!-- Description -->
                            <p><strong>Description:</strong> {{ $task->description }}</p>
                            <!-- Due Date -->
                            <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</p>
                        </div>
                        <div class="card-footer text-right">
                            <!-- Action Buttons -->
                            <a href="{{ route('tasks.edit', $task) }}" class="px-6 py-2 bg-blue-300 text-white-800 font-semibold rounded-md hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Edit</a>
                            <a href="{{ route('tasks.index') }}" class="px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                                Back to Task List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
