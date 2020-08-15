<?php

add_action('init', 'code_post_type');

function code_post_type() {
    // Custom Post Type
    register_post_type( 'code', array(
        'supports'=> array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'labels' => array(
            'name' => 'Code',
            'add_new_item' => 'Add New Code',
            'edit_item' => 'Edit Code',
            'all_items' => 'All Codes',
            'singular_name' => 'code',
        ),
        'menu_icon' => 'dashicons-groups',
        'taxonomies' => array( 'code' ),
        'show_in_rest' => true,
        'menu_position' => 3,
    ) );
}