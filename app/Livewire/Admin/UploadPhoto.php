<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadPhoto extends Component
{
    use WithFileUploads;

    #[Validate('image|max:20480')]
    public $image;

    public function save()
    {
        $this->validate();

        // Create a new photo record
        $photo = Photo::create();

        // Add media to 'photos' collection on 's3' disk
        $photo
            ->addMedia($this->image->getRealPath())
            ->usingFileName($this->image->getClientOriginalName())
            ->toMediaCollection('photos', 's3');

        // Clear input and show success message
        $this->reset('image');
        session()->flash('success', 'Photo uploaded!');
    }

    public function render()
    {
        return view('livewire.admin.upload-photo');
    }
}
