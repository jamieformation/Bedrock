var gulp = require('gulp'),
  sourcemaps = require('gulp-sourcemaps'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  imagemin = require('gulp-imagemin'),
  changed = require('gulp-changed'),
  babel = require('gulp-babel');

gulp.task('sass', function(){
  return gulp.src('scss/**/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(''))
});

gulp.task('images', function(){
  return gulp.src('src/img/**.svg')
    .pipe(changed('images'))
    .pipe(imagemin([
      imagemin.svgo({
        plugins: [
          {removeUnknownsAndDefaults: false}
        ]
      })
    ]))
    .pipe(gulp.dest('images'));
});

gulp.task('babel', () =>
  gulp.src('src/js/global.js')
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(gulp.dest('js'))
);

gulp.task('watch', function(){
  gulp.watch('scss/**/*.scss', ['sass']);
  gulp.watch('src/img/*', ['images']);
  gulp.watch('src/js/global.js', ['babel']);
});