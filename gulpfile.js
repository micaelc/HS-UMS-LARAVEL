var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

// disable source maps
elixir.config.sourcemaps = false;

elixir(function (mix) {
    mix.less('../bower/bootstrap-less/less/bootstrap.less', 'public/css/bootstrap.css')
        .less('front.less', 'public/css/front.css')
        .less('back.less', 'public/css/back.css')
        .less('login.less', 'public/css/login.css')


        .scripts('back.js', 'public/js/back.js')

        .copy('resources/assets/bower/fontawesome/fonts', 'public/fonts')
        .copy('resources/assets/bower/fontawesome/css/font-awesome.css', 'public/css')
        .copy('resources/assets/bower/jquery/dist/jquery.js', 'public/js');
});
