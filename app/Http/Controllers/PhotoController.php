<?php

namespace App\Http\Controllers;

use App\Models\Photo;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo, $id)
    {
        $media = $photo->getMedia('photos')->where('id', $id)->first();

        return view('image.show', compact('photo'));
    }
}
