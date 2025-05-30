<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Album extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'album';

    protected $fillable = [
        'album_name',
        'slug',
        'category',
        'description'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($album) {
            // Only generate slug if album_name is set
            if ($album->album_name) {
                $album->slug = Str::slug($album->album_name);
            }
        });
    }

    // Find album by slug instead of ID
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class, 'album_photo');
    }
}
