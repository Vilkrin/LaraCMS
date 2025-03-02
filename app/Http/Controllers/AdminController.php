<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function create(User $user)
    {
        return view('admin.users.create', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user->deleteProfilePhoto(); // Deletes profile photo if exists
        $user->tokens->each->delete(); // Revokes API tokens
        $user->delete(); // Deletes user

        session()->flash('message', 'User deleted successfully.');

        return redirect()->route('admin.users.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create($validated);

        return redirect()->route('admin.users.index')->with('message', 'User added successfully.');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('message', 'User updated successfully.');
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
