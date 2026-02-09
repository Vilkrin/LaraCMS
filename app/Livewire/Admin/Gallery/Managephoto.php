<?php

namespace App\Livewire\Admin\Gallery;

use Livewire\Component;
use App\Models\Photo;
use Livewire\WithFileUploads;

class Managephoto extends Component
{
    use WithFileUploads;

    public function deletePhoto($photoId)
    {
        $photo = Photo::find($photoId);

        if ($photo) {
            $photo->albums()->detach();
            $photo->clearMediaCollection('images');
            $photo->delete();
        }
    }

    public function render()
    {
        $unassignedPhotos = Photo::whereDoesntHave('albums')
            ->with('media')
            ->latest()
            ->paginate(12, ['*'], 'photosPage');

        return view('livewire.admin.gallery.managephoto', [

            'photos' => $unassignedPhotos
        ]);
    }
}
