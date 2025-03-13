<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('published_at')->paginate(8);

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    public function posts()
    {
        return view('admin.blog.posts');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([

            'title' => 'required|unique:posts|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required',

        ]);

        if (request('post_image')) {
            $validated['post_image'] = request('post_image')->store('images');
        }

        Post::create($validated);

        return back();
    }

    public function categories()
    {
        return view('admin.blog.categories');
    }
}
