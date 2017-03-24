<?php
    /** ========== Team Page Settings ========== **/
    
    function scrollme_teampage_cutomize_register( $wp_customize ) {        
        /**  Team Page Configuration **/
        /** Team Section **/
        $wp_customize->add_section(
            'teampg_section',
            array(
                'title' => __('Team Page', 'scrollme-pro'),
                'description' => __('Configure Team Page', 'scrollme-pro'),
                'priority' => 6,
            )
        );
        
        /** Team Slug  **/
        $wp_customize->add_setting( 'team_slug' , array( 'default' => 'team', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'team_slug', array(
            'label' => __('Team Slug', 'scrollme-pro'),
            'type' => 'text',
            'section' => 'teampg_section',
        ));

        /** Team Single Sidebar  **/
        $wp_customize->add_setting( 'team_single_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'team_single_sidebar', array(
            'label' => __('Single Page Sidebar', 'scrollme-pro'),
            'type' => 'select',
            'choices' => array(
                'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                ),
            'section' => 'teampg_section',
        ));

        /** Team Archve Sidebar Slug  **/
        /*
        $wp_customize->add_setting( 'team_arch_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
        $wp_customize->add_control( 'team_arch_sidebar', array(
            'label' => __('Archive Page Sidebar', 'scrollme-pro'),
            'type' => 'select',
            'choices' => array(
                'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                ),
            'section' => 'teampg_section',
        ));*/

        /** Team Skills Heading  **/
        $wp_customize->add_setting( 'team_skill_heading' , array( 'default' => 'Skills', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( 'team_skill_heading', array(
            'label' => __('Archive Page Sidebar', 'scrollme-pro'),
            'type' => 'text',
            'section' => 'teampg_section',
        ));

        /** Team Skills Heading  **/
        $wp_customize->add_setting( 'team_skill_heading' , array( 'default' => 'Skills', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( 'team_skill_heading', array(
            'label' => __('Team Skill Text', 'scrollme-pro'),
            'type' => 'text',
            'description' => __('Set the Skill Heading text for skill section to be displayed in Team Single page', 'scrollme-pro'),
            'section' => 'teampg_section',
        ));

        /** Team About Me Text  **/
        $wp_customize->add_setting( 'team_aboutme_txt' , array( 'default' => 'About Me', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( 'team_aboutme_txt', array(
            'label' => __('Archive Page Sidebar', 'scrollme-pro'),
            'type' => 'text',
            'description' => __('Set the About Me text for Description Section to be displayed in Team Single page', 'scrollme-pro'),
            'section' => 'teampg_section',
        ));
            
    }
    
    add_action( 'customize_register', 'scrollme_teampage_cutomize_register' );