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
    mix.sass('app.scss');
    mix.sass('auth.scss', 'public/css/auth.css', null);
    mix.sass('contact.scss', 'public/css/contact.css', null);
    mix.sass('note.scss', 'public/css/note.css', null);

    mix.sass([
        'app.scss',
        'auth.scss',
        'contact.scss',
        'note.scss'
    ], 'public/css/compiled.css', null);

    mix.styles([
    	"vendor/mdl/material.min.css",
    ], 'public/css/compiled-vendor.css', null);


    mix.scripts([
        'vendor/jquery/jquery-1.11.3.min.js',
        'vendor/mdl/material.min.js'
    ], 'public/js/compiled-vendor.js', null);

    mix.scripts('app.js', 'public/js/app.js', null);
    mix.scripts('contact.js', 'public/js/contact.js', null);
    mix.scripts('note.js', 'public/js/note.js', null);
    
    mix.scripts([
    	"vendor/jquery/jquery-1.11.3.min.js",
    	"vendor/mdl/material.min.js",
    	"app.js",
        "contact.js",
        "note.js"
    ], 'public/js/compiled.js', null);
});
