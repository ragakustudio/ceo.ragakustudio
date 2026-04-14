<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CeoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\Auth\LoginController;

// Public
Route::get('/', [CeoController::class, 'index']);

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Private - CEO Dashboard
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Tasks
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    Route::post('/tasks/{task}/{status}', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::get('/knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');
    Route::post('/knowledge', [KnowledgeController::class, 'store'])->name('knowledge.store');
    Route::put('/knowledge/{knowledge}', [KnowledgeController::class, 'update'])->name('knowledge.update');
    Route::delete('/knowledge/{knowledge}', [KnowledgeController::class, 'destroy'])->name('knowledge.destroy');

});