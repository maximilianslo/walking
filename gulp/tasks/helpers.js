const gulp = require('gulp')
const sass = require('gulp-sass')
const autoprefixer = require('gulp-autoprefixer')
const msg = require('gulp-msg')
const clc = require('cli-color')

module.exports = function styles() {
		let isSuccess = true;
		console.log('Запускаем сборку scss->css');
    	return gulp.src('assets/scss/helpers/*.scss')
        .pipe(sass().on('error', function(error) {
            msg.Error('Сборка стилей не прошла.');
            sass.logError(error);
        })).on('end', ()=> {
            if( isSuccess )
                msg.Success(clc.green('Сборка стилей прошла успешно.'))})
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            grid: true,
            cascade: false
        }))   
		.pipe(gulp.dest('build/css/helpers'));
}
