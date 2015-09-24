'use strict';
var 
    gulp = require('gulp'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    through2 = require('through2'),
    cache = require('gulp-cache'),
    watch = require('gulp-watch'),
    cached = require('gulp-cached'),
    supportedBrowser = ['last 2 versions', 'ie 10', 'ie 11', 'android 2.3', 'android 4','opera 12'];

    var sass_files = [
      'library/css/style.scss'
    ];

/*===========================================
=            Convert sass Render            =
===========================================*/

gulp.task('sass', function() {
   return gulp.src(sass_files)
   .pipe(concat('library/css/style.css'))
   .pipe(sass().on('error', sass.logError))
    
   .pipe(autoprefixer({
            browsers: supportedBrowser,
            cascade: false
    }))
   .pipe(gulp.dest('.'))
});



/*===============================
=        Watcher General        =
===============================*/

gulp.task('watcher', ['sass'], function() {
  gulp.watch("library/css/style.scss", ['sass'])
});


/*======================================
=            Cleaner Calls             =
======================================*/

  gulp.task('clear', function (done) {
    return cache.clearAll(done);
  });

  gulp.task('clean', function(cb) {
      del(['library/css/style.css'], cb);
  });


/*=====================================
=            Task Runners             =
=====================================*/


gulp.task('default', ['sass']);
gulp.task('watch', ['watcher']);

//NEEDS TIDYING
//gulp.task('prod', ['include-production', 'production-js', 'production-imagemin', 'production-minify-js', 'less-production', 'production-minify-css', 'production-fonts']);
