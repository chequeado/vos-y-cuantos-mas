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
       'public/bower_components/chosen/chosen.jquery.js',
       'resources/assets/js/plugin/chosen'
     )
     .copy(
       'public/bower_components/chosen/chosen.css',
       'resources/assets/sass/plugin/chosen'
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
      .ngTemplateCache('/**/frontend.html', 'public/js', 'resources/assets/js/modules', {
        templateCache: {
            standalone: true,
            filename: "templates-frontend.js",
            module:"templates-frontend"
        },
        htmlmin: {
            collapseWhitespace: true,
            removeComments: true
        }
      })
     /**
      * Process frontend SCSS stylesheets
      */
     .sass([
        'frontend/app.scss',
        'plugin/sweetalert/sweetalert.scss'
     ], 'resources/assets/css/frontend/app.css')

     /**
      * Combine pre-processed frontend CSS files
      */
     .styles([
        'frontend/app.css'
     ], 'public/css/frontend.css')

     /**
      * Combine frontend scripts
      */
     .scripts([
        'plugin/sweetalert/sweetalert.min.js',
        'plugins.js',
        'plugin/angular/angular.min.js',
        'frontend/app.js',
        'modules/**/frontend.js'
     ], 'public/js/frontend.js')

     /**
      * Process backend SCSS stylesheets
      */
     .sass([
         'backend/app.scss',
         'backend/plugin/toastr/toastr.scss',
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
         'backend/app.js',
         'backend/plugin/toastr/toastr.min.js',
         'plugin/chosen/chosen.jquery.js',
         'plugin/angular/angular.min.js',
         'plugin/angular/angular-chosen.min.js',
         'backend/custom.js',
         'modules/**/backend.js'
     ], 'public/js/backend.js')

    /**
      * Apply version control
      */
     .version([
        "public/css/frontend.css", 
        "public/js/frontend.js", 
        "public/css/backend.css", 
        "public/js/backend.js",
        "public/js/templates-backend.js",
        "public/js/templates-frontend.js",
      ]);
});