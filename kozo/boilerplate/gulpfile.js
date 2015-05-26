/**
 * Gulpfile
 *
 * Rename and Minify JavaScript... and more (later).
 *
 * Install Command:
 * npm install gulp gulp-rename gulp-uglify gulp-minify-css
 */

var gulp      = require('gulp');
var rename    = require('gulp-rename');
var uglify    = require('gulp-uglify');
var minifyCss = require('gulp-minify-css');

gulp.task('css', function () {
    gulp.src('assets/css/dev/**/*.css')
        .pipe(minifyCss({compatibility: 'ie8'}))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('assets/css/min/')); //the destination folder
});

gulp.task('js', function () {
    gulp.src('assets/js/dev/**/*.js')
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('assets/js/min/')); //the destination folder
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/js/dev/**/*.js', ['js']);
    gulp.watch('assets/css/dev/**/*.css', ['css']);
});

// Default Task
gulp.task('default', ['js', 'css', 'watch']);

function swallowError (error) {
    //If you want details of the error in the console
    console.log(error.toString());
    this.emit('end');
}