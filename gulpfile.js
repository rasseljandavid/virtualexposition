var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
       .scripts([
       		'lib/jquery.js',
                  'lib/hammer.min.js',
                  'lib/mapplic.js',
                  'lib/geocomplete.js',
       		'lib/bootstrap.js',
       		'lib/angular.js',
       		'lib/moment.js',
       		'lib/humanize-duration.js',
       		'lib/angular-timer.js',
       		'lib/datetimepicker.js',
       		'lib/datetimepicker.templates.js',
       		'app.js'
       	], './public/js/app.min.js')
       .version([
       		'/js/app.min.js',
       		'/css/app.css'
       	]);
});
