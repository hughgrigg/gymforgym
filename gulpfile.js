const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

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
