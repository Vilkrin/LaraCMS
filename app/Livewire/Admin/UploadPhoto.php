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

            // Move the file to a temporary location before uploading to S3
            $temporaryPath = $file->store('temp'); // Store the file temporarily

            // Add media to the 'images' collection using Spatie Media Library
            $photo->addMedia(storage_path('app/' . $temporaryPath))
                ->usingFileName($file->getClientOriginalName())
                ->toMediaCollection('images', 's3'); // Specify the S3 disk

            // Delete the temporary file after uploading
            \Illuminate\Support\Facades\Storage::delete($temporaryPath);
        }

        $this->photos = [];
        session()->flash('success', 'Photos uploaded successfully.');
    }

    public function render()
    {
        return view('livewire.admin.upload-photo');
    }
}
