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
        <div class="wp-block-columns is-layout-flex wp-container-3 contact-columns">
            <div class="wp-block-column is-layout-flow">
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
            </div>

            <div class="wp-block-column is-layout-flow">
                <?php
                if (class_exists('WooCommerce')) { // Is Woocommerce acive?
                    $store_address     = get_option('woocommerce_store_address');
                    $store_city        = get_option('woocommerce_store_city');
                    $store_postcode    = get_option('woocommerce_store_postcode');
                    $store_country     = get_option('woocommerce_default_country');

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
