<?php
	/** ========== Home Scroll Section ========== **/
	function scrollme_scrolls_cutomize_register( $wp_customize ) {
		/** Necesary Variables **/
	    $pr_layout = array(
	        'services' => __('Service', 'scrollme-pro'),
	        'portfolio' => __('Portfolio', 'scrollme-pro'),
	        'clients' => __('Clients', 'scrollme-pro'),
	        'contact' => __('Contact', 'scrollme-pro'),
	        'blog' => __('Blog', 'scrollme-pro'),
	        'team' => __('Team', 'scrollme-pro'),
	        'gallery' => __('Gallery', 'scrollme-pro'),
	        'testimonial' => __('Testimonial', 'scrollme-pro'),
	    );

		/** --- Scroll Section Panels --- **/
		$wp_customize->add_panel(
			'scrollme_panel_scroll_page_settings',
			array(
				'title' => __( 'Horizontal Scroll Page Sections', 'scrollme-pro' ),
				'priority' => 40
			)
		);

		/* Section 0 - Slider */
		$wp_customize->add_section(
			'scrollme_section_section_home',
			array(
				'title' => __('Scroll Section - Home', 'scrollme-pro' ),
				'priority' => 5,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);



		// Home ID for Navigation
		$wp_customize->add_setting( 'scrollme_section_home', array( 'default' => 'home', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control( new WP_Customize_Help_Info_Control( $wp_customize, 'scrollme_section_home', array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'section' => 'scrollme_section_section_home',
				'settings' => 'scrollme_section_home'
				)
			)
		);

		// Home Slider Type
		$wp_customize->add_setting( 'scrollme_slider_type', array( 'default' => 'default', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
	        'scrollme_slider_type',
	        array(
				'label' => __( 'Slider Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_section_section_home',
				'choices' => array(
					'default' => __( 'Default', 'scrollme-pro' ),
					'revolution' => __( 'Revolution', 'scrollme-pro' )
				),
			)
		);

		// Scrollme Slider Category
		$wp_customize->add_setting( 'scrollme_slider_category', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control( new WP_Customize_Select_Single_Cat_Control( $wp_customize, 'scrollme_slider_category', array(
					'label' => __( 'Choose Category for Slider', 'scrollme-pro' ),
					'section' => 'scrollme_section_section_home',
					'settings' => 'scrollme_slider_category',
					'active_callback' => 'scrollme_home_slider_type_def',
				)

			)
		);

		// Slider Speed
		$wp_customize->add_setting( 'scrollme_slider_speed', array( 'default' => '500', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_slider_speed',
			array(
				'label'	=> __( 'Slider Speed', 'scrollme-pro' ),
				'type' => 'text',
				'settings' => 'scrollme_slider_speed',
				'section' => 'scrollme_section_section_home',
				'active_callback' => 'scrollme_home_slider_type_def',
			)
		);

		// Slider Pause
		$wp_customize->add_setting( 'scrollme_slider_pause',array( 'default' => '4000', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint'));
		$wp_customize->add_control(
			'scrollme_slider_pause',
			array(
				'label'	=> __( 'Slider Pause', 'scrollme-pro' ),
				'type' => 'text',
				'settings' => 'scrollme_slider_pause',
				'section' => 'scrollme_section_section_home',
				'active_callback' => 'scrollme_home_slider_type_def',
			)
		);

		// Slider Caption
		$wp_customize->add_setting( 'scrollme_slider_caption', array( 'default' => 'yes', 'sanitize_callback' => 'scrollme_sanitize_slider_settings'));
		$wp_customize->add_control(
			'scrollme_slider_caption',
			array(
				'label' => __( 'Show Slider Caption', 'scrollme-pro' ),
				'type' => 'radio',
				'settings' => 'scrollme_slider_caption',
				'section' => 'scrollme_section_section_home',
				'priority' => 20,
				'choices' => array(
					'yes' => __( 'Yes', 'scrollme-pro' ),
					'no' => __( 'No', 'scrollme-pro' )
				),
				'active_callback' => 'scrollme_home_slider_type_def',
			)
		);

		// Revolution Slider Shortcode
		$wp_customize->add_setting( 'scrollme_slider_shortcode', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_slider_shortcode',
			array(
				'label'	=> __( 'Slider Shortcode', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_section_section_home',
				'active_callback' => 'scrollme_home_slider_type_rev',
			)
		);

		/* Reorder Scroll Section */
		$wp_customize->add_section(
			'scrollme_section_reorder',
			array(
				'title' => __('Reorder Scroll Section', 'scrollme-pro' ),
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section Reorder Control
		$wp_customize->add_setting( 'scrollme_section_order', array( 'sanitize_callback' => 'sanitize_text_field' ));
        $wp_customize->add_control( new WP_Customize_Section_ReOrder( $wp_customize, 
        	'scrollme_section_order',array(
    				'label' => __( 'Rorder Sections', 'scrollme-pro' ),
    				'section' => 'scrollme_section_reorder',
    				'priority' => 9,
    				'settings' => 'scrollme_section_order',
    				'choices' => array(
	                    1 => __('Section 1', 'scrollme-pro'),
	                    2 => __('Section 2', 'scrollme-pro'),
	                    3 => __('Section 3', 'scrollme-pro'),
	                    4 => __('Section 4', 'scrollme-pro'),
	                    5 => __('Section 5', 'scrollme-pro'),
	                    6 => __('Section 6', 'scrollme-pro'),
                    	7 => __('Section 7', 'scrollme-pro'),
                    	8 => __('Section 8', 'scrollme-pro'),
                    	9 => __('Section 9', 'scrollme-pro'),
                    	10 => __('Section 10', 'scrollme-pro'),
	                ),
	                'description' => __('Drag and drop to reorder the home page sections to appear.', 'scrollme-pro')
    			)
    		)
    	);

		/* Section 1 */
		$wp_customize->add_section(
			'scrollme_sec_1',
			array(
				'title' => __('Scroll Section 1', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 1 Disable
		$wp_customize->add_setting( 'scrollme_section_1_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_1_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_1',
				'settings' => 'scrollme_section_1_disable'
			)
		);

		// Section 1 ID
		$wp_customize->add_setting( 'scrollme_section_1', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_1',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_1',
				'settings' => 'scrollme_section_1'
			)
		);

		// Section 1 Display type
	    $wp_customize->add_setting( 'scrollme_section_1_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_1_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_1',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 1 Page
		$wp_customize->add_setting( 'scrollme_section_page_1', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_1',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_1',
				'settings' => 'scrollme_section_page_1',
	            'active_callback' => 'scrollme_section1_pg_layout',
			)
		);
	    
	    // Section 1 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout1', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout1',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_1',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section1_pr_layout',
			)
		);

		// Section 1 Background Color
		$wp_customize->add_setting( 'scrollme_section1_bg_color', array( 'default' => '#f9f9f9', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section1_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_1',
                'settings'   => 'scrollme_section1_bg_color',
            )) 
        );

        // Section 1 Background Image
    	$wp_customize->add_setting( 'scrollme_section1_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section1_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_1',
    				'settings' => 'scrollme_section1_bg_image',
    			)
    		)
    	);

		/* Section 2 */
		$wp_customize->add_section(
			'scrollme_sec_2',
			array(
				'title' => __('Scroll Section 2', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 2 Disable
		$wp_customize->add_setting( 'scrollme_section_2_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_2_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_2',
				'settings' => 'scrollme_section_2_disable'
			)
		);

		// Section 2 ID
		$wp_customize->add_setting( 'scrollme_section_2', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_2',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_2',
				'settings' => 'scrollme_section_2'
			)
		);
	    
	    // Section 2 Display Type
	    $wp_customize->add_setting( 'scrollme_section_2_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_2_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_2',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 2 Page
		$wp_customize->add_setting( 'scrollme_section_page_2', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_2',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_2',
				'settings' => 'scrollme_section_page_2',
	            'active_callback' => 'scrollme_section2_pg_layout',
			)
		);
	    
	    // Section 2 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout2', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout2',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_2',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section2_pr_layout',
			)
		);

		// Section 2 Background Color
		$wp_customize->add_setting( 'scrollme_section2_bg_color', array( 'default' => '#F6F6F6', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section2_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_2',
                'settings'   => 'scrollme_section2_bg_color',
            )) 
        );

        // Section 2 Background Image
    	$wp_customize->add_setting( 'scrollme_section2_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section2_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_2',
    				'settings' => 'scrollme_section2_bg_image',
    			)
    		)
    	);

		/* Section 3 */
		$wp_customize->add_section(
			'scrollme_sec_3',
			array(
				'title' => __('Scroll Section 3', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 3 Disable
		$wp_customize->add_setting( 'scrollme_section_3_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_3_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_3',
				'settings' => 'scrollme_section_3_disable'
			)
		);

		// Section 3 ID
		$wp_customize->add_setting( 'scrollme_section_3', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_3',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_3',
				'settings' => 'scrollme_section_3'
			)
		);
	    
	    // Section 3 Display Type
	    $wp_customize->add_setting( 'scrollme_section_3_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_3_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_3',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 3 Page
		$wp_customize->add_setting( 'scrollme_section_page_3', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_3',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_3',
				'settings' => 'scrollme_section_page_3',
	            'active_callback' => 'scrollme_section3_pg_layout',
			)
		);
	    
	    // Section 3 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout3', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout3',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_3',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section3_pr_layout',
			)
		);

		// Section 3 Background Color
		$wp_customize->add_setting( 'scrollme_section3_bg_color', array( 'default' => '#F6F6F6', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section3_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_3',
                'settings'   => 'scrollme_section3_bg_color',
            )) 
        );

        // Section 3 Background Image
    	$wp_customize->add_setting( 'scrollme_section3_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section3_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_3',
    				'settings' => 'scrollme_section3_bg_image',
    			)
    		)
    	);

		/* Section 4 */
		$wp_customize->add_section(
			'scrollme_sec_4',
			array(
				'title' => __('Scroll Section 4', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 4 Disable
		$wp_customize->add_setting( 'scrollme_section_4_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_4_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_4',
				'settings' => 'scrollme_section_4_disable'
			)
		);

		// Section 4 ID
		$wp_customize->add_setting( 'scrollme_section_4', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_4',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_4',
				'settings' => 'scrollme_section_4'
			)
		);
	    
	    // Section 4 Display Type
	    $wp_customize->add_setting( 'scrollme_section_4_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_4_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_4',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 4 Page
		$wp_customize->add_setting( 'scrollme_section_page_4', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_4',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_4',
				'settings' => 'scrollme_section_page_4',
	            'active_callback' => 'scrollme_section4_pg_layout',
			)
		);
	    
	    // Section 4 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout4', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout4',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_4',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section4_pr_layout',
			)
		);

		// Section 4 Background Color
		$wp_customize->add_setting( 'scrollme_section4_bg_color', array( 'default' => '#F6F6F6', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section4_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_4',
                'settings'   => 'scrollme_section4_bg_color',
            )) 
        );

        // Section 4 Background Image
    	$wp_customize->add_setting( 'scrollme_section4_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section4_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_4',
    				'settings' => 'scrollme_section4_bg_image',
    			)
    		)
    	);

		/* Section 5 */
		$wp_customize->add_section(
			'scrollme_sec_5',
			array(
				'title' => __('Scroll Section 5', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 5 Disable
		$wp_customize->add_setting( 'scrollme_section_5_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_5_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_5',
				'settings' => 'scrollme_section_5_disable'
			)
		);

		// Section 5 ID
		$wp_customize->add_setting( 'scrollme_section_5', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_5',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_5',
				'settings' => 'scrollme_section_5'
			)
		);
	    
	    // Section 5 Display Type
	    $wp_customize->add_setting( 'scrollme_section_5_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_5_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_5',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 5 Page
		$wp_customize->add_setting( 'scrollme_section_page_5', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_5',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_5',
				'settings' => 'scrollme_section_page_5',
	            'active_callback' => 'scrollme_section5_pg_layout',
			)
		);
	    
	    // Section 5 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout5', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout5',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_5',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section5_pr_layout',
			)
		);

		// Section 5 Background Color
		$wp_customize->add_setting( 'scrollme_section5_bg_color', array( 'default' => '#F6F6F6', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section5_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_5',
                'settings'   => 'scrollme_section5_bg_color',
            )) 
        );

        // Section 5 Background Image
    	$wp_customize->add_setting( 'scrollme_section5_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section5_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_5',
    				'settings' => 'scrollme_section5_bg_image',
    			)
    		)
    	);

		/* Section 6 */
		$wp_customize->add_section(
			'scrollme_sec_6',
			array(
				'title' => __('Scroll Section 6', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 6 Disable
		$wp_customize->add_setting( 'scrollme_section_6_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_6_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_6',
				'settings' => 'scrollme_section_6_disable'
			)
		);

		// Section 6 ID
		$wp_customize->add_setting( 'scrollme_section_6', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_6',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_6',
				'settings' => 'scrollme_section_6'
			)
		);
	    
	    // Section 6 Display Type
	    $wp_customize->add_setting( 'scrollme_section_6_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_6_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_6',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 6 Page
		$wp_customize->add_setting( 'scrollme_section_page_6', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_6',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_6',
				'settings' => 'scrollme_section_page_6',
	            'active_callback' => 'scrollme_section6_pg_layout',
			)
		);
	    
	    // Section 6 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout6', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout6',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_6',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section6_pr_layout',
			)
		);

		// Section 6 Background Color
		$wp_customize->add_setting( 'scrollme_section6_bg_color', array( 'default' => '#F6F6F6', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section6_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_6',
                'settings'   => 'scrollme_section6_bg_color',
            )) 
        );

        // Section 6 Background Image
    	$wp_customize->add_setting( 'scrollme_section6_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section6_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_6',
    				'settings' => 'scrollme_section6_bg_image',
    			)
    		)
    	);
	    
	    /* Section 7 */
		$wp_customize->add_section(
			'scrollme_sec_7',
			array(
				'title' => __('Scroll Section 7', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 7 Disable
		$wp_customize->add_setting( 'scrollme_section_7_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_7_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_7',
				'settings' => 'scrollme_section_7_disable'
			)
		);

		// Section 7 ID
		$wp_customize->add_setting( 'scrollme_section_7', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_7',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_7',
			)
		);
	    
	    // Section 7 Display Type
	    $wp_customize->add_setting( 'scrollme_section_7_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_7_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_7',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 7 Page
		$wp_customize->add_setting( 'scrollme_section_page_7', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_7',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_7',
				'settings' => 'scrollme_section_page_7',
	            'active_callback' => 'scrollme_section7_pg_layout',
			)
		);
	    
	    // Section 7 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout7', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout7',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_7',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section7_pr_layout',
			)
		);

		// Section 7 Background Color
		$wp_customize->add_setting( 'scrollme_section7_bg_color', array( 'default' => '#F7F7F7', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section7_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_7',
                'settings'   => 'scrollme_section7_bg_color',
            )) 
        );

        // Section 7 Background Image
    	$wp_customize->add_setting( 'scrollme_section7_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section7_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_7',
    				'settings' => 'scrollme_section7_bg_image',
    			)
    		)
    	);

		/* Section 8 */
		$wp_customize->add_section(
			'scrollme_sec_8',
			array(
				'title' => __('Scroll Section 8', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 8 Disable
		$wp_customize->add_setting( 'scrollme_section_8_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_8_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_8',
				'settings' => 'scrollme_section_8_disable'
			)
		);

		// Section 8 ID
		$wp_customize->add_setting( 'scrollme_section_8', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_8',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_8',
			)
		);
	    
	    // Section 8 Display Type
	    $wp_customize->add_setting( 'scrollme_section_8_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_8_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_8',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 8 Page
		$wp_customize->add_setting( 'scrollme_section_page_8', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_8',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_8',
				'settings' => 'scrollme_section_page_8',
	            'active_callback' => 'scrollme_section8_pg_layout',
			)
		);
	    
	    // Section 8 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout8', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout8',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_8',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section8_pr_layout',
			)
		);

		// Section 8 Background Color
		$wp_customize->add_setting( 'scrollme_section8_bg_color', array( 'default' => '#F8F8F8', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section8_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_8',
                'settings'   => 'scrollme_section8_bg_color',
            )) 
        );

        // Section 8 Background Image
    	$wp_customize->add_setting( 'scrollme_section8_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section8_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_8',
    				'settings' => 'scrollme_section8_bg_image',
    			)
    		)
    	);

		/* Section 9 */
		$wp_customize->add_section(
			'scrollme_sec_9',
			array(
				'title' => __('Scroll Section 9', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 9 Disable
		$wp_customize->add_setting( 'scrollme_section_9_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_9_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_9',
				'settings' => 'scrollme_section_9_disable'
			)
		);

		// Section 9 ID
		$wp_customize->add_setting( 'scrollme_section_9', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_9',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_9',
			)
		);
	    
	    // Section 9 Display Type
	    $wp_customize->add_setting( 'scrollme_section_9_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_9_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_9',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 9 Page
		$wp_customize->add_setting( 'scrollme_section_page_9', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_9',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_9',
				'settings' => 'scrollme_section_page_9',
	            'active_callback' => 'scrollme_section9_pg_layout',
			)
		);
	    
	    // Section 9 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout9', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout9',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_9',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section9_pr_layout',
			)
		);

		// Section 9 Background Color
		$wp_customize->add_setting( 'scrollme_section9_bg_color', array( 'default' => '#F9F9F9', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section9_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_9',
                'settings'   => 'scrollme_section9_bg_color',
            )) 
        );

        // Section 9 Background Image
    	$wp_customize->add_setting( 'scrollme_section9_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section9_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_9',
    				'settings' => 'scrollme_section9_bg_image',
    			)
    		)
    	);

		/* Section 10 */
		$wp_customize->add_section(
			'scrollme_sec_10',
			array(
				'title' => __('Scroll Section 10', 'scrollme-pro' ),
				'priority' => 10,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_scroll_page_settings'
			)
		);

		// Section 10 Disable
		$wp_customize->add_setting( 'scrollme_section_10_disable', array( 'default' => 0, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_section_10_disable',
			array(
				'label'	=> __( 'Disable Section', 'scrollme-pro' ),
				'type' => 'checkbox',
				'section' => 'scrollme_sec_10',
				'settings' => 'scrollme_section_10_disable'
			)
		);

		// Section 10 ID
		$wp_customize->add_setting( 'scrollme_section_10', array( 'default' => '', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_title_with_dashes' ));
		$wp_customize->add_control(
			'scrollme_section_10',
			array(
				'label'	=> __( 'ID for Navigation', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_sec_10',
			)
		);
	    
	    // Section 10 Display Type
	    $wp_customize->add_setting( 'scrollme_section_10_type', array( 'default' => 'page', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_10_type',
			array(
				'label'	=> __( 'Display Type', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_10',
				'choices' => array(
	                'page' => __('Page Layout', 'scrollme-pro'),
	                'prlayout' => __('Predefined Layout', 'scrollme-pro'),
	            )
			)
		);

		// Section 10 Page
		$wp_customize->add_setting( 'scrollme_section_page_10', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_section_page_10',
			array(
				'label'	=> __( 'Choose a Page for Section', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_sec_10',
				'settings' => 'scrollme_section_page_10',
	            'active_callback' => 'scrollme_section10_pg_layout',
			)
		);
	    
	    // Section 10 Layout
	    $wp_customize->add_setting( 'scrollme_section_layout10', array( 'default' => 'services', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control(
			'scrollme_section_layout10',
			array(
				'label'	=> __( 'Layout', 'scrollme-pro' ),
				'type' => 'select',
				'section' => 'scrollme_sec_10',
	            'choices' => $pr_layout,
	            'active_callback' => 'scrollme_section10_pr_layout',
			)
		);

		// Section 10 Background Color
		$wp_customize->add_setting( 'scrollme_section10_bg_color', array( 'default' => '#F10F10F10', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_hex_color' ));
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'scrollme_section10_bg_color',
            array(
                'label'      => __( 'Background Color', 'mytheme' ),
                'section'    => 'scrollme_sec_10',
                'settings'   => 'scrollme_section10_bg_color',
            )) 
        );

        // Section 10 Background Image
    	$wp_customize->add_setting( 'scrollme_section10_bg_image', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        	'scrollme_section10_bg_image',array(
    				'label' => __( 'Background Image', 'scrollme-pro' ),
    				'section' => 'scrollme_sec_10',
    				'settings' => 'scrollme_section10_bg_image',
    			)
    		)
    	);
	}
	add_action( 'customize_register', 'scrollme_scrolls_cutomize_register' );