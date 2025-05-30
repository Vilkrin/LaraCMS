<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with('cover_photo')
            ->withCount('photos')
            ->latest()
            ->get();

        return view('admin.gallery.index', compact('albums'));
    }
}
