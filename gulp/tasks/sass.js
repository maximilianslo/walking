const gulp = require('gulp')
const sass = require('gulp-sass')
const plumber = require('gulp-plumber')
const autoprefixer = require('gulp-autoprefixer')
const cleanCSS = require('gulp-clean-css')
const sourcemaps = require('gulp-sourcemaps')
const rename = require("gulp-rename")
const msg = require('gulp-msg')
const clc = require('cli-color')

module.exports = function styles() {
		let isSuccess = true;
		console.log('Запускаем сборку scss->css');
    	return gulp.src('assets/scss/styles.scss')
    	.pipe(plumber())
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
        .pipe(cleanCSS({
            debug: true,
            compatibility: '*'
        }, details => {
                console.log(`${details.name}: Original size:${details.stats.originalSize} - Minified size: ${details.stats.minifiedSize}`)
}))
        .pipe(sourcemaps.write())
        .pipe(rename({ suffix: '.min' }))   
		.pipe(gulp.dest('build/css'));
}
