<?php
if (!function_exists('storefront_header_widget_region')) {
    /**
     * Display header widget region
     *
     * @since  1.0.0
     */
    function storefront_header_widget_region()
    {
        if (is_active_sidebar('header-1')) {
?>
            <div class="header-widget-region" role="complementary">

                <?php dynamic_sidebar('header-1'); ?>

            </div>
<?php
        }
    }
}
