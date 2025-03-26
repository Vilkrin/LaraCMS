<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


// Frontend
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

Route::prefix('gallery')->name('gallery.')->group(function () {
    // Gallery index page for public users
    Route::get('/', [GalleryController::class, 'publicGallery'])->name('publicGallery');

    // Show a single album
    Route::get('/album/{slug}', [GalleryController::class, 'showAlbum'])->name('showAlbum');

    // Show an individual photo (for photos not in any album)
    Route::get('/photo/{media}', [GalleryController::class, 'showPhoto'])->name('showPhoto');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/test', function () {
    return view('test');
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
    Route::resource('users', UserController::class);
    // User Management - Roles & Permissions
    Route::resource('roles', RoleController::class);


    // Pages
    Route::get('/pages', [AdminController::class, 'pages'])->name('pages.index');
    Route::get('/pages/create', [AdminController::class, 'createPage'])->name('pages.create');

    // Blog
    Route::get('/blog/posts', [BlogController::class, 'posts'])->name('blog.posts');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/posts', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/posts/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::delete('/blog/posts/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::patch('/blog/posts/{post}/update', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/categories', [BlogController::class, 'categories'])->name('blog.categories');

    // Gallery
    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/', [GalleryController::class, 'adminIndex'])->name('index');
        Route::get('/create', [GalleryController::class, 'create'])->name('create');
        Route::post('/', [GalleryController::class, 'store'])->name('store');
        Route::get('/{album}', [GalleryController::class, 'show'])->name('show');
        Route::delete('/{album}', [GalleryController::class, 'destroy'])->name('destroy');
    });
});
