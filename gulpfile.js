var elixir = require('laravel-elixir');
require('./tasks/angular.task.js');
require('./tasks/bower.task.js');
require('./tasks/sass.task.js');
require('./tasks/html.task.js');

require('laravel-elixir-livereload');

elixir(function(mix){
    mix
        .bower() // ima defaultne vrednosti :D
        .angular() // ovde gleda angular, tu builduje u tvoj app.ks
        .sass_bre()
        .html_bre()
        // .sass('./angular/sass/**/*.scss', 'public/css/app.css') // ovde  je stil
        // .copy('./angular/app/**/*.html', 'public/views/') // ovde kopira tvoj .html fajlove
        // .copy('./angular/app/directives/**/*.html', 'public/views/directives/') // jelte, direktive
        // .copy('./angular/app/dialogs/**/*.html', 'public/views/dialogs/') // ovo nemam pojma sta je
        .livereload([ // ovo ti je da su liveload promene, tako da sta god da menjas, odma se menja, watcher jelte
            'public/js/vendor.js',
            'public/js/app.js',
            'public/css/vendor.css',
            'public/css/app.css',
            'public/views/**/*.html'
        ], {liveCSS: true});
});
