const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/admin.sass", "public/css/admin.css")
    .sass("resources/sass/main.sass", "public/css/main.css")
    .sass("resources/sass/product.sass", "public/css/product.css")
    .sass("resources/sass/products-shipping.sass", "public/css/products-shipping.css")
    .sass("resources/sass/personal.sass", "public/css/personal.css");
    
mix.browserSync({
    proxy: "http://localhost:8000/"
});

mix.webpackConfig({
    resolve: {
        alias: {
            "@": __dirname + "/resources/js"
        }
    }
});

mix.disableNotifications();
