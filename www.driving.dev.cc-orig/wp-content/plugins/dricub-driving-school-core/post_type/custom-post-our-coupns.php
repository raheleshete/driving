<?php

// Register Custom Post Type
function dricub_driving_school_coupons_post_type() {

    $labels = array(
        'name' => _x('Coupons', 'Post Type General Name', 'dricub-driving-school-core'),
        'singular_name' => _x('Coupon', 'Post Type Singular Name', 'dricub-driving-school-core'),
        'menu_name' => __('Coupons', 'dricub-driving-school-core'),
        'name_admin_bar' => __('Coupon', 'dricub-driving-school-core'),
        'archives' => __('Item Archives', 'dricub-driving-school-core'),
        'parent_item_colon' => __('Parent Item:', 'dricub-driving-school-core'),
        'all_items' => __('All Coupons', 'dricub-driving-school-core'),
        'add_new_item' => __('Add New Coupon', 'dricub-driving-school-core'),
        'add_new' => __('Add New Coupon', 'dricub-driving-school-core'),
        'new_item' => __('New Service Item', 'dricub-driving-school-core'),
        'edit_item' => __('Edit Coupon Item', 'dricub-driving-school-core'),
        'update_item' => __('Update Coupon Item', 'dricub-driving-school-core'),
        'view_item' => __('View Coupon Item', 'dricub-driving-school-core'),
        'search_items' => __('Search Item', 'dricub-driving-school-core'),
        'not_found' => __('Not found', 'dricub-driving-school-core'),
        'not_found_in_trash' => __('Not found in Trash', 'dricub-driving-school-core'),
        'featured_image' => __('Featured Image', 'dricub-driving-school-core'),
        'set_featured_image' => __('Set featured image', 'dricub-driving-school-core'),
        'remove_featured_image' => __('Remove featured image', 'dricub-driving-school-core'),
        'use_featured_image' => __('Use as featured image', 'dricub-driving-school-core'),
        'insert_into_item' => __('Insert into item', 'dricub-driving-school-core'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'dricub-driving-school-core'),
        'items_list' => __('Items list', 'dricub-driving-school-core'),
        'items_list_navigation' => __('Items list navigation', 'dricub-driving-school-core'),
        'filter_items_list' => __('Filter items list', 'dricub-driving-school-core'),
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'dricub-driving-school-core'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'our_coupons'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail'),
    );

    register_post_type('our_coupons', $args);
}

add_action('init', 'dricub_driving_school_coupons_post_type', 0);
