<?php

namespace App\Livewire\Gallery;

use Livewire\Component;
use App\Models\Album;
// use App\Models\Image;

class Image extends Component
{
    public Album $album;
    public Image $image;

    public function mount(Album $album, Image $image)
    {
        $this->album = $album;
        $this->image = $image;
    }

    public function render()
    {
        return view('livewire.gallery.image');
    }
}
