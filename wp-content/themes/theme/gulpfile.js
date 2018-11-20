
var gulp      = require('gulp'), // Подключаем Gulp
    sass        = require('gulp-sass'), //Подключаем Sass пакет,
    browserSync = require('browser-sync'), // Подключаем Browser Sync
    autoprefixer = require('gulp-autoprefixer');


gulp.task('sass', function () {
  return gulp.src('css/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
      .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7'], { cascade: true })) // Создаем префиксы
    .pipe(gulp.dest('css/'))
	.pipe(browserSync.reload({stream: true}));
});


gulp.task('update-file', function() { // Создаем таск browser-sync
    return gulp.src('css/*.css') // Берем источник
	 .pipe(browserSync.reload({stream: true})) // Обновляем CSS на странице при изменении
});

gulp.task('browser-sync', function() { // Создаем таск browser-sync
    browserSync({
    proxy:'topinj',
    port:8080
  });
});



gulp.task('watch',['browser-sync', 'update-file','sass'], function () {
    gulp.watch('css/*.css', ['update-file'] );
    gulp.watch('js/*.js', ['update-file'] );
	gulp.watch('css/scss/*.scss', ['sass'] );
});
