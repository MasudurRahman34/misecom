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
    'public/backend/files/bower_components/bootstrap/css/bootstrap.min.css',
    'public/backend/files/assets/icon/feather/css/feather.css',
    'public/backend/files/assets/css/style.css',
    'public/backend/files/assets/css/jquery.mCustomScrollbar.css'
], 'public/css/all.css')
    .version(); 

mix.scripts([
    
    'public/backend/files/bower_components/jquery/js/jquery.min.js',
    'public/backend/files/bower_components/jquery-ui/js/jquery-ui.min.js',
    'public/backend/files/bower_components/popper.js/js/popper.min.js',
    'public/backend/files/bower_components/bootstrap/js/bootstrap.min.js',
    'public/backend/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
    'public/backend/files/bower_components/modernizr/js/modernizr.js',
    'public/backend/files/bower_components/chart.js/js/Chart.js',
    'public/backend/files/assets/pages/widget/amchart/amcharts.js',
    'public/backend/files/assets/pages/widget/amchart/serial.js',
    'public/backend/files/assets/pages/widget/amchart/light.js',
    'public/backend/files/assets/js/jquery.mCustomScrollbar.concat.min.js',
    'public/backend/files/assets/js/SmoothScroll.js',
    'public/backend/files/assets/js/pcoded.min.js',
    'public/backend/files/assets/js/vartical-layout.min.js',
    'public/backend/files/assets/pages/dashboard/custom-dashboard.js',
    'public/backend/files/assets/js/script.min.js'
], 'public/js/all.js')
    .version();

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .version();
