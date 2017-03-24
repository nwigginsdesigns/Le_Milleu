<?php
    /** ========== General Settings ========== **/        
    function scrollme_countdown_cutomize_register( $wp_customize ) {    
        /* Countdown Section */
        $wp_customize->add_section(
            'scrollme_section_ctdown',
            array(
                'title' => __( 'Countdown Page', 'scrollme-pro' ),
                'priority' => 1000,
            )
        );

        // Enable/Disable Countdown Page
        $wp_customize->add_setting( 'scrollme_enable_ctdown_page', array( 'default' => '', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
        $wp_customize->add_control(
            'scrollme_enable_ctdown_page',
            array(
                'type' => 'checkbox',
                'label' => __( 'Enable Countdown Page', 'scrollme-pro' ),
                'section' => 'scrollme_section_ctdown',
                'description' => __( 'Check the option to enable the countdown page else leave it unchecked', 'scrollme-pro'),
            )
        );

        // Countdown Logo
        $wp_customize->add_setting( 'scrollme_ctdown_logo', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ));
        $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'scrollme_ctdown_logo',array(
                    'label' => __( 'Countdown Logo', 'scrollme-pro' ),
                    'section' => 'scrollme_section_ctdown',
                )
            )
        );
        
        // Disable Countdown Social Icons Widget
        $wp_customize->add_setting( 'scrollme_disable_ctdown_widget', array( 'default' => '', 'sanitize_callback' => 'scrollme_sanitize_checkbox' ));
        $wp_customize->add_control(
            'scrollme_disable_ctdown_widget',
            array(
                'type' => 'checkbox',
                'label' => __( 'Disable Social Icon Widget', 'scrollme-pro' ),
                'section' => 'scrollme_section_ctdown',
                'description' => __( 'Check the option to disable the countdown social icon widget section', 'scrollme-pro'),
            )
        );

        // Countdown Description
        $wp_customize->add_setting( 'scrollme_ctdown_descr', array( 'default' => '', 'sanitize_callback' => 'wp_kses_post' ));
        $wp_customize->add_control(
            'scrollme_ctdown_descr',
            array(
                'type' => 'textarea',
                'label' => __( 'Countdown Text', 'scrollme-pro' ),
                'section' => 'scrollme_section_ctdown',
                'description' => __( 'Add the description for the Countdown Page', 'scrollme-pro'),
            )
        );

        // Day Text
        $wp_customize->add_setting( 'scrollme_ctdown_day_txt', array( 'default' => 'Days', 'sanitize_callback' => 'sanitize_text_field' ));
        $wp_customize->add_control(
            'scrollme_ctdown_day_txt',
            array(
                'type' => 'text',
                'label' => __( 'Day Text', 'scrollme-pro' ),
                'section' => 'scrollme_section_ctdown',
            )
        );

        // Hour Text
        $wp_customize->add_setting( 'scrollme_ctdown_hour_txt', array( 'default' => 'Hour', 'sanitize_callback' => 'sanitize_text_field' ));
        $wp_customize->add_control(
            'scrollme_ctdown_hour_txt',
            array(
                'type' => 'text',
                'label' => __( 'Hour Text', 'scrollme-pro' ),
                'section' => 'scrollme_section_ctdown',
            )
        );

        // Hour Text
        $wp_customize->add_setting( 'scrollme_ctdown_min_txt', array( 'default' => 'Minutes', 'sanitize_callback' => 'sanitize_text_field' ));
        $wp_customize->add_control(
            'scrollme_ctdown_min_txt',
            array(
                'type' => 'text',
                'label' => __( 'Minutes Text', 'scrollme-pro' ),
                'section' => 'scrollme_section_ctdown',
            )
        );

        // Hour Text
        $wp_customize->add_setting( 'scrollme_ctdown_sec_txt', array( 'default' => 'Seconds', 'sanitize_callback' => 'sanitize_text_field' ));
        $wp_customize->add_control(
            'scrollme_ctdown_sec_txt',
            array(
                'type' => 'text',
                'label' => __( 'Seconds Text', 'scrollme-pro' ),
                'section' => 'scrollme_section_ctdown',
            )
        );

        // Countdown Date
        $wp_customize->add_setting( 'scrollme_ctdown_date', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ));
        $wp_customize->add_control( new WP_Customize_Datepick_Control(
            $wp_customize,
            'scrollme_ctdown_date',
            array(
                'label'      => __( 'Countdown Date', 'scrollme-pro' ),
                'section'    => 'scrollme_section_ctdown',
                'settings'   => 'scrollme_ctdown_date',
                'description' => __( 'Set the Date for the Countdown Page', 'scrollme-pro' )
            )
        ));
    }
    
    add_action( 'customize_register', 'scrollme_countdown_cutomize_register' );