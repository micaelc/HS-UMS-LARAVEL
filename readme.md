# Base Project with user management
### BETA  v0.9

## TODO

* Use created Permissions to validate actions;
* Dynamic Dashboard in Back-End;


## DONE

### Design

* Front-End Template (http://startbootstrap.com/template-overviews/heroic-features/)
* Back-End Template (http://startbootstrap.com/template-overviews/sb-admin-2/)

### Front-End

* Nothing Relevant :)))

### Back-End

* USERS (Add/Edit/Show/Delete/Profile):
* ROLES (Add/Edit/show/Delete):
* PERMISSIONS (Added only through database seed)

### Added Dependencies to composer.json

* Role-based Permissions for Laravel 5 - https://github.com/Zizaco/entrust
* Forms and HTML - http://laravelcollective.com/
* Easy toastr notifications for Laravel 5 - https://github.com/oriceon/toastr-5-laravel

### Install

inside the project folder and after creating a .env file with the database configs and the default role definition

```php
DEFAULT_ROLE = 3
```

you will require Node Bower and Gulp installed prior to this

```sh
composer install
composer update
php artisan key:generate

php artisan migrate
php artisan db:seed
composer dump-autoload

npm install [or npm install --no-bin-links (on windows)]
bower install
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