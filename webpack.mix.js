let mix = require( 'laravel-mix' );

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

mix
    .less( 'resources/assets/less/app.less', 'css' )
    .less( 'resources/assets/less/vendor.less', 'css' )
    .js( 'resources/assets/js/app.js', 'js' )
    .scripts( [
        './node_modules/bootstrap/js/collapse.js',
        './node_modules/bootstrap/js/modal.js'
    ], 'public/js/vendor.js' );

if( mix.inProduction() ){
    mix.version();
}

//mix.js( 'resources/assets/js/app.js', 'js' )
//mix.js( 'resources/assets/js/app.js', 'js' ).version();

//mix.styles( [
// './vendor/bower_components/animate.css/animate.css'
//], 'public/css/vendor.css' );
//
//mix.less( [
// 'app.less'
//], 'public/css/app.css' );

//.version();

//mix.scripts( [
// './vendor/bower_components/bootstrap/js/collapse.js',
// './vendor/bower_components/bootstrap/js/modal.js'
//], 'public/js/vendor.js' );
//
//mix.scripts( [
// './resources/assets/js/app.js',
// './resources/assets/js/transparent-bar.js'
//], 'public/js/app.js' );
//
//mix.version( [
// 'public/css/vendor.css',
// 'public/css/app.css',
// 'public/js/app.js',
// 'public/js/vendor.js'
//] );