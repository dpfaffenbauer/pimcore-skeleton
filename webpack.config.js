// webpack.config.js
var Encore = require('@symfony/webpack-encore');
let CopyPlugin = require('copy-webpack-plugin');
var webpack = require('webpack');

Encore
    // directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('/build')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // will output as web/build/app.js
    .addEntry('app', './assets/js/app.js')
    .addEntry('edit', './assets/js/edit.js')

    // will output as web/build/global.css
    .addStyleEntry('global', './assets/css/global.scss')
    .addStyleEntry('editmode', './assets/css/editmode.scss')

    // allow sass/scss files to be processed
    .enableSassLoader()

    // allow legacy applications to use $/jQuery as a global variable
    .autoProvidejQuery()

    .addPlugin(new CopyPlugin([{
        from: './assets/images',
        to: 'images'
    }, {
        from: './assets/fonts',
        to: 'fonts'
    }], {
        ignore: [
            'ico/*',
            '.dummy'
        ]
    }))

    .addPlugin(new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
        Popper: ['popper.js', 'default']
    }))

    .enablePostCssLoader((options) => {
        options.config = {
            path: 'postcss.config.js'
        };
    })
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
;

// export the final configuration
module.exports = Encore.getWebpackConfig();