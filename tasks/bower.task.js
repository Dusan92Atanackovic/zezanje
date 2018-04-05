var gulp = require('gulp');
var mainBowerFiles = require('main-bower-files');
var filter = require('gulp-filter');
var notify = require('gulp-notify');
var minify = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var concat_sm = require('gulp-concat-sourcemap');
var concat = require('gulp-concat');
var gulpIf = require('gulp-if');
var debug = require('gulp-debug');

var Elixir = require('laravel-elixir');

var Task = Elixir.Task;

Elixir.extend('bower', function(jsOutputFile, jsOutputFolder, cssOutputFile, cssOutputFolder) {
    var baseDir = './bower_components';
    var cssFile =  'vendor.css';
    var jsFile =  'vendor.js';
    jsOutputFolder = './public/js/';
    cssOutputFolder = './public/css/';

    if (!Elixir.config.production){
        concat = concat_sm;
    }

    var onError = function (err) {
        notify.onError({
            title: "Laravel Elixir",
            subtitle: "Bower Files Compilation Failed!",
            message: "Error: <%= error.message %>",
            icon: __dirname + '/../node_modules/laravel-elixir/icons/fail.png'
        })(err);
        this.emit('end');
    };

    new Task('bower-js', function() {
        return gulp.src([baseDir + '/**/*.min.js', "!"+baseDir + 'angular-bootstrap/**/*.*'])
            .on('error', onError)
            .pipe(concat(jsFile, {sourcesContent: true}))
            .pipe(gulpIf(Elixir.config.production, uglify()))
            .pipe(gulp.dest(jsOutputFolder || Elixir.config.js.outputFolder))
            ;
    }).watch('bower.json');


    new Task('bower-css', function(){
        return gulp.src(baseDir + '/**/*.min.css')
            .on('error', onError)
            // .pipe(debug())
            .pipe(concat(cssFile))
            .pipe(gulpIf(config.production, minify()))
            .pipe(gulp.dest(cssOutputFolder || config.css.outputFolder));
    }).watch('bower.json');

});
