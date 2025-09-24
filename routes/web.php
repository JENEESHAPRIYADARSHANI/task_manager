<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get ('/task', [TaskController::class, 'index'])->name('task.index');
Route::get ('/task/create', [TaskController::class, 'create'])->name('task.create');
Route::post ('/task', [TaskController::class, 'store'])->name('task.store');
Route::get ('/task{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
//this one is get because it only edit the data
Route::put ('/task{task}/update', [TaskController::class, 'update'])->name('task.update');
Route::delete ('/task{task}/delete', [TaskController::class, 'delete'])->name('task.delete');

require __DIR__.'/auth.php';
