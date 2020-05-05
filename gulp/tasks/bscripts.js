const gulp = require('gulp')

module.exports = function bootstraps() {
	console.log('Переносим bootstrap-скрипты');
    return gulp.src('node_modules/bootstrap/dist/js/*.js')
    	.pipe(gulp.dest('build/js/bootstrap-scripts'));
    
}