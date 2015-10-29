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

elixir(function(mix) {
    mix.sass([
        'app.scss',
        'auth.scss',
        'contact.scss',
        'note.scss'
    ], 'public/css/compiled.css', null);

    mix.styles([
        "vendor/mdl/material.min.css",
    ], 'public/css/compiled-vendor.css', null);

    mix.styles([
        "public/css/compiled-vendor.css",
        "public/css/compiled.css"
    ], "public/css/compiled-complete.css", "./");


    mix.scripts([
        'vendor/jquery/jquery-1.11.3.min.js',
        'vendor/mdl/material.min.js'
    ], 'public/js/compiled-vendor.js', null);

    mix.scripts([
        "app.js",
        "contact.js",
        "note.js"
    ], 'public/js/compiled.js', null);

    mix.scripts([
    	"public/js/compiled-vendor.js",
    	"public/js/compiled.js"
    ], 'public/js/compiled-complete.js', "./");
});
