<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UploadPhoto extends Component
{
    use WithFileUploads;

    #[Validate(['photos.*' => 'image|max:20480'])]
    public $photos = [];


    public function save()
    {
        $this->validate();

        foreach ($this->photos as $file) {
            // Create a new Photo instance or use an existing one
            $photo = new Photo();
            $photo->save(); // Save the Photo instance to associate media with it

            // Add media to the 'images' collection
            $photo->addMedia($file->getRealPath())
                ->usingFileName($file->getClientOriginalName())
                ->toMediaCollection('images', 's3');
        }

        $this->photos = [];
        session()->flash('success', 'Photos uploaded successfully.');
    }

    public function render()
    {
        return view('livewire.admin.upload-photo');
    }
}
