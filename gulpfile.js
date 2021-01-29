const { src, dest, series, watch } = require('gulp');
const sass = require('gulp-sass');
const plumber = require('gulp-plumber');
const browserSync = require('browser-sync');
const sourcemaps = require('gulp-sourcemaps');

const server = browserSync.create();
const url = 'http://example.local/'; // Change your local URL 

function compileCSS() {
  return src('./src/sass/*.scss', { sourcemaps: true })
    .pipe(sass())
    .pipe(dest('./dist/css'), { sourcemaps: true })
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

function fonts() {
    return src('./src/fonts/**/*')
    .pipe(dest('dist/fonts'))
}

function watchTask() {
  watch('./src/sass/**/*.scss', compileCSS);
  watch('**/*.php', reloadTask);
  watch('./src/js/**/*.js', reloadTask);
}

exports.default = series(startTask, watchTask);
