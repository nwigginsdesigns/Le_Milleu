<?php
    function scrollme_slide_page($page_id) {
        $pg_query = new WP_Query( array( 'page_id' => $page_id, 'posts_per_page' => 1 ) );
        if($pg_query->have_posts()) :
        while($pg_query->have_posts()) : $pg_query->the_post();
        ?>
        <div class="s-panel-inner">
            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            </div>
        </div>
        <?php
        endwhile;
        else :
            get_template_part('template-parts/content', 'none');
        endif;
    }
    
    function scrollme_slide_service() {
        ?>
        <div class="s-panel-inner">
            <div class="container">
            <header class="entry-header">
                <?php $service_title = scrollme_allow_span(get_theme_mod('scrollme_service_title', 'We Are Expert - <span>In Our Service</span>')); ?>
                <h1 class="entry-title"><?php echo $service_title; ?></h1>
            </header><!-- .entry-header -->

            <div class="service-tab-wrap">
            <?php 
                for ($i = 1; $i <= 4; $i++) :
                    $service_page = absint(get_theme_mod( 'scrollme_service_block_'.$i.'_page'));
                    
                    if($service_page):
                    ?>
                    <a class="service-tab" href="#service<?php echo $service_page ?>">
                        <?php
                        if( has_post_thumbnail($service_page) ):
                            $service_icon = wp_get_attachment_image_src( get_post_thumbnail_id($service_page), 'thumbnail' );
                        ?>
                        <img src="<?php echo $service_icon[0]; ?>" alt="<?php the_title_attribute();?>" />
                        <?php endif; ?>
                        <h3><?php echo get_the_title($service_page); ?></h3>
                    </a>
                    <?php
                    endif;
                endfor;
            ?>
            </div>

            <div class="service-content-wrap">
            <?php 
                for ($i = 1; $i <= 4; $i++) :
                    $service_page = absint(get_theme_mod( 'scrollme_service_block_'.$i.'_page'));
                    if($service_page):
                        $args = array( 'page_id'=>$service_page );
                        $query = new WP_Query($args);
                        if($query->have_posts()):
                            while($query->have_posts()): $query->the_post();
                                ?>
                                <div class="service-content clearfix" id="service<?php echo $service_page ?>">
                                    <?php 
                                    the_content();
                                    ?>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    endif;
                endfor;
            ?>
            </div>
                
            </div>
        </div>
        
        <?php
    }
    
    function scrollme_slide_portfolio() {
        ?>
        <div class="s-panel-inner">
            <div class="container">
                <header class="entry-header">
                    <?php $section_title = get_theme_mod('scrollme_portfolio_title', 'What we have done - <span>Our Works</span>'); ?>
                    <h1 class="entry-title"><?php echo wp_kses($section_title, array('span'=>array())); ?></h1>
                </header><!-- .entry-header -->
                
                <div id="portfolio-wrap">
                <?php
                    $cat_args = array(
                        //'cat' => $scrollme_page,
                        'post_type' => 'portfolio',
                        'order' => 'ASC',
                        'posts_per_page' => -1,
                        'post_status' => 'publish'
                    );
                    
                    $cat_query = new WP_Query( $cat_args );
                ?>
                <?php if( $cat_query->have_posts() ) : ?>
                    <div id="sm-portfolio" data-col="4">
                    <?php $i = 1; ?>
                    <?php while( $cat_query->have_posts() ) : $cat_query->the_post(); ?>
                        
                        <?php if( has_post_thumbnail() ) : ?>
                            <?php
                                $mas_class = "";
                                if( $i == 2 || $i == 5 || $i == 9 || $i == 13 ) {
                                    $mas_class = 'wide';
                                }
                                $img_crop = 'scrollme-grid-large';
                                
                                $img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), $img_crop );
                                $img_src_full = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
                            ?>
                                <div class="port-block item <?php echo $mas_class; ?>">
                                        
                                    <div class="portfolio-thumb" style="background-image: url(<?php echo $img_src[0];?>);">
                                    
                                        <div class="port-title">
                                        <div class="port-text">
                                            <?php  echo get_the_title(); ?>
                                            
                                        
                                            <div class="port-link-wrap">
                                                <a class="port-lbox-link" href="<?php echo $img_src_full[0]; ?>" data-lightbox-gallery="port">
                                                    <i class="fa fa-search"></i>
                                                </a>
                                                <a class="port-pg-link" href="<?php the_permalink(); ?>">
                                                    <i class="fa fa-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            <?php if($i%16 == 0){ $i = 0; } ?>
                            <?php $i++; ?>
                        <?php endif; ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php else : ?>            
                    <?php get_template_part( 'template-parts/content', 'none' ); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }
    
    function scrollme_slide_clients() {
        ?>
        <div class="s-panel-inner">
            <div class="container">
                <header class="entry-header">
                    <?php $section_title = get_theme_mod('scrollme_client_title', 'We Have Some - <span>Great Clients</span>'); ?>
                    <h1 class="entry-title"><?php echo wp_kses($section_title, array('span'=>array())); ?></h1>
                </header><!-- .entry-header -->
                <?php
                    $client_args = array(
                        'post_type' => 'client-logos',
                        'posts_per_page' => -1
                    );
                    $client_query = new WP_Query($client_args);
                    if ($client_query->have_posts()) {
                        echo '<div class="client-slider clearfix">';
                        $count = 1;
                        while ($client_query->have_posts()) {
                            $client_query->the_post();
                            if (has_post_thumbnail()) {
        
                                $post_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                ?>
                                <div class="client-sub">
                                    <div class="client-sub-inner">
                                        <div class="client-table-outer">
                                                    <?php $link_to_inpage = get_theme_mod('scrollme_linkto_inpage', 1); ?>
                                                                                                                                                                                                                
                                                    <?php if($link_to_inpage) : ?>
                                                    <a href="<?php the_permalink(); ?>">
                                                    <?php endif; ?>                                                    
                                                        <img src="<?php echo $post_thumb[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>"/>
                                                    <?php if($link_to_inpage) : ?>
                                                    </a>                                                    
                                                    <?php endif; ?>                           
                                        </div>
                                    </div>
                                </div>
                                <?php if($count%5 == 0) : ?>
                                <div class="clearfix"></div>
                                <?php endif; ?>
                            <?php
                            }
                        }
                        echo '</div>';
                        wp_reset_postdata();
                    } else {
                        get_template_part('template-parts/content', 'none');
                    }
                ?>
            </div>
        </div>
        <?php 
    }
    
    function scrollme_slide_contact() {
        $con_page = get_theme_mod('scrollme_contact_page', 0);
        
        $pg_query = new WP_Query( array( 'post_type' => 'page', 'post__in' => array( $con_page ), 'posts_per_page' => 1 ) );
        if($pg_query->have_posts()) :
        while($pg_query->have_posts()) : $pg_query->the_post();
        ?>
        <div class="s-panel-inner">
            
            <div class="container">
                <div class="clearfix">
                    <?php if(is_dynamic_sidebar('scrollme-gmap')) : ?>
                    <div id="scrollme-map-canvas">
                        <?php dynamic_sidebar('scrollme-gmap'); ?>
                    </div>
                    <?php endif; ?>

                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php
                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'scrollme-pro'),
                                'after' => '</div>',
                            ));
                            ?>
                        </div><!-- .entry-content -->
        
                        <footer class="entry-footer">
                            <?php edit_post_link(esc_html__('Edit', 'scrollme-pro'), '<span class="edit-link">', '</span>'); ?>
                        </footer><!-- .entry-footer -->
                    </article><!-- #post-## -->
                </div>
            </div>
        </div>
        <?php
        endwhile; // $pg_query while end
        endif; // $pg_query if end
    }
    
    function scrollme_slide_blog() {
        ?>
        <div class="s-panel-inner">
            <div class="container">
                <header class="entry-header">
                    <?php $section_title = get_theme_mod('scrollme_blog_title', 'Know What We Are - <span>Upto</span>'); ?>
                    <h1 class="entry-title"><?php echo wp_kses($section_title, array('span'=>array())); ?></h1>
                </header><!-- .entry-header -->
                
                <?php
                    $blog_cat = get_theme_mod('scrollme_blog_cat', 0);
                    $blog_readmore_txt = get_theme_mod('scrollme_blog_readmore_txt', 'Read More');
                    $ex_cats = get_theme_mod('scrollme_blog_excat', '');
                    $ex_cat_arr = explode(',', $ex_cats);
                ?>
                <?php if(isset($blog_cat) || $blog_cat != 0) : ?>
                    <?php
                        $blog_args = array(
                            'post_status' => 'publish',
                            'posts_per_page' => 10,
                            'category__not_in' => $ex_cat_arr
                        );
                        $blog_query = new WP_Query($blog_args);
                    ?>
                    <div class="sl-blog-mas-grid clearfix">
                        <?php while($blog_query->have_posts()) : $blog_query->the_post(); ?>
                            <div class="sl-blog-post-wrap">
                                <?php if(has_post_thumbnail()) : ?>
                                <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'scrollme-bpost-image'); $img_src = $img[0]; ?>
                                <div class="sl-blog-post-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo $img_src; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="sl-blog-post-excerpt">
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    
                                    <p>
                                    <?php echo wp_trim_words(get_the_content(), 20); ?>
                                    </p>

                                    <?php if($blog_readmore_txt != '') : ?>
                                    <a class="sl-blog-readmore" href="<?php the_permalink(); ?>">
                                        <?php echo esc_attr($blog_readmore_txt); ?>
                                    </a>

                                    <?php endif; ?>
                                </div>

                                <div class="sl-blog-post-footer clearfix">
                                    <span class="post-date"><i class="fa fa-calendar-o"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
                                    
                                    <span class="post-comment"><i class="fa fa-comment-o"></i><?php echo comments_number( 0 ); ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?> <!-- Blog Category Selected -->
            </div>
        </div>
        <?php
    }

    function scrollme_slide_team() {
        ?>
        <div class="s-panel-inner">
            <div class="container">
                <header class="entry-header">
                    <?php $section_title = get_theme_mod('scrollme_team_title', 'Our Teams'); ?>
                    <h1 class="title1 entry-title"><?php echo wp_kses($section_title, array('span'=>array())); ?></h1>
                </header><!-- .entry-header -->

                <?php
                    $team_args = array(
                        'post_type' => 'team',
                        'posts_per_page' => -1,
                    );

                    $team_query = new WP_Query($team_args);
                ?>
                <?php if($team_query->have_posts()) : $counter = 1; ?>
                    <div class="hm-team-block clearfix">
                    <?php while($team_query->have_posts()) : $team_query->the_post(); ?>
                            <div class="team-member">
                                <?php if(has_post_thumbnail()) : ?>
                                    <?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'scrollme-team-thumbnail'); $img_src = $img[0]; ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img class="team-member-img" src="<?php echo $img_src; ?>" />
                                    </a>
                                <?php endif; ?>

                                <?php
                                    /* Team Meta Infos */
                                    $team_design = get_post_meta(get_the_ID(), 'sme_team_designation', true );
                                    $sme_team_fb = get_post_meta(get_the_ID(), 'sme_team_fb', true );
                                    $sme_team_tw = get_post_meta(get_the_ID(), 'sme_team_tw', true );
                                    $sme_team_skype = get_post_meta(get_the_ID(), 'sme_team_skype', true );
                                    $sme_team_lnk = get_post_meta(get_the_ID(), 'sme_team_lnk', true );
                                ?>

                                <div class="team-info">
                                    <p>
                                        <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                        </a>
                                        
                                        <?php if($team_design != '') : ?>
                                            <span> - <?php echo $team_design; ?></span>
                                        <?php endif; ?>
                                    </p>

                                    <?php if($sme_team_fb != '' || $sme_team_tw != '' || $sme_team_skype != '' || $sme_team_lnk != '') : ?>
                                        <div class="team-social-links">
                                            <?php if($sme_team_fb != '') : ?>
                                                <a href="<?php echo esc_url($sme_team_fb); ?>"><i class="fa fa-facebook-square fb1"></i></a>
                                            <?php endif; ?>

                                            <?php if($sme_team_tw != '') : ?>
                                                <a href="<?php echo esc_url($sme_team_tw); ?>" ><i class="fa fa-twitter-square twt1"></i></a>
                                            <?php endif; ?>

                                            <?php if($sme_team_skype != '') : ?>
                                                <a href="<?php echo esc_url_raw($sme_team_skype); ?>"><i class="fa fa-skype skyp1"></i></a>
                                            <?php endif; ?>

                                            <?php if($sme_team_lnk != '') : ?>
                                                <a href="<?php echo esc_url_raw($sme_team_lnk); ?>"><i class="fa fa-linkedin-square lnk1"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div><!--connect-to-->

                            </div><!--team-1-->
                            <?php if($counter%4 == 0) : ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                            <?php $counter++; ?>
                    <?php endwhile; ?>
                    </div><!--team-block-->
                <?php else : ?>

                <?php endif; ?>

            </div>
        </div>
        <?php
    }

    function scrollme_slide_testimonial() {
        ?>
        <div class="s-panel-inner">
            <div class="container container-fluid team-content">
                <header class="entry-header">
                    <?php $section_title = get_theme_mod('scrollme_test_title', 'Our Teams'); ?>
                    <h1 class="title1 entry-title"><?php echo wp_kses($section_title, array('span'=>array())); ?></h1>
                </header><!-- .entry-header -->

                <?php
                    $test_args = array(
                        'post_type' => 'testimonials',
                        'posts_per_page' => -1,
                    );

                    $test_query = new WP_Query($test_args);
                ?>
                <?php if($test_query->have_posts()) : $counter = 1; ?>
                    <div class="hm-testimonial-block clearfix">
                    <?php while($test_query->have_posts()) : $test_query->the_post(); ?>
                        <div class="test-wrap">
                            <?php
                                $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'scrollme-test-thumbnail'); $img_src = $img[0];
                                $excerpt = get_scrollme_excerpt('', 330, false, '');
                                $company = get_post_meta(get_the_ID(), 'sme_test_company', true);
                                $designation = get_post_meta(get_the_ID(), 'sme_test_designation', true);
                            ?>
                                <div class="test-content">
                                    <i class='fa fa-quote-left'></i>
                                    <p><?php echo $excerpt; ?></p>
                                </div><!--testimonial-content-->

                                <div class="test-details">
                                    <div class="test-img">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo $img_src; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                        </a>
                                        
                                    </div><!--img-right-->

                                    <div class="test-infos">
                                        <a href="<?php the_permalink(); ?>">
                                        <p>
                                            <?php the_title(); ?>
                                        </p>
                                        </a>

                                        <?php if($company != '' || $designation != '') : ?>
                                            <span>
                                                <?php if($company != '') : ?>
                                                    <?php echo esc_attr($company); ?>
                                                <?php endif; ?>
                                                <?php if($designation != '') : ?>
                                                     - 
                                                    <?php echo esc_attr($designation); ?>
                                                <?php endif; ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div><!--detail-sec-->
                            </div>
                            <?php if($counter%3 == 0) : ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                            <?php $counter++; ?>
                        <?php endwhile; ?>
                    </div><!--testimonial block-->
                <?php else : ?>

                <?php endif; ?>

            </div>
        </div>
        <?php
    }

    function scrollme_slide_gallery() {
        ?>
        <div class="s-panel-inner">
            <div class="container container-fluid team-content">
                <header class="entry-header">
                    <?php $section_title = get_theme_mod('scrollme_gal_title', 'Our Teams'); ?>
                    <h1 class="title1 entry-title"><?php echo wp_kses($section_title, array('span'=>array())); ?></h1>
                </header><!-- .entry-header -->

                <?php
                    $gal_args = array(
                        'post_type' => 'galleries',
                        'posts_per_page' => -1,
                    );

                    $gal_query = new WP_Query($gal_args);
                ?>
                <?php if($gal_query->have_posts()) : ?>
                    <div class="hm-gallery-container"> <!-- Home Gallery Container -->
                    <?php while($gal_query->have_posts()) : $gal_query->the_post(); ?>
                        <?php if(has_post_thumbnail()) : ?>
                        <div class="gal-img-wrap">
                            <figure>
                                <?php
                                    $img1 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'scrollme-gal-thumbnail'); $img1_src = $img1[0];
                                    $img2 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); $img2_src = $img2[0];
                                ?>
                                <img class="gal-img" src="<?php echo $img1_src ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                <figcaption>
                                    <div class="gal-detail">
                                        <div class="gal-links">
                                            <a class="gal-lbox-link" href="<?php echo $img2_src ?>"><i class="fa fa-search link1" data-lightbox-gallery="gal"></i></a>
                                            <a href="<?php the_permalink(); ?>"><i class="fa fa-link link1"></i></a>
                                        </div><!--fa-iconsss-->

                                        <div class="gal-title">
                                            <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                                            <?php
                                                $terms = get_the_terms( get_the_ID(), 'gallery_category' );
                                                $termlnk = '';
                                                if(!empty($terms)) :
                                                    $lastelement = end($terms);
                                                    foreach($terms as $term) :
                                                        $termlnk .= '<a href="'.get_term_link($term->term_id).'">'.$term->name.'</a>';
                                                        if($term != $lastelement){
                                                            $termlnk .= ', ';
                                                        }
                                                    endforeach;
                                                endif;
                                            ?>
                                            <?php if(!empty($terms)) : ?>
                                                <span><?php echo $termlnk; ?></span>
                                            <?php endif; ?>
                                        </div><!--info-sec12-->
                                    </div><!--detail-image-->
                                </figcaption>
                            </figure>
                        </div><!-- gal-img-wrap -->
                        <?php endif; ?> <!-- Has post thumbnail -->
                    <?php endwhile; ?>
                    </div> <!-- Home Gallery Container -->
                <?php else : ?>
                    
                <?php endif; ?>

            </div>
        </div>
        <?php
    }

// Modify main menu attribute
class Menu_Attibute_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        /**
         * Filter the CSS class(es) applied to a menu item's list item element.
         *
         * @since 3.0.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $classes The CSS classes that are applied to the menu item's `<li>` element.
         * @param object $item The current menu item.
         * @param array $args An array of {@see wp_nav_menu()} arguments.
         * @param int $depth Depth of menu item. Used for padding.
         */
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        /**
         * Filter the ID applied to a menu item's list item element.
         *
         * @since 3.0.1
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param string $menu_id The ID that is applied to the menu item's `<li>` element.
         * @param object $item The current menu item.
         * @param array $args An array of {@see wp_nav_menu()} arguments.
         * @param int $depth Depth of menu item. Used for padding.
         */
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        if ( ( $hash_pos = strpos( $item->url, '#' ) ) !== false ) {
            $data_anchor = substr( $item->url, $hash_pos+6  );

            $data_anchor = " data-menuanchor='$data_anchor'";
        }else {
            $data_anchor = '';
        }
        $output .= $indent . '<li' . $data_anchor . $id . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        /**
         * Filter the HTML attributes applied to a menu item's anchor element.
         *
         * @since 3.6.0
         * @since 4.1.0 The `$depth` parameter was added.
         *
         * @param array $atts {
         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
         *
         * @type string $title Title attribute.
         * @type string $target Target attribute.
         * @type string $rel The rel attribute.
         * @type string $href The href attribute.
         * }
         * @param object $item The current menu item.
         * @param array $args An array of {@see wp_nav_menu()} arguments.
         * @param int $depth Depth of menu item. Used for padding.
         */
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        /** This filter is documented in wp-includes/post-template.php */
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        /**
         * Filter a menu item's starting output.
         *
         * The menu item's starting output only includes `$args->before`, the opening `<a>`,
         * the menu item's title, the closing `</a>`, and `$args->after`. Currently, there is
         * no filter for modifying the opening and closing `<li>` for a menu item.
         *
         * @since 3.0.0
         *
         * @param string $item_output The menu item's starting HTML output.
         * @param object $item Menu item data object.
         * @param int $depth Depth of menu item. Used for padding.
         * @param array $args An array of {@see wp_nav_menu()} arguments.
         */
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/** Enqueue Scripts for Backend **/
function scrollme_admin_scripts() {
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', true );
    wp_enqueue_style('scrollme-custom-admin', get_template_directory_uri() . '/inc/admin/css/custom-admin-css.css', true );

    wp_enqueue_script('scrollme-admin-js', get_template_directory_uri() . '/inc/admin/js/custom-admin.js', array('jquery') );
}

add_action( 'admin_enqueue_scripts', 'scrollme_admin_scripts' );

/** Other Custom Functions **/
function get_scrollme_excerpt($pcontent, $char, $wordcutoff, $read_more) {
    global $post;
    $excerpt = '';
    $content = ($pcontent == '') ? get_the_content($post->ID) : $pcontent;
    $content = strip_tags(strip_shortcodes( $content ));

    if(strlen($content) < $char) {
        return $content;
    }
    
    if($wordcutoff) {
        $pos = strpos( $content, ' ', $char);
        $excerpt =  substr( $content, 0, $pos );
    }else {
        $excerpt =  substr( $content, 0, $char );
    }
    
    if($read_more != ''){
        $excerpt .= ' <a class="rev-read-more" href="'.get_the_permalink($post->ID).'">'.$read_more.'</a>';
    }
    
    return $excerpt;
}

/** Color Setting Function **/
    function colourBrightness($hex, $percent) {
        // Work out if hash given
        $hash = '';
        if (stristr($hex, '#')) {
            $hex = str_replace('#', '', $hex);
            $hash = '#';
        }
        /// HEX TO RGB
        $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
        //// CALCULATE 
        for ($i = 0; $i < 3; $i++) {
            // See if brighter or darker
            if ($percent > 0) {
                // Lighter
                $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
            } else {
                // Darker
                $positivePercent = $percent - ($percent * 2);
                $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
            }
            // In case rounding up causes us to go to 256
            if ($rgb[$i] > 255) {
                $rgb[$i] = 255;
            }
        }
        //// RBG to Hex
        $hex = '';
        for ($i = 0; $i < 3; $i++) {
            // Convert the decimal digit to hex
            $hexDigit = dechex($rgb[$i]);
            // Add a leading zero if necessary
            if (strlen($hexDigit) == 1) {
                $hexDigit = "0" . $hexDigit;
            }
            // Append to the hex string
            $hex .= $hexDigit;
        }
        return $hash . $hex;
    }
    
    function hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);
    
        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    /** Exclude Categories from Blog Page **/
    function scrollme_exclude_category_from_blogpost($query) {
        $exclude_category = get_theme_mod('blog_exclude_cat', ''); 
        $ex_cats = explode(',', $exclude_category);
        array_pop($ex_cats);
        
        if ( $query->is_home() ) {
            $query->set('category__not_in', $ex_cats);
        }
        return $query;
    }
    add_filter('pre_get_posts', 'scrollme_exclude_category_from_blogpost');