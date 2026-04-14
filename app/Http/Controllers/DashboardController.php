<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Knowledge;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = Task::where('status', '!=', 'done')->latest()->take(5)->get();
        $knowledges = Knowledge::latest()->take(5)->get();

        return view('dashboard.index', compact('tasks', 'knowledges'));
    }
}