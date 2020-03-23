<?php

// Register Custom Post Type
function dricub_driving_school_programs_post_type() {

    $labels = array(
        'name' => _x('Programs', 'Post Type General Name', 'ULTIMA_NAME'),
        'singular_name' => _x('Program', 'Post Type Singular Name', 'dricub-driving-school-core'),
        'menu_name' => __('Programs', 'dricub-driving-school-core'),
        'name_admin_bar' => __('Program', 'dricub-driving-school-core'),
        'archives' => __('Item Archives', 'dricub-driving-school-core'),
        'parent_item_colon' => __('Parent Item:', 'dricub-driving-school-core'),
        'all_items' => __('All Programs', 'dricub-driving-school-core'),
        'add_new_item' => __('Add New Program', 'dricub-driving-school-core'),
        'add_new' => __('Add New Program', 'dricub-driving-school-core'),
        'new_item' => __('New Program Item', 'dricub-driving-school-core'),
        'edit_item' => __('Edit Program Item', 'dricub-driving-school-core'),
        'update_item' => __('Update Program Item', 'dricub-driving-school-core'),
        'view_item' => __('View Program Item', 'dricub-driving-school-core'),
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

   $slug_postype_program = 'program'; //'program'

    if (function_exists('dricub_driving_school_options')){
       $dricub_driving_school_options = dricub_driving_school_options();
        if( isset( $dricub_driving_school_options['dricub_driving_school-slug_postype_program'] )&&!empty($dricub_driving_school_options['dricub_driving_school-slug_postype_program']) ){
                $slug_postype_program = $dricub_driving_school_options['dricub_driving_school-slug_postype_program'];
        }
    }


    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'dricub-driving-school-core'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => $slug_postype_program),
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('our-programs', $args);
}

add_action('init', 'dricub_driving_school_programs_post_type', 0);
