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
    'public/backend/files/assets/icon/themify-icons/themify-icons.css',
    'public/backend/files/assets/icon/icofont/css/icofont.css',
    //plugins here
        'public/backend/files/bower_components/animate.css/css/animate.css',
        //datatables
        'public/backend/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
        'public/backend/files/assets/pages/data-table/css/buttons.dataTables.min.css',
        'public/backend/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
        'public/backend/files/assets/pages/data-table/extensions/buttons/css/buttons.dataTables.min.css',
        //
        //dropzone
        'public/backend/files/assets/pages/jquery.filer/css/jquery.filer.css',
        'public/backend/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css',
        //
    //plungins end

    'public/backend/files/assets/css/style.css',
    'public/backend/files/assets/css/jquery.mCustomScrollbar.css',
     //datatable
    
], 'public/css/all.css').options({
    processCssUrls: false
}).version(); 
// mix.copyDirectory('public/dashboard/vendor/font-awesome/fonts', 'public/fonts');
//mix.copyDirectory('public/dashboard/vendor/themify-icons/fonts', 'public/css/fonts');
//  mix.copyDirectory('public/dashboard/html/img', 'public/img');

 mix.scripts([
    
    'public/backend/files/bower_components/jquery/js/jquery.min.js',
    'public/backend/files/bower_components/jquery-ui/js/jquery-ui.min.js',
    'public/backend/files/bower_components/popper.js/js/popper.min.js',
    'public/backend/files/bower_components/bootstrap/js/bootstrap.min.js',
    'public/backend/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js',
    'public/backend/files/bower_components/modernizr/js/modernizr.js',
    //'public/backend/files/bower_components/modernizr/js/css-scrollbars.js',
    //plugins here
        //datatable
        'public/backend/files/bower_components/datatables.net/js/jquery.dataTables.min.js',
        'public/backend/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js',
        'public/backend/files/assets/pages/data-table/js/jszip.min.js',
        'public/backend/files/assets/pages/data-table/js/pdfmake.min.js',
        'public/backend/files/assets/pages/data-table/js/vfs_fonts.js',
        'public/backend/files/assets/pages/data-table/extensions/buttons/js/dataTables.buttons.min.js',
        'public/backend/files/assets/pages/data-table/extensions/buttons/js/buttons.flash.min.js',
        'public/backend/files/assets/pages/data-table/extensions/buttons/js/jszip.min.js',
        'public/backend/files/assets/pages/data-table/extensions/buttons/js/vfs_fonts.js',
        'public/backend/files/assets/pages/data-table/extensions/buttons/js/buttons.colVis.min.js',
        'public/backend/files/bower_components/datatables.net-buttons/js/buttons.print.min.js',
        'public/backend/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js',
        'public/backend/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
        'public/backend/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js',
        'public/backend/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
        //form plugins
        'public/backend/files/bower_components/bootstrap-notify/bootstrap-notify.min.js',
        //dropzzone
        'public/backend/files/assets/pages/jquery.filer/js/jquery.filer.min.js',
        'public/backend/files/assets/pages/filer/custom-filer.js',
        'public/backend/files/assets/pages/filer/jquery.fileuploads.init.js',
        //
        //helper pluging
        'resources/js/helper/helper.js',
        //
    
        //end plugins

    //Chart js
    // 'public/backend/files/bower_components/chart.js/js/Chart.js',
    // //amchart js
    // 'public/backend/files/assets/pages/widget/amchart/amcharts.js',
    // 'public/backend/files/assets/pages/widget/amchart/serial.js',
    // 'public/backend/files/assets/pages/widget/amchart/light.js',
    //

    'public/backend/files/assets/js/jquery.mCustomScrollbar.concat.min.js',
    //'public/backend/files/assets/js/SmoothScroll.js',
    'public/backend/files/assets/js/pcoded.min.js',
    'public/backend/files/assets/js/vartical-layout.min.js',
    //dashbordboard
    //'public/backend/files/assets/pages/dashboard/custom-dashboard.js',
    'public/backend/files/assets/js/script.min.js',
    

    


], 'public/js/all.js')
    .version();

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .version();

