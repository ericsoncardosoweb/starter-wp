// config import
const config = require('./../gulpconfig.js');

// Style related.
const gulp          = require('gulp');
const gih           = require("gulp-include-html");
const fileinclude   = require('gulp-file-include');
const markdown      = require('markdown');
const changed       = require('gulp-changed'); // event in modify files
// const livereload = require('gulp-livereload'); //server
const browserSync   = require('browser-sync').create(); // server


/**
 * Task: icons, fonticon, images
 * 
 * This task does the following:
 *  1. Optimized and compress size of images
 *  2. Generate symbols icons svg
 *  3. Create font icons
 */

module.exports = {
  default: function () {
    gulp.src(config.html.src)
    // .pipe(gih())
    .pipe(fileinclude({
      prefix: '@@',
      basepath: '@file',
      filters: {
        markdown: markdown.parse
      }
    }))
    .pipe(gulp.dest(config.html.dist))
    .pipe( browserSync.stream() )
    // .pipe(livereload());
  },
  php: function () {
    gulp.src([config.paths.src + '*.php'])
    .pipe(changed(config.html.dist))
    .pipe(gulp.dest(config.html.dist));
  },
  extras: function () {
    gulp.src([
        config.paths.src + '*.{jpg,png,.css}'
      ])
    .pipe(changed(config.html.dist))
    .pipe(gulp.dest(config.html.dist));
  },
};
