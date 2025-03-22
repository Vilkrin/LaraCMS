<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'album_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cover_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Create Album
        $album = Album::create([
            'album_name' => $request->album_name,
            'category' => $request->category,
        ]);

        // Add cover photo (if provided)
        if ($request->hasFile('cover_photo')) {
            $album->addMedia($request->file('cover_photo'))
                ->toMediaCollection('cover_photos');
        }

        // Add multiple photos (if provided)
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $album->addMedia($photo)
                    ->toMediaCollection('photos');
            }
        }

        return redirect()->back()->with('success', 'Album created successfully!');
    }
}
