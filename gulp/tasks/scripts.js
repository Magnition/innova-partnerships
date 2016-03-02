var gulp = require('gulp');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');
var handleErrors = require('../util/handleErrors');
var config       = require('../config').scripts;

gulp.task('scripts', function() {
    return gulp.src(config.src)
        .pipe(concat('cignaglobal.js'))
        .pipe(gulp.dest(config.dest))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest(config.dest))
});