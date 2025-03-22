<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BlogController extends Controller
{
    use AuthorizesRequests;

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
        $posts = auth()->user()->posts;

        return view('admin.blog.posts', compact('posts'));
    }

    public function create(Post $post)
    {
        Gate::authorize('create', $post);

        return view('admin.blog.create');
    }

    public function edit(Post $post)
    {
        return view('admin.blog.edit', ['post' => $post]);
    }

    public function store(Request $request, Post $post): RedirectResponse
    {
        Gate::authorize('create', $post);

        $validated = $request->validate([

            'title' => 'required|unique:posts|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required',

        ]);

        $validated['user_id'] = auth()->user()->id; // --> this will assign the id of the currently logged in user

        if (request('post_image')) {
            $validated['post_image'] = Storage::disk('public')->put('images', $request->file('post_image'));
        }

        Post::create($validated);

        session()->flash('message', 'Post Created Successfully.');

        return redirect()->route('admin.blog.posts');
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        Gate::authorize('update', $post);

        $validated = $request->validate([

            'title' => 'required|unique:posts|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required',

        ]);

        if (request('post_image')) {
            $validated['post_image'] = Storage::disk('public')->put('images', $request->file('post_image'));
            $post->post_image = $validated['post_image'];
        }

        $post->title = $validated['title'];
        $post->body = $validated['body'];

        $post->update();

        session()->flash('message', 'Post Updated Successfully.');

        return redirect()->route('admin.blog.posts');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();

        session()->flash('message', 'Post Deleted Successfully.');

        return back();
    }

    public function categories()
    {
        return view('admin.blog.categories');
    }
}
