<?php
/**
 * The template for displaying all single posts.
 *
 * @package scrollme
 */

get_header(); ?>

	<div class="container clearfix">
		<div id="primary" class="content-area">

			<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<?php
					/* Portfolio Post Metas */
					$descr_heading_txt = sanitize_text_field( get_theme_mod( 'port_descr_text', 'Project Description' ));
					$details_heading_txt = sanitize_text_field( get_theme_mod( 'port_details_text', 'Project Details' ));
					$disable_details = esc_attr( get_theme_mod( 'port_disable_details', '' ) );
					$ppclass = ($disable_details == '') ? '' : 'descr-only';

					/* Portfolio Details */
					$project_details = get_post_meta( get_the_ID(), 'sme_port_details', true );

					/* Portfolio Fields */
					$sme_port_field1_label = get_post_meta($post->ID, 'sme_port_field1_label', true);
		            if(empty($sme_port_field1_label)){$sme_port_field1_label = '';}

		            $sme_port_field2_label = get_post_meta($post->ID, 'sme_port_field2_label', true);
		            if(empty($sme_port_field2_label)){$sme_port_field2_label = '';}

		            $sme_port_field3_label = get_post_meta($post->ID, 'sme_port_field3_label', true);
		            if(empty($sme_port_field3_label)){$sme_port_field3_label = '';}

		            $sme_port_field4_label = get_post_meta($post->ID, 'sme_port_field4_label', true);
		            if(empty($sme_port_field4_label)){$sme_port_field4_label = '';}

		            $sme_port_field5_label = get_post_meta($post->ID, 'sme_port_field5_label', true);
		            if(empty($sme_port_field5_label)){$sme_port_field5_label = '';}

		            // Values
		            $sme_port_field1_val = get_post_meta($post->ID, 'sme_port_field1_val', true);
		            if(empty($sme_port_field1_val)){$sme_port_field1_val = '';}

		            $sme_port_field2_val = get_post_meta($post->ID, 'sme_port_field2_val', true);
		            if(empty($sme_port_field2_val)){$sme_port_field2_val = '';}

		            $sme_port_field3_val = get_post_meta($post->ID, 'sme_port_field3_val', true);
		            if(empty($sme_port_field3_val)){$sme_port_field3_val = '';}

		            $sme_port_field4_val = get_post_meta($post->ID, 'sme_port_field4_val', true);
		            if(empty($sme_port_field4_val)){$sme_port_field4_val = '';}

		            $sme_port_field5_val = get_post_meta($post->ID, 'sme_port_field5_val', true);
		            if(empty($sme_port_field5_val)){$sme_port_field5_val = '';}
				?>

				<div class="port-pg-wrap">
					<?php if(has_post_thumbnail()) : ?>
						<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); $img_src = $img[0]; ?>
						<figure>
							<img src="<?php echo $img_src; ?>" alt="<?php the_title_attribute(); ?>">
						</figure>
					<?php endif; ?>
					<div class="port-pg-contents <?php echo $ppclass; ?>">
						<div class="port-descr">
							<?php if($descr_heading_txt != '') : ?>
								<h3><span class="descrme"><?php echo $descr_heading_txt; ?></span></h3>
							<?php endif; ?>
							<div class="p-content">
								<?php the_content(); ?>
							</div>
						</div>
						<?php if(($project_details != '' || $sme_port_field1_label != '' || $sme_port_field2_label != '' || $sme_port_field3_label != '' || $sme_port_field4_label != '' || $sme_port_field5_label != '') && !$disable_details) : ?>
							<div class="port-details">
							<?php if($details_heading_txt != '') : ?>
								<h3><span class="detme"><?php echo $details_heading_txt; ?></span></h3>
							<?php endif; ?>

							<?php if($project_details != '') : ?>
								<?php echo $project_details; ?>
							<?php endif; ?>

							<?php if($sme_port_field1_label != '' || $sme_port_field2_label != '' || $sme_port_field3_label != '' || $sme_port_field4_label != '' || $sme_port_field5_label != '') : ?>
								<ul>
									<?php for($i = 1; $i <= 5; $i++) : ?>
										<?php
											$label = sanitize_text_field(get_post_meta( get_the_id(), 'sme_port_field'.$i.'_label', true ));
											$value = sanitize_text_field(get_post_meta( get_the_id(), 'sme_port_field'.$i.'_val', true ));
										?>
										<?php if($label != '' && $value != '') : ?>
											<li>
												<span class="proj-label"><?php echo $label; ?>: </span>
												<span class="proj-value"><?php echo $value; ?></span>
											</li>
										<?php endif; ?>
									<?php endfor; ?>
								</ul>
							<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

			<?php endwhile; // End of the loop. ?>
			
		</div><!-- #primary -->

		<?php get_sidebar('left'); ?>
		<?php get_sidebar('right'); ?>
	</div>

<?php get_footer();