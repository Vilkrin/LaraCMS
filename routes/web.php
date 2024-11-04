<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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
