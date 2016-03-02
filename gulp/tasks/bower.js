var gulp = require('gulp'),
    mainBowerFiles = require('main-bower-files'),
    concat = require('gulp-concat'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    handleErrors = require('../util/handleErrors'),
    gulpFilter = require('gulp-filter'),
    flatten = require('gulp-flatten');

gulp.task('bower', function() {

  var jsFilter = gulpFilter('*.js')
  var cssFilter = gulpFilter('*.css')
  var sassFilter = gulpFilter('*.scss')
  var fontFilter = gulpFilter(['*.eot', '*.woff', '*.svg', '*.ttf'])
  var imageFilter = gulpFilter(['*.gif', '*.png', '*.svg', '*.jpg', '*.jpeg'])

  return gulp.src(mainBowerFiles())

    // JS
      .pipe(jsFilter)
      .pipe(concat('bowerbuild.js'))
      .pipe(gulp.dest('./bowerbuild/js'))
      .pipe(uglify())
      .pipe(rename({
        suffix: ".min"
      }))
      .pipe(gulp.dest('./bowerbuild/js'))
      .pipe(jsFilter.restore())

    // CSS
      .pipe(cssFilter)
      .pipe(concat('bowerbuild.css'))
      .pipe(gulp.dest('./bowerbuild/scss'))
      .pipe(rename({
        extname: ".scss"
      }))
      .pipe(gulp.dest('./bowerbuild/scss'))
      .pipe(cssFilter.restore())

    // FONTS
      .pipe(fontFilter)
      .pipe(flatten())
      .pipe(gulp.dest('./bowerbuild/fonts'))
      .pipe(fontFilter.restore())

    // IMAGES
      .pipe(imageFilter)
      .pipe(flatten())
      .pipe(gulp.dest('./bowerbuild/images'))
      .pipe(imageFilter.restore())

})