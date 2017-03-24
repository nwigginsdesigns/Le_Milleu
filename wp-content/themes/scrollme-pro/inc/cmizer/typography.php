<?php
    /**
     * Typography Customizer
     */
    function scrollme_typography_cutomize_register( $wp_customize ) {        
        /** Stores Array of Google Fonts **/
        $scrl_fontlist = scrollme_get_font_font_lists();
        $scrl_fontweight = scrollme_get_font_weight_choices();
        $scrl_fontstyle = scrollme_get_font_style_choices();
        $scrl_fontsize = scrollme_get_font_size();
     
         /** Typography Panel **/
         $wp_customize->add_panel(
            'typography_panel',
            array(
                'title' => __('Typography Settings', 'scrollme-pro'),
                'description' => __('Change Font Settings', 'scrollme-pro'),
                'priority' => 950,
            )
         );
         
         /** ========== Body ============ **/
         
         /** Body Typography Section **/
             $wp_customize->add_section(
                'body_typography',
                array(
                    'title' => __('Body', 'scrollme-pro'),
                    'description' => __('Change Font Settings', 'scrollme-pro'),
                    'panel' => 'typography_panel'
                )
             );
         
        /** Body Settings **/
            $wp_customize->add_setting( 'body_font_family', array( 'default' => 'Open Sans',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', ) );
            $wp_customize->add_control( 'body_font_family', array(
                'label' => __('Font Family', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontlist,
                'section' => 'body_typography',
            ));
            
            $wp_customize->add_setting( 'body_font_weight', array( 'default' => '400',    'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'body_font_weight', array(
                'label' => __('Font Weight', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontweight,
                'section' => 'body_typography',
            ));
            
            $wp_customize->add_setting( 'body_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage',        ) );
            $wp_customize->add_control( 'body_font_style', array(
                'label' => __('Font Style', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontstyle,
                'section' => 'body_typography',
            ));
            
            $wp_customize->add_setting( 'body_font_size',   array( 'default' => '16',     'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'body_font_size', array(
                'label' => __('Font Size', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontsize,
                'section' => 'body_typography',
            ));
            
            $wp_customize->add_setting( 'body_font_color',   array( 'default' => '#000000',     'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'body_font_color', array(
                'label' => __('Font Color', 'one-paze'),
                'section' => 'body_typography',
                'settings' => 'body_font_color',
            )));
         
         
         /** ========== Heading 1 ============ **/
         
         /** Heading 1 Typography Section **/
             $wp_customize->add_section(
                'h1_typography',
                array(
                    'title' => __('Heading 1', 'scrollme-pro'),
                    'description' => __('Change Font Settings', 'scrollme-pro'),
                    'panel' => 'typography_panel'
                )
             );
         
        /** Heading 1 Settings **/
            $wp_customize->add_setting( 'h1_font_family', array( 'default' => 'Open Sans',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', ) );
            $wp_customize->add_control( 'h1_font_family', array(
                'label' => __('Font Family', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontlist,
                'section' => 'h1_typography',
            ));
            
            $wp_customize->add_setting( 'h1_font_weight', array( 'default' => '700',    'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h1_font_weight', array(
                'label' => __('Font Weight', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontweight,
                'section' => 'h1_typography',
            ));
            
            $wp_customize->add_setting( 'h1_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage',        ) );
            $wp_customize->add_control( 'h1_font_style', array(
                'label' => __('Font Style', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontstyle,
                'section' => 'h1_typography',
            ));
            
            $wp_customize->add_setting( 'h1_font_size',   array( 'default' => '32',     'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h1_font_size', array(
                'label' => __('Font Size', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontsize,
                'section' => 'h1_typography',
            ));
            
            $wp_customize->add_setting( 'h1_font_color',   array( 'default' => '#000000',     'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h1_font_color', array(
                'label' => __('Font Color', 'one-paze'),
                'section' => 'h1_typography',
                'settings' => 'h1_font_color',
            )));
            
        /** ========== Heading 2 ============ **/
         
         /** Heading 2 Typography Section **/
             $wp_customize->add_section(
                'h2_typography',
                array(
                    'title' => __('Heading 2', 'scrollme-pro'),
                    'description' => __('Change Font Settings', 'scrollme-pro'),
                    'panel' => 'typography_panel'
                )
             );
         
        /** Heading 2 Settings **/
            $wp_customize->add_setting( 'h2_font_family', array( 'default' => 'Open Sans',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', ) );
            $wp_customize->add_control( 'h2_font_family', array(
                'label' => __('Font Family', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontlist,
                'section' => 'h2_typography',
            ));
            
            $wp_customize->add_setting( 'h2_font_weight', array( 'default' => '700',    'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h2_font_weight', array(
                'label' => __('Font Weight', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontweight,
                'section' => 'h2_typography',
            ));
            
            $wp_customize->add_setting( 'h2_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage',        ) );
            $wp_customize->add_control( 'h2_font_style', array(
                'label' => __('Font Style', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontstyle,
                'section' => 'h2_typography',
            ));
            
            $wp_customize->add_setting( 'h2_font_size',   array( 'default' => '30',     'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h2_font_size', array(
                'label' => __('Font Size', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontsize,
                'section' => 'h2_typography',
            ));
            
            $wp_customize->add_setting( 'h2_font_color',   array( 'default' => '#000000',     'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h2_font_color', array(
                'label' => __('Font Color', 'one-paze'),
                'section' => 'h2_typography',
                'settings' => 'h2_font_color',
            )));
            
        /** ========== Heading 3 ============ **/
         
         /** Heading 3 Typography Section **/
             $wp_customize->add_section(
                'h3_typography',
                array(
                    'title' => __('Heading 3', 'scrollme-pro'),
                    'description' => __('Change Font Settings', 'scrollme-pro'),
                    'panel' => 'typography_panel'
                )
             );
         
        /** Heading 3 Settings **/
            $wp_customize->add_setting( 'h3_font_family', array( 'default' => 'Open Sans',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', ) );
            $wp_customize->add_control( 'h3_font_family', array(
                'label' => __('Font Family', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontlist,
                'section' => 'h3_typography',
            ));
            
            $wp_customize->add_setting( 'h3_font_weight', array( 'default' => '700',    'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h3_font_weight', array(
                'label' => __('Font Weight', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontweight,
                'section' => 'h3_typography',
            ));
            
            $wp_customize->add_setting( 'h3_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage',        ) );
            $wp_customize->add_control( 'h3_font_style', array(
                'label' => __('Font Style', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontstyle,
                'section' => 'h3_typography',
            ));
            
            $wp_customize->add_setting( 'h3_font_size',   array( 'default' => '28',     'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h3_font_size', array(
                'label' => __('Font Size', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontsize,
                'section' => 'h3_typography',
            ));
            
            $wp_customize->add_setting( 'h3_font_color',   array( 'default' => '#000000',     'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h3_font_color', array(
                'label' => __('Font Color', 'one-paze'),
                'section' => 'h3_typography',
                'settings' => 'h3_font_color',
            )));
            
        /** ========== Heading 4 ============ **/
         
         /** Heading 4 Typography Section **/
             $wp_customize->add_section(
                'h4_typography',
                array(
                    'title' => __('Heading 4', 'scrollme-pro'),
                    'description' => __('Change Font Settings', 'scrollme-pro'),
                    'panel' => 'typography_panel'
                )
             );
         
        /** Heading 4 Settings **/
            $wp_customize->add_setting( 'h4_font_family', array( 'default' => 'Open Sans',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', ) );
            $wp_customize->add_control( 'h4_font_family', array(
                'label' => __('Font Family', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontlist,
                'section' => 'h4_typography',
            ));
            
            $wp_customize->add_setting( 'h4_font_weight', array( 'default' => '700',    'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h4_font_weight', array(
                'label' => __('Font Weight', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontweight,
                'section' => 'h4_typography',
            ));
            
            $wp_customize->add_setting( 'h4_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage',        ) );
            $wp_customize->add_control( 'h4_font_style', array(
                'label' => __('Font Style', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontstyle,
                'section' => 'h4_typography',
            ));
            
            $wp_customize->add_setting( 'h4_font_size',   array( 'default' => '26',     'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h4_font_size', array(
                'label' => __('Font Size', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontsize,
                'section' => 'h4_typography',
            ));
            
            $wp_customize->add_setting( 'h4_font_color',   array( 'default' => '#000000',     'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h4_font_color', array(
                'label' => __('Font Color', 'one-paze'),
                'section' => 'h4_typography',
                'settings' => 'h4_font_color',
            )));
        
        /** ========== Heading 5 ============ **/
         
         /** Heading 5 Typography Section **/
             $wp_customize->add_section(
                'h5_typography',
                array(
                    'title' => __('Heading 5', 'scrollme-pro'),
                    'description' => __('Change Font Settings', 'scrollme-pro'),
                    'panel' => 'typography_panel'
                )
             );
         
        /** Heading 5 Settings **/
            $wp_customize->add_setting( 'h5_font_family', array( 'default' => 'Open Sans',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', ) );
            $wp_customize->add_control( 'h5_font_family', array(
                'label' => __('Font Family', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontlist,
                'section' => 'h5_typography',
            ));
            
            $wp_customize->add_setting( 'h5_font_weight', array( 'default' => '700',    'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h5_font_weight', array(
                'label' => __('Font Weight', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontweight,
                'section' => 'h5_typography',
            ));
            
            $wp_customize->add_setting( 'h5_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage',        ) );
            $wp_customize->add_control( 'h5_font_style', array(
                'label' => __('Font Style', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontstyle,
                'section' => 'h5_typography',
            ));
            
            $wp_customize->add_setting( 'h5_font_size',   array( 'default' => '24',     'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h5_font_size', array(
                'label' => __('Font Size', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontsize,
                'section' => 'h5_typography',
            ));
            
            $wp_customize->add_setting( 'h5_font_color',   array( 'default' => '#000000',     'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h5_font_color', array(
                'label' => __('Font Color', 'one-paze'),
                'section' => 'h5_typography',
                'settings' => 'h5_font_color',
            )));
            
        /** ========== Heading 6 ============ **/
         
         /** Heading 6 Typography Section **/
             $wp_customize->add_section(
                'h6_typography',
                array(
                    'title' => __('Heading 6', 'scrollme-pro'),
                    'description' => __('Change Font Settings', 'scrollme-pro'),
                    'panel' => 'typography_panel'
                )
             );
         
        /** Heading 6 Settings **/
            $wp_customize->add_setting( 'h6_font_family', array( 'default' => 'Open Sans',  'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage', ) );
            $wp_customize->add_control( 'h6_font_family', array(
                'label' => __('Font Family', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontlist,
                'section' => 'h6_typography',
            ));
            
            $wp_customize->add_setting( 'h6_font_weight', array( 'default' => '700',    'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h6_font_weight', array(
                'label' => __('Font Weight', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontweight,
                'section' => 'h6_typography',
            ));
            
            $wp_customize->add_setting( 'h6_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key', 'transport' => 'postMessage',        ) );
            $wp_customize->add_control( 'h6_font_style', array(
                'label' => __('Font Style', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontstyle,
                'section' => 'h6_typography',
            ));
            
            $wp_customize->add_setting( 'h6_font_size',   array( 'default' => '22',     'sanitize_callback' => 'absint', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( 'h6_font_size', array(
                'label' => __('Font Size', 'scrollme-pro'),
                'type' => 'select',
                'choices' => $scrl_fontsize,
                'section' => 'h6_typography',
            ));
            
            $wp_customize->add_setting( 'h6_font_color',   array( 'default' => '#000000',     'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage',              ) );
            $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'h6_font_color', array(
                'label' => __('Font Color', 'one-paze'),
                'section' => 'h6_typography',
                'settings' => 'h6_font_color',
            )));
    }
    
    add_action( 'customize_register', 'scrollme_typography_cutomize_register' );