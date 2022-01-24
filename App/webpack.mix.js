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

mix.setResourceRoot('public');
mix.setPublicPath('./public');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', [
    //
]);

//fonts
mix.copy('node_modules/@coreui/icons/fonts', 'public/fonts');

//icons
mix.copy('node_modules/@coreui/icons/css/free.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/css/brand.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/css/flag.min.css', 'public/css');
mix.copy('node_modules/@coreui/icons/svg/flag', 'public/svg/flag');
mix.copy('node_modules/@coreui/icons/svg/brand', 'public/svg/brand');
mix.copy('node_modules/@coreui/icons/svg/free', 'public/svg/free');

mix.copy('node_modules/@coreui/icons/sprites/', 'public/icons/sprites');
