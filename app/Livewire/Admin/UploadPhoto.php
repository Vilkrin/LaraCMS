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

    #[Validate(['photos.*' => 'image|max:52428800'])]
    public $photos = [];

    public function removePhoto($index)
    {
        $photo = $this->photos[$index];
        $photo->delete();
        unset($this->photos[$index]);
        $this->photos = array_values($this->photos);
    }

    public function save()
    {

        $this->validate();

        foreach ($this->photos as $uploadedPhoto) {

            // Create a new Photo record
            $photo = Photo::create();

            // Attach media to 'images' collection on the new model
            $photo
                ->addMedia($uploadedPhoto->getRealPath())
                ->usingFileName($uploadedPhoto->getClientOriginalName())
                ->toMediaCollection('images', 'public');
        }

        // Clear the uploaded files from the input
        $this->reset('photos');

        return redirect()->route('admin.gallery.photos.index')
            ->with('success', 'Photos uploaded successfully.');
    }

    public function render()
    {
        return view('livewire.admin.upload-photo');
    }
}
