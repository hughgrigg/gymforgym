/*jslint node: true */
"use strict";

const elixir   = require('laravel-elixir');
const gulp     = require('gulp');
const shell    = require('gulp-shell');
const scssLint = require('gulp-scss-lint');

require('laravel-elixir-vue-2');

elixir((mix) => {
    mix.sass(
        'g4g.scss',
        null,
        'resources/assets/sass',
        {
            includePaths: [
                'node_modules/foundation-sites/scss',
                'node_modules/motion-ui/src'
            ]
        }
    )
        .webpack('g4g.js')
        .version(['css/g4g.css', 'js/g4g.js']);
});

gulp.task("test-database", shell.task(
    [
        "rm -f ./database/test_db.sqlite",
        "sqlite3 ./database/test_db.sqlite ''",
        "ELASTICSEARCH_INDEX=ching-shop-test php artisan migrate:refresh --seed --database=testing --env=testing"
    ],
    {
        verbose: true
    }
));

gulp.task("scss-lint", function () {
    return gulp.src([
        "resources/assets/sass/**/*.scss",
        "!**/vendor/**",
        "!**/bootstrap-variables.scss"
    ])
        .pipe(scssLint({config: "./tests/analysis/scss-lint.yml"}))
        .pipe(scssLint.failReporter());
});
