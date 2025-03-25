<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    // ADMIN METHODS
    public function index()
    {
        $albums = Album::with('media')->latest()->paginate(10);
        return view('admin.gallery.index', compact('albums'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'album_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Check if an album is being created
        $album = null;
        if ($request->filled('album_name')) {
            $album = Album::create([
                'album_name' => $request->album_name,
                'slug' => Str::slug($request->album_name),
                'description' => $request->description,
                'category' => $request->category,
            ]);
        }

        // Handle image uploads
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                if ($album) {
                    // Attach image to the album
                    $album->addMedia($photo)->toMediaCollection('photos');
                } else {
                    // Store images without an album (e.g., general gallery)
                    $media = new \Spatie\MediaLibrary\MediaCollections\Models\Media();
                    $media->addMedia($photo)->toMediaCollection('gallery');
                }
            }
        }

        return redirect()->route('gallery.index')->with('success', 'Images uploaded successfully!');
    }


    public function show(Album $album)
    {
        return view('admin.gallery.show', compact('album'));
    }

    public function destroy(Album $album)
    {
        $album->clearMediaCollection('photos');
        $album->delete();

        return redirect()->route('gallery.index')->with('success', 'Album deleted!');
    }

    // PUBLIC METHODS
    public function publicGallery()
    {
        // Fetch all albums with their images
        $albums = Album::with('media')->get();

        // Fetch images not tied to albums (general gallery images)
        $galleryImages = \Spatie\MediaLibrary\Models\Media::whereNull('model_type')->get();

        return view('gallery.index', compact('albums', 'galleryImages'));
    }

    public function albums()
    {
        $albums = Album::with('media')->get();

        return view('gallery.albums', compact('albums'));
    }
}
