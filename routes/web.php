<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/cms', function () {
    return view('cmstest');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/users', function () {
    return view('admin.users.show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
