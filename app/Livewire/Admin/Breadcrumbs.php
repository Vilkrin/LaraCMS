<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class Breadcrumbs extends Component
{
    public $breadcrumbs = [];

    public function mount()
    {
        $this->generateBreadcrumbs();
    }

    public function generateBreadcrumbs()
    {
        $routeName = Route::currentRouteName();
        $this->breadcrumbs = $this->getBreadcrumbsForRoute($routeName);
    }

    public function getBreadcrumbsForRoute($routeName)
    {
        // Define breadcrumb structure based on route names
        $breadcrumbs = [
            'admin.dashboard' => [
                ['title' => 'Dashboard', 'route' => 'admin.dashboard'],
            ],
            'admin.users.index' => [
                ['title' => 'Dashboard', 'route' => 'admin.dashboard'],
                ['title' => 'Users', 'route' => 'admin.users.index'],
            ],
            'admin.pages.index' => [
                ['title' => 'Dashboard', 'route' => 'admin.dashboard'],
                ['title' => 'Pages', 'route' => 'admin.pages.index'],
            ],
            'admin.blog.posts' => [
                ['title' => 'Dashboard', 'route' => 'admin.dashboard'],
                ['title' => 'Blog', 'route' => 'admin.blog.posts'],
            ],
            'admin.gallery.index' => [
                ['title' => 'Dashboard', 'route' => 'admin.dashboard'],
                ['title' => 'Gallery', 'route' => 'admin.gallery.index'],
            ],
            // Add more route-to-breadcrumb mappings as needed
        ];

        return $breadcrumbs[$routeName] ?? [];
    }

    public function render()
    {
        return view('livewire.admin.breadcrumbs');
    }
}
