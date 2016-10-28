<?php

namespace TaylorNetwork\Toastr;

use Illuminate\Support\ServiceProvider;
use TaylorNetwork\Toastr\Toastr;
use App;

class ToastrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('Toastr', function(){
            return new Toastr;
        });
    }
}
