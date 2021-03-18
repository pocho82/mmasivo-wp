const gulp = require('gulp');

const paths = {
  assets: './images',
  dev: './src',
  distCss: './css',
  vendorCss: './css/vendors',
  distJs: './js',
  vendorJs: './js/vendors',
  templates: './templates'
}

const del = require('del');
const rename = require('gulp-rename');
const plumber = require('gulp-plumber');
const concat = require('gulp-concat');
const gp_glob = require('glob');

const browsersync = require('browser-sync').create();
function browserSync(done) {
  browsersync.init({
    server: {
      baseDir: './'
    },
    port: 3000
  });
  done();
}

const newer = require('gulp-newer');
const imagemin = require('gulp-imagemin');
function cleanAssets() {
  return del([paths.assets]);
}
function optimizeAssets() {
  return gulp
    .src(paths.assets + '/**/*')
    .pipe(newer(paths.assets))
    .pipe(
      imagemin([
        imagemin.gifsicle({ interlaced: true }),
        imagemin.jpegtran({ progressive: true }),
        imagemin.optipng({ optimizationLevel: 5 }),
        imagemin.svgo({
          plugins: [
            {
              removeViewBox: false,
              collapseGroups: true
            }
          ]
        })
      ])
    )
    .pipe(gulp.dest(paths.assets));
}

const autoprefixer = require('autoprefixer');
const AUTOPREFIXER_BROWSERS = [
  'ie >= 10',
  'ie_mob >= 10',
  'ff >= 30',
  'chrome >= 34',
  'safari >= 7',
  'opera >= 23',
  'ios >= 7',
  'android >= 4.4',
  'bb >= 10'
]
const postcss = require('gulp-postcss');
const sass = require('gulp-sass');
const cssnano = require('cssnano');
const scsslint = require('gulp-scss-lint');
function stylesheetsLint() {
  var src = gp_glob.sync(`${paths.dev}/*.scss`, {ignore: [`${paths.dev}/packages/*.scss`], dot: true});
  
  return gulp.src(src)
    .pipe(scsslint())
}
function stylesheets() {
  return gulp
    .src(paths.dev + '/main.scss')
    .pipe(plumber())
    .pipe(sass({ outputStyle: 'expanded' }))
    .pipe(gulp.dest(paths.distCss))
    .pipe(rename('styles.min.css'))
    .pipe(postcss([autoprefixer(AUTOPREFIXER_BROWSERS), cssnano()]))
    .pipe(gulp.dest(paths.distCss))
    .pipe(browsersync.stream());
}
function generateStylesDependencies() {
  return (
    gulp
      .src(`${[paths.vendorCss]}/**/*.css`)
      .pipe(concat('vendors.min.css'))
      .pipe(gulp.dest(paths.distCss))
  );
}

const webpack = require('webpack');
const webpackconfig = require('./webpack.config.js');
const webpackstream = require('webpack-stream');
const eslint = require('gulp-eslint');
function scriptsLint() {
  var src = gp_glob.sync(`${paths.dev}/*.js`, {ignore: [`${paths.dev}/packages/*.js`], dot: true});

  return gulp.src(src)
    .pipe(plumber())
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
}
function scripts() {
  return (
    gulp
      .src([paths.dev + '/**/*.js'])
      .pipe(plumber())
      .pipe(webpackstream(webpackconfig, webpack))
      // folder only, filename is specified in webpack config
      .pipe(gulp.dest(paths.distJs))
      .pipe(browsersync.stream())
  );
}
function generateScriptsDependencies() {
  return (
    gulp
      .src(`${[paths.vendorJs]}/**/*.js`)
      .pipe(concat('vendors.min.js'))
      .pipe(gulp.dest(paths.distJs))
  );
}

function watchFiles() {
  gulp.watch(paths.dev + '/**/*.scss', gulp.series(stylesheetsLint, stylesheets));
  gulp.watch(paths.dev + '/**/*.js', gulp.series(scriptsLint, scripts));
  gulp.watch(paths.assets + '/**/*', optimizeAssets);
}

const css = gulp.series(stylesheetsLint, stylesheets);
const js = gulp.series(scriptsLint, scripts);
const vendors = gulp.series(generateStylesDependencies, generateScriptsDependencies);
const build = gulp.series(cleanAssets, gulp.parallel(css, optimizeAssets, js));
const watch = gulp.parallel(watchFiles, browserSync);

exports.cleanAssets = cleanAssets;
exports.optimizeAssets = optimizeAssets;
exports.stylesheets = css;
exports.scripts = js;
exports.vendors = vendors;
exports.build = build;
exports.watch = watch;
exports.default = build;
