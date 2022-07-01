const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/libraries.js", "public/js")
    .js("resources/js/aboutme.js", "public/js")
    .js("resources/js/chatbot.js", "public/js")
    .js("resources/js/gsap.js", "public/js")
    .react()
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .postCss("resources/css/hover-min.css", "public/css")
    .postCss("resources/css/projects.css", "public/css")
    .sass("resources/sass/app.scss", "public/css");
