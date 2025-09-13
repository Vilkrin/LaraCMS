<?php

namespace App\Livewire\Admin\Gallery;

use Livewire\Component;
use App\Models\Album;
use App\Models\Photo;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $activeTab = 'albums';
    public $showAlbumModal = false;
    public $showDeleteModal = false;
    public $albumToDelete = null;

    // Album form properties
    public $album_name;
    public $description;
    public $category;
    public $album_cover;

    protected $rules = [
        'album_name' => 'required|min:3|max:255',
        'description' => 'nullable|max:1000',
        'category' => 'nullable|max:255',
        'album_cover' => 'nullable|image|max:1024'
    ];

    public function mount()
    {
        $this->activeTab = 'albums';
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage();
    }

    public function createAlbum()
    {
        $this->validate();

        $album = Album::create([
            'album_name' => $this->album_name,
            'description' => $this->description,
            'category' => $this->category,
        ]);

        if ($this->album_cover) {
            $album->addMedia($this->album_cover)
                ->toMediaCollection('album_cover');
        }

        $this->reset(['album_name', 'description', 'category', 'album_cover', 'showAlbumModal']);
        $this->dispatch('album-created');
    }

    public function confirmDelete($albumId)
    {
        $this->albumToDelete = $albumId;
        $this->showDeleteModal = true;
    }

    public function deleteAlbum()
    {
        if ($this->albumToDelete) {
            $album = Album::find($this->albumToDelete);
            if ($album) {
                $album->delete();
            }
        }

        $this->reset(['albumToDelete', 'showDeleteModal']);
        $this->dispatch('album-deleted');
    }

    public function deletePhoto($photoId)
    {
        $photo = Photo::find($photoId);
        if ($photo) {
            // First detach from any albums
            $photo->albums()->detach();
            // Then delete the photo
            $photo->delete();
        }
    }

    public function render()
    {
        $albums = Album::with('media')
            ->latest()
            ->paginate(12, ['*'], 'albumsPage');

        $unassignedPhotos = Photo::whereDoesntHave('albums')
            ->with('media')
            ->latest()
            ->paginate(12, ['*'], 'photosPage');

        return view('livewire.admin.gallery.index', [
            'albums' => $albums,
            'photos' => $unassignedPhotos
        ]);
    }
}
