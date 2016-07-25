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
        'app.scss'
    ]);

    mix.styles([
        './node_modules/normalize.css/normalize.css'
    ], 'public/css/normalize.css');

    mix.version([
        'css/app.css',
        'css/normalize.css'
    ]);
});
