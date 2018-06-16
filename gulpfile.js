let gulp = require('gulp'),
    sass = require('gulp-sass'),
    csso = require('gulp-csso'),
    autoprefixer = require('gulp-autoprefixer')

gulp.task('default', () => {
    gulp.watch('./docs/sass/*.scss', ['css'])
})

gulp.task('css', () => {
    gulp.src('./docs/sass/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(csso())
        .pipe(autoprefixer({
            browsers: ['last 1 version']
        }))
        .pipe(gulp.dest('./docs/dist'))
})
