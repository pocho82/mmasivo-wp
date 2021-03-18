module.exports = {
  entry: {
    scripts: './src/main.js',
  },
  mode: 'development',
  devtool: 'inline-cheap-source-map',
  output: {
    filename: 'main.min.js',
  },
};
