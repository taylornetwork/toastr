<?php

namespace TaylorNetwork\Toastr\Facades;

use Illuminate\Support\Facades\Facade;

class Toastr extends Facade
{
    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Toastr';
    }
}
