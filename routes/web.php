<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(TaskController::class)->group(function() {
    Route::view("task_form","Task.task_create");
    Route::Post('/create_task', "createTask")->name("cTask");
    Route::get('/displayTask', "displayTask")->name("display");
    Route::get('viewTask/{task}', "viewTask")->name("view");
    Route::get('delete/{task}', "delete")->name("delete");
    Route::get('edit/{task}', "edit")->name("edit");
    Route::Post('/update', "update")->name('update');
    Route::get("search","search");


});


Route::view("task_create","Task.task_create");
Route::middleware('auth')->group(function () {
   
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
