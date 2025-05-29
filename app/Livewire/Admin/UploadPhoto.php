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

    #[Validate(['image' => 'image|max:20480'])]
    public $image;
    public $model;
    public $collection = 'images';
    public $existingImages = [];
    public $isUploading = false;
    public $uploadQueue = [];
    public $uploadProgress = 0;

    public function mount($model)
    {
        $this->model = $model;
        $this->existingImages = $model->getMedia($this->collection);
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:20480',
        ]);

        // Add to queue
        $this->uploadQueue[] = $this->image;
        $this->image = null;
    }

    public function save()
    {
        try {
            $this->isUploading = true;
            $totalFiles = count($this->uploadQueue);
            $processedFiles = 0;

            foreach ($this->uploadQueue as $image) {
                $this->model
                    ->addMedia($image->getRealPath())
                    ->toMediaCollection($this->collection, 's3');

                $processedFiles++;
                $this->uploadProgress = ($processedFiles / $totalFiles) * 100;
            }

            $this->uploadQueue = [];
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

    public function removeFromQueue($index)
    {
        unset($this->uploadQueue[$index]);
        $this->uploadQueue = array_values($this->uploadQueue);
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
