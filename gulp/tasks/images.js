var gulp = require('gulp');
var config       = require('../config').images;
var imageOptim = require('gulp-imageoptim');

gulp.task('images', function() {
     return gulp.src(config.src)
        .pipe(imageOptim.optimize())
        .pipe(gulp.dest(config.dest));
});