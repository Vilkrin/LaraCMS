<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class MenuItem extends Model
{
    protected $fillable = [
        'menu_id',
        'parent_id',
        'title',
        'url',
        'icon',
        'type',
        'route_name',
        'sort_order',
        'is_active',
        'open_in_new_tab',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent()
    {
        return $this->belongsTo(MenuItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id')
            ->orderBy('sort_order');
    }
}
