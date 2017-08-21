var gulp = require('gulp');
// Requires the gulp-sass plugin
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();

gulp.task('sass', function(){
  return gulp.src('scss/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(''))
});


gulp.task('watch', function(){
  gulp.watch('scss/*.scss', ['sass']);
  gulp.watch("*.php").on('change', browserSync.reload);
  // Other watchers
})

gulp.task('bs', function() {
	var files = [
			'**/*.php',
			'**/*.{png,jpg,gif,css}'
		    ];
	browserSync.init(files, {

		// Read here http://www.browsersync.io/docs/options/
		proxy: 'localhost/NTTA',

		// port: 8080,

		// Tunnel the Browsersync server through a random Public URL
		// tunnel: true,

		// Attempt to use the URL "http://my-private-site.localtunnel.me"
		// tunnel: "ppress",

		// Inject CSS changes
		injectChanges: true

	});
});
