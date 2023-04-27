<?php

/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">


		<header class="page-header">
			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="taxonomy-description">', '</div>');
			?>
		</header><!-- .page-header -->

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
