const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            // test: /\.(png|jpg|gif|svg)$/,
            // loader: 'file-loader?name=img/[name].[ext]?[hash]',
        },
    },
};