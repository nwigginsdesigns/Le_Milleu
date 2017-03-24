<?php
	/** ===== Sanitize Customizer Settings ===== **/
	/* Sanitize Checkbox */
	function scrollme_sanitize_checkbox( $input ) {
		if( $input == 1 ) {
			return 1;
		}else {
			return '';
		}
	}

	/* Sanitize Slider Settings **/
	function scrollme_sanitize_slider_settings( $input ) {
		$options = array(
			'yes' => __( 'Yes', 'scrollme-pro' ),
			'no' => __( 'No', 'scrollme-pro' ),
			'horizontal' => __( 'Slider', 'scrollme-pro' ),
			'fade' => __( 'Fade', 'scrollme-pro' ),

		);
		if( array_key_exists( $input, $options ) ) {
			return $input;
		}else {
			return '';
		}
	}

	/* Sanitize Textfield allowing span tag only */
	function scrollme_allow_span($input) {
        $cus_allowed_tags = array(
            'span' => array(),
            'a' => array(
		        'href' => array(),
		        'title' => array()
		    ),
        );
        
        $input_fil = wp_kses($input, $cus_allowed_tags);
        
        return $input_fil;
    }

    /* Sanitize Textfield allowing anchor and other general tags tag only */
    function scrollme_allow_gentags($input) {
    	$cus_allowed_tags = array(
		    'a' => array(
		        'href' => array(),
		        'title' => array()
		    ),
		    'br' => array(),
		    'em' => array(),
		    'strong' => array(),
		    'b' => array()
	    );
        
        $input_fil = wp_kses($input, $cus_allowed_tags);
        return $input_fil;
	}