var gulp         = require('gulp');
var browserSync  = require('browser-sync');
var sass         = require('gulp-sass');
var sourcemaps   = require('gulp-sourcemaps');
var stylestats = require('gulp-stylestats');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').sass;
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-cssnano');
//var cssmin = require('gulp-cssmin');
var size      = require('gulp-filesize');
var rename = require('gulp-rename');
var reload      = browserSync.reload;

gulp.task('sass', function () {  
  return gulp.src(config.src)
      //.pipe(sourcemaps.init())
      .pipe(sass(config.settings))
      .on('error', handleErrors)
      .pipe(autoprefixer({ browsers: ['last 2 version'] }))
      // comment out minification line during dev. Keep min name so files match with drupal
      //.pipe(minifyCSS(config.cssSettings))
    .pipe(size())
    .pipe(rename({
            suffix: '.min'
        }))
      //.pipe(sourcemaps.write())
      .pipe(gulp.dest(config.dest))
      //.pipe(stylestats())
      .pipe(reload({stream:true}));
});
