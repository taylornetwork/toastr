<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Toastr Options
     |--------------------------------------------------------------------------
     |
     | Default options to pass to Toastr. All options will be added to the
     | $options property in the Toastr class. If the same option is set with
     | different values, the Toastr class property will override this one.
     | For more info on the options that can be used see:
     | http://codeseven.github.io/toastr
     |
     */
    'options' => [
        'progressBar' => true,
        'closeButton' => true,
    ],

    /*
     |--------------------------------------------------------------------------
     | Allowed Toastr Styles
     |--------------------------------------------------------------------------
     |
     | Place the styles that you want toastr.js to generate. If they aren't
     | in this array or in the $styles property in the Toastr class, they will
     | not be generated.
     |
     | Options are: success, warning, info, error
     |
     */
    'styles' => [
        'success',
        'warning',
        'info',
        'error',
    ],

    /*
     |--------------------------------------------------------------------------
     | Persistent Notifications
     |--------------------------------------------------------------------------
     |
     | Anything in this array will be generated on EVERY request. I really
     | don't know why would want this, other than testing.
     |
     | To add a persistent notification add the JavaScript to this array.
     |
     */
    'notifications' => [
        //'toastr.info("I am a persistent notification!", "Persistent Notification")'
    ],

];
