var gulp   = require('gulp'),
    path   = require('path'),
    coffee = require('gulp-coffee'),
    less   = require('gulp-less');

// Watch for changes
gulp.task('watch', function(){
    gulp.watch(['./coffee/*.coffee'], ['coffee']);
    gulp.watch(['./less/*.less'], ['less']);
    gulp.watch(['./less/*/*.less'], ['less']);
});

// Compile CoffeeScript
gulp.task('coffee', function(){
    gulp.src('./coffee/*.coffee')
        .pipe(coffee())
        .pipe(gulp.dest('../assets/js'));
});

// Compile Less
gulp.task('less', function(){
    var lessConfig = {
        compress: true,
        paths: [ path.join('bower') ]
    };

    gulp.src([
            './less/traq.less'
            // './less/chosen.less',
            // './less/glyphicons.less'
        ])
        .pipe(less(lessConfig))
        .pipe(gulp.dest('../assets/css'));
});
