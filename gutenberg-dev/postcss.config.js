if ( process.env.NODE_ENV === 'development' ) {
} else {
	module.exports = {
		plugins: [
			require( 'autoprefixer' ),
			require( 'cssnano' ),
			require( 'postcss-svgo' ),
		],
	};
}
