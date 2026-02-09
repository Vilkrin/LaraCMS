<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Album;

class GalleryController extends Controller
{
    public function Albums()
    {
        $albums = Album::with('cover_photo')
            ->withCount('photos')
            ->latest()
            ->get();

        return view('admin.gallery.album', compact('albums'));
    }

    public function Photos()
    {
        $photos = Photo::with('media')->get();
        return view('admin.gallery.photo', compact('photos'));
    }
}
