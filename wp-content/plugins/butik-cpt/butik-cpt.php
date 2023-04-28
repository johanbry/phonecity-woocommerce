<?php
/*
Plugin Name: Butik CPT
Description: Create Custom Post Type Butiker.
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
            'has_archive' => false,
            'show_in_rest' => true,
            'supports' => array('thumbnail', 'editor'),
        )
    );
}
add_action('init', 'butik_custom_post_type');
