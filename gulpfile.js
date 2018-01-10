'use strict';
/**
 * Gulp for Front End.
 * 
 * @author  Ericson Cardoso <contato@ericsoncardoso.com.br>
 * @version 2.0.0
 * @license The MIT License (MIT)
 */

/**
 * # Load Basic Plugins
 * ------------------------------------------------------------------
 * Other plugins will be called in their respective tasks
 */
const gulp        = require('gulp');
const config      = require('./gulpconfig.js');
const requireDir  = require('require-dir');
const tasks       = requireDir('./gulp-tasks');
const browserSync = require('browser-sync').create();
const reload      = browserSync.reload;
// const livereload  = require('gulp-livereload'); //server - utilizar em casos que o browser async é inviável no projeto

/**
 * 
 * Live reload, CSS injection.
 */
gulp.task('browser-sync', function(){
  browserSync.init(config.browsersync)
});

gulp.task('serve', ['browser-sync']);

/*=============================
=            TASKS            =
=============================*/
	// gulp.task('images', tasks.images);
	// gulp.task('svg', tasks.svg);
	// gulp.task('font_icon', tasks.font_icon);

	// gulp.task('html:default', tasks.html.default);

	gulp.task('scripts:default', tasks.scripts.default);
	gulp.task('scripts:concat', tasks.scripts.concat);
	gulp.task('scripts:minify', tasks.scripts.minify);

	gulp.task('styles:default', tasks.styles.default);
	gulp.task('styles:minify', tasks.styles.minify);
/*=====  End of TASKS  ======*/

/*==========================================
=            WATCH - Task cicle            =
==========================================*/
	gulp.task('watch', function() {
		// var server = livereload();
		// livereload.listen();

		browserSync.init(config.browsersync)

		const stylesstasks = ['styles:default', 'styles:minify'];
		gulp.watch(config.paths.assets+'scss/**/**/**/*.scss', []);
		gulp.watch(config.paths.src+'components/**/**/**/*.scss', ['styles:default', 'styles:minify']);
		gulp.watch(config.paths.src+'modules/**/**/**/*.scss', ['styles:default', 'styles:minify']);
		
		const scriptstasks = ['scripts:default', 'scripts:minify', 'scripts:concat'];
		gulp.watch(config.paths.src+'assets/js/**/**/**/*.js', scriptstasks);
		gulp.watch(config.paths.src+'components/**/**/**/*.js', scriptstasks);
		gulp.watch(config.paths.src+'modules/**/**/**/*.js', scriptstasks);

	});

	// gulp.task('Watch HTML', ['html:default'], function() {
	// 	var server = livereload();
	// 	livereload.listen();

	// 	gulp.watch(app.src+'**/**/*.html', ['html:default']);

	// });
/*=====  End of WATCH - Task cicle  ======*/


/*----------  Run task default  ----------*/
// develop
gulp.task('default', [
	'watch'
]);

// server
gulp.task('server', [
	'images',
	'svg',
	'font_icon',
	'plugins:style',
	'plugins:script',
	'Watch Style',
	'Watch Script',
	'Watch HTML'
]);