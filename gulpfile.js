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
    mix.styles([
      '../../../bower_components/bootswatch-dist/css/bootstrap.css',
      '../../../bower_components/components-font-awesome/css/font-awesome.css'
    ],'public/css/app.css');

    mix.scripts([
      '../../../bower_components/jquery/dist/jquery.js',
      '../../../bower_components/bootstrap/dist/js/bootstrap.js'
    ], 'public/js/app.js');

    mix.copy('bower_components/components-font-awesome/fonts', 'public/build/fonts');
    mix.copy('bower_components/bootstrap/fonts', 'public/build/fonts');

    mix.version(["css/app.css", "js/app.js"]);
});
