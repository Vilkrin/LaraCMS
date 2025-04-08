<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithPagination;

class BlogController extends Controller
{
    use AuthorizesRequests;

    public $search = '';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()
            ->paginate(10);

        return view('admin.blog.posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        Gate::authorize('create', $post);

        return view('admin.blog.create', [
            'blogCategories' => BlogCategory::all() ?? collect(), // Return an empty collection if none exist
            'tags' => Tag::all() ?? collect()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.blog.edit', [
            'post' => $post,
            'blogCategories' => BlogCategory::all() ?? collect(),
            'tags' => Tag::all() ?? collect()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post): RedirectResponse
    {
        Gate::authorize('create', Post::class);

        $validated = $request->validate([
            'title' => 'required|unique:posts|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'nullable|exists:blog_categories,id', // Allow null
            'tags' => 'nullable|array', // Allow empty
            'tags.*' => 'exists:tags,id'
        ]);

        $validated['user_id'] = auth()->id();

        if ($request->hasFile('post_image')) {
            $validated['post_image'] = Storage::disk('public')->put('images', $request->file('post_image'));
        }

        $post = Post::create($validated);
        $post->tags()->sync($validated['tags'] ?? []);

        session()->flash('message', 'Post Created Successfully.');

        return redirect()->route('admin.blog.posts');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('blog.show', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        Gate::authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|min:8|max:255|unique:posts,title,' . $post->id,
            'post_image' => 'file',
            'body' => 'required',
            'category_id' => 'nullable|exists:blog_categories,id', // Allow null
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);

        if ($request->hasFile('post_image')) {
            $validated['post_image'] = Storage::disk('public')->put('images', $request->file('post_image'));
            $post->post_image = $validated['post_image'];
        }

        $post->update($validated);
        $post->tags()->sync($validated['tags'] ?? []);

        session()->flash('message', 'Post Updated Successfully.');

        return redirect()->route('admin.blog.posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();

        session()->flash('message', 'Post Deleted Successfully.');

        return back();
    }
}
