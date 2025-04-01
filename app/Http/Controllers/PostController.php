<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Livewire\WithPagination;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('published_at')->paginate(8);

        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('blog.show', compact('post'));
    }
}
