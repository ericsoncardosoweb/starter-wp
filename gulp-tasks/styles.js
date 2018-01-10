// config import
const config = require('./../gulpconfig.js');

// Style related.
const gulp         = require('gulp');
const postcss      = require('gulp-postcss'); // Transforming styles with JS plugins 
const sass         = require('gulp-sass'); // Gulp pluign for Sass compilation.
const cssnano      = require('cssnano'); // Minifies CSS files.
const autoprefixer = require('gulp-autoprefixer'); // Automatically CSS vendor prefixes 
const csscomb      = require('gulp-csscomb'); // CSS coding style formatter
const rtlcss       = require('rtlcss'); // Convert LTR CSS to RTL.
const stylefmt     = require('gulp-stylefmt');  // Auto CSS formating.
const cssMqpacker  = require('css-mqpacker'); // Packing same CSS media query rules into one.
const sourcemaps   = require('gulp-sourcemaps'); // sourcemap js and css
const changed      = require('gulp-changed'); // event in modify files
const concat       = require('gulp-concat'); // multiples files concat in one
const rename       = require('gulp-rename'); // Renames files E.g. style.css -> style.min.css
const lineec       = require('gulp-line-ending-corrector'); // Consistent Line Endings for non UNIX systems. Gulp Plugin for Line Ending Corrector (A utility that makes sure your files have consistent line endings)
// const livereload    = require('gulp-livereload'); //server
const browserSync  = require('browser-sync').create(); // server


/**
 * Task: style:sheet
 * 
 * This task does the following:
 *  1. Gets the source scss files.
 *  2. Compile SASS to CSS.
 *  3. Write sourcemaps for it.
 *  4. Autoprefix CSS
 *  5. Combo CSS.
 *  6. Merge Media Queries only for .min.css version.
 *  7. Minify CSS.
 *  8. Inject CSS or reloads the browser via browserSync.
 */

module.exports = {
  default: function () {
    gulp.src([config.paths.style.src])
		.pipe(changed(config.paths.style.dist))
    .pipe(sourcemaps.init())
    .pipe(sass({
        outputStyle: 'expanded'
    }).on('error', sass.logError))
    .pipe( autoprefixer(config.autoprefixer) )
    .pipe(sourcemaps.write())
    .pipe( lineec() )
		.pipe(gulp.dest(config.paths.style.dist))
    .pipe( browserSync.stream() )
    // .pipe(livereload());
  },
  concat: function() {
    gulp.src([config.paths.script.pluginsCss, config.paths.script.pluginsScss, config.paths.script.dist+'/*.css'])
    .pipe(changed(config.paths.style.dist))
    .pipe(sourcemaps.init())
    .pipe(sass({
        outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe( autoprefixer(config.autoprefixer) )
    .pipe(cssnano({
      reduceIdents: false,
      zindex: false
    }))
    .pipe(sourcemaps.write())
    .pipe(concat('all.min.js'))
    .pipe( lineec() )
    .pipe(gulp.dest(config.paths.style.dist))
    .pipe( browserSync.stream() )
    // .pipe(livereload());
  },
  minify: function () {
    gulp.src([config.paths.style.dist+'/*.css'])
    .pipe( postcss([
      cssMqpacker(), // Combine matching media queries.
      cssnano({
        reduceIdents: false,
        zindex: false
      }) // Minify `style.min.css` file.
    ]) )
    .pipe( lineec() )
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(config.paths.style.dist))
    .pipe( browserSync.stream() )
    // .pipe(livereload());
  }
};
