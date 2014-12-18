var gulp   = require('gulp'),
    path   = require('path'),
    coffee = require('gulp-coffee'),
    less   = require('gulp-less');

// Watch for changes
gulp.task('watch', function(){
    gulp.watch(['./coffee/*.coffee'], ['coffee']);
    gulp.watch(['./less/*.less'], ['less']);
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
        paths: [ path.join('bower') ]
    };

    // assets/css/
    gulp.src([
            './less/bootstrap.less',
            './less/traq.less'
        ])
        .pipe(less(lessConfig))
        .pipe(gulp.dest('../assets/css'));

    // assets/
    gulp.src([
            './less/chosen.less',
            './less/glyphicons.less'
        ])
        .pipe(less(lessConfig))
        .pipe(gulp.dest('../assets'));
});
