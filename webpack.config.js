const webpack            = require('webpack');
const path               = require('path');
const ExtractTextPlugin  = require('extract-text-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ManifestPlugin     = require('webpack-manifest-plugin');
const productionEnv      = (process.env.NODE_ENV === 'production');

module.exports = {
  entry: {
    app: [
      './src/index.js',
      './src/scss/main.scss'
    ]
  },
  output: {
    path: path.resolve(__dirname, './dist'),
    filename: 'js/bundle-[chunkhash].js'
  },
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/,
        use: ExtractTextPlugin.extract({
          use: ['css-loader', 'sass-loader'],
          fallback: 'style-loader'
        })
      },
      {
        test: /\.(eot|ttf|woff|woff2|EOT|TTF|WOFF|WOFF2)$/,
        loader: 'file-loader',
        options: {
          name: 'fonts/[name].[ext]'
        }
      },
      {
        test: /\.(png|jpe?g|gif|svg|PNG|JPE?G|GIF|SVG)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: 'images/[name]-[hash].[ext]'
            }
          },
          {
            loader: 'image-webpack-loader',
            options: {
              mozjpeg: {
                progressive: true,
                quality: 65
              },
              optipng: {
                enabled: false,
              },
              pngquant: {
                quality: '65-90',
                speed: 4
              },
              gifsicle: {
                interlaced: false,
              },
              webp: {
                quality: 75
              }
            }
          }
        ]
      },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel-loader'
      }
    ]
  },
  plugins: [
    new ExtractTextPlugin('css/[name]-[chunkhash].css'),
    new webpack.LoaderOptionsPlugin({minimize: productionEnv}),
    new CleanWebpackPlugin('dist',[{verbose: true}]),
    new ManifestPlugin()
  ]
};

if (productionEnv) {
  module.exports.plugins.push(
    new webpack.optimize.UglifyJsPlugin()
  );
}
