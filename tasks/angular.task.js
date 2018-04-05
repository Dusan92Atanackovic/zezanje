  /*Elixir Task
*copyrights to https://github.com/HRcc/laravel-elixir-angular
*/
var gulp = require('gulp');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var jshint = require('gulp-jshint');
var stylish = require('jshint-stylish');
var uglify = require('gulp-uglify');
var ngAnnotate = require('gulp-ng-annotate');
var notify = require('gulp-notify');
var gulpif = require('gulp-if');
var angularFilesort = require('gulp-angular-esmodules-filesort');
var debug = require('gulp-debug');

var Elixir = require('laravel-elixir');

var Task = Elixir.Task;
 // ne gleda output na public....
Elixir.extend('angular', function() {

    var baseDir = './angular/';
    var outputDir = './public/js'

    new Task('angular in ' + baseDir, function() {
        // Main file has to be included first.
        return gulp.src([baseDir + "main.js", baseDir + "**/*.js", baseDir + "**/*.module.js", baseDir + "**/*.controller.js"])
            .pipe(angularFilesort())
            .pipe(jshint())
            .pipe(jshint.reporter(stylish))
            //.pipe(jshint.reporter('fail')).on('error', onError) //enable this if you want to force jshint to validate
            .pipe(gulpif(! config.production, sourcemaps.init()))
            .pipe(debug())
            .pipe(concat('app.js'))
            .pipe(ngAnnotate())
            .pipe(gulpif(config.production, uglify()))
            .pipe(gulpif(! config.production, sourcemaps.write()))
            .pipe(gulp.dest(outputDir))
            // .pipe(notify({
            //     title: 'Laravel Elixir',
            //     subtitle: 'Angular Compiled!',
            //     icon: __dirname + '/../node_modules/laravel-elixir/icons/laravel.png',
            //     message: ' '
            // }))
            ;
    }).watch(baseDir + '/**/*.js');

});
