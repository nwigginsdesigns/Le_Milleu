<?php
/**
 * AccessPress Pro Custom Shortcodes
 *
 * @package Accesspress Pro
 */
// Allow shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

// Enable font size & font family selects in the editor
if ( ! function_exists( 'scrollme_mce_buttons' ) ) {
	function scrollme_mce_buttons( $buttons ) {
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'scrollme_mce_buttons' );

// Customize mce editor font sizes
if ( ! function_exists( 'scrollme_mce_text_sizes' ) ) {
	function scrollme_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'scrollme_mce_text_sizes' );

// Add Formats Dropdown Menu To MCE
if ( ! function_exists( 'scrollme_style_select' ) ) {
	function scrollme_style_select( $buttons ) {
		array_push( $buttons, 'styleselect' );
		return $buttons;
	}
}
add_filter( 'mce_buttons', 'scrollme_style_select' );


add_filter( 'mce_external_plugins', 'scrollme_add_tinymce_plugin' );
add_filter( 'mce_buttons', 'scrollme_register_mce_button' );


// Declare script for new button
function scrollme_add_tinymce_plugin( $plugin_array ) {
	$plugin_array['scrollme_mce_button'] = get_template_directory_uri() .'/inc/admin/js/shortcodes.js';
	return $plugin_array;
}

// Register new button in the editor
function scrollme_register_mce_button( $buttons ) {
	array_push( $buttons, 'scrollme_mce_button' );
	return $buttons;
}


if ( ! function_exists( 'ap_paragraph_br_fix' ) ){
	function ap_paragraph_br_fix($content,$paragraph_tag=false,$br_tag=false){
		$content = preg_replace('#^<\/p>|^<br \/>|<p>$#', '', $content);

		$content = preg_replace('#<br \/>#', '', $content);

		if ( $paragraph_tag ) $content = preg_replace('#<p>|</p>#', '', $content);

		return trim($content);
	}
}

if ( ! function_exists( 'ap_content_helper' ) ){
	function ap_content_helper($content,$paragraph_tag=false,$br_tag=false){
		return ap_paragraph_br_fix( do_shortcode(shortcode_unautop($content)), $paragraph_tag, $br_tag );
	}
}

function ap_testimonial_shortcode($atts, $content=null) { 
	extract(shortcode_atts( 
		array(
			'image' => '',
			'client' => '',
			'company' => '',
			'designation' => ''
			), $atts, 'ap_testimonial'));

$testimonial = '<div class="test-wrap">';
$testimonial .= '<div class="test-content">';
$testimonial .= '<i class="fa fa-quote-left"></i>';

if($content != '') :
$testimonial .= '<p>'.$content.'</p>';
endif;

$testimonial .= '</div><!--testimonial-content-->';

$testimonial .= '<div class="test-details">';
$testimonial .= '<div class="test-img">';
if($image != '') :
	$attachment_id = attachment_url_to_postid($image);
	$img_arr = wp_get_attachment_image_src($attachment_id, 'scrollme-test-thumbnail');
	$img_src = $img_arr[0];
	$testimonial .= '<img src="'.$img_src.'" />';
endif;
$testimonial .= '</div>';

$testimonial .= '<div class="test-infos">';
if($client != '') :
$testimonial .= '<p>'.$client.'</p>';
endif;

if($company != '' || $designation != '') :
	$testimonial .= '<span>';
	if($company != '') :
		$testimonial .= $company;
	endif;
	if($designation != '') :
		$testimonial .= ' - '.$designation;
	endif;
	$testimonial .= '</span>';
endif;
$testimonial .= '</div>';
$testimonial .= '</div><!--detail-sec-->';
$testimonial .= '</div>';
return $testimonial; //Return the HTML.
}
add_shortcode('ap_testimonial', 'ap_testimonial_shortcode');

function ap_team_shortcode($atts, $content=null) { 
	extract(shortcode_atts( 
		array(
			'name' => '',
			'designation' => '',
			'image' => '',
			'facebook' => '',
			'twitter' => '',
			'skype' => '',
			'linkedin' => '',
			), $atts, 'ap_team'));

$team = '<div class="team-member">';
if($image != '') :
	$attachment_id = attachment_url_to_postid($image);
	$img = wp_get_attachment_image_src($attachment_id, 'full'); $img_src = $img[0];
	$team .= '<img class="team-member-img" src="'.$img_src.'" />';
endif;

$team .= '<div class="team-info">';
$team .= '<p>';
if($name != '' ) :
	$team .= $name;
endif;
if($designation != '') :
	$team .= '<span> - '.$designation.'</span>';
endif;
$team .= '</p>';

if($facebook != '' || $twitter != '' || $skype != '' || $sme_team_lnk != '') :
	$team .= '<div class="team-social-links">';
	if($facebook != '') :
		$team .= '<a href="'.$facebook.'"><i class="fa fa-facebook-square fb1"></i></a>';
	endif;

	if($twitter != '') :
		$team .= '<a href="'.$twitter.'" ><i class="fa fa-twitter-square twt1"></i></a>';
	endif;

	if($skype != '') :
		$team .= '<a href="'.$skype.'"><i class="fa fa-skype skyp1"></i></a>';
	endif;

	if($linkedin != '') :
		$team .= '<a href="'.$linkedin.'"><i class="fa fa-linkedin-square lnk1"></i></a>';
	endif;
	$team .= '</div>';
endif;
$team .= '</div><!--connect-to-->';
$team .= '</div><!--team-1-->';

/*
$team = '<div class="team-block">'; 
if($image):
$team .= '<div class="team-image'.' '.$image_shape.'"><img src="'.$image.'"/></div>';
endif;
$team .= '<div class="member-name">'.$name.'</div>';
if($designation):
$team .= '<div class="designation">'.$designation.'</div>';
endif;
$team .= '<div class="team-content">'.ap_content_helper($content).'</div>';
$team .= '</div>';
*/
return $team; //Return the HTML.
}
add_shortcode('ap_team', 'ap_team_shortcode');

function ap_social_shortcodes($atts){
	extract(shortcode_atts( 
		array(
			'facebook' => '',
			'twitter' => '',
			'gplus' => '',
			'skype' => '',
			'linkedin' => '',
			'youtube' => '',
			'dribble' => ''
			), $atts, 'ap_social'));

	$social = '<div class="social-shortcode">';
	if($facebook){
	$social .= '<a href="'.esc_url($facebook).'" target="_blank"><i class="fa fa-facebook"></i></a>';
	}
	if($twitter){
	$social .= '<a href="'.esc_url($twitter).'" target="_blank"><i class="fa fa-twitter"></i></a>';
	}
	if($gplus){
	$social .= '<a href="'.esc_url($gplus).'" target="_blank"><i class="fa fa-google"></i></a>';
	}
	if($skype){
	$social .= '<a href="'.esc_url($skype).'" target="_blank"><i class="fa fa-skype"></i></a>';
	}
	if($linkedin){
	$social .= '<a href="'.esc_url($linkedin).'" target="_blank"><i class="fa fa-linkedin"></i></a>';
	}
	if($youtube){
	$social .= '<a href="'.esc_url($youtube).'" target="_blank"><i class="fa fa-youtube-play"></i></a>';
	}
	if($dribble){
	$social .= '<a href="'.esc_url($dribble).'" target="_blank"><i class="fa fa-dribbble"></i></a>';
	}
	$social .='</div>';
	return $social;
}
add_shortcode('ap_social', 'ap_social_shortcodes');

function ap_divider_shortcode($atts) { 
	extract(shortcode_atts( 
		array(
			'color' => '#CCCCCC',
			'style' => 'solid',
			'width' => '100%',
			'thickness' => '1px',
			'mar_top'=>'20px',
			'mar_bot'=>'20px',
			), $atts, 'ap_divider'));
	$divider = '<div class="divider" style="margin-top:'.$mar_top.'; margin-bottom:'.$mar_bot.'; border-top:'.$thickness.' '.$style.' '.$color.';width:'.$width.'"/></div>';
	return $divider;
}
add_shortcode('ap_divider', 'ap_divider_shortcode');

function ap_spacing_shortcode($atts) { 
	extract(shortcode_atts( 
		array(
			'spacing_height' => '10px',
			), $atts, 'ap_spacing'));
	$ap_spacing = '<hr class="ap-spacing" style="height:'.$spacing_height.'"/>';
	return $ap_spacing;
}
add_shortcode('ap_spacing', 'ap_spacing_shortcode');

function ap_accordian_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'title' => '',
			'icon' => '',
			), $atts, 'ap_accordian'));

	if($icon){
		$icon = '<i class="fa '.$icon.'"></i>';
	}
	$accordion = '<div class="ap_accordian">';
	$accordion .='<div class="ap_accordian_title">'.$icon.' '.$title.'</div>';
	$accordion .='<div class="ap_accordian_content">'.ap_content_helper($content).'</div>';
	$accordion .='</div>';
	return $accordion;
}

add_shortcode('ap_accordian', 'ap_accordian_shortcode');

function ap_accordian_shortcode_wrap($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'class' => '',
			), $atts, 'ap_accordian_wrap'));
	return '<div class="accordion-wrap '.$class.'">'.ap_content_helper($content).'</div>';
}
add_shortcode('ap_accordian_wrap', 'ap_accordian_shortcode_wrap');

function ap_toggle_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'title' => '',
			'status' => 'close'
			), $atts, 'ap_toggle'));
	$style = '';
	if($status == 'close') {
		$style = 'style="display: none;"';
	}
	$accordion = '<div class="ap_toggle '.$status.'">';
	$accordion .='<div class="ap_toggle_title">'.$title.'</div>';
	$accordion .='<div class="ap_toggle_content" '.$style.'>'.ap_content_helper($content).'</div>';
	$accordion .='</div>';
	return $accordion;
}

add_shortcode('ap_toggle', 'ap_toggle_shortcode');

function ap_call_to_action_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'button_text' => 'View',
			'button_url' => '#',
			'button_align' => 'center'
			), $atts, 'ap_call_to_action'));

	$call_to_action = '<div class="ap_call_to_action clearfix '.$button_align.'">';
	$call_to_action .='<div class="ap_call_to_action_content">'.ap_content_helper($content).'</div>';
	$call_to_action .='<a href="'.esc_url($button_url).'" class="ap_call_to_action_button">'.$button_text.'</a>';
	$call_to_action .='</div>';
	return $call_to_action;
}

add_shortcode('ap_call_to_action', 'ap_call_to_action_shortcode');

function ap_drop_cap_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'font_size' => '26',
			), $atts, 'ap_drop_cap'));

	$drop_cap = '<span class="ap_drop_cap" style="font-size:'.$font_size.'px">';
	$drop_cap .= $content;
	$drop_cap .='</span>';
	return $drop_cap;
}

add_shortcode('ap_drop_cap', 'ap_drop_cap_shortcode');

function ap_slide_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'caption' => '',
			'link' => '#',
			'target' => '_self'
			), $atts, 'ap_slide'));
	$ap_slide = '<div class="ap-slide">';
	if($link):
	$ap_slide .= '<a href="'.$link.'" target="'.$target.'">';
	endif;
	$ap_slide .= '<img title="'.$caption.'" src="'.$content.'">';
	if($link):
	$ap_slide .= '</a>';
	endif;
	$ap_slide .= '</div>';
	return $ap_slide;
}

add_shortcode('ap_slide', 'ap_slide_shortcode');

function ap_slider_shortcode($atts, $content=null){
	$ap_slider = '<div class="shortcode-slider"><div class="slider_wrap">';
	$ap_slider .= ap_content_helper($content);
	$ap_slider .= '</div></div>';
	return $ap_slider;
}

add_shortcode('ap_slider', 'ap_slider_shortcode');

function ap_tab_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'title' => '',
			), $atts, 'ap_tab'));

	$ap_tab ='<div class="ap_tab '.sanitize_title($title).'">';
	$ap_tab .='<div class="tab-title" id="'.sanitize_title($title).'">'.$title.'</div>';
	$ap_tab .= ap_content_helper($content);
	$ap_tab .='</div>';
	return $ap_tab;
}

add_shortcode('ap_tab', 'ap_tab_shortcode');

function ap_tab_wrap_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'type' => 'horizontal',
			), $atts, 'ap_tab_group'));
	$ap_tab_wrap = '<div class="clearfix ap_tab_wrap '.$type.'">';
	$ap_tab_wrap .= ap_content_helper($content);
	$ap_tab_wrap .= '</div>';
	return $ap_tab_wrap;
}

add_shortcode('ap_tab_group', 'ap_tab_wrap_shortcode');

function ap_column_shortcode($atts, $content=null){
	extract(shortcode_atts( 
		array(
			'span' => '6',
			), $atts, 'ap_column'));
	$ap_column = '<div class="ap_column ap-span'.$span.'">';
	$ap_column .= ap_content_helper($content);
	$ap_column .= '</div>';
	return $ap_column;
}

add_shortcode('ap_column', 'ap_column_shortcode');

function ap_column_wrap_shortcode($atts, $content=null){
	$ap_column_wrap = '<div class="clearfix ap-row">';
	$ap_column_wrap .= ap_content_helper($content);
	$ap_column_wrap .= '</div>';
	return $ap_column_wrap;
}

add_shortcode('ap_column_wrap', 'ap_column_wrap_shortcode');

function ap_list_shortcode($atts, $content=null){
    extract(shortcode_atts( 
		array(
			'list_type' => 'ap-list1',
			), $atts, 'ap_list'));
	$ap_list = '<ul class="ap-list '.$list_type.'">';
	$ap_list .= ap_content_helper($content);
	$ap_list .= '</ul>';
	return $ap_list;
}

add_shortcode('ap_list', 'ap_list_shortcode');

function ap_li_shortcode($atts, $content=null){
	$ap_li = '<li>';
	$ap_li .= ap_content_helper($content);
	$ap_li .= '</li>';
	return $ap_li;
}

add_shortcode('ap_li', 'ap_li_shortcode');

function ap_dropcaps_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'style' => 'ap-normal',
                    ), $atts, 'ap_dropcaps'));
    $ap_dropcaps = '<span class="ap-dropcaps '.$style.'">';
    $ap_dropcaps .= ap_content_helper($content);
    $ap_dropcaps .= '</span>';
    return $ap_dropcaps;
}

add_shortcode('ap_dropcaps', 'ap_dropcaps_shortcode');

function ap_tagline_box_shortcode($atts, $content = null) {
    extract(shortcode_atts(
                    array(
        'ap_tagline_text' => 'Enter you Tag Line text here',
        'tag_box_style' => 'ap-all-border-box',
                    ), $atts, 'ap_tagline_box'));

    $ap_tagline_box = '<div class="ap_tagline_box clearfix ' . $tag_box_style . '">';
    $ap_tagline_box .= ap_content_helper($content);
    $ap_tagline_box .='</div>';
    return $ap_tagline_box;
}

add_shortcode('ap_tagline_box', 'ap_tagline_box_shortcode');