<?php

/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="wp-block-columns is-layout-flex wp-container-3 contact-columns">
            <div class="wp-block-column is-layout-flow">
                <?php
                while (have_posts()) :
                    the_post();

                    do_action('storefront_single_post_before');

                    get_template_part('content', 'single');

                    do_action('storefront_single_post_after');

                endwhile; // End of the loop.
                ?>
            </div>

            <div class="wp-block-column is-layout-flow">
                <?php
                if (class_exists('WooCommerce')) { // Is Woocommerce acive?
                    $store_address     = get_field('gatuadress');
                    $store_city        = get_field('stad');
                    $store_postcode    = get_field('postnummer');
                    $store_country     = 'Sweden';

                    $address = $store_address . ',' . $store_postcode . '+' . $store_city . '+' . $store_country;
                ?>
                    <iframe style="min-height: 500px; max-height: 800px;" width="100%" height="100%" frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDLvazFK2SNuOSbfT83CKWi0hykpCQohQc&q=<?= $address ?>&zoom=12" allowfullscreen>
                    </iframe>
                <?php
                }
                ?>
            </div>
        </div>

    </main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();
