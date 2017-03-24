<?php
	/** ========== Home Sections Inner Settings ========== **/
	function scrollme_homepage_cutomize_register( $wp_customize ) {
		/** Front Page Setting Panel **/
        $wp_customize->add_panel(
            'scrollme_panel_frontpage_setting',
            array(
            	'title' => __( 'Front Page Setting', 'scrollme-pro' ),
            	'priority' => 30
            )
        );

		/** --- Service Settings Panel --- **/
		/** Service Section Settings **/
	    $wp_customize->add_section(
			'scrollme_service_settings',
			array(
				'title' => __('Service Settings', 'scrollme-pro' ),
				'priority' => 51,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_frontpage_setting'
			)
		);
	    
	    // Section Title
		$wp_customize->add_setting( 'scrollme_service_title', array( 'default' => 'Sample Title', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_allow_span' ));
		$wp_customize->add_control(
			'scrollme_service_title',
			array(
				'label'	=> __( 'Section Title', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_service_settings',
			)
		);

		// Service 1 Page
		$wp_customize->add_setting( 'scrollme_service_block_1_page', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_service_block_1_page',
			array(
				'label'	=> __( 'Service 1', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_service_settings',
			)
		);

		// Service 2 Page
		$wp_customize->add_setting( 'scrollme_service_block_2_page', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_service_block_2_page',
			array(
				'label'	=> __( 'Service 2', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_service_settings',
			)
		);

		// Service 3 Page
		$wp_customize->add_setting( 'scrollme_service_block_3_page', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_service_block_3_page',
			array(
				'label'	=> __( 'Service 3', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_service_settings',
			)
		);

		// Service 4 Page
		$wp_customize->add_setting( 'scrollme_service_block_4_page', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_service_block_4_page',
			array(
				'label'	=> __( 'Service 4', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_service_settings',
			)
		);

		/* Portfolio Section Inner Settings */
	    $wp_customize->add_section(
			'scrollme_portfolio_settings',
			array(
				'title' => __('Portfolio Settings', 'scrollme-pro' ),
				'priority' => 52,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_frontpage_setting'
			)
		);
	    
	    // Portfolio Section Title
	    $wp_customize->add_setting( 'scrollme_portfolio_title', array( 'default' => 'What we have done - <span>Our Works</span>', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_allow_span' ));
	    $wp_customize->add_control(
			'scrollme_portfolio_title',
			array(
				'label'	=> __( 'Section Title', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_portfolio_settings',
			)
		);
	    
	    /* Clients Section Inner Settings */
	    $wp_customize->add_section(
			'scrollme_clients_settings',
			array(
				'title' => __('Clients Settings', 'scrollme-pro' ),
				'priority' => 52,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_frontpage_setting',
			)
		);
	    
	    // Client Section Title
	    $wp_customize->add_setting( 'scrollme_client_title', array( 'default' => 'We Have Some - <span>Great Clients</span>', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_allow_span' ));
	    $wp_customize->add_control(
			'scrollme_client_title',
			array(
				'label'	=> __( 'Title Text', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_clients_settings',
			)
		);
	    
	    // Client Link to Inner Page
	    $wp_customize->add_setting( 'scrollme_linkto_inpage', array( 'default' => 1, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
		$wp_customize->add_control(
			'scrollme_linkto_inpage',
			array(
				'type' => 'checkbox',
				'label' => __( 'Link to Inner Page', 'scrollme-pro' ),
				'section' => 'scrollme_clients_settings',
			)
		);
	    
	    /* Contact Section Inner Settings */
	    $wp_customize->add_section(
			'scrollme_contact_settings',
			array(
				'title' => __('Contact Settings', 'scrollme-pro' ),
				'priority' => 52,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_frontpage_setting',
			)
		);
	    
	    // Contact Section Title
	    $wp_customize->add_setting( 'scrollme_contact_title', array( 'default' => "We'd Love to - <span>Hear From You</span>", 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_allow_span' ));
	    $wp_customize->add_control(
			'scrollme_contact_title',
			array(
				'label'	=> __( 'Title Text', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_contact_settings',
			)
		);
	    
	    // Contact Section Page
	    $wp_customize->add_setting( 'scrollme_contact_page', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'absint' ));
		$wp_customize->add_control(
			'scrollme_contact_page',
			array(
				'label'	=> __( 'Select Page', 'scrollme-pro' ),
				'type' => 'dropdown-pages',
				'section' => 'scrollme_contact_settings',
			)
		);
	    
	    // Contact Map Help Info
	    $wp_customize->add_setting( 'scrollme_map_info', array( 'sanitize_callback' => 'sanitize_text_field' ));
	    $wp_customize->add_control( new WP_Customize_Help_Info_Control( $wp_customize, 'scrollme_map_info', array(
	            'section' => 'scrollme_contact_settings',
	            'settings' => 'scrollme_map_info',
	            'input_attrs' => array(
	                'info' => '<p>Add the <span style="text-decoration: underline;">Text</span> widget to the <a href="'.admin_url('widgets.php').'" target="_blank" >Google Map</a> widget area and paste the google map iframe code there.</p>',
	            )
	        )
	    ) );
	    
	    /* Blog Section Inner Settings */
	    $wp_customize->add_section(
			'scrollme_blog_settings',
			array(
				'title' => __('Blog Settings', 'scrollme-pro' ),
				'priority' => 52,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_frontpage_setting',
			)
		);
	    
	    // Blog Section Title
	    $wp_customize->add_setting( 'scrollme_blog_title', array( 'default' => "Know - <span>What we are Upto</span>", 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_allow_span' ));
	    $wp_customize->add_control(
			'scrollme_blog_title',
			array(
				'label'	=> __( 'Title Text', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_blog_settings',
			)
		);

		// Blog Exclude Category
	    $wp_customize->add_setting( 'scrollme_blog_excat', array( 'default' => '0', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
		$wp_customize->add_control( new WP_Customize_Select_Mul_Cat_Control( $wp_customize,
	        'scrollme_blog_excat',
	        array(
					'label' => __( 'Exclude Categories', 'scrollme-pro' ),
					'section' => 'scrollme_blog_settings',
					'settings' => 'scrollme_blog_excat'
				)
			)
		);
	    
	    // Blog Section Readmore Text
	    $wp_customize->add_setting( 'scrollme_blog_readmore_txt', array( 'default' => "Read More", 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ));
	    $wp_customize->add_control(
			'scrollme_blog_readmore_txt',
			array(
				'label'	=> __( 'Readmore Text', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_blog_settings',
			)
		);

		/* Team Section Inner Settings */
	    $wp_customize->add_section(
			'scrollme_team_settings',
			array(
				'title' => __('Team Settings', 'scrollme-pro' ),
				'priority' => 52,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_frontpage_setting',
			)
		);
	    
	    // Team Section Title
	    $wp_customize->add_setting( 'scrollme_team_title', array( 'default' => "Our Team", 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_allow_span' ));
	    $wp_customize->add_control(
			'scrollme_team_title',
			array(
				'label'	=> __( 'Title Text', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_team_settings',
			)
		);

		/* Team Section Inner Settings */
	    $wp_customize->add_section(
			'scrollme_test_settings',
			array(
				'title' => __('Testimonial Settings', 'scrollme-pro' ),
				'priority' => 52,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_frontpage_setting',
			)
		);
	    
	    // Team Section Title
	    $wp_customize->add_setting( 'scrollme_test_title', array( 'default' => "What Our Clients Say", 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_allow_span' ));
	    $wp_customize->add_control(
			'scrollme_test_title',
			array(
				'label'	=> __( 'Title Text', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_test_settings',
			)
		);

		/* Gallery Section Inner Settings */
	    $wp_customize->add_section(
			'scrollme_gal_settings',
			array(
				'title' => __('Gallery Settings', 'scrollme-pro' ),
				'priority' => 52,
				'capability' => 'edit_theme_options',
				'panel' => 'scrollme_panel_frontpage_setting',
			)
		);
	    
	    // Team Section Title
	    $wp_customize->add_setting( 'scrollme_gal_title', array( 'default' => "", 'capability' => 'edit_theme_options', 'sanitize_callback' => 'scrollme_allow_span' ));
	    $wp_customize->add_control(
			'scrollme_gal_title',
			array(
				'label'	=> __( 'Title Text', 'scrollme-pro' ),
				'type' => 'text',
				'section' => 'scrollme_gal_settings',
			)
		);
	}
	add_action( 'customize_register', 'scrollme_homepage_cutomize_register' );