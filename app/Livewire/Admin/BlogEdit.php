<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogEdit extends Component
{

    public Post $post;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.blog-edit', [
            'posts' => Auth::user()->posts,
        ]);
    }
}
