<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'body', 'slug', 'post_image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blogCategories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category_post');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
