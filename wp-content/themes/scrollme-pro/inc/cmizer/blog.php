<?php
    /** ========== Blog Page Settings ========== **/
    
    function scrollme_blogpage_cutomize_register( $wp_customize ) {               
        /** ========== Blog Page ============ **/
            /**  Blog Page Section **/
            $wp_customize->add_section(
                'blogarch_section',
                array(
                    'title' => __('Blog Page', 'scrollme-pro'),
                    'description' => __('Configure Blog Page', 'scrollme-pro'),
                    'priority' => 6,
                )
            );
        
            /** Blog Page Settings **/
            /** Blog Exclude Category Control  **/
            $wp_customize->add_setting( 'blog_exclude_cat' , array( 'default' => 0, 'sanitize_callback' => 'sanitize_text_field') );
            $wp_customize->add_control( new WP_Customize_Select_Mul_Cat_Control(
                $wp_customize,
                'blog_exclude_cat',
                array(
                    'label'      => __( 'Exclude Category', 'scrollme-pro' ),
                    'section'    => 'blogarch_section',
                    'settings'   => 'blog_exclude_cat',
                )
            ));

            /** Blog Archve Sidebar Slug  **/
            $wp_customize->add_setting( 'blog_arch_sidebar' , array( 'default' => 'right_sidebar', 'sanitize_callback' => 'sanitize_title_with_dashes') );
            $wp_customize->add_control( 'blog_arch_sidebar', array(
                'label' => __('Archive Page Sidebar', 'scrollme-pro'),
                'type' => 'select',
                'choices' => array(
                    'right_sidebar' => __('Right Sidebar', 'scrollme-pro'),
                    'left_sidebar' => __('Left Sidebar', 'scrollme-pro'),
                    'no_sidebar' => __('No Sidebar', 'scrollme-pro'),
                    ),
                'section' => 'blogarch_section',
            ));
            
    }
    
    add_action( 'customize_register', 'scrollme_blogpage_cutomize_register' );