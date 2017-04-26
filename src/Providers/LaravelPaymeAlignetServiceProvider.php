<?php

namespace LaravelPaymeAlignet\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelPaymeAlignetServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('laravel.payme.alignet', LaravelPayme::class);
    }
}