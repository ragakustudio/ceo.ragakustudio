<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $weekStart = $request->week
            ? Carbon::parse($request->week)->startOfWeek()
            : Carbon::now()->startOfWeek();

        $tasks = Task::where('week_start', $weekStart)->get();

        return view('tasks.index', compact('tasks', 'weekStart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'due_date' => $request->due_date,
            'week_start' => Carbon::now()->startOfWeek(),
        ]);

        return back();
    }

    public function updateStatus(Task $task, $status)
    {
        $task->update([
            'status' => $status
        ]);

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(['success' => true]);
    }

        public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task->update([
            'title' => $request->title ?? $task->title,
            'due_date' => $request->due_date ?? $task->due_date,
        ]);

        return response()->json(['success' => true]);
    }


}