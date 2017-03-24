<?php
    /** Post Type - Portfolio/Projects **/    
    function scrollme_portfolio() {
        $labels = array(
            'name'               => _x( 'Portfolios', 'post type general name' , 'scrollme-pro'),
            'singular_name'      => _x( 'Portfolio', 'post type singular name' , 'scrollme-pro'),
            'add_new'            => _x( 'Add New', 'Portfolio' , 'scrollme-pro'),
            'add_new_item'       => __( 'Add New Portfolio' , 'scrollme-pro'),
            'edit_item'          => __( 'Edit Portfolio' , 'scrollme-pro' ),
            'new_item'           => __( 'New Portfolio' , 'scrollme-pro' ),
            'all_items'          => __( 'All Portfolio' , 'scrollme-pro' ),
            'view_item'          => __( 'View Portfolio' , 'scrollme-pro' ),
            'search_items'       => __( 'Search Portfolio' , 'scrollme-pro' ),
            'not_found'          => __( 'No Portfolio found' , 'scrollme-pro' ),
            'not_found_in_trash' => __( 'No Portfolio found in the Trash' , 'scrollme-pro' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Portfolios'
        );
        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our Portfolios and Portfolio specific data',
            'public'        => true,
            'exclude_from_search' => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
            'has_archive'   => true,
            'menu_icon' => 'dashicons-grid-view',
            'rewrite'   => array( 'slug' => sanitize_title_with_dashes(get_theme_mod('port_slug', 'portfolio') )),
        );
        register_post_type( 'portfolio', $args );
        flush_rewrite_rules();   
        
    }
    
    add_action( 'init', 'scrollme_portfolio' );
    
    /** Post Type - Team **/    
    function scrollme_team() {
        $labels = array(
            'name'               => _x( 'Teams', 'post type general name' , 'scrollme-pro'),
            'singular_name'      => _x( 'Team', 'post type singular name' , 'scrollme-pro'),
            'add_new'            => _x( 'Add New', 'Team Member' , 'scrollme-pro'),
            'add_new_item'       => __( 'Add New Team Member' , 'scrollme-pro'),
            'edit_item'          => __( 'Edit Team Member' , 'scrollme-pro' ),
            'new_item'           => __( 'New Team Member' , 'scrollme-pro' ),
            'all_items'          => __( 'All Teams' , 'scrollme-pro' ),
            'view_item'          => __( 'View Team Member' , 'scrollme-pro' ),
            'search_items'       => __( 'Search Team Member' , 'scrollme-pro' ),
            'not_found'          => __( 'No Team Member found' , 'scrollme-pro' ),
            'not_found_in_trash' => __( 'No Team Member found in the Trash' , 'scrollme-pro' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Teams'
        );
        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our Team Member and Team Member specific data',
            'public'        => true,
            'exclude_from_search' => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'thumbnail', 'editor' ),
            'has_archive'   => false,
            'menu_icon' => 'dashicons-admin-users',
            'rewrite'   => array( 'slug' => sanitize_title_with_dashes(get_theme_mod('team_slug', 'team') )),
        );
        register_post_type( 'team', $args );

        flush_rewrite_rules();  
    }
    
    add_action( 'init', 'scrollme_team' );
    
    /** Post Type - Clients Logo **/    
    function scrollme_client_logo() {
        $labels = array(
            'name'               => _x( 'Client Logos', 'post type general name' , 'scrollme-pro'),
            'singular_name'      => _x( 'Client Logo', 'post type singular name' , 'scrollme-pro'),
            'add_new'            => _x( 'Add New', 'Client Logo' , 'scrollme-pro'),
            'add_new_item'       => __( 'Add New Client Logo' , 'scrollme-pro'),
            'edit_item'          => __( 'Edit Client Logo' , 'scrollme-pro' ),
            'new_item'           => __( 'New Client Logo' , 'scrollme-pro' ),
            'all_items'          => __( 'All Client Logos' , 'scrollme-pro' ),
            'view_item'          => __( 'View Client Logo' , 'scrollme-pro' ),
            'search_items'       => __( 'Search Client Logo' , 'scrollme-pro' ),
            'not_found'          => __( 'No Client Logo found' , 'scrollme-pro' ),
            'not_found_in_trash' => __( 'No Client Logo found in the Trash' , 'scrollme-pro' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Client Logos',
            'set_featured_image' => __('Upload Clients Logo', 'scrollme-pro'),
            'featured_image'     => __('Client Logo', 'scrollme-pro'),
            'remove_featured_image' => __('Remove Client Logo', 'scrollme-pro'),
        );
        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our Client Logos and Client Logo specific data',
            'public'        => true,
            'exclude_from_search' => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'thumbnail', 'editor' ),
            'has_archive'   => false,
            'menu_icon' => 'dashicons-images-alt',
            'rewrite'   => array( 'slug' => sanitize_title_with_dashes(get_theme_mod('clogo_slug', 'client-logos') )),
        );
        register_post_type( 'client-logos', $args );
        flush_rewrite_rules();  
    }
    
    add_action( 'init', 'scrollme_client_logo' );

    /** Post Type - Gallery **/  
    function scrollme_gallery() {
        $labels = array(
            'name'               => _x( 'Galleries', 'post type general name' , 'scrollme-pro'),
            'singular_name'      => _x( 'Gallery', 'post type singular name' , 'scrollme-pro'),
            'add_new'            => _x( 'Add New', 'Gallery' , 'scrollme-pro'),
            'add_new_item'       => __( 'Add New Gallery Image' , 'scrollme-pro'),
            'edit_item'          => __( 'Edit Gallery Image' , 'scrollme-pro' ),
            'new_item'           => __( 'New Gallery Image' , 'scrollme-pro' ),
            'all_items'          => __( 'All Gallery Image' , 'scrollme-pro' ),
            'view_item'          => __( 'View Gallery Image' , 'scrollme-pro' ),
            'search_items'       => __( 'Search Gallery Image' , 'scrollme-pro' ),
            'not_found'          => __( 'No Gallery Image found' , 'scrollme-pro' ),
            'not_found_in_trash' => __( 'No Gallery Image found in the Trash' , 'scrollme-pro' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Gallery'
        );
        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our Gallery specific data',
            'public'        => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'thumbnail' ),
            'has_archive'   => true,
            'menu_icon' => 'dashicons-grid-view',
            'rewrite'   => array( 'slug' => sanitize_title_with_dashes(get_theme_mod('gal_slug', 'galleries') )),
        );
        register_post_type( 'galleries', $args );
        flush_rewrite_rules();
    }
    
    add_action( 'init', 'scrollme_gallery' );
    
    function scrollme_create_gallery_category() {
        $labels = array(
            'name'              => _x( 'Gallery Categories', 'taxonomy general name', 'scrollme-pro' ),
            'singular_name'     => _x( 'Gallery Category', 'taxonomy singular name', 'scrollme-pro' ),
            'search_items'      => __( 'Search Gallery Categories', 'scrollme-pro' ),
            'all_items'         => __( 'All Gallery Categories', 'scrollme-pro' ),            
            'parent_item'       => __( 'Parent Gallery Category', 'scrollme-pro' ),
            'parent_item_colon' => __( 'Parent Gallery Category:', 'scrollme-pro' ),
            'edit_item'         => __( 'Edit Gallery Category', 'scrollme-pro' ),
            'update_item'       => __( 'Update Gallery Category', 'scrollme-pro' ),
            'add_new_item'      => __( 'Add New Gallery Category', 'scrollme-pro' ),
            'new_item_name'     => __( 'New Gallery Category', 'scrollme-pro' ),
            'menu_name'         => __( 'Gallery Categories', 'scrollme-pro' ),
        );
        $args = array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
        );
        register_taxonomy( 'gallery_category', 'galleries', $args );
    }
    
    add_action( 'init', 'scrollme_create_gallery_category', 0 );

    /** Post Type - Testimonial **/    
    function scrollme_testimonial() {
        $labels = array(
            'name'               => _x( 'Testimonials', 'post type general name' , 'scrollme-pro'),
            'singular_name'      => _x( 'Testimonial', 'post type singular name' , 'scrollme-pro'),
            'add_new'            => _x( 'Add New', 'Testimony' , 'scrollme-pro'),
            'add_new_item'       => __( 'Add New Testimony' , 'scrollme-pro'),
            'edit_item'          => __( 'Edit Testimony' , 'scrollme-pro' ),
            'new_item'           => __( 'New Testimony' , 'scrollme-pro' ),
            'all_items'          => __( 'All Testimonials' , 'scrollme-pro' ),
            'view_item'          => __( 'View Testimony' , 'scrollme-pro' ),
            'search_items'       => __( 'Search Testimony' , 'scrollme-pro' ),
            'not_found'          => __( 'No Testimony found' , 'scrollme-pro' ),
            'not_found_in_trash' => __( 'No Testimony found in the Trash' , 'scrollme-pro' ),
            'parent_item_colon'  => '',
            'menu_name'          => 'Testimonial'
        );
        $args = array(
            'labels'        => $labels,
            'description'   => 'Holds our Testimonial specific data',
            'public'        => true,
            'exclude_from_search' => true,
            'menu_position' => 5,
            'supports'      => array( 'title', 'thumbnail', 'editor' ),
            'has_archive'   => false,
            'menu_icon' => 'dashicons-images-alt',
            'rewrite'   => array( 'slug' => sanitize_title_with_dashes(get_theme_mod('testy_slug', 'testimonials') )),
        );
        register_post_type( 'testimonials', $args );
        flush_rewrite_rules();
    }
    
    add_action( 'init', 'scrollme_testimonial' );