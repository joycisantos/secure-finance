const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

// Tarefa para minificar e concatenar arquivos CSS
gulp.task('minify-css', () => {
    return gulp.src(['css/global.css', 'css/header.css', 'css/footer.css'])
        .pipe(concat('main.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('dist/css'));
});

gulp.task('minify-css-pages', () => {

    gulp.src(['css/home.css', 'css/lists-post.css', 'css/categories-post.css', 'css/newsletter.css'])
        .pipe(concat('home.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('dist/css/pages'));

    gulp.src(['css/single-post.css'])
        .pipe(concat('single-post.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('dist/css/pages'));

    gulp.src(['css/banner-general.css', 'css/lists-post.css'])
        .pipe(concat('search.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('dist/css/pages'));

    gulp.src(['css/banner-general.css'])
        .pipe(concat('pages.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('dist/css/pages'));
        
    return gulp.src(['css/lists-post.css', 'css/banner-general.css', 'css/categories-post.css', 'css/newsletter.css'])
        .pipe(concat('category-tag.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('dist/css/pages'));
});

// Tarefa para minificar e concatenar arquivos JavaScript
gulp.task('minify-js', () => {
    return gulp.src('js/*.js')
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));
});

// Tarefa para monitorar mudanças nos arquivos CSS e JavaScript
gulp.task('watch', () => {
    gulp.watch('css/*.css', gulp.series('minify-css'));
    gulp.watch('css/*.css', gulp.series('minify-css-pages'));
    gulp.watch('js/*.js', gulp.series('minify-js'));
});
