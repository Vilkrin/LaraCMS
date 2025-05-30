<?php
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

    #[Validate(['images.*' => 'image|max:20480'])]
    public $images = [];
    public $existingImages = [];
    public $isUploading = false;
    public $uploadProgress = 0;

    public function mount()
    {
        $this->existingImages = Photo::with('media')->get();
    }

    public function save()
    {
        try {
            $this->validate([
                'images.*' => 'image|max:20480',
            ]);

            $this->isUploading = true;
            $totalFiles = count($this->images);
            $processedFiles = 0;

            foreach ($this->images as $image) {
                $photo = new Photo();
                $photo->save();

                $photo->addMedia($image->getRealPath())
                    ->usingName($image->getClientOriginalName())
                    ->toMediaCollection('images', 's3');

                if (file_exists($image->getRealPath())) {
                    @unlink($image->getRealPath());
                }

                $processedFiles++;
                $this->uploadProgress = ($processedFiles / $totalFiles) * 100;
            }

            $this->images = [];
            $this->existingImages = Photo::with('media')->get();
            $this->isUploading = false;
            $this->uploadProgress = 0;

            session()->flash('success', 'Images uploaded successfully');
        } catch (\Exception $e) {
            $this->isUploading = false;
            $this->uploadProgress = 0;
            session()->flash('error', 'Error uploading images: ' . $e->getMessage());
        }
    }

    public function removeImage($mediaId)
    {
        try {
            $photo = Photo::whereHas('media', function ($q) use ($mediaId) {
                $q->where('id', $mediaId);
            })->first();

            if ($photo) {
                $media = $photo->media()->find($mediaId);
                if ($media) {
                    $media->delete();
                }
            }

            $this->existingImages = Photo::with('media')->get();
            session()->flash('success', 'Image deleted successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting image: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.upload-photo');
    }
}