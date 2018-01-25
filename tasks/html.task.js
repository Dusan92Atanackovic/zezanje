/*Elixir Task
*copyrights to https://github.com/HRcc/laravel-elixir-angular
*/
var gulp = require('gulp');
var filter = require('gulp-filter');
var notify = require('gulp-notify');
var minify = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var concat_sm = require('gulp-concat-sourcemap');
var concat = require('gulp-concat');
var gulpIf = require('gulp-if');
var sass = require('gulp-sass');
var Elixir = require('laravel-elixir');

var Task = Elixir.Task;
 // ne gleda output na public....
Elixir.extend('html_bre', function(src, output, outputFilename) {

    var baseDir =  "./angular/app/";
    var cssOutputFolder = "./public/views/";

    var onError = function (err) {
        notify.onError({
            title: "Laravel Elixir",
            subtitle: "HTML Files Compilation Failed!",
            message: "Error: <%= error.message %>",
            icon: __dirname + '/../node_modules/laravel-elixir/icons/fail.png'
        })(err);
        this.emit('end');
    };

    new Task('watcher in ' + baseDir, function() {
        // Main file has to be included first.

        return gulp.src( baseDir + "**/*.html")
            .on('error', onError)
            .pipe(filter('**/*.html'))
            .pipe(gulp.dest(cssOutputFolder))
            // .pipe(notify({
            //     title: 'Laravel Elixir',
            //     subtitle: 'Angular Compiled!',
            //     icon: __dirname + '/../node_modules/laravel-elixir/icons/laravel.png',
            //     message: ' '
            // }))
            ;
    }).watch(baseDir + '/**/*.html');

});
