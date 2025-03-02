<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::where('is_featured', true)->latest()->paginate(4); // 4 latest posts for the featured section
        $regularPosts = Post::where('is_featured', false)->latest()->paginate(4); // Next 4 posts for the smaller section

        return view('blog.index', compact('featuredPosts', 'regularPosts'));
    }
}
