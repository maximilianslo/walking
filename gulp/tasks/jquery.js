const gulp = require('gulp')

module.exports = function bootstraps() {
	console.log('Переносим jquery');
    return gulp.src('node_modules/jquery/dist/jquery.js')
    	.pipe(gulp.dest('build/js/jquery'));
    
}