var postcssFocusWithin = require( 'postcss-focus-within' );
var autoPrefixer = require( 'autoprefixer' );
var colornamesToHex = require( 'postcss-colornames-to-hex' );

module.exports = {
    plugins: [
		postcssFocusWithin( /* pluginOptions */ ),
		colornamesToHex(),
		autoPrefixer(
			{
				grid: 'no-autoplace',
				map: {
					prev: true
				}
			}
		)
    ]
};
