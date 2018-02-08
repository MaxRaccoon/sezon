var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less');
    mix.copy('bower_components/bootstrap-3/dist/fonts', 'public/assets/fonts');
    mix.copy('bower_components/font-awesome/fonts', 'public/assets/fonts');
    mix.copy('bower_components/slick-carousel/slick/fonts', 'public/assets/fonts');
    mix.styles([
        'bower_components/bootstrap-3/dist/css/bootstrap.css',
        'bower_components/fontawesome/css/font-awesome.css',
        'bower_components/textAngular/dist/textAngular.css',
        'resources/css/sb-admin-2.css',
        'resources/css/timeline.css'
    ], 'public/assets/stylesheets/management.css', './');
    mix.less('resources/css/style.less', 'resources/css/style.css', './');
    mix.styles([
        'bower_components/bootstrap-4/dist/css/bootstrap.css',
        'bower_components/fontawesome/css/font-awesome.css',
        'bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
        'resources/css/fonts.css',
        // 'resources/css/docs.min.css',
        'bower_components/slick-carousel/slick/slick.css',
        'bower_components/slick-carousel/slick/slick-theme.css',
        'bower_components/unitegallery/dist/css/unite-gallery.css',
        // 'bower_components/unitegallery/dist/themes/default/ug-theme-default.css',
        'resources/css/style.css',
    ], 'public/assets/stylesheets/styles.css', './');
    mix.scripts([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/bootstrap-4/dist/js/bootstrap.min.js',
        'bower_components/moment/min/moment-with-locales.min.js',
        'bower_components/moment/locale/ru.js',
        'bower_components/slick-carousel/slick/slick.min.js',
        'bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        'bower_components/jquery-mask-plugin/dist/jquery.mask.min.js',
        'bower_components/unitegallery/dist/js/unitegallery.js',
        'bower_components/unitegallery/dist/themes/tiles/ug-theme-tiles.js',
        'resources/js/frontend.js'
    ], 'public/assets/scripts/frontend.js', './')
    mix.scripts([
        'bower_components/popper.js/dist/umd/popper.js'
    ], 'public/assets/scripts/topLoadedScripts.js', './'),
    mix.scripts([
        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/bootstrap-4/dist/js/bootstrap.min.js',
        'bower_components/moment/min/moment-with-locales.min.js',
        'bower_components/moment/locale/ru.js',
        'bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
        'bower_components/angular/angular.min.js',
        'bower_components/angular-password/angular-password.min.js',
        'bower_components/ng-file-upload/ng-file-upload.min.js',
        // 'bower_components/Chart.js/Chart.js',
        'bower_components/metisMenu/dist/metisMenu.js',
        'bower_components/textAngular/dist/textAngular-rangy.min.js',
        'bower_components/textAngular/dist/textAngular-sanitize.min.js',
        'bower_components/textAngular/dist/textAngular.min.js',
        'resources/js/sb-admin-2.js',
        'resources/js/app/admin.js',
        'resources/js/app/controllers/*.js'
    ], 'public/assets/scripts/management.js', './');
});