// config import
const config = require('./../gulpconfig.js');

// Style related.
const gulp        = require('gulp');
const concat      = require('gulp-concat'); // Concatenates JS files
const jshint      = require('gulp-jshint'); // Detect errors and potential problems in JavaScript code
const uglify      = require('gulp-uglify'); // Minifies JS files
const babel       = require("gulp-babel"); // JavaScript compiler to write next generation JavaScript.
const rename      = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
const lineec      = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
const changed     = require('gulp-changed'); // event in modify files
const sourcemaps  = require('gulp-sourcemaps'); // sourcemap js and css
// const livereload  = require('gulp-livereload'); //server
const browserSync = require('browser-sync').create(); // server

/**
 * Task: `scripts`
 *  
 * This task does the following.
 *  1. Gets the source JavaScript files.
 *  2. Compiler all JS files on Babel.
 *  3. Concatenates JS files.
 *  4. Corrects the line endings.
 *  5. Writes sourcemaps for it.
 */

module.exports = {
  default: function () {
    gulp.src([config.paths.script.app, config.paths.script.src])
    .pipe(changed(config.paths.script.dist))
    .pipe(sourcemaps.init())
    .pipe(babel())
    .pipe(concat('scripts.js'))
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
    .pipe(sourcemaps.write())
    .pipe( lineec() )
    .pipe(gulp.dest(config.paths.script.dist))
    .pipe( browserSync.stream() );
    // .pipe(livereload());
  },
  concat: function() {
    gulp.src([config.paths.script.pluginsJs, config.paths.script.dist+'/*.js'])
    .pipe( uglify() )
    .pipe(concat('all.min.js'))
    .pipe(gulp.dest(config.paths.script.dist))
    .pipe( browserSync.stream() );
    // .pipe(livereload());
  },
  minify: function() {
      gulp.src([config.paths.script.dist+'/*.js'])
      .pipe( uglify() )
      .pipe( rename({suffix: '.min'}) )
      .pipe(gulp.dest(config.paths.script.dist))
      .pipe( browserSync.stream() );
      // .pipe(livereload());
  }
};
