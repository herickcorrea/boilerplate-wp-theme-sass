const {
	src,
	dest,
	watch,
	parallel
} = require('gulp');
// const gulp 			= require('gulp');
const sass 			= require('gulp-sass')(require('sass'));
const connect		= require('gulp-connect-php');
const concat 		= require('gulp-concat');
const minifyCSS 	= require('gulp-csso');
const rename 		= require('gulp-rename');
const uglify 		= require('gulp-uglify-es').default;
const imagemin 		= require('gulp-imagemin');
const webp 			= require('gulp-webp');
const sourcemaps 	= require('gulp-sourcemaps');
const browserSync 	= require('browser-sync').create();
// const stripDebug 	= require('gulp-strip-debug');

/* COMPILE SASS */

function scss()
{
	return src('./src/scss/Main.scss')
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(rename('template.min.css'))
		.pipe(minifyCSS())
		.pipe(sourcemaps.write('./'))
		.pipe(dest('./static/css'))
}

/* COMPILE JAVASCRIPT */

function appJS()
{
	return src('./src/js/app.main.js')
		.pipe(sourcemaps.init())
		//.pipe(concat('app.main.js'))
		.pipe(rename("app.main.min.js"))
		.pipe(uglify())
		.pipe(sourcemaps.write('./'))
		.pipe(dest('./static/js'));
}

function pagesJS()
{
	return src(['./src/js/pages/*.js'])
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(sourcemaps.write('./'))
		.pipe(dest('./static/js/pages'));
}

function modulesJS()
{
	return src(['./src/js/modules/*.js'])
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(sourcemaps.write('./'))
		.pipe(dest('./static/js/modules'));
}

/* OPTIMIZE IMAGENS */

function optimizeImages()
{
	return src('src/images/*.{jpg,jpeg,png}')
		.pipe(imagemin())
		.pipe(dest('./static/images/optimized'));
}

function optimizeImagesWebp()
{
	return src('src/images/*.{jpg,jpeg,png}')
		.pipe(webp())
		.pipe(dest('./static/images/webp'));
}

/* BROWSER SYNC */

function gulpWatch()
{
	connect.server({}, function ()
	{
		browserSync.init({
			proxy: 'http://localhost:5010/'
		});
	});

	watch(['**/*.scss'], scss).on('change',function()
	{
		browserSync.reload();
	});

	watch('src/js/*.js', appJS).on('change',function()
	{
		browserSync.reload();
	});

	watch(['./src/js/pages/*.js'], pagesJS).on('change',function()
	{
		browserSync.reload();
	});

	watch(['./src/js/modules/*.js'], modulesJS).on('change',function()
	{
		browserSync.reload();
	});
	
	watch('src/images/*.{jpg,jpeg,png}', optimizeImages)
	watch('src/images/*.{jpg,jpeg,png}', optimizeImagesWebp)	

	watch('**/*.php').on('change', function ()
	{
		browserSync.reload();
	});
}

exports.watch 	= gulpWatch;

/* COMPILADORES PARCIAIS */

exports.css 	= parallel(scss);
exports.js 		= parallel(appJS,pagesJS,modulesJS);
exports.app 	= parallel(appJS);
exports.pages 	= parallel(pagesJS);
exports.modules = parallel(modulesJS);
exports.imagens	= parallel(optimizeImages, optimizeImagesWebp);

/* COMPILADOR GERAL */

exports.compile = parallel(scss,appJS,pagesJS,modulesJS,optimizeImages,optimizeImagesWebp);