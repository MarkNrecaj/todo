<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTodo;
use App\Http\Controllers\ToDoController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// my routes
Route::middleware('auth')->group(function () {
    Route::redirect('/', '/todo');

    Route::get('/todo', [ToDoController::class, 'index'])->name('index');
    Route::post('/todo', [ToDoController::class, 'store'])->name('post');
    Route::get('/todo/{todo}', [ToDoController::class, 'edit'])->name('edit');
    Route::patch('/todo/{todo}', [ToDoController::class, 'update'])->name('update');
    Route::patch('/todo/completed/{todo}', [ToDoController::class, 'updateDone'])->name('update2');
    //check route name update 2
    Route::delete('/todo/{todo}', [ToDoController::class, 'destroy'])->name('delete');

    Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');
    Route::get('/projects/redirect', [ProjectController::class, 'redirect'])->name('project.redirect');

    Route::post('/projects/new', [ProjectController::class, 'store'])->name('project.store');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('project.delete');
    Route::get('/project/{project}/todo', [ProjectTodo::class, 'showProjectTodos']);
    Route::post('/project/todo/{id}', [ProjectTodo::class, 'store'])->name('posttodo');

});


require __DIR__ . '/auth.php';
