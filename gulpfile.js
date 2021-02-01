const { src, dest, series, watch } = require('gulp');
const sass = require('gulp-sass');
const plumber = require('gulp-plumber');
const browserSync = require('browser-sync');
const sourcemaps = require('gulp-sourcemaps');

const server = browserSync.create();
const url = 'http://example.local/'; // Change your local URL 
const paths = {
  styles: {
    src: ["./src/scss/*.scss", "./src/scss/**/*.scss"],
    dest: "./dist/css/"
  },
  scripts: {
    src: ["./src/js/*.js", "./src/js/libs/*.js", "!./src/js/min/*.js"],
    dest: "./dist/js/"
  },
  svg: {
    src: "./src/img/*.svg"
  },
  php: {
    src: "**/*.php"
  }
};


function stylesTask() {
  return src(paths.styles.src, { sourcemaps: true })
    .pipe(sass())
    .pipe(dest(paths.styles.dest), { sourcemaps: true })
    .pipe(server.stream());
}

function reloadTask(done) {
  server.reload();
  done();
}

function startTask(done) {
  server.init({
    proxy: url,
    open: true,
    ghostMode: false
  });
  done();
}

function watchTask() {
  watch(paths.styles.src, stylesTask);
  watch(paths.php.src, reloadTask);
  watch(paths.scripts.src, reloadTask);
}

exports.default = series(startTask, watchTask);
