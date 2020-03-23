<?php


vc_map(array(
    "name" => "Instagram Feed",
    "base" => "instagram_feed",
    "category" => esc_html__('Driving School', 'driving_school'),
    "content_element" => true,
    "show_settings_on_create" => true,
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __( 'User Id', 'driving_school' ),
            'value' => '',
            'param_name' => 'userid',
            'description' => __( 'User ID of instagram account.', 'driving_school' ),
            "admin_label" => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Client Id', 'driving_school' ),
            'value' => '',
            'param_name' => 'clientid',
            'description' => __( 'Client ID of instagram account.', 'driving_school' ),
            "admin_label" => true,
        ), 
        array(
            'type' => 'textfield',
            'heading' => __( 'Limit', 'driving_school' ),
            'value' => '',
            'param_name' => 'limit',
            'description' => __( 'Number of feed to show.', 'driving_school' ),
            "admin_label" => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => __( 'Access Token', 'driving_school' ),
            'value' => '',
            'param_name' => 'accesstoken',
            'description' => __( 'Access Token.', 'driving_school' ),
            "admin_label" => true,
        ),
    ),
));

if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_instagram_feed extends WPBakeryShortCode {
        
    }

}