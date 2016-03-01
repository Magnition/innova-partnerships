var gulp = require('gulp');
var config = require('../config').flags;
var browserSync  = require('browser-sync');

gulp.task('flags', function() {
    return gulp.src(config.src)
        .pipe(gulp.dest(config.dest))
        .pipe(browserSync.reload({stream:true}));
});
