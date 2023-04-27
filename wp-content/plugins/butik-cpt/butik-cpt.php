<?php
/*
Plugin Name: Butik CPT
Description: Just another contact form plugin. Simple but flexible.
Author: Grupp 2
*/

function butik_custom_post_type()
{
    register_post_type(
        'butik',
        array(
            'labels'      => array(
                'name'          => 'Butiker',
                'singular_name' => 'Butik',
            ),
            'public'      => true,
            'has_archive' => true,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'butik_custom_post_type');
