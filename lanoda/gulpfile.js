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
    mix.sass('form-card.scss', 'public/css/form-card.css', null);

    mix.styles([
    	"vendor/mdl/material.min.css",
    ], 'public/css/compiled.css', null);

    mix.scripts([
    	"vendor/jquery/jquery-1.11.3.min.js",
    	"vendor/mdl/material.min.js",
    	"app.js"
    ], 'public/js/compiled.js', null);
});
