<?php
    /** ========== General Settings ========== **/
    
    /** Useful Variables **/
        $themeinfo = wp_get_theme();
        $txtdomain = $themeinfo->TextDomain;
        
    function scrollme_general_cutomize_register( $wp_customize ) {
        
        /** --- General Settings Panel --- **/
        $wp_customize->add_panel(
            'scrollme_panel_general_settings',
            array(
            	'title' => __( 'General Settings', 'scrollme-pro' ),
            	'priority' => 30
            )
        );
    
        /* General Section */
        $wp_customize->add_section(
            'scrollme_section_general',
            array(
                'title' => __( 'General', 'scrollme-pro' ),
                'priority' => 10,
                'panel' => 'scrollme_panel_general_settings'
            )
        );

        // Demo Import
        $wp_customize->add_setting( 'demo_import', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( new WP_Customize_Demo_Control( $wp_customize, 'demo_import', array(
            'label' => __( 'Import Demo', 'scrollme-pro' ),
            'section' => 'scrollme_section_general',
            'settings' => 'demo_import',
            'priority' => 1,
            )
        ) );
        
        // Preloader Enable/Disable
        $wp_customize->add_setting( 'scrollme_preloader', array( 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
        $wp_customize->add_control(
            'scrollme_preloader',
            array(
                'type' => 'checkbox',
                'label' => __( 'Disable Preloader', 'scrollme-pro' ),
                'section' => 'scrollme_section_general',
                'settings' => 'scrollme_preloader',
                'priority' => 1
            )
        );

        // Preloader Select
        $wp_customize->add_setting( 'preloader' , array( 'default' => 'default', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control(
           new WP_Customize_Preloader_Control(
               $wp_customize,
               'preloader',
               array(
                   'label'      => __( 'Preloader', 'scrollme-pro' ),
                   'section'    => 'scrollme_section_general',
                   'settings'   => 'preloader',
               )
           )
       );
            
        // Template Color
        $wp_customize->add_setting( 'template_color', array( 'default' => '#df2c45', 'sanitize_callback' => 'sanitize_hex_color'));
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 
            'template_color',
            array(
                'label'      => __( 'Template Color', 'scrollme-pro' ),
                'section'    => 'scrollme_section_general',
                'settings'   => 'template_color',
            )) 
        );

        /** Sections - Site Identity, Colors, Static Front Page **/
        $wp_customize->remove_section( 'header_image' );
        $wp_customize->remove_section( 'background_image' );
        $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
        $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
        $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
        
        $wp_customize->remove_section( 'title_tagline' );
        $wp_customize->remove_section( 'colors' );
        $wp_customize->remove_section( 'static_front_page' );
        
        /* Site Identity */
        $wp_customize->add_section(
            'title_tagline',
            array(
                'title'=>__('Site Identity', 'scrollme-pro'), 'panel' => 'scrollme_panel_general_settings'
            )
        );
        
        /* Colors */
        $wp_customize->add_section(
            'colors',
            array(
                'title'=>__('Colors', 'scrollme-pro'), 'panel' => 'scrollme_panel_general_settings'
            )
        );
        
        /* Static Front Page */
        $wp_customize->add_section(
            'static_front_page',
            array(
                'title'=>__('Static Front Page', 'scrollme-pro'), 'panel' => 'scrollme_panel_general_settings'
            )
        );
        
        /** Site Logo **/
    	$wp_customize->add_section(
    		'scrollme_log_favicon',
    		array(
    			'title' => __( 'Site Logo', 'scrollme-pro' ),
                'panel' => 'scrollme_panel_general_settings'
    		)
    	);
    
    	//Home Logo
    	$wp_customize->add_setting( 'scrollme_home_logo', array( 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'scrollme_home_logo',array(
    				'label' => __( 'Home Logo', 'scrollme-pro' ),
    				'section' => 'scrollme_log_favicon',
    				'settings' => 'scrollme_home_logo',
    				'priority' => 1
    			)
    		)
    	);
    
    	// Header Logo
    	$wp_customize->add_setting( 'scrollme_logo', array( 'sanitize_callback' => 'esc_url_raw' ));    
    	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'scrollme_logo', array(
    				'label' => __( 'Header Logo', 'scrollme-pro' ),
    				'section' => 'scrollme_log_favicon',
    				'settings' => 'scrollme_logo',
    				'priority' => 5
    			)
    
    		)
    
    	);

        // Social Links
        /*$wp_customize->add_section(
            'scrollme_social_links',
            array(
                'title' => __( 'Social Links', 'scrollme-pro' ),
                'priority' => 170
            )
        ); */

        // Social Icon Shortcode
        // Social Icons Help Info
        $wp_customize->add_setting( 'scrollme_sicon_info', array( 'sanitize_callback' => 'sanitize_text_field' ));
        $wp_customize->add_control( new WP_Customize_Help_Info_Control( $wp_customize, 'scrollme_sicon_info', array(
                'section' => 'scrollme_log_favicon',
                'settings' => 'scrollme_sicon_info',
                'input_attrs' => array(
                    'info' => '<p>Make Sure You have installed <a href="https://wordpress.org/plugins/accesspress-social-icons/" target="_blank">AccessPres Social Icons plugin</a>. Then create a social icon set.</p><p>Add the <span style="text-decoration: underline;">AccessPres Social Icons</span> widget to the <a href="'.admin_url('widgets.php').'" target="_blank" >Social Link (Header)</a> widget area and paste the google map iframe code there.</p>',
                )
            )
        ) );

        /* General Section */
        $wp_customize->add_section(
            'scrollme_section_footer',
            array(
                'title' => __( 'Footer', 'scrollme-pro' ),
                'panel' => 'scrollme_panel_general_settings'
            )
        );

        /* Footer Text */
        $wp_customize->add_setting( 'scrollme_footext', array( 'sanitize_callback' => 'wp_kses_post' ));
        $wp_customize->add_control(
            'scrollme_footext',
            array(
                'type' => 'textarea',
                'label' => __( 'Footer Text', 'scrollme-pro' ),
                'section' => 'scrollme_section_footer',
            )
        );
    }
    
    add_action( 'customize_register', 'scrollme_general_cutomize_register' );