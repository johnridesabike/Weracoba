/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Primary color.
	wp.customize( 'primary_color', function( value ) {
		value.bind( function( to ) {

			// Update custom color CSS.
			var style = $( '#custom-theme-colors' ),
				hue = style.data( 'hue' ),
				css = style.html(),
				color,
				complementColor,
				complementHue;

			if ( 'custom' === to ) {

				// If a custom primary color is selected, use the currently set primary_color_hue
				color = wp.customize.get().primary_color_hue;
			} else {

				// If the "default" option is selected, get the default primary_color_hue
				color = 185;
			}

			complementColor = color + 180;
			if ( 360 < complementColor ) {
				complementColor = color - 180;
			}

			complementHue = hue + 180;
			if ( 360 < complementHue ) {
				complementHue = hue - 180;
			}

			// Equivalent to css.replaceAll, with hue followed by comma to prevent values with units from being changed.
			css = css.split( '( ' + hue + ',' ).join( '( ' + color + ',' );
			css = css.split( '( ' + complementHue + ',' ).join( '( ' + complementColor + ',' );
			style.html( css ).data( 'hue', color );
		});
	});

	// Primary color hue.
	wp.customize( 'primary_color_hue', function( value ) {
		value.bind( function( to ) {

			// Update custom color CSS.
			var style = $( '#custom-theme-colors' ),
				hue = style.data( 'hue' ),
				css = style.html(),
				complementHue,
				complementTo;

			complementHue = hue + 180;
			if ( 360 < complementHue ) {
				complementHue = hue - 180;
			}

			complementTo = to + 180;
			if ( 360 < complementTo ) {
				complementTo = to - 180;
			}

			// Equivalent to css.replaceAll, with hue followed by comma to prevent values with units from being changed.
			css = css.split( '( ' +  complementHue + ',' ).join( '( ' +  complementTo + ',' );
			css = css.split( '( ' + hue + ',' ).join( '( ' +  to + ',' );
			style.html( css ).data( 'hue', to );
		});
	});

}( jQuery ) );
