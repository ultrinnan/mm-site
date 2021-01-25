const gulp = require('gulp');
const sass = require('gulp-sass');
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const browserSync = require('browser-sync').create();
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const jshint = require('gulp-jshint');
const babel = require('gulp-babel');

const paths = {
    styles: {
        src: './sass/',
        dest: './css/',
    },
    scripts: {
        src: './js/',
        dest: './js/',
    },
    html: './src/',
};

/**
 *  Compile styles
 */
function styles() {
    return gulp
        .src(paths.styles.src + '**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(
            autoprefixer({
                cascade: false,
            })
        )
        .pipe(
            rename({
                suffix: '.min',
            })
        )
        .pipe(
            cleanCSS({ debug: true }, (details) => {
                console.log(`${details.name}: ${details.stats.originalSize}`);
                console.log(`${details.name}: ${details.stats.minifiedSize}`);
            })
        )
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(paths.styles.dest))
        .pipe(browserSync.stream());
}

/**
 * Check errors in scripts
 */
function lint() {
    return gulp
        .src([paths.scripts.src + '*.js', `!${paths.scripts.src}*.min.js`])
        .pipe(jshint())
        .pipe(jshint.reporter('jshint-stylish'));
}

/**
 *  Minify and concat all JS files
 */
function scripts() {
    return gulp
        .src([paths.scripts.src + '*.js', `!${paths.scripts.src}*.min.js`])
        .pipe(sourcemaps.init())
        .pipe(
            babel({
                presets: ['@babel/env'],
            })
        )
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(paths.scripts.dest));
}

/**
 *  Watch changes
 */
function watch() {
    browserSync.init({
        logSnippet: false,
        server: false,
        ui: false,
        watchTask: true,
        open: 'external',
        host: 'marichka.local',
        // proxy: 'marichka.local',
        port: 80,
    });

    gulp.watch(paths.styles.src + '**/*.scss', styles);
    gulp.watch(
        [paths.scripts.src + '*.js', `!${paths.scripts.src}*.min.js`],
        gulp.series(lint, scripts)
    );
}

/*
 * Define development task to build our scripts and styles for Development
 */
gulp.task('development', gulp.series(styles, scripts));

/*
 * Define default task that can be called by just running `gulp` from cli
 */
gulp.task('default', gulp.parallel(watch));