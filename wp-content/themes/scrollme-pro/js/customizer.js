/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	/** Typography Settings **/
		/** Body Font **/
		wp.customize( 'body_font_family', function( value ) {
            value.bind( function( newval ) {
                WebFont.load({
                    google: {
                    	families: [newval]
                    }
                });
                
                $('body').css({
                    'font-family': newval,
                });
            });
        });

        wp.customize( 'body_font_weight', function( value ) {
            value.bind( function( newval ) {                
                $('body').css({
                    'font-weight': newval,
                });
            });
        });
        
        wp.customize( 'body_font_style', function( value ) {
            value.bind( function( newval ) {                
                $('body').css({
                    'font-style': newval,
                });
            });
        });
        
        wp.customize( 'body_font_size', function( value ) {
            value.bind( function( newval ) {
                $('body').css({
                    'font-size': newval+'px',
                });
            });
        });
        
        wp.customize( 'body_font_color', function( value ) {
            value.bind( function( newval ) {
                $('body').css({
                    'color': newval,
                });
            });
        });

        /** Heading 1 **/
        wp.customize( 'h1_font_family', function( value ) {
            value.bind( function( newval ) {
                WebFont.load({
                    google: {
                    	families: [newval]
                    }
                });
                
                $('h1').css({
                    'font-family': newval,
                });
            });
        });
        
        wp.customize( 'h1_font_weight', function( value ) {
            value.bind( function( newval ) {                
                $('h1').css({
                    'font-weight': newval,
                });
            });
        });
        
        wp.customize( 'h1_font_style', function( value ) {
            value.bind( function( newval ) {                
                $('h1').css({
                    'font-style': newval,
                });
            });
        });
        
        wp.customize( 'h1_font_size', function( value ) {
            value.bind( function( newval ) {
                $('h1').css({
                    'font-size': newval+'px',
                });
            });
        });
        
        wp.customize( 'h1_font_color', function( value ) {
            value.bind( function( newval ) {
                $('h1').css({
                    'color': newval,
                });
            });
        });
        
        /** Heading 2 **/
        wp.customize( 'h2_font_family', function( value ) {
            value.bind( function( newval ) {
                WebFont.load({
                    google: {
                    	families: [newval]
                    }
                });
                
                $('h2').css({
                    'font-family': newval,
                });
            });
        });
        
        wp.customize( 'h2_font_weight', function( value ) {
            value.bind( function( newval ) {                
                $('h2').css({
                    'font-weight': newval,
                });
            });
        });
        
        wp.customize( 'h2_font_style', function( value ) {
            value.bind( function( newval ) {                
                $('h2').css({
                    'font-style': newval,
                });
            });
        });
        
        wp.customize( 'h2_font_size', function( value ) {
            value.bind( function( newval ) {
                $('h2').css({
                    'font-size': newval+'px',
                });
            });
        });
        
        wp.customize( 'h2_font_color', function( value ) {
            value.bind( function( newval ) {
                $('h2').css({
                    'color': newval,
                });
            });
        });
        
        /** Heading 3 **/
        wp.customize( 'h3_font_family', function( value ) {
            value.bind( function( newval ) {
                WebFont.load({
                    google: {
                    	families: [newval]
                    }
                });
                
                $('h3').css({
                    'font-family': newval,
                });
            });
        });
        
        wp.customize( 'h3_font_weight', function( value ) {
            value.bind( function( newval ) {                
                $('h3').css({
                    'font-weight': newval,
                });
            });
        });
        
        wp.customize( 'h3_font_style', function( value ) {
            value.bind( function( newval ) {                
                $('h3').css({
                    'font-style': newval,
                });
            });
        });
        
        wp.customize( 'h3_font_size', function( value ) {
            value.bind( function( newval ) {
                $('h3').css({
                    'font-size': newval+'px',
                });
            });
        });
        
        wp.customize( 'h3_font_color', function( value ) {
            value.bind( function( newval ) {
                $('h3').css({
                    'color': newval,
                });
            });
        });
        
        /** Heading 4 **/
        wp.customize( 'h4_font_family', function( value ) {
            value.bind( function( newval ) {
                WebFont.load({
                    google: {
                    	families: [newval]
                    }
                });
                
                $('h4').css({
                    'font-family': newval,
                });
            });
        });
        
        wp.customize( 'h4_font_weight', function( value ) {
            value.bind( function( newval ) {                
                $('h4').css({
                    'font-weight': newval,
                });
            });
        });
        
        wp.customize( 'h4_font_style', function( value ) {
            value.bind( function( newval ) {                
                $('h4').css({
                    'font-style': newval,
                });
            });
        });
        
        wp.customize( 'h4_font_size', function( value ) {
            value.bind( function( newval ) {
                $('h4').css({
                    'font-size': newval+'px',
                });
            });
        });
        
        wp.customize( 'h4_font_color', function( value ) {
            value.bind( function( newval ) {
                $('h4').css({
                    'color': newval,
                });
            });
        });
        
        /** Heading 5 **/
        wp.customize( 'h5_font_family', function( value ) {
            value.bind( function( newval ) {
                WebFont.load({
                    google: {
                    	families: [newval]
                    }
                });
                
                $('h5').css({
                    'font-family': newval,
                });
            });
        });
        
        wp.customize( 'h5_font_weight', function( value ) {
            value.bind( function( newval ) {                
                $('h5').css({
                    'font-weight': newval,
                });
            });
        });
        
        wp.customize( 'h5_font_style', function( value ) {
            value.bind( function( newval ) {                
                $('h5').css({
                    'font-style': newval,
                });
            });
        });
        
        wp.customize( 'h5_font_size', function( value ) {
            value.bind( function( newval ) {
                $('h5').css({
                    'font-size': newval+'px',
                });
            });
        });
        
        wp.customize( 'h5_font_color', function( value ) {
            value.bind( function( newval ) {
                $('h5').css({
                    'color': newval,
                });
            });
        });
        
        /** Heading 6 **/
        wp.customize( 'h6_font_family', function( value ) {
            value.bind( function( newval ) {
                WebFont.load({
                    google: {
                    	families: [newval]
                    }
                });
                
                $('h6').css({
                    'font-family': newval,
                });
            });
        });
        
        wp.customize( 'h6_font_weight', function( value ) {
            value.bind( function( newval ) {                
                $('h6').css({
                    'font-weight': newval,
                });
            });
        });
        
        wp.customize( 'h6_font_style', function( value ) {
            value.bind( function( newval ) {                
                $('h6').css({
                    'font-style': newval,
                });
            });
        });
        
        wp.customize( 'h6_font_size', function( value ) {
            value.bind( function( newval ) {
                $('h6').css({
                    'font-size': newval+'px',
                });
            });
        });
        
        wp.customize( 'h6_font_color', function( value ) {
            value.bind( function( newval ) {
                $('h6').css({
                    'color': newval,
                });
            });
        });
} )( jQuery );
