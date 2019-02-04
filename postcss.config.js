var postcssFocusWithin = require( 'postcss-focus-within' );
var autoPrefixer = require( 'autoprefixer' );

module.exports = {
    plugins: [
		postcssFocusWithin( /* pluginOptions */ ),
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
