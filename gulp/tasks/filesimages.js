var gulp = require('gulp');
var config       = require('../config').filesimages;
var imageOptim = require('gulp-imageoptim');

gulp.task('filesimages', function() {
     return gulp.src(config.src)
        .pipe(imageOptim.optimize())
        .pipe(gulp.dest(config.dest));
});