/**
 *
 * Configurações de rotas e variáveis
 *
 */

const src = './app/';
const dist = './dist/wp-content/themes/agatha-wc/';

module.exports = {
  paths: {
    src: src,
    dist: dist,
    assets: src + 'assets/',
    style: {
      src: src+'assets/scss/*.scss',
      dist: dist+'assets/css'
    },
    script: {
      app: src+'assets/js/app.js',
      src: src+'assets/js/scripts/**/**/*.js',
      dist: dist+'assets/js',
      components: src+'components/**/**/**/*.js',
      pluginsJs: src+'assets/plugins/**/**/**/*.js',
      pluginsCss: src+'assets/plugins/**/**/**/*.css',
      pluginsScss: src+'assets/plugins/**/**/**/*.scss',
      modules: src+'modules/**/**/**/*.js'
    }
  },
  browsersync: {
    files: ['**/*', '!**.map', '!**.css'], // Exclude map files.
    notify: false, // 
    open: true, // Set it to false if you don't like the broser window opening automatically.
    port: 8080, // 
    proxy: 'localhost/', // 
    watchOptions: {
      debounceDelay: 2000 // This introduces a small delay when watching for file change events to avoid triggering too many reloads
    }
  },
  autoprefixer: { 
    browsers: [
      "Android 2.3",
      "Android >= 4",
      "Chrome >= 20",
      "Firefox >= 24",
      "Explorer >= 9",
      "iOS >= 6",
      "Opera >= 12",
      "Safari >= 6"
    ]
  }
}