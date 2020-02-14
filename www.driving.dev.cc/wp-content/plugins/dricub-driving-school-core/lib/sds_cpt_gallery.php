<?php

add_action('init', 'register_driving_school_gallery_postype');

function register_driving_school_gallery_postype() {

    $labels = array(
        'name' => __('Gallery', 'dricub-driving-school-core'),
        'singular_name' => __('Gallery', 'dricub-driving-school-core'),
        'add_new' => __('Add New', 'dricub-driving-school-core'),
        'add_new_item' => __('Add New Gallery', 'dricub-driving-school-core'),
        'edit_item' => __('Edit Gallery', 'dricub-driving-school-core'),
        'new_item' => __('New Gallery', 'dricub-driving-school-core'),
        'view_item' => __('View Gallery', 'dricub-driving-school-core'),
        'search_items' => __('Search Gallery', 'dricub-driving-school-core'),
        'not_found' => __('No Gallery found', 'dricub-driving-school-core'),
        'not_found_in_trash' => __('No Gallery found in Trash', 'dricub-driving-school-core'),
        'parent_item_colon' => ''
    );

    register_post_type('gallery', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => __('gallery', 'dricub-driving-school-core'))
    ));

    $labels = array(
        'name' => _x('Gallery Categories', 'portfolio categories', 'dricub-driving-school-core'),
        'singular_name' => _x('Gallery Category', 'portfolio category', 'dricub-driving-school-core'),
        'search_items' => __('Search Gallery Categories', 'dricub-driving-school-core'),
        'all_items' => __('All Gallery Categories', 'dricub-driving-school-core'),
        'parent_item' => __('Parent Gallery Category', 'dricub-driving-school-core'),
        'parent_item_colon' => __('Parent Gallery Category:', 'dricub-driving-school-core'),
        'edit_item' => __('Edit Gallery Category', 'dricub-driving-school-core'),
        'update_item' => __('Update Gallery Category', 'dricub-driving-school-core'),
        'add_new_item' => __('Add New Gallery Category', 'dricub-driving-school-core'),
        'new_item_name' => __('New Gallery Category Name', 'dricub-driving-school-core'),
        'menu_name' => __('Gallery Category', 'dricub-driving-school-core'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'gallery-cat'),
    );

    register_taxonomy('gallery-cat', array('gallery'), $args);
}
