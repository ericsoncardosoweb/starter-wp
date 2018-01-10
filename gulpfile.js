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
	gulp.task('media:image', tasks.media.image);
	gulp.task('media:symbol', tasks.media.symbol);
	gulp.task('media:fonticon', tasks.media.fonticon);

	gulp.task('html:default', tasks.html.default);
	gulp.task('html:php', tasks.html.php);
	gulp.task('html:extras', tasks.html.extras);

	gulp.task('scripts:default', tasks.scripts.default);
	gulp.task('scripts:concat', tasks.scripts.concat);
	gulp.task('scripts:minify', tasks.scripts.minify);

	gulp.task('styles:default', tasks.styles.default);
	gulp.task('styles:concat', tasks.styles.concat);
	gulp.task('styles:minify', tasks.styles.minify);



	/**
	 * Task: `compress`
	 * 
	 * Compress all theme files to final zip file.
	 */
	gulp.task('compress', function(){
		return gulp.src(config.compress.src)
			.pipe(zip(config.compress.filename)) // Zip compress files.
			.pipe(gulp.dest(config.compress.dest));
	});

	/**
	 * Task: `clean`
	 * 
	 * Clean specific build files of your theme/plugin.
	 */
	gulp.task('clean', function(){
	  return del(config.clean);
	});
/*=====  End of TASKS  ======*/

/*==========================================
=            WATCH - Task cicle            =
==========================================*/
	gulp.task('watch', function() {
		// var server = livereload();
		// livereload.listen();

		browserSync.init(config.browsersync)

		const stylesstasks = ['styles:default', 'styles:minify', 'styles:concat'];
		gulp.watch(config.paths.assets+'scss/**/**/**/*.scss', stylesstasks);
		gulp.watch(config.paths.src+'components/**/**/**/*.scss', stylesstasks);
		gulp.watch(config.paths.src+'modules/**/**/**/*.scss', stylesstasks);
		
		const scriptstasks = ['scripts:default', 'scripts:minify', 'scripts:concat'];
		gulp.watch(config.paths.src+'assets/js/**/**/**/*.js', scriptstasks);
		gulp.watch(config.paths.src+'components/**/**/**/*.js', scriptstasks);
		gulp.watch(config.paths.src+'modules/**/**/**/*.js', scriptstasks);
		
		const htmltasks = ['html:default', 'html:php', 'html:extras'];
		gulp.watch([
			config.paths.src+'**/**/**/**/*.php',
			config.paths.src+'**/**/**/**/*.html',
			config.paths.src+'**/**/**/**/*.tpl'
			], htmltasks);

	});
/*=====  End of WATCH - Task cicle  ======*/


/*----------  Run task default  ----------*/
// develop
gulp.task('default', [
	'media:image',
	'media:fonticon',
	'media:symbol',
	'watch'
]);

// server
gulp.task('server', [
	'media:image',
	'media:fonticon',
	'media:symbol',
	'html:default',
	'html:php',
	'html:extras',
	'styles:default', 
	'styles:minify', 
	'styles:concat',
	'scripts:default', 
	'scripts:minify', 
	'scripts:concat'
]);