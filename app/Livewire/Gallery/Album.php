<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
// use App\Models\Album;

class Album extends Component
{
    public Album $album;

    public function mount(Album $album)
    {
        $this->album = $album;
    }

    public function render()
    {
        $images = $this->album->images; // Assuming hasMany relation
        return view('livewire.gallery.album', compact('images'));
    }
}
