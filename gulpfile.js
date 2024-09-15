const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify'); // Certifique-se de que está importando o uglify corretamente

// Tarefa para minificar e concatenar arquivos CSS
gulp.task('minify-css', () => {
    return gulp.src('css/*.css')  // Caminho dos arquivos CSS
        .pipe(concat('main.min.css'))  // Nome do arquivo concatenado
        .pipe(cleanCSS())  // Minificar o CSS
        .pipe(gulp.dest('dist/css'));  // Salvar na pasta de destino
});

// Tarefa para minificar e concatenar arquivos JavaScript
gulp.task('minify-js', () => {
    return gulp.src('js/*.js')  // Caminho dos arquivos JavaScript
        .pipe(concat('main.min.js'))  // Nome do arquivo concatenado
        .pipe(uglify())  // Minificar o JavaScript
        .pipe(gulp.dest('dist/js'));  // Salvar na pasta de destino
});

// Tarefa para monitorar mudanças nos arquivos CSS e JavaScript
gulp.task('watch', () => {
    gulp.watch('css/*.css', gulp.series('minify-css'));  // Monitora mudanças nos arquivos CSS
    gulp.watch('js/*.js', gulp.series('minify-js'));    // Monitora mudanças nos arquivos JavaScript
});
