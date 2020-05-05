const gulp = require('gulp')
const uncss = require('gulp-uncss')


module.exports = function bootstraphtml() {
    console.log('Подключает нужные стили css');
    return gulp.src('build/css/bootstrap/*.css')
        .pipe(uncss({
            html: ['./views/*.html']
        }))
        .pipe(gulp.dest('./build/css/bootstrap'));
}