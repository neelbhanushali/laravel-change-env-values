<?php

namespace NeelBhanushali\LaravelChangeEnvValues;

use Illuminate\Support\ServiceProvider;
use NeelBhanushali\LaravelChangeEnvValues\Commands\ChangeEnvValues;

class LaravelChangeEnvValuesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ChangeEnvValues::class
            ]);
        }
    }
}
