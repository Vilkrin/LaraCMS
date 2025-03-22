<?php

namespace App\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogPosts extends Component
{
    use WithPagination;

    public function render()
    {

        $posts = Post::all();

        return view('livewire.admin.blog-posts', ['posts' => Post::paginate(10)]);
    }
}
