// Reference: https://markgoodyear.com/2014/01/getting-started-with-gulp/
// Reference: https://scotch.io/tutorials/how-to-use-browsersync-for-faster-development

// Load plugins
var gulp            = require('gulp'),
    sass            = require('gulp-ruby-sass'),
    autoprefixer    = require('gulp-autoprefixer'),
    cssnano         = require('gulp-cssnano'),
    jshint          = require('gulp-jshint'),
    uglify          = require('gulp-uglify'),
    imagemin        = require('gulp-imagemin'),
    rename          = require('gulp-rename'),
    concat          = require('gulp-concat'),
    cache           = require('gulp-cache'),
    del             = require('del');
    browsersync     = require('browser-sync').create();

// Browsersync
gulp.task('browser-sync', function() {
    browsersync.init({
        proxy: "magnetics.test"
    });
});

// Styles
gulp.task('sass', function() {
    return sass('src/sass/style.scss', { style: 'compressed' })
        .pipe(autoprefixer('last 2 version'))
        .pipe(gulp.dest(''))
        .pipe(cssnano())
        .pipe(browsersync.reload({stream: true}));
});

// Scripts
var scriptList = [
    'src/js/custom/typekit.js',
    'src/js/custom/easing.js',
    'src/js/custom/isotope.pkgd.min.js',
    'src/js/custom/jquery.debouncedresize.js',
    'src/js/custom/jquery.owl.carousel.js',
    'src/js/custom/jquery.waypoints.min.js',
    'src/js/custom/smoothzoom.min.js',
    'src/js/custom/tabs.js',
    'src/js/custom/anchors.js',
    'src/js/custom/carousel.js',
    'src/js/custom/steps.js',
    'src/js/custom/timeline.js',
    'src/js/custom/new-timeline.js',
    'src/js/custom/product.js',
    'src/js/custom/menu.js',
    'src/js/custom/menu-function.js',
    'src/js/custom/jQueryTab.js',
    'src/js/custom/jQueryTab-function.js',
];

var fontIcons = [
    'src/components/fontawesome/fonts/**.*', 
    'src/components/monosocialiconsfont/MonoSocialIconsFont*.*'
];

gulp.task('js', function() {
    return gulp.src(scriptList)
        .pipe(jshint('.jshintrc'))
        .pipe(jshint.reporter('default'))
        .pipe(concat('app.js'))
        //.pipe(gulp.dest('dist/js'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'))
        .pipe(browsersync.reload({stream: true}));
});

/** Images
* This will take any source images and run them through the imagemin plugin. We can go a 
* little further and utilise caching to save re-compressing already compressed images each time this task runs
*/
gulp.task('images', function() {
    return gulp.src(['src/images/*','src/images/**/*'])
        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(gulp.dest('dist/images'));
});

/** Clean
* Before deploying, it’s a good idea to clean out the destination folders and rebuild the files—just in case 
* any have been removed from the source and are left hanging out in the destination folder:
*/
gulp.task('clean', function() {
    return del(['dist/js', 'dist/images']);
});


// Create fonticons compile task
gulp.task('icons', function() {
    return gulp.src(fontIcons)
        .pipe(gulp.dest(outputDir + '/fonts'));
});

/** Default task
* We can create a default task, run by using $ gulp, to run all three tasks we have created:
*/
gulp.task('default', ['clean'], function() {
    gulp.start('sass', 'js', 'images');
});

// Create watch task
gulp.task('watch', ['browser-sync'], function () {
    gulp.watch('src/sass/**/*.scss', ['sass']);
    gulp.watch('src/sass/materialize/**/*.scss', ['sass']);
    gulp.watch('src/images/*', ['imagemin']);
    gulp.watch('src/js/**/*.js', ['js']);
    gulp.watch("*.php").on('change', browsersync.reload);
});