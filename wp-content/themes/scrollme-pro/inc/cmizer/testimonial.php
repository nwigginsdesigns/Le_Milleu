<?php
    /** ========== Testimonial Page Settings ========== **/
    
    function scrollme_testy_cutomize_register( $wp_customize ) {        
        /**  Client Logo Page Configuration **/
        /** Client Logo Section **/
        $wp_customize->add_section(
            'testy_section',
            array(
                'title' => __('Testimonial Page', 'scrollme-pro'),
                'description' => __('Configure Testimonial Page', 'scrollme-pro'),
                'priority' => 6,
            )
        );
        
        /** Client Logo Slug  **/
        $wp_customize->add_setting( 'testy_slug' , array( 'default' => 'testimonials', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'testy_slug', array(
            'label' => __('Testimonial Slug', 'scrollme-pro'),
            'type' => 'text',
            'section' => 'testy_section',
        ));

        /** Client Logo Single Sidebar  **/
        $wp_customize->add_setting( 'testy_single_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'testy_single_sidebar', array(
            'label' => __('Single Page Sidebar', 'scrollme-pro'),
            'type' => 'select',
            'choices' => array(
                'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                ),
            'section' => 'testy_section',
        ));
            
    }
    
    add_action( 'customize_register', 'scrollme_testy_cutomize_register' );