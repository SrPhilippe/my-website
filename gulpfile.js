let gulp = require('gulp'),
    sass = require('gulp-sass')

gulp.task('default', () => {
    gulp.watch('./app/*.css', ['css'])
})

gulp.task('css', () => {
    console.log("oi")
})
