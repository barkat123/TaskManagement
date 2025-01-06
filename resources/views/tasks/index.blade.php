<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="mb-4">Tasks</h1>
                    <!-- Search Form with Status Filter -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-3">
                        <div class="col-span-1">
                            <form method="GET" action="{{ route('tasks.index') }}">
                                <div class="flex">
                                    <input type="text" name="search" class="form-control p-2 border rounded-l-md w-full" placeholder="Search by task title" value="{{ request('search') }}">
                                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-r-md hover:bg-blue-600 focus:outline-none">
                                        Search
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="col-span-1">
                            <!-- Status Filter -->
                            <form method="GET" action="{{ route('tasks.index') }}">
                                <div class="flex">
                                    <select name="status" class="form-control p-2 border rounded-md w-full" onchange="this.form.submit()">
                                        <option value="">All Statuses</option>
                                        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="col-span-1 text-right">
                            <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white text-sm font-semibold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none">
                                Create New Task
                            </a>
                        </div>
                    </div>


                    @if($tasks->isNotEmpty())
                         <!-- Task Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover w-full">
                                <thead class="table-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>                                    
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td class="text-center">{{ $task->title }}</td>
                                            <td class="text-center"><span class="badge badge-{{ $task->status_class }}">{{ $task->status }}</span></td>
                                            <td class="text-center">{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                                            <td class="text-center">
                                                <div class="d-flex">
                                                    <a href="{{ route('tasks.show', $task) }}" class=" d-inline btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i> 
                                                    </a>
                                                    <a href="{{ route('tasks.edit', $task) }}" class="d-inline btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> 
                                                    </a>
                                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this task?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i> 
                                                        </button>
                                                    </form>             
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach                                   
                                </tbody>
                            </table>
                            {{ $tasks->links() }}
                        </div>
                    @else
                        <div class="text-left pt-2">Nothing found.</div>
                    @endif                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
