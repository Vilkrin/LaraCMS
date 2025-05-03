<?php

namespace App\Livewire\Admin;

use App\Models\Photo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UploadPhoto extends Component
{
    use WithFileUploads;

    #[Validate(['photos.*' => 'image|max:1024'])]
    public $photos = [];

    public function save()
    {
        $this->validate();

        foreach ($this->photos as $file) {
            $photo = Photo::create(); // you can store extra fields later like title, alt, etc.

            $photo
                ->addMedia($file->getRealPath())
                ->usingFileName($file->getClientOriginalName())
                ->toMediaCollection('images');
        }

        $this->photos = [];
        session()->flash('success', 'Photos uploaded successfully.');
    }

    public function render()
    {
        return view('livewire.admin.upload-photo');
    }
}
