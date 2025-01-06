<!-- Sidebar -->
<div class="w-64 bg-blue-800 text-white flex flex-col">
    <!-- Sidebar Header -->
    <div class="p-6 bg-blue-900">
        <h2 class="text-2xl font-semibold">Admin Panel</h2>
    </div>

    <!-- Sidebar Links -->
    <div class="flex-grow">
        <ul class="space-y-4 p-6">
            <li>
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center text-lg hover:bg-blue-700 p-3 rounded-md 
                   {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}" 
                   class="flex items-center text-lg hover:bg-blue-700 p-3 rounded-md 
                   {{ request()->routeIs('admin.users.index') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-users mr-3"></i>
                    Manage Users
                </a>
            </li>
            <li>
                <a href="{{ route('admin.tasks.index') }}" 
                   class="flex items-center text-lg hover:bg-blue-700 p-3 rounded-md 
                   {{ request()->routeIs('admin.tasks.index') ? 'bg-blue-700' : '' }}">
                    <i class="fas fa-tasks mr-3"></i>
                    Manage Tasks
                </a>
            </li>
        </ul>
    </div>

    <!-- Logout Button -->
    <div class="p-6 bg-blue-900 mt-auto">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 p-3 rounded-md">
                Logout
            </button>
        </form>
    </div>
</div>
