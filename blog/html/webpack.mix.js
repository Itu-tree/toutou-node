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

mix.js('resources/js/app.js', 'public/js').vue()
mix.js('resources/js/react-app.js', 'public/js').react();
mix.scripts([
   'resources/js/bootstrap-toc.js',
], 'public/js/custom.js');
mix.sass('resources/sass/app.scss', 'public/css');
mix.styles([
   'resources/css/bootstrap-toc.css',
], 'public/css/custom.css');