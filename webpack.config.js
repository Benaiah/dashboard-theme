var ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = [{
  name: 'js',
  entry: "./src/js/main.js",
  output: {
    filename: "./assets/bundle.js"
  },
  resolve: {
    extensions: ['', '.js']
  },
  module: {
    loaders: [
      { test: /\.js$/, exclude: /node_modules/, loader: "babel-loader" }
    ]
  }
}, {
  name: 'scss',
  entry: "./src/scss/style.scss",
  output: { filename: './assets/bundle.css' },
  module: {
    loaders: [
      {
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract("style", "css!sass")
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin('./assets/bundle.css')
  ]
}]
