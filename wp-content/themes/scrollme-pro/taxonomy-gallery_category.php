<?php
/**
 * The template for displaying Gallery Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package scrollme
 */

get_header(); ?>

	<div class="container clearfix">
		<div id="primary" class="content-area">
			<?php if ( have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="gal-arch-container">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php if(has_post_thumbnail()) : ?>
							<?php
								$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'scrollme-gal-single-thumbnail1' );
								$img_src = $img[0];
								$galimgar = get_post_meta($post->ID, 'galimg', false);
								$totalimgs = empty($galimgar) ? 0 : count($galimgar[0]);
							?>
							<a href="<?php the_permalink(); ?>" >
							<div class="arche-post-wrap">
									<span class="gal-arch-post-no"><?php echo $totalimgs; ?></span>
									<img src="<?php echo $img_src; ?>" alt="<?php the_title_attribute(); ?>" />
									<a href="<?php the_permalink(); ?>">
										<span class="gal-arch-post-title"><?php the_title(); ?></span>
									</a>
							</div>
							</a>
							
						<?php endif; ?>
					<?php endwhile; ?>
				</div>

			<?php else : ?>lksldjkfalskjfafd

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</div><!-- #primary -->

		<?php get_sidebar( 'right' ); ?>
	</div>

<?php get_footer();