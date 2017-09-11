var path = require('path');
module.exports = {
    entry: path.resolve(__dirname, './entry.js'),
    output: {
        path: path.resolve(__dirname,'/dist'),
        filename: 'bundle.js'
    },
    module: {
        loaders: [
            {
                test: path.join(__dirname, 'es6'),
                loader: 'babel-loader'
            },
        ]
    }
};
