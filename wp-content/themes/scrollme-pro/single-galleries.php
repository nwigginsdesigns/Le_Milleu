<?php
/**
 * The template for displaying all single Gallery Post.
 *
 * @package scrollme
 */

get_header(); ?>

	<div class="container clearfix">
		<div id="primary" class="content-area">
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header><!-- .entry-header -->
					<?php
						/** Meta Values **/
						$galimgar = get_post_meta($post->ID, 'galimg', false);
					?>

					<?php if(!empty($galimgar)) : //$i = 0; ?>
						<div class="scme-gal-wrap" id="gallery-container">
						<?php $galimg = $galimgar[0]; ?>

						<?php foreach($galimg as $gal) : ?>
							<?php if($gal['image'] != '') : ?>
							<?php
								/*
								add_image_size( 'scrollme-gal-single-thumbnail1', 390, 390, true ); // Galery Single Thumbnail1 Single Page
							    add_image_size( 'scrollme-gal-single-thumbnail2', 390, 400, true ); // Galery Single Thumbnail2 Single Page
							    add_image_size( 'scrollme-gal-single-thumbnail3', 390, 500, true ); // Galery Single Thumbnail3 Single Page
							    */
							    $rawurl = esc_url_raw($gal['image']);
							    $atid = attachment_url_to_postid($rawurl);
						    	$img = wp_get_attachment_image_src( $atid, 'scrollme-gal-single-thumbnail1' );
					    		$img_src = $img[0];

							    /*if($i == 0) {
							    	$img = wp_get_attachment_image_src( $atid, 'scrollme-gal-single-thumbnail1' );
							    } elseif($i == 1) {
						    		$img = wp_get_attachment_image_src( $atid, 'scrollme-gal-single-thumbnail2' );
							    }elseif($i == 2) {
							    	$img = wp_get_attachment_image_src( $atid, 'scrollme-gal-single-thumbnail3' );
						    	}*/
						    	
							?>
							
							<div class="sgal-img-wrap">
								<a class="sgal-lbox-link" href="<?php echo esc_url_raw($gal['image']); ?>" data-lightbox-gallery="sgal" title="<?php echo esc_attr($gal['title']); ?>">
	                                <img src="<?php echo $img_src; ?>" title="<?php echo esc_attr($gal['title']); ?>" alt="<?php echo esc_attr($gal['title']); ?>" />
	                            </a>
                            </div>

                            <?php /*
                        		$i++;
	                        	if($i >2 ){
	                        		$i = 0;
	                        	} */
                        	?>
                        	<?php endif; ?>
						<?php endforeach; ?>
						</div>
					<?php endif; ?>
					
				<?php endwhile; ?>
			<?php endif; ?>
			
		</div><!-- #primary -->

		<?php get_sidebar('left'); ?>
		<?php get_sidebar('right'); ?>
	</div>

<?php get_footer();