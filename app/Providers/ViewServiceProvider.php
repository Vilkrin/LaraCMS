<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Menu;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $primaryMenu = Menu::where('name', 'primary')
                ->with(['items' => function ($query) {
                    $query->whereNull('parent_id')->orderBy('order')->with('children');
                }])
                ->first();

            $view->with('menu', $primaryMenu);
        });
    }
}
