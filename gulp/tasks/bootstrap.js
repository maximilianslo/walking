const gulp = require('gulp')

module.exports = function bootstraps() {
	console.log('Переносим bootstrap');
    return gulp.src('node_modules/bootstrap/dist/css/*.css')
    	.pipe(gulp.dest('build/css/bootstrap'));
    
}




