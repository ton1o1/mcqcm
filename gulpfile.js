var gulp         = require('gulp');               // récupérer le module gulp
var autoprefixer = require('gulp-autoprefixer');  // récupérer le module autoprefixer
var cssnano      = require('gulp-cssnano');       // minifier les css
var rename       = require('gulp-rename');        // renomer un fichier
var uglify       = require('gulp-uglify');        // minifier les fichiers js
var concat       = require('gulp-concat');        // concatener les fichiers js en un all.js
var sass         = require('gulp-sass');          // Sass

//tache css pour css pure
gulp.task('css', function(){
  return gulp.src('src/css/*.css')
          .pipe(autoprefixer())
          .pipe(gulp.dest('public/assets/css'))
          .pipe(rename({suffix: '.min'}))
          .pipe(cssnano())
          .pipe(gulp.dest('public/assets/css'));
});

//tache css pour SASS pure
gulp.task('sass', function(){
  return gulp.src('src/scss/**/*.scss')
          .pipe(sass({outputStyle: 'expanded'}))
          .pipe(autoprefixer())
          .pipe(gulp.dest('public/assets/css'))
          .pipe(rename({suffix: '.min'}))
          .pipe(cssnano())
          .pipe(gulp.dest('public/assets/css'));
});


//tache js
gulp.task('js',  function(){
  return gulp.src('src/js/*.js')
      .pipe(concat('all.js'))
      .pipe(gulp.dest('public/assets/js'))
      .pipe(uglify())
      .pipe(rename({suffix: '.min'}))
      .pipe(gulp.dest('public/assets/js'));
});


gulp.task('watch', function(){
    gulp.watch('src/scss/**/*.scss', ['sass']);
    gulp.watch('src/js/*.js', ['js']);
});

gulp.task('default', ['sass','js']);