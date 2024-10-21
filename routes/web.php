<?php

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


// Admin Dashboard (need to copy and paste admin routes above into this)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::get('/admin/users', function () {
        return view('admin.users.index');
    });
});
