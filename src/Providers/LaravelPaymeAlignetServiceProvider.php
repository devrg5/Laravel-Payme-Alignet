<?php

namespace LaravelPaymeAlignet\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelPaymeAlignet\LaravelPayme;

class LaravelPaymeAlignetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel-payme-alignet.php' => config_path('laravel-payme-alignet.php'),
        ], 'laravel.payme.config');
    }

    public function register()
    {
        $this->app->bind('laravel.payme.alignet', LaravelPayme::class);
    }
}