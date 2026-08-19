<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_author',
        'canonical_url',

        'allow_search_indexing',
        'allow_ai_search',
        'allow_ai_training',

        'og_title',
        'og_description',
        'og_type',
        'og_site_name',
        'og_locale',

        'twitter_card',
        'twitter_title',
        'twitter_description',
        'twitter_site',
        'twitter_creator',

        'theme_color',
    ];

    protected $casts = [
        'allow_search_indexing' => 'boolean',
        'allow_ai_search' => 'boolean',
        'allow_ai_training' => 'boolean',
    ];
}
