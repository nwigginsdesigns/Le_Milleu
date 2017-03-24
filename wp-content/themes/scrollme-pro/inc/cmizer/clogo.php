<?php
    /** ========== Client Logo Page Settings ========== **/
    
    function scrollme_clogo_cutomize_register( $wp_customize ) {        
        /**  Client Logo Page Configuration **/
        /** Client Logo Section **/
        $wp_customize->add_section(
            'clogo_section',
            array(
                'title' => __('Client Logo Page', 'scrollme-pro'),
                'description' => __('Configure Client Logo Page', 'scrollme-pro'),
                'priority' => 6,
            )
        );
        
        /** Client Logo Slug  **/
        $wp_customize->add_setting( 'clogo_slug' , array( 'default' => 'client-logos', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'clogo_slug', array(
            'label' => __('Client Logo Slug', 'scrollme-pro'),
            'type' => 'text',
            'section' => 'clogo_section',
        ));

        /** Client Logo Single Sidebar  **/
        $wp_customize->add_setting( 'clogo_single_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'clogo_single_sidebar', array(
            'label' => __('Single Page Sidebar', 'scrollme-pro'),
            'type' => 'select',
            'choices' => array(
                'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                ),
            'section' => 'clogo_section',
        ));
            
    }
    
    add_action( 'customize_register', 'scrollme_clogo_cutomize_register' );