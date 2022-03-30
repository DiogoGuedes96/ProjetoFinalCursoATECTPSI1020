const { postCss } = require('laravel-mix');
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/feather-icon.js', 'public/js')
    .js('resources/js/bootstrap.min.js', 'public/js')
    .js('resources/js/popper.min.js', 'public/js')
    .js('resources/js/script.js', 'public/js')
    .js('resources/js/sidebar-menu.js', 'public/js')
    .js('resources/js/clockpicker.js', 'public/js')
    .js('resources/js/jquery-clockpicker.min.js', 'public/js')
    .js('resources/js/highlight.min.js', 'public/js')
    .js('resources/js/datepicker.custom.js', 'public/js')
    .js('resources/js/datepicker.en.js', 'public/js')
    .js('resources/js/datepicker.js', 'public/js')
    //.sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/bootstrap.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css')
    .postCss('resources/css/responsive.css', 'public/css')
    .postCss('resources/css/fo.css', 'public/css')
    .postCss('resources/css/datepicker.css', 'public/css')
    .postCss('resources/css/timepicker.css', 'public/css')
    .sourceMaps();
