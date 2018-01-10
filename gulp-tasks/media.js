// config import
const config = require('./../gulpconfig.js');

// Style related.
const gulp          = require('gulp');
const imagemin      = require('gulp-imagemin'); // optimized images
const svgSprite     = require("gulp-svg-sprites"); // create symbols svg
const iconfont      = require('gulp-iconfont'); // create fonicons
const iconfontCss   = require('gulp-iconfont-css'); // auto make style fonticon
const iconfontHtml  = require('gulp-iconfont-template'); // auto make html reference fonticon
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
  image: function () {
    gulp.src(config.image.src)
    .pipe(changed(config.image.dist))
    .pipe(imagemin(config.image.imagemin))
    .pipe(gulp.dest(config.image.dist))
    .pipe( browserSync.stream() )
    // .pipe(livereload());
  },
  symbol: function () {
    gulp.src(config.svg.src)
    .pipe(svgSprite(config.svg.symbols))
    .pipe(gulp.dest(config.svg.dist))
  },
  fonticon: function () {
    gulp.src([config.fonticon.src])
    .pipe(iconfontHtml(config.fonticon.iconFontHtml))
    .pipe(iconfontCss(config.fonticon.iconFontCss))
    .pipe(iconfont(config.fonticon.iconFont))
    .pipe(gulp.dest(config.fonticon.dist));
  },
};
