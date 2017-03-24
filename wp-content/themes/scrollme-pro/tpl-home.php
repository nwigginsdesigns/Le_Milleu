<?php
/*
 * Template Name: Home
 *
 * @package scrollme
 *
 */
get_header();
?>
<div id="fullpage" class="scrollme-home">
    <div class="scrollme-main-section" data-anchor="home">
        <?php
        $section_id = get_theme_mod( 'scrollme_section_home' );
        $slider_cat = get_theme_mod( 'scrollme_slider_category' );
        $slider_type = get_theme_mod( 'scrollme_slider_type', 'default' );
        $scrollme_slider_shortcode = get_theme_mod( 'scrollme_slider_shortcode', '' );
        ?>
        <section data-anchor="<?php echo $section_id; ?>" class="sec-slide s-panel slider-section" data-index="1">
            <!-- Revolution Slider -->
                <?php if( $slider_type == 'revolution' ) : ?>
                    <?php if($scrollme_slider_shortcode != '' ) : ?>
                        <?php echo do_shortcode($scrollme_slider_shortcode); ?>
                    <?php endif; ?>
                
            <!-- Default Slider -->
                <?php else : ?>
                    <?php if( isset( $slider_cat ) && $slider_cat != 0 ): ?>
                        <?php
                        $cat_args = array( 'cat' => $slider_cat );
                        $cat_query = new WP_Query( $cat_args );
                        if( $cat_query->have_posts() ) {

                            echo '<ul class="scrollme-slider">';

                            while( $cat_query->have_posts() ) {
                                $cat_query->the_post();
                                $post_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                                echo '<li class="bx-slides">';
                                ?>
                                <div class="slide-bg" style="background-image:url(<?php echo esc_url($post_thumb[0]); ?>)"></div>

                                <?php if( get_theme_mod( 'scrollme_slider_caption', 'yes' ) == 'yes' ): ?>
                                    <div class="slide-caption slideInUp animated">
                                        <div class="slide-title">
                                            <?php echo get_the_title(); ?>
                                        </div>
                                        <div class="slide-desc">
                                            <?php echo get_the_content(); ?>
                                        </div>
                                    </div>
                                <?php endif; 

                                echo '</li>';

                            }
                            echo '</ul>';
                            wp_reset_postdata();
                        }
                        
                        endif; ?>
                    <div class="h-logo">
                        <?php
                        $h_logo = get_theme_mod( 'scrollme_home_logo' );
                        if( $h_logo ){
                            ?>
                            <img src="<?php echo $h_logo; ?>" >
                        <?php
                        }
                        ?>
                    </div>
                <?php endif; ?> <!-- end of slider type condition -->
        </section>

        <?php        
        $data_index = 1; // For section data-index        
        $section_order_str = get_theme_mod( 'scrollme_section_order', '1,2,3,4,5,6,7,8,9,10,11' );
        $section_order = explode(',', $section_order_str);
        array_pop($section_order);

        foreach($section_order as $i) {
            $section_id = get_theme_mod( 'scrollme_section_'.$i, '' );
            $section_type = get_theme_mod( 'scrollme_section_'.$i.'_type', 'page' );
            
            if($section_type == 'page') {
                $section = 'page';
                $page_id = get_theme_mod( 'scrollme_section_page_'.$i, 0 );
            } else {
                $section = get_theme_mod('scrollme_section_layout'.$i, 'services');
            }
            $class = 'sec-'.$section;
            
            $disable_section = get_theme_mod( 'scrollme_section_'.$i.'_disable', 0);
            ?>
            <?php if(!$disable_section) : ?>
                <section id="<?php echo $section_id; ?>" data-anchor="<?php echo $section_id; ?>" class="sec-slide s-panel <?php echo $class;?> hm-section-<?php echo $i; ?>" data-index="<?php echo ++$data_index; ?>">
                    <?php
                        switch ($section) {
                            case 'page' :
                                scrollme_slide_page($page_id);
                                break;
                                
                            case 'services' :
                                scrollme_slide_service();
                                break;
                                
                            case 'portfolio' :
                                scrollme_slide_portfolio();
                                break;
                                
                            case 'clients' :
                                scrollme_slide_clients();
                                break;
                                
                            case 'contact' :
                                scrollme_slide_contact();
                                break;
                            
                            case 'blog' :
                                scrollme_slide_blog();
                                break;

                            case 'team' :
                                scrollme_slide_team();
                                break;

                            case 'testimonial' :
                                scrollme_slide_testimonial();
                                break;

                            case 'gallery' :
                                scrollme_slide_gallery();
                                break;
                                
                            default :
                                get_template_part( 'template-parts/content', 'none' );
                                break;
                        }
                    ?>
                </section>
            <?php endif; // display section ?>
            <?php
        } // end of for
        ?>
        <div class="scme_fulpg_arrow">
            <?php $tpl_color = get_theme_mod('template_color', '#DF2C45'); ?>
            <span id="moveLeft" class="fp-controlArrow fp-prev">
                <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                 <metadata>Created by potrace 1.10, written by Peter Selinger 2001-2011</metadata>
                 <g>
                  <title>Layer 1</title>
                  <g id="svg_1" fill="<?php echo $tpl_color; ?>" transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)">
                   <path id="svg_2" d="m120,375c-68,-68 -121,-128 -117,-132c4,-4 62,47 127,112l120,120l112,-113l113,-112l-112,-112l-113,-113l-84,84c-46,46 -89,82 -95,80c-6,-2 32,-47 84,-99l95,-95l127,128l128,127l-125,125c-69,69 -127,125 -130,125c-3,0 -61,-56 -130,-125z"/>
                   <path id="svg_3" d="m172,307l-22,-23l25,-24c26,-25 47,-21 25,5c-11,13 -5,15 44,15l56,0l0,-71c0,-47 4,-69 11,-67c7,2 11,33 11,78l0,75l-66,0c-41,0 -62,3 -56,10c6,5 10,13 10,17c0,15 -16,8 -38,-15z"/>
                  </g>
                 </g>
                </svg>
            </span>
            <span id="moveRight" class="fp-controlArrow fp-next">
                <svg width="50" height="50" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet">
                 <metadata>Created by potrace 1.10, written by Peter Selinger 2001-2011</metadata>
                 <g>
                  <title>Layer 1</title>
                  <g id="svg_1" fill="<?php echo $tpl_color; ?>" transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)">
                   <path id="svg_2" d="m120,375l-125,-125l128,-127l127,-128l95,95c52,52 90,97 84,99c-6,2 -49,-34 -95,-80l-84,-84l-113,113l-112,112l113,112l112,113l120,-120c65,-65 123,-116 127,-112c6,7 -234,257 -247,257c-3,0 -61,-56 -130,-125z"/>
                   <path id="svg_3" d="m290,322c0,-4 4,-12 10,-17c6,-7 -14,-10 -53,-10c-34,0 -63,-3 -64,-7c-8,-23 -2,-148 7,-148c6,0 10,30 10,70l0,70l56,0c49,0 55,-2 44,-15c-22,-26 -1,-30 25,-5l25,24l-22,23c-22,23 -38,30 -38,15z"/>
                  </g>
                 </g>
                </svg>
            </span>
        </div>
    </div>
</div> <!-- #fullpage -->
<?php get_footer();