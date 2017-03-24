<?php
    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    function scrollme_customize_preview_js() {
        wp_enqueue_script( 'scrollme_google_font_load', 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js', array( 'customize-preview' ), true );
        wp_enqueue_script( 'scrollme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
    }
    add_action( 'customize_preview_init', 'scrollme_customize_preview_js' );

    /**
     * Enqueue script for custom customize control.
     */
    function scrollme_custom_customize_enqueue() {
        wp_enqueue_style('scrollme-datepicker', get_template_directory_uri() . '/inc/admin/css/datepicker/jquery-ui.css');
        wp_enqueue_style('scrollme-customizer-custom-css', get_template_directory_uri() . '/inc/admin/css/custom-customizer-css.css');
        wp_enqueue_script( 'scrollme-custom-customize', get_template_directory_uri() . '/inc/admin/js/custom-customizer-js.js', array( 'jquery', 'customize-controls', 'jquery-ui-sortable', 'jquery-ui-datepicker' ), false );
    }
    add_action( 'customize_controls_enqueue_scripts', 'scrollme_custom_customize_enqueue' );

    /**
     * Additional Customizer Options
     */

    /** Customizer Extra Sanitization **/
    require get_template_directory() . '/inc/cmizer/sanitize.php';

    /** Customizer Active Callbacks **/
    require get_template_directory() . '/inc/cmizer/active-cbk.php';
    
    /** Add Blog Page Customizer Options **/
    require get_template_directory() . '/inc/cmizer/cmizer-extra-controls.php';
    
    /** Add General Customizer Options **/
    require get_template_directory() . '/inc/cmizer/general.php';

    /** Add Home Page Section Inner Settings Customizer Options **/
    require get_template_directory() . '/inc/cmizer/scrollsections.php';

    /** Add Home Page Section Inner Settings Customizer Options **/
    require get_template_directory() . '/inc/cmizer/homepage.php';
     
    /** Add Blog Page Customizer Options **/
    require get_template_directory() . '/inc/cmizer/blog.php';
    
    /** Add Portfolio Page Customizer Options **/
    require get_template_directory() . '/inc/cmizer/portfolio.php';

    /** Add Portfolio Page Customizer Options **/
    require get_template_directory() . '/inc/cmizer/team.php';

    /** Add Portfolio Page Customizer Options **/
    require get_template_directory() . '/inc/cmizer/clogo.php';

    /** Add Portfolio Page Customizer Options **/
    require get_template_directory() . '/inc/cmizer/testimonial.php';

    /** Add Portfolio Page Customizer Options **/
    require get_template_directory() . '/inc/cmizer/gallery.php';
    
    /** Add Typography Customizer Options **/
    require get_template_directory() . '/inc/cmizer/typography.php';

    /** Add Countdown Customizer Options **/
    require get_template_directory() . '/inc/cmizer/countdown.php';