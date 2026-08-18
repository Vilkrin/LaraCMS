<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuItem;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'location',
        'is_active',
    ];

    public function items()
    {
        return $this->hasMany(MenuItem::class)
            ->whereNull('parent_id')
            ->orderBy('sort_order');
    }

    public function allItems()
    {
        return $this->hasMany(MenuItem::class)
            ->orderBy('sort_order');
    }
}
