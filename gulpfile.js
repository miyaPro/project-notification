var elixir = require("laravel-elixir");

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

var paths = {
    'jquery': 'vendor/bower_dl/jquery/dist',
    'bootstrap': 'vendor/bower_dl/bootstrap',
    'fontawesome': 'vendor/bower_dl/font-awesome',
    'bootstrap_select' :  'vendor/bower_dl/bootstrap-select'
};

elixir(function (mix) {

    // Copy fonts straight to public
    mix.copy(paths.bootstrap + '/fonts/', 'public/build/fonts');
    mix.copy(paths.fontawesome + '/fonts/**', 'public/build/fonts');

    // Compile SASS and output to default resource directory
    mix.sass('app.scss', 'resources/assets/build/app.css');

    mix.styles([
        paths.bootstrap + '/dist/css/bootstrap.min.css',
        paths.fontawesome + '/css/font-awesome.min.css',
    ], 'public/css/app.css','./');

    // Merge Site scripts.
      mix.scripts([
        paths.jquery + '/jquery.min.js',
        paths.bootstrap + '/dist/js/bootstrap.min.js',
        paths.bootstrap_select + '/dist/js/bootstrap-select.js',
        'public/js/socket.io-1.4.5.js'
    ], 'public/js/app.js','./');

    // Cache-bust all.css and all.js files.
    mix.version([
        'css/app.css',
        'js/app.js',
    ]);
});
