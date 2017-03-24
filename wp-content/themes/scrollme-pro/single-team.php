<?php
/**
 * The template for displaying all single team posts.
 *
 * @package scrollme
 */

get_header(); ?>

	<div class="container clearfix">
		<div id="primary" class="content-area">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="team-wrap">
					<?php
						if(has_post_thumbnail()) {
							$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'scrollme-team-single-thumbnail' );
							$img_src = $img[0];
						} else {
							$img_src = get_template_directory_uri().'/images/no-team-thumbnail.png';
						}
					?>
					<figure>
						<img src="<?php echo $img_src; ?>" alt="<?php the_title_attribute(); ?>">
					</figure>
					<div class="team-meta-info">
						<?php
							/** Team Metas **/
							/** Designatin **/
							$sme_team_designation = sanitize_text_field(get_post_meta( get_the_id(), 'sme_team_designation', true ));

							/** Social Links **/
							$sme_team_fb = esc_url_raw(get_post_meta( get_the_id(), 'sme_team_fb', true ));
							$sme_team_tw = esc_url_raw(get_post_meta( get_the_id(), 'sme_team_tw', true ));
							$sme_team_skype = esc_url_raw(get_post_meta( get_the_id(), 'sme_team_skype', true ));
							$sme_team_lnk = esc_url_raw(get_post_meta( get_the_id(), 'sme_team_lnk', true ));

							/** Skills **/
							$skills_heading = sanitize_text_field(get_theme_mod( 'team_skill_heading', 'Skills' ));
							$team_aboutme_txt = sanitize_text_field(get_theme_mod( 'team_aboutme_txt', 'About Me' ));

							$sme_team_skill1_label = sanitize_text_field(get_post_meta( get_the_id(), 'sme_team_skill1_label', true ));
							$sme_team_skill2_label = sanitize_text_field(get_post_meta( get_the_id(), 'sme_team_skill2_label', true ));
							$sme_team_skill3_label = sanitize_text_field(get_post_meta( get_the_id(), 'sme_team_skill3_label', true ));
							$sme_team_skill4_label = sanitize_text_field(get_post_meta( get_the_id(), 'sme_team_skill4_label', true ));
							$sme_team_skill1_val = absint(get_post_meta( get_the_id(), 'sme_team_skill1_val', true ));
							$sme_team_skill2_val = absint(get_post_meta( get_the_id(), 'sme_team_skill2_val', true ));
							$sme_team_skill3_val = absint(get_post_meta( get_the_id(), 'sme_team_skill3_val', true ));
							$sme_team_skill4_val = absint(get_post_meta( get_the_id(), 'sme_team_skill4_val', true ));
						?>

						<h2><?php the_title(); ?></h2>
						<?php if($sme_team_designation != '') : ?>
							<span class="team-design"><?php echo $sme_team_designation; ?></span>
						<?php endif; ?>
						<?php if($sme_team_fb != '' || $sme_team_tw != '' || $sme_team_skype != '' || $sme_team_lnk != '') : ?>
						<div class="tm-social-link-wrap">
							<?php if($sme_team_fb != '') : ?>
								<a href="<?php echo $sme_team_fb; ?>"><i class="fa fa-facebook"></i></a>
							<?php endif; ?>

							<?php if($sme_team_tw != '') : ?>
								<a href="<?php echo $sme_team_tw; ?>"><i class="fa fa-twitter"></i></a>
							<?php endif; ?>

							<?php if($sme_team_skype != '') : ?>
								<a href="<?php echo $sme_team_skype; ?>"><i class="fa fa-skype"></i></a>
							<?php endif; ?>

							<?php if($sme_team_lnk != '') : ?>
								<a href="<?php echo $sme_team_lnk; ?>"><i class="fa fa-linkedin"></i></a>
							<?php endif; ?>
						</div>
						<?php endif; ?>

						<?php if($sme_team_skill1_label != '' || $sme_team_skill2_label != '' || $sme_team_skill3_label != '' || $sme_team_skill4_label != '') : ?>
						<div>
							<?php if($skills_heading != '') : ?>
								<h3 class="skills-heading"><?php echo $skills_heading; ?></h3>
							<?php endif; ?>
							<?php if($sme_team_skill1_label != '') : ?>
                                <div class="pbar-label"><?php echo $sme_team_skill1_label; ?></div>
                                <div class="progressBar" data-label="<?php echo $sme_team_skill1_label; ?>" id="max<?php echo $sme_team_skill1_val; ?>" data-width="<?php echo $sme_team_skill1_val; ?>"><div></div></div>
                            <?php endif; ?>

                            <?php if($sme_team_skill2_label != '') : ?>
                                <div class="pbar-label"><?php echo $sme_team_skill2_label; ?></div>
                                <div class="progressBar" data-label="<?php echo $sme_team_skill2_label; ?>" id="max<?php echo $sme_team_skill2_val; ?>" data-width="<?php echo $sme_team_skill2_val; ?>"><div></div></div>
                            <?php endif; ?>

                            <?php if($sme_team_skill3_label != '') : ?>
                                <div class="pbar-label"><?php echo $sme_team_skill3_label; ?></div>
                                <div class="progressBar" data-label="<?php echo $sme_team_skill3_label; ?>" id="max<?php echo $sme_team_skill3_val; ?>" data-width="<?php echo $sme_team_skill3_val; ?>"><div></div></div>
                            <?php endif; ?>

                            <?php if($sme_team_skill4_label != '') : ?>
                                <div class="pbar-label"><?php echo $sme_team_skill4_label; ?></div>
                                <div class="progressBar" data-label="<?php echo $sme_team_skill4_label; ?>" id="max<?php echo $sme_team_skill4_val; ?>" data-width="<?php echo $sme_team_skill4_val; ?>"><div></div></div>
                            <?php endif; ?>
                            
						</div>
						<?php endif; ?>
					</div>
					<div class="team-descr">
						<?php if($team_aboutme_txt != '') : ?>
							<h3><span class="tm-aboutme"><?php echo $team_aboutme_txt; ?></span></h3>
						<?php endif; ?>
						<?php the_content(); ?>
					</div>
				</div>

			<?php endwhile; // End of the loop. ?>
			
		</div><!-- #primary -->

		<?php get_sidebar('left'); ?>
		<?php get_sidebar('right'); ?>
	</div>

<?php get_footer();