var Encore = require('@symfony/webpack-encore');
const { VueLoaderPlugin } = require('vue-loader')

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // uncomment to create hashed filenames (e.g. app.abc123.css)
    // .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('logo', './assets/img/icon/logo.png')
    .addEntry('app', './assets/js/app.js')
    .addStyleEntry('css', './assets/css/app.scss')

    .cleanupOutputBeforeBuild()

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

    .enableVueLoader()

    .addPlugin(new VueLoaderPlugin())

    .autoProvidejQuery()

    // uncomment if you use Sass/SCSS files
    .enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    // .autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
