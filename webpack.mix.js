const mix = require('laravel-mix');
let { CleanWebpackPlugin } = require('clean-webpack-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
    plugins: [
        new CleanWebpackPlugin({
            verbose: true,
            cleanOnceBeforeBuildPatterns: [
                'fonts/**',
                'css/vendor/idir/**',
                'js/vendor/idir/**'
            ]
        })
    ],
    resolve: {
        alias: {
            '~': path.resolve(__dirname, 'node_modules/')
        }
    }
});

// Custom assets
mix.js('resources/js/web/web.js', 'public/js/custom/web')
    .js('resources/js/admin/admin.js', 'public/js/custom/admin')
    .babel([
        'resources/js/web/scripts/**/*.js'
    ], 'public/js/custom/web/scripts.js')
    .babel([
        'resources/js/admin/scripts/**/*.js'
    ], 'public/js/custom/admin/scripts.js')
    .sass('resources/sass/web/web.scss',
        'public/css/custom/web')
    .sass('resources/sass/web/web-dark.scss',
        'public/css/custom/web')        
    .sass('resources/sass/admin/admin.scss',
        'public/css/custom/admin')
    .sass('resources/sass/admin/admin-dark.scss',
        'public/css/custom/admin')
    // iDir assets
    .js('vendor/n1ebieski/idir/resources/js/vendor/vendor.js', 'js/vendor/idir/vendor')
    .js('vendor/n1ebieski/idir/resources/js/web/web.js', 'js/vendor/idir/web')
    .js('vendor/n1ebieski/idir/resources/js/admin/admin.js', 'js/vendor/idir/admin')
    .babel([
        'vendor/n1ebieski/idir/resources/js/web/scripts/**/*.js'
    ], 'public/js/vendor/idir/web/scripts.js')
    .babel([
        'vendor/n1ebieski/idir/resources/js/admin/scripts/**/*.js'
    ], 'public/js/vendor/idir/admin/scripts.js') 
    .sass('vendor/n1ebieski/idir/resources/sass/vendor/vendor.scss',
        'css/vendor/idir/vendor')
    .sass('vendor/n1ebieski/idir/resources/sass/web/web.scss',
        'css/vendor/idir/web')
    .sass('vendor/n1ebieski/idir/resources/sass/web/web-dark.scss',
        'css/vendor/idir/web')
    .sass('vendor/n1ebieski/idir/resources/sass/admin/admin.scss',
        'css/vendor/idir/admin')
    .sass('vendor/n1ebieski/idir/resources/sass/admin/admin-dark.scss',
        'css/vendor/idir/admin')
    .browserSync({
        proxy: 'https://localhost',
        host: 'localhost',
        open: 'external',
        snippetOptions: {
            rule: {
                match: /<\/body>/i,
                fn: function (snippet, match) {
                    return snippet + match;
                }
            }
        }        
    });

if (mix.inProduction()) {
    mix.version();
}