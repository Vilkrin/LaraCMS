<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // User Management
    public function users()
    {
        return view('admin.users.index');
    }

    public function roles()
    {
        return view('admin.users.roles');
    }

    // Pages
    public function pages()
    {
        return view('admin.pages.index');
    }

    public function createPage()
    {
        return view('admin.pages.create');
    }

    // Blog
    public function posts()
    {
        return view('admin.blog.posts');
    }

    public function createPost()
    {
        return view('admin.blog.create');
    }

    public function categories()
    {
        return view('admin.blog.categories');
    }

    // Gallery
    public function gallery()
    {
        return view('admin.gallery.index');
    }

    public function uploadImage()
    {
        return view('admin.gallery.upload');
    }
}
