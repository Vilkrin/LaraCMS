<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\AlbumController;
use App\Models\Video;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// to be removed and replaced
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Album;

// Also to be Replaced.
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Frontend
Route::get('/', function () {
    return view('home');
})->name('home');


// just to test functionality
Route::get('/test', function () {
    return view('home2');
})->middleware('password.confirm')->name('home2');

// Blog
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

// Gallery
Route::prefix('gallery')->name('gallery.')->group(function () {
    Route::resource('photos', GalleryController::class)->only([
        'index',
        'show'
    ]);
});

// Show an individual image 
Route::get('/image/{media}', [PhotoController::class, 'show'])->name('show');

Route::get('/contact', function () {
    return view('contact');
});

// Admin Dashboard - Grouping routes under 'admin' middleware and prefix for organization
Route::prefix('admin')->name('admin.')->middleware('auth', 'verified', 'permission:view dashboard')->group(function () {

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
    Route::get('/blog/posts', [BlogController::class, 'index'])->name('blog.posts');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/posts', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/posts/{post}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/blog/posts/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::delete('/blog/posts/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::patch('/blog/posts/{post}/update', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/categories', [BlogController::class, 'categories'])->name('blog.categories');

    // Gallery
    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/', [AlbumController::class, 'index'])->name('index');
        Route::get('/create', [AlbumController::class, 'create'])->name('create');
        Route::post('/', [AlbumController::class, 'store'])->name('store');
        Route::get('/{album}', [AlbumController::class, 'show'])->name('show');
        Route::delete('/{album}', [AlbumController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
