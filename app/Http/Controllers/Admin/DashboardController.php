<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the total count of users, tasks, pending tasks, and completed tasks
        $userCount = User::count();
        $taskCount = Task::count();
        $pendingCount = Task::where('status', 'pending')->count();
        $completedCount = Task::where('status', 'completed')->count();

        // Pass the data to the view
        return view('admin.dashboard', compact('userCount', 'taskCount', 'pendingCount', 'completedCount'));
    }
}

