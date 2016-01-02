var gulp   = require('gulp'),
    path   = require('path'),
    coffee = require('gulp-coffee'),
    less   = require('gulp-less'),
    concat = require('gulp-concat');

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

gulp.task('js', function() {
    gulp.src([
        // './bower/jquery/dist/jquery.min.js',
        './bower/jquery-cookie/jquery.cookie.js',
        './bower/bootstrap/dist/js/bootstrap.min.js',
        './bower/chosen/chosen.jquery.min.js',
        './bower/moment/min/moment-with-locales.min.js'
    ])
    .pipe(concat('js.js'))
    .pipe(gulp.dest('../assets/js'));
});
