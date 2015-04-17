var gulp 		= require('gulp');
var plumber 	= require('gulp-plumber');
var	sass 		= require('gulp-ruby-sass');
var	concat 		= require('gulp-concat');
var notify 		= require("gulp-notify");
var	browserSync = require('browser-sync');

// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    //watch files
    var files = [
    './style.css',
    './js/app.min.js'
    ];
 
    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    proxy: "dev.marinemagnetics.com",
    host:'dev.marinemagnetics.com'
    });
});

gulp.task('sass', function () {
	    gulp.src('./sass/**/*.scss')
	        .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
	        .pipe(sass())
		    .pipe(concat('style.css'))
	        .pipe(gulp.dest('./'))
			.pipe(browserSync.reload({stream:true}));
});

gulp.task('jsConcat', function () {
        gulp.src('./js/build/**/*.js')
            .pipe(plumber({errorHandler: notify.onError("Error: <%= error.message %>")}))
            .pipe(concat('app.min.js'))
            .pipe(gulp.dest('./js/'))
            .pipe(browserSync.reload({stream:true}));
});

gulp.task('default', ['sass', 'jsConcat', 'browser-sync'], function(){
	gulp.watch("./sass/**/*.scss", ['sass']);
    gulp.watch("./js/build/**/*.js", ['jsConcat']);
});
