var gulp            = require('gulp');
var plumber         = require('gulp-plumber');
var connect         = require('gulp-connect-php');
// var browserSync     = require('browser-sync');

// Scss to css packages
var sass            = require('gulp-sass');
var postcss         = require('gulp-postcss');
var autoprefixer    = require('autoprefixer');
var cssnano         = require('cssnano');
var sourcemaps      = require('gulp-sourcemaps');


// JS
var order           = require('gulp-order');
var concat          = require('gulp-concat');
var rename          = require('gulp-rename');
var uglify          = require('gulp-uglify');


var themepath       = '';



// uses postcss to make the var work below
var processors = [
    autoprefixer({browsers: ['iOS 7','last 2 versions']}),
    cssnano()
];


// optimise scripts
gulp.task('scripts', function() {
    console.log('running scripts')
    gulp.src(['build/scripts/plugins/**/*.js','build/scripts/main.js', 'build/scripts/_blocks/**/*.js'])
        .pipe(concat('main-min.js'))
        // .pipe(uglify())
        .pipe(gulp.dest(themepath + 'assets/scripts/'));
});


// optimise Sass
gulp.task('sass', function(){
    gulp.src('build/stylesheets/scss/main.scss')
    .pipe(plumber())
    .pipe(sass())
    .pipe(rename('main-min.css'))
    .pipe(postcss(processors)) // preprocess and nano css
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(themepath + 'assets/css/'));
});

// optimise Sass
gulp.task('sass-presets', function () {
    gulp.src('build/stylesheets/presets/presets.scss')
    .pipe(plumber())
    .pipe(sass())
    .pipe(rename('presets.css'))
    .pipe(postcss(processors)) // preprocess and nano css
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(themepath + 'assets/css/'));
});


gulp.task('watch', function(){
    gulp.watch('build/images/*.*', ['images']);
    gulp.watch('build/scripts/**/*.*', ['scripts']);
    gulp.watch('build/stylesheets/scss/**/*.scss', ['sass']);
    gulp.watch('build/stylesheets/presets/**/*.scss', ['sass-presets']);
})



gulp.task('default', ['sass','scripts','watch']);
