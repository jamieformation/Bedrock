var gulp = require('gulp'),
    sourcemaps = require('gulp-sourcemaps'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    svgo = require('gulp-svgo');

gulp.task('sass', function(){
  return gulp.src('scss/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(''))
});

gulp.task('svgo', function(){
  return gulp.src('src/img/*.svg')
    .pipe(svgo({
      removeUnknownsAndDefaults: false
    }))
    .pipe(gulp.dest('images'));
});

gulp.task('watch', function(){
  gulp.watch('scss/*.scss', ['sass']);
  gulp.watch('src/img/*.svg', ['svgo']);
});
