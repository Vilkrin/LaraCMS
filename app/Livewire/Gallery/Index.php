<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use App\Models\Album;

class Index extends Component
{
    public function render()
    {
        $albums = Album::latest()->paginate(20); // 5x4 grid
        return view('livewire.gallery.index', compact('albums'));
    }
}
