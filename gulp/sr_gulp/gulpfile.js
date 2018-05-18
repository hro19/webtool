var gulp         = require('gulp');
var sass         = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer')
var plumber      = require("gulp-plumber")

//sass
gulp.task('sass', function(){
  gulp.src('sass/*.scss')
    .pipe(plumber()) //<-
    .pipe(sass({
        outputStyle: 'expanded'
    }))
	.pipe(autoprefixer({
            browsers: ["last 2 versions", "ie >= 9", "Android >= 4","ios_saf >= 8"],
            cascade: false
        }))			
	.pipe(gulp.dest('srcowp/wp-content/themes/srco/'))
});




gulp.task("default", function() {
    gulp.watch("sass/*.scss",["sass"]);

});
