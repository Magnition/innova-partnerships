var gulp      = require('gulp');
//var config    = require('../config').production;
var config       = require('../config').sass;
var browserSync  = require('browser-sync');
var sass         = require('gulp-sass');
var sourcemaps   = require('gulp-sourcemaps');
var stylestats = require('gulp-stylestats');
var handleErrors = require('../util/handleErrors');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-cssnano');
var size      = require('gulp-filesize');
var rename = require('gulp-rename');
var stylestats = require('gulp-stylestats');
var reload      = browserSync.reload;

//['sass'],
gulp.task('minifyCss',  function() {
  //return gulp.src(config.cssSrc)
  //  .pipe(minifyCSS(config.cssSettings))
  //  .pipe(gulp.dest(config.dest))
  //  .pipe(size())
  //  .pipe(rename({
  //          suffix: '.min'
  //      }));
  
  return gulp.src(config.src)
      //.pipe(sourcemaps.init())
      .pipe(sass(config.settings))
      .on('error', handleErrors)
      .pipe(autoprefixer({ browsers: ['last 2 version'] }))
      .pipe(minifyCSS(config.cssSettings))
    .pipe(size())
    .pipe(rename({
            suffix: '.min'
        }))
      //.pipe(sourcemaps.write())
      .pipe(gulp.dest(config.dest))
      //.pipe(stylestats())
      .pipe(reload({stream:true}));
});
