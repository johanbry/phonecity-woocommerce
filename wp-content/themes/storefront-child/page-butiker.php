<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		while (have_posts()) :
			the_post();

			do_action('storefront_page_before');

			get_template_part('content', 'page');

			/**
			 * Functions hooked in to storefront_page_after action
			 *
			 * @hooked storefront_display_comments - 10
			 */
			do_action('storefront_page_after');

		endwhile; // End of the loop.
		?>


		<?php
		$args = array(
			'post_type' => 'butik',
			'posts_per_page' => '10',
			'orderby' => 'title', 'order' => 'ASC',
		);

		$loop = new WP_Query($args);

		while ($loop->have_posts()) {
			$loop->the_post();

		?>
			<a href="<?php the_permalink(); ?>">
				<div class="butik-entry">
					<div class="butik-entry-text">
						<h3><?php the_title(); ?></h3>

						<?php the_field('gatuadress'); ?>, <?php the_field('postnummer'); ?> <?php the_field('stad'); ?>
					</div>
					<div>
						<?php the_post_thumbnail('thumbnail'); ?>
					</div>
				</div>
			</a>
		<?php
		}
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
do_action('storefront_sidebar');
get_footer();
