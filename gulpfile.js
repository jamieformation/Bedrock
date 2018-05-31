var gulp = require('gulp'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    imagemin = require('gulp-imagemin');

gulp.task('sass', function(){
  return gulp.src('scss/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(''))
});

gulp.task('images', function(){
  return gulp.src('src/img/*')
    .pipe(imagemin([
      imagemin.svgo({
        plugins: [
          {removeUnknownsAndDefaults: false}
        ]
      }),
      imagemin.gifsicle(),
      imagemin.jpegtran(),
      imagemin.optipng()
    ]))
    .pipe(gulp.dest('images'));
});

gulp.task('watch', function(){
  gulp.watch('scss/*.scss', ['sass']);
  gulp.watch('src/img/*', ['images']);
});
