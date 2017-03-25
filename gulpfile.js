/* File: gulpfile.js */

// Get gulp packages
var gulp = require('gulp');
var livereload = require('gulp-livereload')
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');

// Sass task config
gulp.task('sass', function () {
  gulp.src('source/scss/main.scss')
    .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'expanded',
            includePaths: ['node_modules/susy/sass']
        }).on('error', sass.logError))
        .pipe(autoprefixer(
            'last 2 version',
            'safari 5',
            'ie 7',
            'ie 8',
            'ie 9',
            'opera 12.1',
            'ios 6',
            'android 4'
        ))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('assets/css/'));
});

// Uglify task config
gulp.task('uglify', function() {
  gulp.src('source/js/*.js')
    .pipe(uglify('app.js'))
    .pipe(gulp.dest('assets/js'))
});

// Gulp watch config
gulp.task('watch', function(){
    livereload.listen();

    gulp.watch('source/scss/*.scss', ['sass']);
    gulp.watch('source/js/*.js', ['uglify']);
    gulp.watch([
        'assets/css/main.css',
        '*.php',
        'assets/js/*.js',
        'template-parts/*.php'
    ], function (files){
        livereload.changed(files)
    });
});
