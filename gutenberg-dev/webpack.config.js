const defaultConfig = require( '@wordpress/scripts/config/webpack.config' ),
	path = require( 'path' ),
	webpack = require( 'webpack' ),
	MiniCssExtractPlugin = require( 'mini-css-extract-plugin' ),
	FileManagerPlugin = require( 'filemanager-webpack-plugin' );

module.exports = [
	{
		...defaultConfig,
		entry: {
			'wps-guten-blocks-editor': './src/scss/wps-blocks-editor.scss',
			'wps-grid': './src/scss/wps-grid.scss',
			'wps-editor-grid': './src/scss/wps-editor-grid.scss',
			'block-wps-prime-grid': './src/components/grid/grid.js',
			'block-wps-prime-grid-block':
				'./src/components/grid-block/grid-block.js',
			'wps-gutenberg-settings': './src/config/wps-gutenberg-settings.js',
			//'wps-gutenberg-spacings': './src/components/spacings/spacings.js',
			'wps-gutenberg-custom-controls':
				'./src/components/controls/controls.js',
		},
		output: {
			path: path.join( __dirname, '../admin/gutenberg' ),
			filename: '[name].js',
		},
	},
	{
		name: 'wps-gutenberg-blocks-public',
		// Path to your entry point. From this file Webpack will begin his work
		entry: [
			'../public/assets/src/js/wps-gutenberg-blocks-public.js',
			'./src/scss/wps-gutenberg-blocks-public.scss',
		],
		output: {
			path: path.resolve( __dirname, '../public/assets/dist' ),
			filename: 'js/min/wps-gutenberg-blocks-public.min.js',
			publicPath: '../public/assets/dist/',
		},
		module: {
			rules: [
				{
					test: /\.js$/,
					exclude: /(node_modules)/,
					use: {
						loader: 'babel-loader',
						options: {
							presets: [ '@babel/preset-env' ],
						},
					},
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
							loader: MiniCssExtractPlugin.loader,
						},
						{
							// This loader resolves url() and @imports inside CSS
							loader: 'css-loader',
						},
						{
							// Then we apply postCSS fixes like autoprefixer and minifying
							loader: 'postcss-loader',
							options: {
								relative: true,
								//baseUrl: 'wp-content/themes/wps-alagna/'
							},
						},
						{
							// First we transform SASS to standard CSS
							loader: 'sass-loader',
							options: {
								implementation: require( 'sass' ),
							},
						},
					],
				},
				//{
				//    test: /\.svg$/,
				//    loader: 'svg-inline-loader'
				//},
				{
					test: /\.(png|jpe?g|gif|svg)$/i,
					use: [
						{
							loader: 'file-loader',
							options: {
								name: '[name].[ext]',
								outputPath: 'images',
							},
						},
					],
				},
				{
					test: /\.(woff(2)?|ttf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
					use: [
						{
							loader: 'file-loader',
							options: {
								name: '[name].[ext]',
								outputPath: 'fonts',
							},
						},
					],
				},
			],
		},
		plugins: [
			new webpack.DefinePlugin( {
				ENV: JSON.stringify( 'wps-gutenberg-blocks-public' ),
			} ),
			new MiniCssExtractPlugin( {
				filename: 'css/wps-gutenberg-blocks-public.min.css',
			} ),
			new FileManagerPlugin( {
				onEnd: {
					copy: [
						{
							source:
								'../public/assets/dist/css/wps-gutenberg-blocks-public.min.css',
							destination: './wps-gutenberg-blocks-public.min.css',
						},
					],
				},
			} ),
		],
	},
];
