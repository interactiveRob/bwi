const gulp = require('gulp');
const path = require('path');
const del = require('del');
const rename = require('gulp-rename');
const argv = require('yargs').argv;
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const browserSync = require('browser-sync');
const compiler = require('webpack');
const webpack = require('webpack-stream');
const gulpif = require('gulp-if');
const svgstore = require('gulp-svgstore');
const svgmin = require('gulp-svgmin');
const fs = require('fs');
const package = require('./package.json');
const version = package.version;
let env = require('./env.json');

const isProduction = argv.mode === 'production';

let postCssPlugins = [require('autoprefixer')];

if (isProduction) {
    postCssPlugins = [...postCssPlugins, require('cssnano')];
}

const aliases = {
    src: 'source',
    dist: 'dist',
    basename: 'bwi-theme',
    suffix: 'bundle',
};

const baseDir = `${__dirname}`;

let paths = {
    source: `${baseDir}/source`,
    dist: `${baseDir}/${aliases.dist}`,
};

paths = {
    ...paths,
    styles: `${paths.source}/styles`,
    scripts: `${paths.source}/scripts`,
    images: `${baseDir}/${aliases.dist}/images`,
};

const browserSyncInstance = browserSync.create();
const browserSyncReload = browserSyncInstance.reload;

let browserSyncOptions = {
    // server: true,
    proxy: env.proxy,
    https: env.https,
};

const webpackConfig = {
    mode: isProduction ? 'production' : 'development',
    devtool: !isProduction ? 'source-map' : false,
    output: {
        filename: `[name].${aliases.suffix}.${version}.js`,
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env'],
                    },
                },
            },
        ],
    },
    resolve: {
        modules: [path.resolve(paths.source, 'scripts'), 'node_modules'],
        alias: {
            '@': path.resolve(paths.source, 'scripts'),
        },
        symlinks: false,
    },
    stats: 'none',
};

function clean() {
    return del([`${paths.dist}/*.${aliases.suffix}.*`]);
}

function styles() {
    return gulp
        .src(`${paths.styles}/main.scss`)
        .pipe(gulpif(!isProduction, sourcemaps.init()))
        .pipe(
            sass({
                outputStyle: 'expanded',
                includePaths: [`${paths.source}/styles`, 'node_modules'],
            })
        )
        .pipe(postcss(postCssPlugins))
        .pipe(rename({ basename: `${aliases.basename}`, suffix: `.${aliases.suffix}.${version}` }))
        .pipe(gulpif(!isProduction, sourcemaps.write('')))
        .pipe(gulp.dest(paths.dist))
        .pipe(browserSyncInstance.stream());
}

function scripts() {
    return gulp
        .src(`${paths.scripts}/main.js`)
        .pipe(webpack(webpackConfig, compiler))
        .pipe(rename({ basename: `${aliases.basename}`, suffix: `.${aliases.suffix}.${version}` }))
        .pipe(gulp.dest(paths.dist));
}

function svgs() {
    return gulp
        .src(`${paths.images}/**/*.svg`)
        .pipe(svgmin())
        .pipe(svgstore({ inlineSvg: true }))
        .pipe(rename({ basename: 'svg-icons', suffix: `.${aliases.suffix}` }))
        .pipe(gulp.dest(paths.dist));
}

function manifest(cb) {
    $manifest = {
        js: `${aliases.basename}.${aliases.suffix}.${version}.js`,
        css: `${aliases.basename}.${aliases.suffix}.${version}.css`,
    };

    fs.writeFileSync(`${paths.dist}/manifest.json`, JSON.stringify($manifest));

    cb();
}

function watch(cb) {
    gulp.watch(`${paths.source}/styles`, styles);
    gulp.watch(`${paths.source}/scripts`, scripts);
    gulp.watch(`${paths.images}/**/*.svg`, svgs);
    gulp.watch([`${baseDir}/**/*.php`, `${paths.dist}/*.${aliases.suffix}.js`]).on(
        'change',
        browserSyncReload
    );
    cb();
}

function initBrowserSync(cb) {
    const settings = {
        open: false,
        reloadDebounce: 1000,
        host: '127.0.0.1',
        port: 3001,
    };

    browserSyncInstance.init({
        ...settings,
        ...browserSyncOptions,
    });

    cb();
}

const _build = gulp.series(clean, gulp.parallel([styles, scripts, svgs]), manifest);
const _sync = gulp.series([_build, watch, initBrowserSync]);
const _watch = gulp.series(_build, watch);

exports.clean = clean;
exports.styles = styles;
exports.scripts = scripts;
exports.svgs = svgs;
exports.watch = _watch;
exports.sync = _sync;
exports.default = _build;
