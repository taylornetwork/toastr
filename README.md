# Toastr for Laravel

A simple facade for Laravel 5 to generate toastr message using [toastr.js][link-toastr].

## Install

Via Composer

``` bash
$ composer require taylornetwork/toastr
```

## Dependencies

You will need to include `toastr.js` on your pages.

You can install using bower

``` bash
$ bower install toastr
```

or include from CDNjs.

``` html
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
```

*This may not be the most up to date information, see [CodeSeven/toastr][link-toastr]*

## Setup

### Provider Setup

Add the service provider to the providers array in your `config/app.php`

``` php
'providers' => [

    TaylorNetwork\Toastr\ToastrServiceProvider::class,

],
```

### Facade Setup

Add the `Toastr` facade to your aliases array in `config/app.php`

While this is optional, it is greatly recommended because `Toastr::render()` will be used in your base view and is easier than having to include the `Toastr` class.

``` php
'aliases' => [

    'Toastr' => TaylorNetwork\Toastr\Facades\Toastr::class,

],
```

### Publishing Config

``` bash
$ php artisan vendor:publish
```

Will add `config/toastr.php` to your project.

### View Setup

You will need to include the `toastr.js` and `toastr.css` files from bower or CDNjs (see *Dependencies* section above) in your base views.

You will also need to add the following line after both files are included in order to render Toastr messages.

``` php
// app.blade.php

<link rel="stylesheet" href="path/to/toastr.css" />
<script src="path/to/toastr.js"></script>

{!! Toastr::render() !!}
```

## Usage

Include `TaylorNetwork\Toastr\Facades\Toastr` in what ever class you plan on generating a Toastr message.

By default the styles available are `success`, `error`, `info`, `warning`. But you can remove any in `config/toastr.php`

`TaylorNetwork\Toastr\Toastr` uses a magic method to generate toastr messages.

To generate a success message

``` php
Toastr::success('Congratulations!');
```

Will push a success message to the session and will appear on the next request.

The magic method accepts a minimum of one parameter, the text you want to be displayed. The optional second parameter is the title of the message.

---

To add a custom title to the toastr message

``` php
Toastr::info('This is information!', 'New Info!!!');
```

## Credits

- Main Author: [Sam Taylor][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[link-toastr]: https://github.com/CodeSeven/toastr
[link-author]: https://github.com/taylornetwork