<?php

namespace TaylorNetwork\Toastr;

use Illuminate\Support\ServiceProvider;

class ToastrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/toastr.php' => config_path('toastr.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Toastr', function () {
            return new Toastr();
        });

        $this->mergeConfigFrom(
            __DIR__.'/config/toastr.php', 'toastr'
        );
    }
}
