const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const browsersync = require('browser-sync').create();
const gutil = require('gulp-util');

const dir = {
    src: 'src/',
    build: 'build/',
    images: 'images/'
};

// CSS settings
var css = {
    src: dir.src + 'assets/css/style.scss',
    watch: dir.src + 'assets/**/*',
    build: dir.build,
    sassOpts: {
        outputStyle: 'nested',
        imagePath: dir.images.build,
        precision: 3,
        errLogToConsole: true
    },
    processors: [
        require('postcss-assets')({
            loadPaths: ['images/'],
            basePath: dir.build,
            baseUrl: 'wp-content/themes/satoridigital/'
        }),
        require('css-mqpacker'),
        require('cssnano')
    ]
};

// CSS processing
gulp.task('css', () => {
    return gulp.src(css.src)
        .pipe(sass(css.sassOpts))
        .pipe(postcss(css.processors))
        .pipe(gulp.dest(css.build))
        .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
});

// For BrowserSync
const reload = (cb) => { browsersync.reload(); cb(); };