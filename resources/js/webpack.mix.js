const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .js('resources/js/admin.js', 'public/vendor/laravel-admin/laravel-admin/js/app.js').vue()
    .postCss('resources/css/admin.css', 'public/vendor/laravel-admin/laravel-admin/css/app.css')
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}