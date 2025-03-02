<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


// Frontend
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');




// Authenticated Frontend
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Private Frontend Routes to be placed here

});



// Admin Dashboard - Grouping routes under 'admin' middleware and prefix for organization
Route::prefix('admin')->name('admin.')->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified',)->group(function () {

    // Dashboard Route
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    // User Management
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/{user}', [AdminController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/create', [AdminController::class, 'edit'])->name('users.create');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.delete');
    Route::get('/roles', [AdminController::class, 'roles'])->name('roles.index');

    // Pages
    Route::get('/pages', [AdminController::class, 'pages'])->name('pages.index');
    Route::get('/pages/create', [AdminController::class, 'createPage'])->name('pages.create');

    // Blog
    Route::get('/blog/posts', [AdminController::class, 'posts'])->name('blog.posts');
    Route::get('/blog/create', [AdminController::class, 'createPost'])->name('blog.create');
    Route::get('/blog/categories', [AdminController::class, 'categories'])->name('blog.categories');

    // Gallery
    Route::get('/gallery', [AdminController::class, 'gallery'])->name('gallery.index');
    Route::get('/gallery/upload', [AdminController::class, 'uploadImage'])->name('gallery.upload');
});
