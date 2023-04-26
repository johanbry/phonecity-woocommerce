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
