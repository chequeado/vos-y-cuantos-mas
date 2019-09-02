var elixir = require('laravel-elixir');
//require('./elixir-extensions');

require('laravel-elixir-ngtemplatecache');

elixir(function(mix) {
 mix
     .phpUnit()
     //.compressHtml()

    /**
     * Copy needed files from /node directories
     * to /public directory.
     */
     .copy(
       'node_modules/font-awesome/fonts',
       'public/build/fonts/font-awesome'
     )
     .copy(
       'node_modules/bootstrap-sass/assets/fonts/bootstrap',
       'public/build/fonts/bootstrap'
     )
     .copy(
       'node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js',
       'public/js/vendor/bootstrap'
     )
     .copy(
       'public/bower_components/angular/angular.min.js',
       'resources/assets/js/plugin/angular'
     )
     .copy(
       'public/bower_components/angular-chosen-js/angular-chosen.min.js',
       'resources/assets/js/plugin/angular'
     )
     .copy(
       'public/bower_components/Chart.js/Chart.js',
       'resources/assets/js/plugin/chart'
     )
     .copy(
       'public/bower_components/angular-chart.js/dist/angular-chart.min.js',
       'resources/assets/js/plugin/angular'
     )
     .copy(
       'public/bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js',
       'resources/assets/js/plugin/slider'
     )
     .copy(
       'public/bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css',
       'resources/assets/sass/plugin/slider'
     )
     .copy(
       'public/bower_components/angular-bootstrap-slider/slider.js',
       'resources/assets/js/plugin/angular'
     )
     .copy(
       'public/bower_components/chosen/chosen.jquery.js',
       'resources/assets/js/plugin/chosen'
     )
     .copy(
       'public/bower_components/lodash/dist/lodash.min.js',
       'resources/assets/js/plugin/lodash'
     )
     .copy(
       'public/bower_components/chosen/chosen.css',
       'resources/assets/sass/plugin/chosen'
     )
     .copy(
       'public/bower_components/angular-chart.js/dist/angular-chart.min.css',
       'resources/assets/sass/plugin/charts'
     )
     .copy(
       'public/bower_components/chosen/*.png',
       'public/build/css'
     )
     .ngTemplateCache('/**/backend.html', 'public/js', 'resources/assets/js/modules', {
        templateCache: {
            standalone: true,
            filename: "templates-backend.js",
            module:"templates-backend"
        },
        htmlmin: {
            collapseWhitespace: true,
            removeComments: true
        }
      })
     /**
      * Process frontend SCSS CHQ theme stylesheets
      */
     .sass([
        'plugin/sweetalert/sweetalert.scss',
        'plugin/charts/angular-chart.min.css',
        'plugin/slider/bootstrap-slider.min.css',
        'frontend/chq.scss',
     ], 'resources/assets/css/frontend/chq.css')

     /**
      * Combine pre-processed frontend CSS CHQ files
      */
     .styles([
        'frontend/chq.css'
     ], 'public/css/frontend.chq.css')

    /**
      * Process frontend SCSS UNICEF theme stylesheets
      */
    .sass([
      'plugin/sweetalert/sweetalert.scss',
      'plugin/charts/angular-chart.min.css',
      'plugin/slider/bootstrap-slider.min.css',
      'frontend/unicef.scss',
    ], 'resources/assets/css/frontend/unicef.css')

    /**
      * Combine pre-processed frontend CSS UNICEF files
      */
    .styles([
      'frontend/unicef.css'
    ], 'public/css/frontend.unicef.css')

     /**
      * Combine frontend scripts
      */
     .scripts([
        'plugin/sweetalert/sweetalert.min.js',
        'plugins.js',
        'plugin/chart/Chart.js',
        'plugin/lodash/lodash.min.js',
        'plugin/angular/angular.min.js',
        'plugin/angular/angular-chart.min.js',
        'plugin/slider/bootstrap-slider.min.js',
        'plugin/angular/slider.js',
        'plugin/socialshare/socialshare.js',
        'frontend/app.js',
        'modules/**/frontend.js'
     ], 'public/js/frontend.js')

     /**
      * Process backend SCSS stylesheets
      */
     .sass([
         'backend/app.scss',
         'backend/plugin/toastr/toastr.scss',
         'plugin/charts/angular-chart.min.css',
         'plugin/sweetalert/sweetalert.scss',
         'plugin/chosen/chosen.css',
         'backend/main.scss'
     ], 'resources/assets/css/backend/app.css')

     /**
      * Combine pre-processed backend CSS files
      */
     .styles([
        'backend/app.css',
     ], 'public/css/backend.css')

     /**
      * Combine backend scripts
      */
     .scripts([
         'plugin/sweetalert/sweetalert.min.js',
         'plugins.js',
         'plugin/chart/Chart.js',
         'plugin/lodash/lodash.min.js',
         'backend/app.js',
         'backend/plugin/toastr/toastr.min.js',
         'backend/plugin/chosenIcon.jquery.js',
         'plugin/chosen/chosen.jquery.js',
         'plugin/angular/angular.min.js',
         'plugin/angular/angular-chosen.min.js',
         'plugin/angular/angular-chart.min.js',
         'backend/custom.js',
         'modules/**/backend.js'
     ], 'public/js/backend.js')

    /**
      * Apply version control
      */
     .version([
        "public/css/frontend.unicef.css",
        "public/css/frontend.chq.css",
        "public/js/frontend.js",
        "public/css/backend.css",
        "public/js/backend.js",
        "public/js/templates-backend.js"
      ]);
});
