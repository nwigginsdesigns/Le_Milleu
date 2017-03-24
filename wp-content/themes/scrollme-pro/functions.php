<?php
/**
 * scrollme functions and definitions
 *
 * @package scrollme
 */

if ( ! function_exists( 'scrollme_setup' ) ) :

function scrollme_setup() {

	load_theme_textdomain( 'scrollme-pro', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Woocommerce Compatibility
	add_theme_support( 'woocommerce' );

	// Register Nav
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'scrollme-pro' ),
	) );

	//Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'scrollme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'scrollme-grid-large', 750, 750, true ); // Grid image crop
	add_image_size( 'scrollme-post-image', 850, 300, true ); // Post Image
    add_image_size( 'scrollme-bpost-image', 380, 250, true ); // Blog  Post Image
    add_image_size( 'scrollme-featbox-image', 580, 350, true ); // Feature Box Thumbnail

    /** Pro Image sizes **/
    add_image_size( 'scrollme-team-thumbnail', 415, 510, true ); // Team Image Thumbnail
    add_image_size( 'scrollme-test-thumbnail', 115, 115, true ); // Testimonial Image Thumbnail
    add_image_size( 'scrollme-gal-thumbnail', 385, 565, true ); // Gallery Image Thumbnail
    add_image_size( 'scrollme-team-single-thumbnail', 390, 380, true ); // Team Thumbnail Single Page
    add_image_size( 'scrollme-gal-single-thumbnail1', 390, 340, true ); // Galery Single Thumbnail1 Single Page
    add_image_size( 'scrollme-gal-single-thumbnail1', 390, 390, true ); // Galery Single Thumbnail1 Single Page
    add_image_size( 'scrollme-gal-single-thumbnail2', 390, 400, true ); // Galery Single Thumbnail2 Single Page
    add_image_size( 'scrollme-gal-single-thumbnail3', 390, 500, true ); // Galery Single Thumbnail3 Single Page
    

}
endif; // scrollme_setup
add_action( 'after_setup_theme', 'scrollme_setup' );

function scrollme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'scrollme_content_width', 1000 );
}
add_action( 'after_setup_theme', 'scrollme_content_width', 0 );

// Register widget area.
function scrollme_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'scrollme-pro' ),
		'id'            => 'scrollme-sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'scrollme-pro' ),
		'id'            => 'scrollme-sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Google Map', 'scrollme-pro' ),
		'id'            => 'scrollme-gmap',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Social Link (Header)', 'scrollme-pro' ),
		'id'            => 'scrollme-header-socialicon',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Social Icon (Countdown)', 'scrollme-pro' ),
		'id'            => 'countdown-social-icons',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Subscribe (Countdown)', 'scrollme-pro' ),
		'id'            => 'countdown-subscribe',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'scrollme_widgets_init' );

//Enqueue scripts and styles.
function scrollme_scripts() {

	 $font_args = array(
        'family' => 'Open+Sans:400,300,400italic,600,700|Open+Sans+Condensed:300,700',
    );

    wp_enqueue_style('accesspress-scrollme-google-fonts', add_query_arg($font_args, "//fonts.googleapis.com/css"));

	wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome.css',true );

	wp_enqueue_style( 'scrollme-style', get_stylesheet_uri() );

	wp_enqueue_style( 'nivolightbox', get_template_directory_uri().'/js/nivolightbox/nivo-lightbox.css' );

	wp_enqueue_style( 'nivolightbox-default', get_template_directory_uri().'/js/nivolightbox/themes/default/default.css' );

	wp_enqueue_style( 'scrollme-fullpage-css', get_template_directory_uri().'/js/fullpage/jquery.fullPage.css', true );

	wp_enqueue_style( 'scrollme-responsive', get_template_directory_uri().'/css/responsive.css', true );
    
    wp_enqueue_style( 'mcustomscrollbar-css', get_template_directory_uri().'/js/mcustomscrollbar/jquery.mCustomScrollbar.css', true );

    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri().'/js/owl-carousel/owl.carousel.css', true );

    wp_enqueue_style( 'owl-carousel-deftheme', get_template_directory_uri().'/js/owl-carousel/owl.theme.default.css', true );

	wp_enqueue_script( 'fullpage-js', get_template_directory_uri().'/js/fullpage/jquery.fullPage.min.js', array( 'jquery' ),'20120206', true );

	wp_enqueue_script( 'bxslider-js', get_template_directory_uri().'/js/jquery.bxslider.min.js', array( 'jquery' ),'20120206', true );

	wp_enqueue_script( 'isotope-js', get_template_directory_uri().'/js/isotope.pkgd.min.js', array( 'jquery' ),'20120206', true );

	wp_enqueue_script( 'inview-js', get_template_directory_uri().'/js/jquery.inview.min.js', array( 'jquery'), '20120206', true );

	wp_enqueue_script( 's-knob', get_template_directory_uri().'/js/jquery.knob.js', array( 'jquery'), '20120206', true );

	wp_enqueue_script( 'fancybox-js', get_template_directory_uri().'/js/nivolightbox/nivo-lightbox.js', array( 'jquery'), '20120206', true );
    
    wp_enqueue_script( 'mcustomscrollbar-js', get_template_directory_uri().'/js/mcustomscrollbar/jquery.mCustomScrollbar.js', array( 'jquery'), '20120206', true );

	wp_enqueue_script( 'owl-slider-js', get_template_directory_uri().'/js/owl-carousel/owl.carousel.js', array( 'jquery'), '20120206', true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri().'/js/jquery.waypoints.js', array( 'jquery'), '20120206', true );
	wp_enqueue_script( 'device', get_template_directory_uri().'/js/device.js', array( ), '20120206', true );
	wp_enqueue_script( 'scrollto', get_template_directory_uri().'/js/jquery.scrollTo.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'scrollme-custom-js', get_template_directory_uri().'/js/custom.js', array('jquery', 'jquery-masonry'), '20120206', true );


	$transition = get_theme_mod( 'scrollme_slider_transition', 'fade' );
	$speed = get_theme_mod( 'scrollme_slider_speed', '400' );
	$pause = get_theme_mod( 'scrollme_slider_pause', '4000' );

	wp_localize_script( 'scrollme-custom-js', 'sBxslider', array(  'transition' => $transition, 'speed' => $speed, 'pause' => $pause ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/** Countdown **/
	//wp_enqueue_style( 'scrollme-countdown-styles', get_template_directory_uri().'/css/countdown.css' );
    wp_enqueue_style( 'classycountdown-css', get_template_directory_uri().'/js/classycountdown/css/jquery.classycountdown.css' );
    wp_enqueue_script( 'throttle-js', get_template_directory_uri().'/js/classycountdown/js/jquery.throttle.js' );
    wp_enqueue_script( 'classycountdown-js', get_template_directory_uri().'/js/classycountdown/js/jquery.classycountdown.js', array('jquery', 's-knob', 'throttle-js'));
}
add_action( 'wp_enqueue_scripts', 'scrollme_scripts' );

/** Enqueue Scripts in Backend **/
add_action( 'admin_enqueue_scripts', 'scrollme_admin_enqueue_scripts' );
function scrollme_admin_enqueue_scripts() {
    $currentScreen = get_current_screen();
    /** Loads the media js file in Page Edit Page only **/
    if( $currentScreen->id == "widgets" || $currentScreen->id == "page" ) {
        wp_enqueue_media();
        wp_enqueue_script( 'scrollme-media-uploader-js', get_template_directory_uri(). '/inc/admin/js/media-uploader.js', array('jquery') );
    }
}

/** Added Pro Files **/

/**
 * Custom Srollme Fonts for typography Settings.
 */
require get_template_directory() . '/inc/scrollme-font.php';

/**
 * Custom Srollme Fonts for typography Settings.
 */
require get_template_directory() . '/inc/scrollme-customizer.php';

/**
 * Custom Srollme Custom Post Types
 */
require get_template_directory() . '/inc/scrollme-post-type.php';

/**
 * Custom Srollme Shortcodes
 */
require get_template_directory() . '/inc/scrollme-shortcodes.php';

/**
 * Scroll Me Dynamic Styles
 */
require get_template_directory() . '/css/dynamic-styles.php';

/**
 * Demo Import
 */
require get_template_directory() . '/inc/import/ap-importer.php';

/** Added Pro Files **/

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Woocommerce
 */
require get_template_directory() . '/inc/scrollme-woo.php';

/**
 * Scroll Me Custom Functions
 */
require get_template_directory() . '/inc/scrollme-functions.php';

/**
 * Metabox for this theme
 */
require get_template_directory() . '/inc/scrollme-metabox.php';

/**
 * Custom Widgets
 */
require get_template_directory() . '/inc/scrollme-widgets.php';

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() .  '/inc/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/inc/scroll-me-tgmpa.php';
add_filter('show_admin_bar', '__return_false');