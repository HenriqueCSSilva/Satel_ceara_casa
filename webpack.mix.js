const mix = require('laravel-mix');


mix.styles(['../../../node_modules/bootstrap/dist/css/bootstrap.css'] , 'public/css/styles.css');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');


