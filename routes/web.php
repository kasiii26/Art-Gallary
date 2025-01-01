<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\AdminController::class, 'index'])->name('users.users');
// Route::get('/admin-dashboard', [App\Http\Controllers\Dashboard])
Route::get('/add/user', [App\Http\Controllers\UsersController::class, 'indexForm'])->name('');
Route::post('/add/user', [App\Http\Controllers\UsersController::class, 'AddUser'])->name('AddUser');
Route::get('/edit/{id}', [App\Http\Controllers\UsersController::class, 'indexEditForm'])->name('');
Route::get('/delete/{id}', [App\Http\Controllers\UsersController::class, 'deleteUser'])->name('');
// Route::post('/add/user', [App\Http\Controllers\UsersController::class, 'AddUser'])->name('AddUser');
Route::post('/edit/user', [App\Http\Controllers\UsersController::class, 'EditUser'])->name('EditUser');
// Route::get('/users', [AdminController::class, 'users'])->name('users');
Route::get('/admin', [App\Http\Controllers\UsersController::class, 'index'])->name('admin.admin');
Route::get('/edit/role/{id}', [UsersController::class, 'indexRoleEditForm'])->name('edit.role');
Route::post('/update/role', [UsersController::class, 'updateRole'])->name('update.role');
Route::post('/update/user', [UsersController::class, 'EditUser'])->name('update.user');
// Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.users');
Route::middleware(['auth'])->group(function () {
    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
});
Route::get('/user-post', [AdminController::class, 'showpost'])->name('users.user-post');
Route::get('/posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');
Route::post('/posts/edit', [PostsController::class, 'update'])->name('EditPost');
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
Route::get('/users/edit/{id}', [UsersController::class, 'indexEditForm'])->name('users.edit');


Route::post('/users/update-role', [UsersController::class, 'updateRole'])->name('users.updateRole');

Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category');

