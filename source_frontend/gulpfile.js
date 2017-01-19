var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    browserify = require('browserify'),
    source = require('vinyl-source-stream');

gulp.task('browserify', function () {
    return browserify('./app/app.js')
        .bundle()
        .pipe(source('main.js'))
        .pipe(gulp.dest('./../web/js/'));
});

gulp.task('sass', function () {
    return sass('sass/site.scss')
        .pipe(gulp.dest('./../web/css'));
});

gulp.task('watch', function () {
    gulp.watch('app/**/*.js', ['browserify']);
    gulp.watch('sass/*.scss', ['sass']);
});

gulp.task('default', ['browserify', 'sass', 'watch']);