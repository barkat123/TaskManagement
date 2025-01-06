<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::where('user_id', auth()->id());  // Filter tasks by the logged-in user
        
        // Search functionality (if search term exists)
        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by status (if status is selected)
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Get tasks and paginate
        $tasks = $query->paginate(10);

        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'required|date',
        ]);

        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        if ($task->user_id == auth()->id()) {
            return view('tasks.edit', compact('task'));
        }
        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id == auth()->id()) {
            $task->update($request->only(['title', 'description', 'status', 'due_date']));
            return redirect()->route('tasks.index');
        }
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        if ($task->user_id == auth()->id()) {
            $task->delete();
            return redirect()->route('tasks.index');
        }
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
    {

        if ($task->user_id == auth()->id()) {
            return view('tasks.show', compact('task'));
        }
        return redirect()->route('tasks.index');
    }
}

