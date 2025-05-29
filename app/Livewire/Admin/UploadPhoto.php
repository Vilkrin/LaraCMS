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
    public $model;
    public $collection = 'images';
    public $existingImages = [];
    public $isUploading = false;
    public $uploadProgress = 0;

    public function mount($model)
    {
        $this->model = $model;
        $this->existingImages = $model->getMedia($this->collection);
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|max:20480',
        ]);
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
                // Store the file locally first
                $localPath = storage_path('app/temp/' . uniqid() . '_' . $image->getClientOriginalName());

                // Ensure the temp directory exists
                if (!file_exists(storage_path('app/temp'))) {
                    mkdir(storage_path('app/temp'), 0755, true);
                }

                // Move the uploaded file to local storage
                $image->storeAs('temp', basename($localPath));

                // Add the file to the media collection from local storage
                $this->model
                    ->addMedia(storage_path('app/temp/' . basename($localPath)))
                    ->usingName($image->getClientOriginalName())
                    ->toMediaCollection($this->collection, 's3');

                // Clean up the local file
                if (file_exists($localPath)) {
                    unlink($localPath);
                }

                $processedFiles++;
                $this->uploadProgress = ($processedFiles / $totalFiles) * 100;
            }

            $this->images = [];
            $this->existingImages = $this->model->fresh()->getMedia($this->collection);
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
            $media = Media::find($mediaId);
            if ($media) {
                $media->delete();
                $this->existingImages = $this->model->fresh()->getMedia($this->collection);
                session()->flash('success', 'Image deleted successfully');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting image: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.upload-photo');
    }
}
