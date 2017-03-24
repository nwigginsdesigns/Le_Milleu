<?php
    /** ========== Gallery Page Settings ========== **/
    
    function scrollme_galpage_cutomize_register( $wp_customize ) {        
        /**  Gallery Page Configuration **/
        /** Gallery Section **/
        $wp_customize->add_section(
            'galpg_section',
            array(
                'title' => __('Gallery Page', 'scrollme-pro'),
                'description' => __('Configure Gallery Page', 'scrollme-pro'),
                'priority' => 6,
            )
        );
        
        /** Gallery Slug  **/
        $wp_customize->add_setting( 'gal_slug' , array( 'default' => 'galleries', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'gal_slug', array(
            'label' => __('Gallery Slug', 'scrollme-pro'),
            'type' => 'text',
            'section' => 'galpg_section',
        ));

        /** Gallery Single Sidebar  **/
        $wp_customize->add_setting( 'gal_single_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'gal_single_sidebar', array(
            'label' => __('Single Page Sidebar', 'scrollme-pro'),
            'type' => 'select',
            'choices' => array(
                'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                ),
            'section' => 'galpg_section',
        ));

        /** Gallery Archve Sidebar Slug  **/
        $wp_customize->add_setting( 'gal_arch_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'gal_arch_sidebar', array(
            'label' => __('Archive Page Sidebar', 'scrollme-pro'),
            'type' => 'select',
            'choices' => array(
                'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                ),
            'section' => 'galpg_section',
        ));
            
    }
    
    add_action( 'customize_register', 'scrollme_galpage_cutomize_register' );