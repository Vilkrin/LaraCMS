<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\URLRedirect;
use App\Http\Controllers\Admin\URLShortener;
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
use App\Http\Controllers\RedirectToURL;
use Illuminate\Support\Facades\Route;


// Frontend
Route::get('/', function () {
    return view('home');
})->name('home');

// For Testing some Stuff
Route::get('/testing', function () {
    return view('testing');
})->name('testing');

Route::get('/services', function () {
    return view('hosting-services');
})->name('hosting.services');

Route::prefix('profile')->middleware('auth', 'auth.session')->group(function () {
    Route::get('/', [ProfileController::class, 'profile'])->name('profile');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactFormController::class, 'submit'])->name('contact.submit');

Route::get('/store', function () {
    return view('store');
})->name('store');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');

Route::get('/subscribers', function () {
    return view('subscribers');
})->middleware('auth', 'verified', 'permission:access.subscriber.area')->name('subscribers');

// Blog
Route::get('/blog', [PostController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('blog.show');

Route::prefix('gallery')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/album/{album:slug}', [GalleryController::class, 'album'])->name('gallery.album');
    Route::get('/album/{album:slug}/{image}', [GalleryController::class, 'image'])->name('gallery.image');
});

// Show an individual image 
Route::get('/image/{photo}', [FrontendPhotoController::class, 'show'])->name('image.show');

// Admin Dashboard - Grouping routes under 'admin' middleware and prefix for organization
Route::prefix('admin')->name('admin.')->middleware('auth', 'verified', 'permission:access.admin.panel')->group(function () {

    // Dashboard Route
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

    // URL Shortener
    Route::get('/url-shortener', [URLShortener::class, 'index'])->name('url.short');

    // URL Redirect
    Route::get('/url-redirect', [URLRedirect::class, 'index'])->name('url.redirect');

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
        Route::resource('photos', PhotoController::class);

        // Album routes
        Route::resource('albums', AlbumController::class);
    });
});

require __DIR__ . '/auth.php';

// URL Redirection - Catch-all route for short URLs
// Route::get('{link:slug}', RedirectToURL::class)->name('redirect');

// CMS Dynamic Pages
// Route::get('/{slug}', [PageController::class, 'show'])
//     ->where('slug', '[A-Za-z0-9\-]+')
//     ->name('page.show');
