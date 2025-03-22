<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Album extends Model
{
    use InteractsWithMedia;

    protected $fillable = [
        'album_name',
        'category',
    ];

    /**
     * Get the media items associated with the album.
     */
    public function media()
    {
        return $this->morphMany('Spatie\MediaLibrary\Models\Media', 'model');
    }
}
