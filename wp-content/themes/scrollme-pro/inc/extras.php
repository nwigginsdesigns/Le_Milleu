<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package scrollme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function scrollme_body_classes( $classes ) {
	global $post;
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if(is_singular( 'team' )) {
		$post_sidebar = get_theme_mod( 'team_single_sidebar', 'right_sidebar' );
	} elseif(is_singular( 'client-logos' )){
		$post_sidebar = get_theme_mod( 'clogo_single_sidebar', 'right_sidebar' );
	} elseif(is_singular( 'testimonials' )){
		$post_sidebar = get_theme_mod( 'testy_single_sidebar', 'right_sidebar' );
	} elseif(is_singular( 'portfolio' )){
		$post_sidebar = get_theme_mod( 'port_single_sidebar', 'right_sidebar' );
	} elseif(is_singular( 'galleries' )) {
		$post_sidebar = get_theme_mod( 'gal_single_sidebar', 'right_sidebar' );
	} elseif(is_singular( 'page', 'post' )) {
		$post_sidebar = get_post_meta( $post->ID, 'scrollme_sidebar_layout', true );
	} elseif( scrollme_is_woo_pages() ){
		$post_sidebar = 'right_sidebar';
	} elseif(is_tax( 'gallery_category' )) {
		$post_sidebar = get_theme_mod('gal_arch_sidebar', 'right_sidebar');
	} elseif(is_home() || is_archive()) {
		$post_sidebar = get_theme_mod('blog_arch_sidebar', 'right_sidebar');
	} else{
		$post_sidebar = get_post_meta( $post->ID, 'scrollme_sidebar_layout', true);
	}

	if( empty( $post_sidebar ) ) {
		$classes[] = 'right_sidebar';
	}else{
		$classes[] = $post_sidebar;
	}

	return $classes;
}
add_filter( 'body_class', 'scrollme_body_classes' );

// Remove current class on hash menu
add_filter('nav_menu_css_class', 'remove_current_class_hash', 10, 2 );

function remove_current_class_hash($classes, $item) {
	$class_names = array( 'current-menu-item', 'current-menu-ancestor', 'current-menu-parent', 'current_page_parent',  'current_page_ancestor', 'current_page_item' );
	if( strpos( $item->url, '#' ) !== false ) {
		foreach( $class_names as $class_name ) {
			if(($key = array_search($class_name, $classes)) !== false) {
				unset($classes[$key]);
			}
		}

	}
	return $classes;
}

/**
 * Custom Search Form
 */
function scrollme_search_form( $form ) {
	$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s">' . __( 'Search for:', 'scrollme-pro' ) . '</label>
	<input type="search" class="search-field" placeholder="'. __('Search..', 'scrollme-pro').'" value="' . get_search_query() . '" name="s" id="s" />
	<input type="submit" id="search-submit" value="'. __('Search..', 'scrollme-pro').'" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'scrollme_search_form' );

/**
 * Sidebar Layout Class
 */
function scrollme_get_sidebar_layout()  {
	global $post;
	$post_sidebar = 'right_sidebar';

	if( is_singular( 'team' ) ) {
		$post_sidebar = get_theme_mod( 'team_single_sidebar', 'right_sidebar' );
	} elseif(is_singular( 'client-logos' )){
		$post_sidebar = get_theme_mod( 'clogo_single_sidebar', 'right_sidebar' );
	} elseif(is_singular( 'testimonials' )){
		$post_sidebar = get_theme_mod( 'testy_single_sidebar', 'right_sidebar' );
	} elseif(is_singular( 'galleries' )) {
		$post_sidebar = get_theme_mod( 'gal_single_sidebar', 'right_sidebar' );
	} elseif( is_singular( 'portfolio' ) ) {
		$post_sidebar = get_theme_mod( 'port_single_sidebar', 'right_sidebar' );
	} elseif(scrollme_is_woo_pages()){
		$post_sidebar = 'right_sidebar';
	} elseif( is_singular( 'page', 'post' )) {
		$post_sidebar = get_post_meta( $post->ID, 'scrollme_sidebar_layout', true);
	} elseif(is_tax( 'gallery_category' )) {
		$post_sidebar = $post_sidebar = get_theme_mod('gal_arch_sidebar', 'right_sidebar');
	} elseif(is_home() || is_archive()) {
		$post_sidebar = get_theme_mod('blog_arch_sidebar', 'right_sidebar');
	} else{
		$post_sidebar = get_post_meta( $post->ID, 'scrollme_sidebar_layout', true);
	}
	
	return $post_sidebar;
}

/** Add Editor Styles **/
function scrollme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}

add_action( 'admin_init', 'scrollme_add_editor_styles' );

function scrollme_dynamic_preloader() {
    $preloader = esc_attr(get_theme_mod( 'preloader', 'default' ));
    
    if( isset( $preloader ) && $preloader != '' ) :
    ?>
    <style>
    .no-js #loader { display: none; }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .scrollme-preloader {
    	position: fixed;
    	left: 0px;
    	top: 0px;
    	width: 100%;
    	height: 100%;
    	z-index: 9999999;
    	background: url('<?php echo get_template_directory_uri()."/images/preloader/".$preloader.".gif"; ?>') center no-repeat #fff;}
    </style>
    <?php
    endif;
}
add_action( 'wp_head', 'scrollme_dynamic_preloader', 15 );