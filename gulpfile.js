// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var sass            = require('gulp-sass');
var concat          = require('gulp-concat');
var uglify          = require('gulp-uglify');
var cssnano         = require('gulp-cssnano');
var rename          = require('gulp-rename');
var autoprefixer    = require('gulp-autoprefixer');
var plumber         = require('gulp-plumber');
var notify          = require('gulp-notify');
var svgSprite       = require('gulp-svg-sprite');
var rev             = require('gulp-rev');
var revReplace      = require('gulp-rev-replace');
var override=require('gulp-rev-css-url');

// Compile Our Sass
gulp.task('sass-dist', function() {
    return gulp.src('assets/source/sass/main.scss')
            .pipe(plumber({
                errorHandler: notify.onError({
                    title: 'Sass build failed',
                    message: '<%= error.message %>'
                })
            }))
            .pipe(sass())
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(rename({suffix: '.min'}))
            .pipe(cssnano({
                mergeLonghand: false,
                zindex: false
            }))
            .pipe(gulp.dest('assets/dist/css'));
});

gulp.task('sass-editor', function() {
    return gulp.src('assets/source/sass/editor-style.scss')
            .pipe(plumber({
                errorHandler: notify.onError({
                    title: 'Sass build failed',
                    message: '<%= error.message %>'
                })
            }))
            .pipe(sass())
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(cssnano({
                mergeLonghand: false,
                zindex: false
            }))
            .pipe(gulp.dest('assets/dist/css'));
});

gulp.task('sass-dev', function() {
    return gulp.src('assets/source/sass/main.scss')
            .pipe(plumber({
                errorHandler: notify.onError({
                    title: 'Sass build failed',
                    message: '<%= error.message %>'
                })
            }))
            .pipe(sass())
            .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
            .pipe(rename({suffix: '.dev'}))
            .pipe(gulp.dest('assets/dist/css'));
});

// Concatenate & Minify JS
gulp.task('scripts-dist', function() {
    return gulp.src([
                'node_modules/jquery/dist/jquery.js',
                'assets/source/js/hbg-prime/plugins/jquery-ui-1.11.4/jquery-ui.js',
                'assets/source/js/hbg-prime/**/*.js',
                'assets/source/js/**/*.js',
                '../municipio/assets/dist/js/packaged.js'
            ])
            .pipe(plumber({
                errorHandler: notify.onError({
                    title: 'JS build failed',
                    message: '<%= error.message %>'
                })
            }))
            .pipe(concat('app.js'))
            .pipe(gulp.dest('assets/dist/js'))
            .pipe(rename('app.min.js'))
            .pipe(uglify())
            .pipe(gulp.dest('assets/dist/js'));
});

gulp.task('icons', function () {
    runSequence('iconfont', ['sass-dist', 'sass-dev', 'dss-sass']);
});


gulp.task('icons', function () {
  var config = {
    shape : {
      dimension : {
        maxWidth : 16,
        maxHeight : 16
      },
      spacing : {
        padding : 0
      },
      dest : 'icons/'
    },
    mode : {
      'symbol': {
        'dest': 'icons',
        'sprite': '../icons.svg',
        'bust': false,
        'inline': false,
        "example": {
          "template": "./assets/source/icons/icons.tpl.mustache",
          "dest": "./icons-sprite.html"
        }
      }
    },
  };

  return gulp.src('assets/source/icons/*.svg')
    .pipe(plumber({
        errorHandler: notify.onError({
            title: 'Icon build failed',
            message: '<%= error.message %>'
        })
    }))
    .pipe(svgSprite(config))
    .pipe(gulp.dest('assets/dist/images'))
});

gulp.task("revision", ["sass-dist", "sass-editor", "scripts-dist"], function(){
  return gulp.src(["./assets/dist/**/*"])
    .pipe(rev())
    .pipe(override())
    .pipe(gulp.dest('assets/dist'))
    .pipe(rev.manifest())
    .pipe(gulp.dest('assets/dist'))
})

gulp.task("revreplace", ["revision"], function(){
  var manifest = gulp.src("assets/dist/rev-manifest.json");

  return gulp.src("assets")
    .pipe(revReplace({manifest: manifest}))
    .pipe(gulp.dest("assets/dist"));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/source/js/**/*.js', ['scripts-dist']);
    gulp.watch('assets/source/sass/**/*.scss', ['sass-dist', 'sass-dev', 'sass-editor']);
    gulp.watch('assets/source/icons/*.svg', ['icons']);
//    gulp.watch('assets/source/images/**/*', ['imagemin']);
});

// Default Task
gulp.task('default', ['sass-dist', 'sass-dev', 'sass-editor', 'scripts-dist', 'icons', 'watch']);
