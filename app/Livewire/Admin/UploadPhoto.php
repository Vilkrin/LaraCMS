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
    public $uploadQueue = [];
    public $isUploading = false;

    public function mount($model)
    {
        $this->model = $model;
        $this->existingImages = $model->getMedia($this->collection);
    }

    public function updatedImages()
    {
        try {
            $this->validate([
                'images.*' => 'image|max:20480',
            ]);

            // Add to queue
            foreach ($this->images as $image) {
                $this->uploadQueue[] = $image;
            }
            $this->images = [];

            // Start processing queue if not already processing
            if (!$this->isUploading) {
                $this->processQueue();
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error validating images: ' . $e->getMessage());
        }
    }

    public function processQueue()
    {
        if (empty($this->uploadQueue)) {
            $this->isUploading = false;
            return;
        }

        $this->isUploading = true;
        $image = array_shift($this->uploadQueue);

        try {
            $this->model
                ->addMedia($image->getRealPath())
                ->toMediaCollection($this->collection, 's3');

            $this->existingImages = $this->model->fresh()->getMedia($this->collection);
            $this->emit('imagesUpdated');
            session()->flash('success', 'Image uploaded successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Error uploading image: ' . $e->getMessage());
        }

        // Process next item in queue
        $this->processQueue();
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
