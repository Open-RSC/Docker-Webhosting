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

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/startbootstrap-grayscale/css/grayscale.css',
    'resources/css/style.css',
    'resources/css/jquery.mCustomScrollbar.css',
    'resources/css/npcsprites.css',
    'resources/css/itemsprites.css'
], 'public/css/app.css')
    .js([
    'resources/js/app.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/startbootstrap-grayscale/js/grayscale.js',
    'node_modules/twitter-fetcher/js/twitterFetcher.js',
    'resources/js/dark-google-calendar-2018.user.js',
    'resources/js/jquery.timeago.js',
    'resources/js/jquery.mCustomScrollbar.js'
], 'public/js/app.js')
    .version();
