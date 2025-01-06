@extends('admin.layouts.app')

@section('content')

    <div class="flex-1 p-8 overflow-y-auto">            
        <div class="bg-white shadow-md p-4 mb-6 flex items-center justify-between rounded-md">
            <div class="text-xl font-semibold">Tasks</div>                
        </div>
        <!-- Dashboard Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Total Users Card -->
            <div class="bg-white p-6 shadow-lg rounded-lg">
                <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Update
                        </button>
                    </div>
                </form>

            </div>            
        </div>    
    </div>
@stop