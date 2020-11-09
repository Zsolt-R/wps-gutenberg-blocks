// https://carrieforde.com/webpack-wordpress/
const path = require("path"),
  webpack = require("webpack"),
  MiniCssExtractPlugin = require("mini-css-extract-plugin"),
  BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = [{
  name: 'plugin-admin',
  // Path to your entry point. From this file Webpack will begin his work
  entry: [
    "./admin/assets/src/js/wps-gutenberg-blocks-admin.js",
    "./admin/assets/src/scss/wps-gutenberg-blocks-admin.scss"
  ],

  // Path and filename of your result bundle.
  // Webpack will bundle all JavaScript into this file
  output: {
    path: path.resolve(__dirname, "admin/assets/dist"),
    filename: "js/wps-gutenberg-blocks-admin.min.js",
    publicPath: "../"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"]
          }
        }
      },
      {
        // Apply rule for .sass, .scss or .css files
        test: /\.(sa|sc|c)ss$/,
        // Set loaders to transform files.
        // Loaders are applying from right to left(!)
        // The first loader will be applied after others
        use: [
          {
            // After all CSS loaders we use plugin to do his work.
            // It gets all transformed CSS and extracts it into separate
            // single bundled file
            loader: MiniCssExtractPlugin.loader
          },
          {
            // This loader resolves url() and @imports inside CSS
            loader: "css-loader"
          },
          {
            // Then we apply postCSS fixes like autoprefixer and minifying
            loader: "postcss-loader"
          },
          {
            // First we transform SASS to standard CSS
            loader: "sass-loader",
            options: {
              implementation: require("sass")
            }
          }
        ]
      },
      //{
      //    test: /\.svg$/,
      //    loader: 'svg-inline-loader'
      //},
      {
        test: /\.(png|jpe?g|gif|svg)$/i,
        use: [
          {
            loader: "file-loader",
            options: {
              name: "[name].[ext]",
              outputPath: "images"
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new webpack.DefinePlugin({
      ENV: JSON.stringify("plugin-admin")
    }),
    new MiniCssExtractPlugin({
      filename: "css/wps-gutenberg-blocks-admin.min.css"
    })
  ]
}, {
  name: "customizer",
  entry: ["./admin/assets/src/js/wps-gutenberg-blocks-customizer.js"],
  output: {
    path: path.resolve(__dirname, "admin/assets/dist"),
    filename: "js/wps-gutenberg-blocks-customizer.min.js",
    publicPath: "../"
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /(node_modules)/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"]
          }
        }
      }
    ]
  },
  plugins: [
    new webpack.DefinePlugin({
      ENV: JSON.stringify("customizer")
    })
  ]
}];