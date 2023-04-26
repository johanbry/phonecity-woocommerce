<?php


function add_slider_frontpage()
{
    if (is_front_page()) {
        echo do_shortcode('[metaslider id="187"]');
    }
}

add_action('storefront_before_content', 'add_slider_frontpage');
