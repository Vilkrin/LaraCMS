<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PageController;
use App\Models\Post;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

// // Blog
// Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
// Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

// // Gallery
// Route::get('/gallery', function () {
//     return view('gallery');
// })->name('gallery');
// // Single Image View
// Route::get('/gallery/{image}', function ($image) {
//     return view('gallery.image', ['image' => $image]);
// })->name('gallery.image');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');

// Route::get('/user/{slug}', [ProfileController::class, 'show'])->name('users.show');

// Route::prefix('profile')->name('profile.')->middleware(['auth'])->group(function () {

//     Route::get('/', [ProfileController::class, 'index'])->name('index');
//     Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
//     Route::get('/security', [ProfileController::class, 'security'])->name('security');
// });

// Admin Area
Route::prefix('admin')->name('admin.')->middleware('auth', 'verified', 'permission:access.admin.panel')->group(function () {

    // Dashboard Route
    Route::view('/', 'admin.dashboard')->name('dashboard');

    // User Management
    Route::resource('users', UserController::class)
        ->middleware('permission:view.users');
    // // User Management - Roles & Permissions
    // Route::get('/roles', function () {
    //     return view('admin.roles.index');
    // })->name('roles.index')
    //     ->middleware('permission:manage.roles');

    // Content Management
    // // Blog Posts
    // Route::prefix('posts')->name('posts.')->middleware('permission:view.posts')->group(function () {
    //     Route::view('/', 'admin.blog.index')
    //         ->name('index');
    //     Route::view('/create', 'admin.blog.create')
    //         ->name('create');
    //     Route::get('/{post}/edit', function (Post $post) {
    //         return view('admin.blog.edit', compact('post'));
    //     })->name('edit');
    //     Route::get('/{post}', function (Post $post) {
    //         return view('admin.blog.show', compact('post'));
    //     })->name('show');
    // });

    // Pages
    Route::resource('pages', PageController::class)->middleware('permission:view.pages');

    // // Menus
    // Route::get('/menus', function () {
    //     return view('admin.menus.index');
    // })->name('menus.index')
    //     ->middleware('permission:manage.menus');

    // Settings
    Route::get('/settings', function () {
        return view('admin.settings.settingspage');
    })->name('settings')
        ->middleware('permission:manage.site.settings');
});

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::view('dashboard', 'dashboard')->name('dashboard');
// });

require __DIR__ . '/settings.php';
