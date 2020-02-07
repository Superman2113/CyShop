<?php

namespace App\Providers;

use App\Helpers\Hashing\MD5Hash;
use Illuminate\Support\ServiceProvider;

class MD5HashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('hash', function () {
            return new MD5Hash;
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function provides()
    {
        return ['hash'];
    }
}