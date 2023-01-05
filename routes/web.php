<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

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

Route::redirect('/', '/todo');

Route::get('/todo', [ToDoController::class, 'index'])->name('index');
Route::post('/todo', [ToDoController::class, 'store'])->name('post');
Route::get('/todo/{todo}', [ToDoController::class, 'edit'])->name('edit');
Route::patch('/todo/{todo}', [ToDoController::class, 'update'])->name('update');
Route::delete('/todo/{todo}', [ToDoController::class, 'destroy'])->name('delete');




// Route::get('/', function () {
//     return view('welcome');
// });


// Route::redirect('/', '/posts');

// Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
// Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post:slug}', [PostsController::class, 'show'])->name('posts.show');

// Route::get('authors/{author:username}', GetAuthorController::class)->name('authors.show');