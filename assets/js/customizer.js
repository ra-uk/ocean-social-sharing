/**
 * Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	wp.customize('oss_social_share_heading', function( value ) {
		var heading = $( '.social-share-title span.text' );
		if ( heading.length ) {
			var ogheading = heading.html();
			value.bind( function( newval ) {
				if ( newval ) {
					heading.html( newval );
				} else {
					heading.html( ogheading );
				}
			});
		}
	} );
	wp.customize( 'oss_sharing_borders_color', function( value ) {
		value.bind( function( to ) {
			$( '.entry-share ul li a' ).css( 'border-color', to );
		} );
	} );
	wp.customize( 'oss_sharing_icons_bg', function( value ) {
		value.bind( function( to ) {
			$( '.entry-share ul li a' ).css( 'background-color', to );
		} );
	} );
	wp.customize( 'oss_sharing_icons_color', function( value ) {
		value.bind( function( to ) {
			$( '.entry-share ul li a' ).css( 'color', to );
		} );
	} );
} )( jQuery );
