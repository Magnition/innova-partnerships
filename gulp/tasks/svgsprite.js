'use strict';

var gulp     = require('gulp'),
config     = require('../config').sprite,
svgSprite    = require('gulp-svg-sprite'),
settings                  = {
    log                 : "debug",
    svg                 : {
        xmlDeclaration  : false,
        doctypeDeclaration : false
    },
    mode                : {
        view            : {         // Activate the «view» mode
            bust        : false,
            sprite      : '../svg/sprite.view.svg',
            render      : {
                scss    : {
                    dest: '../scss/_sprite.scss'
                }
            }
        }
    },
    //shape               : {
    //    spacing         : {         // Add padding
    //        padding     : 10
    //    }
    //},
    example             : true
};

gulp.task( 'svgsprite', function () {
    return gulp.src('**/*.svg', {cwd: './src/svgs'})
        .pipe(svgSprite(settings))
        .pipe(gulp.dest(config.dest));
});