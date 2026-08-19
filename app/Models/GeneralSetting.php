<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_tagline',
        'footer_text',
        'description',
        'logo_path',
    ];
}
