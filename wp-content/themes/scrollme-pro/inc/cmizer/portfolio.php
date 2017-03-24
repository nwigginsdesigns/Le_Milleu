<?php
    /** ========== Portfolio Page Settings ========== **/
    
    function scrollme_portpage_cutomize_register( $wp_customize ) {       
        /** Portfolio Page Section **/
        $wp_customize->add_section(
            'portarch_section',
            array(
                'title' => __('Portfolio Page', 'scrollme-pro'),
                'description' => __('Configure Portfolio Page', 'scrollme-pro'),
                'priority' => 6,
            )
        );
        
        /** Portfolio Slug **/
        $wp_customize->add_setting( 'port_slug' , array( 'default' => 'portfolio', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'port_slug', array(
            'label' => __('Portfolio Slug', 'scrollme-pro'),
            'type' => 'text',
            'section' => 'portarch_section',
        ));

        /** Portfolio Single Sidebar  **/
        $wp_customize->add_setting( 'port_single_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'port_single_sidebar', array(
            'label' => __('Single Page Sidebar', 'scrollme-pro'),
            'type' => 'select',
            'choices' => array(
                'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                ),
            'section' => 'portarch_section',
        ));

        /** Portfolio Archve Sidebar Slug  **/
        /*
        $wp_customize->add_setting( 'port_arch_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'port_arch_sidebar', array(
            'label' => __('Archive Page Sidebar', 'scrollme-pro'),
            'type' => 'select',
            'choices' => array(
                'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                ),
            'section' => 'portarch_section',
        ));*/

        /** Portfolio Description Text (Portfolio Single Page)  **/
        $wp_customize->add_setting( 'port_descr_text' , array( 'default' => 'Project Description', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( 'port_descr_text', array(
            'label' => __('Description Text', 'scrollme-pro'),
            'type' => 'text',
            'description' => __('Set the Description Heading text in Portfolio Single Post page.', 'scrollme-pro'),
            'section' => 'portarch_section',
        ));

        /** Portfolio Details Text (Portfolio Single Page)  **/
        $wp_customize->add_setting( 'port_details_text' , array( 'default' => 'Project Details', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( 'port_details_text', array(
            'label' => __('Details Text', 'scrollme-pro'),
            'type' => 'text',
            'description' => __('Set the Details Heading text in Portfolio Single Post page.', 'scrollme-pro'),
            'section' => 'portarch_section',
        ));

        /** Disable Details Section  **/
        $wp_customize->add_setting( 'port_disable_details' , array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( 'port_disable_details', array(
            'label' => __('Disable Details Section', 'scrollme-pro'),
            'type' => 'checkbox',
            'description' => __('Check the option if you donot want to show details section of portfolio post page.', 'scrollme-pro'),
            'section' => 'portarch_section',
        ));
            
    }
    
    add_action( 'customize_register', 'scrollme_portpage_cutomize_register' );