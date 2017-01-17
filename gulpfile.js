const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.copy(paths.bootstrap + '/fonts/', 'public/build/fonts');
    mix.copy(paths.fontawesome + '/fonts/**', 'public/build/fonts');
    mix.sass('app.scss')
       .webpack('app.js');
    mix.styles([
        paths.bootstrap + '/dist/css/bootstrap.min.css',
        paths.fontawesome + '/css/font-awesome.min.css',
        'public/css/bucketadmin/iCheck/skins/minimal/blue.css',
        'public/css/bucketadmin/bootstrap-datepicke/datepicker.css',
        'public/css/bucketadmin/bootstrap-reset.css',
        'public/css/bucketadmin/style.css',
        'public/css/bucketadmin/style-responsive.css',
        'resources/assets/build/app.css',
        paths.bootstrap_select + '/dist/css/bootstrap-select.css'
    ], 'public/css/app.css','./');

    // Merge Site scripts.
    mix.scripts([
        paths.jquery + '/jquery.min.js',
        paths.bootstrap + '/dist/js/bootstrap.min.js',
        paths.bootstrap_select + '/dist/js/bootstrap-select.js',
        'public/js/bucketadmin/jquery.scrollTo.min.js',
        'public/js/bucketadmin/jquery.slimscroll.js',
        'public/js/bucketadmin/jquery.nicescroll.js',
        'public/js/bucketadmin/icheck-init.js',
        'public/js/bucketadmin/bootstrap-datepicker/bootstrap-datepicker.js',
        'public/js/bucketadmin/scripts.js',
        'public/js/bucketadmin/iCheck/jquery.icheck.js',
    ], 'public/js/app.js','./');

    // Cache-bust all.css and all.js files.
    mix.version([
        'css/app.css',
        'js/app.js',
    ]);
});
