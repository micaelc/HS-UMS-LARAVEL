# Base Project with user management

## Added Dependencies to composer.json

* Role-based Permissions for Laravel 5 - https://github.com/Zizaco/entrust
* Forms and HTML - http://laravelcollective.com/
* IDE Helper - https://github.com/barryvdh/laravel-ide-helper
* Easy toastr notifications for Laravel 5 - https://github.com/oriceon/toastr-5-laravel

```php
"zizaco/entrust": "dev-laravel-5",
"laravelcollective/html": "5.1.*",
"barryvdh/laravel-ide-helper": "^2.0",
"oriceon/toastr-5-laravel": "dev-master"
```

### added to app.php

Providers

```php
/*
* 3rd Party Service Providers...
*/
Zizaco\Entrust\EntrustServiceProvider::class,
Collective\Html\HtmlServiceProvider::class,
Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
Kamaln7\Toastr\ToastrServiceProvider::class,
```

Aliases

```php
/*
* 3rd Party Aliases...
*/

'Entrust' => Zizaco\Entrust\EntrustFacade::class,
'Carbon' => Carbon\Carbon::class,
'Form' => Collective\Html\FormFacade::class,
'Html' => Collective\Html\HtmlFacade::class,
'Toastr' => Kamaln7\Toastr\Facades\Toastr::class,
```

## Install

inside the project folder

```sh
composer install
composer update

php artisan ide-helper:generate
php artisan vendor:publish

php artisan entrust:migration
php artisan migrate
php artisan db:seed
composer dump-autoload

npm install
bower install bootstrap-less
bower install jquery
bower install fontawesome
gulp
```

# This Project uses:
## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Laravel Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)