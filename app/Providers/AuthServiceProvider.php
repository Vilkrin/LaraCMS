<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    //...

    public function boot(): void
    {
        $this->registerGates();
    }

    protected function registerGates(): void
    {
        // 
    }
}
