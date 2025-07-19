<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\PhotoController as FrontendPhotoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;


use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Models\Album;

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

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('profile');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactFormController::class, 'submit'])->name('contact.submit');

Route::get('/store', function () {
    return view('store');
})->name('store');

Route::get('/subscribers', function () {
    return view('subscribers');
})->name('subscribers');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');

// Fetches custom pages from the database
Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', '^(?!admin|login|register|logout|verify-email|blog|profile|store|subscribers|forum|confirm-password|api).*$')
    ->name('page.show');

// just to test functionality
Route::get('/subscribers', function () {
    return view('subscribers');
})->middleware('password.confirm')->name('subscribers');

// Blog
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

Route::prefix('gallery')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/album/{album:slug}', [GalleryController::class, 'album'])->name('gallery.album');
    Route::get('/album/{album:slug}/{image}', [GalleryController::class, 'image'])->name('gallery.image');
});

// Show an individual image 
Route::get('/image/{image}', [FrontendPhotoController::class, 'show'])->name('image.show');

// Admin Dashboard - Grouping routes under 'admin' middleware and prefix for organization
Route::prefix('admin')->name('admin.')->middleware('auth', 'verified', 'permission:view dashboard')->group(function () {

    // Dashboard Route
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // User Management
    Route::resource('users', UserController::class);
    // User Management - Roles & Permissions
    Route::resource('roles', RoleController::class);


    // Pages
    // Route::get('/pages', [AdminController::class, 'pages'])->name('pages.index');
    // Route::get('/pages/create', [AdminController::class, 'createPage'])->name('pages.create');

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
        // Photo routes
        Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
        Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
        Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
        Route::get('/photos/{photo}', [PhotoController::class, 'show'])->name('photos.show');
        Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
        Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
        Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

        // Album routes
        Route::get('/', [AlbumController::class, 'index'])->name('index');
        Route::get('/create', [AlbumController::class, 'create'])->name('create');
        Route::post('/', [AlbumController::class, 'store'])->name('store');
        Route::get('/{album}', [AlbumController::class, 'show'])->name('show');
        Route::delete('/{album}', [AlbumController::class, 'destroy'])->name('destroy');
    });

    // Gallery
    Route::prefix('gallery')->name('gallery.')->group(function () {
        // Main gallery page
        Route::get('/', [AlbumController::class, 'index'])->name('index');

        // Photo routes
        Route::get('/photos/create', [PhotoController::class, 'create'])->name('photos.create');
        Route::post('/photos', [PhotoController::class, 'store'])->name('photos.store');
        Route::get('/photos/{photo}', [PhotoController::class, 'show'])->name('photos.show');
        Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
        Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
        Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

        // Album routes
        Route::get('/create', [AlbumController::class, 'create'])->name('create');
        Route::post('/', [AlbumController::class, 'store'])->name('store');
        Route::get('/{album}', [AlbumController::class, 'show'])->name('show');
        Route::get('/{album}/edit', [AlbumController::class, 'edit'])->name('edit');
        Route::put('/{album}', [AlbumController::class, 'update'])->name('update');
        Route::delete('/{album}', [AlbumController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
