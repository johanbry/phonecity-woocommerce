<?php


function add_slider_frontpage()
{
    if (is_front_page()) {
        echo do_shortcode('[metaslider id="187"]');
    }
}

add_action('storefront_before_content', 'add_slider_frontpage');

function remove_storefront_sidebar()
{
    remove_action('storefront_sidebar', 'storefront_get_sidebar', 10);
}
add_action('get_header', 'remove_storefront_sidebar');

function remove_storefront_featuredimage()
{
    remove_action('storefront_post_content_before', 'storefront_post_thumbnail', 10);
}

add_action('get_header', 'remove_storefront_featuredimage');

function print_phone_number()
{
?>
    <div id="checkout-phone">
        <span>Frågor? Ring oss på 08-123 456 78</span>
    </div>
<?php
}

function add_cart_button()
{
?>
    <div id="checkout-cart-link">
        <a href="<?php echo wc_get_cart_url(); ?>">← Tillbaks till varukorgen</a>
    </div>
<?php
}

function adjust_checkout()
{
    if (is_checkout()) {
        remove_all_actions('storefront_header');
        remove_all_actions('storefront_before_content');
        remove_all_actions('storefront_footer');
        remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
        add_action('woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form', 10);
        add_action('woocommerce_review_order_after_payment', 'print_phone_number', 10);
        add_action('woocommerce_review_order_before_payment', 'add_cart_button', 10);
    }
}

add_action('get_header', 'adjust_checkout');
