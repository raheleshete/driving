<?php

vc_map(array(
    "name" => "Facebook Posts",
    "base" => "facebook_posts",
    "category" => esc_html__('Driving School', 'driving_school'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Facebook Page Link", 'driving_school'),
            "param_name" => "fb_page_link",
            "value" => "",
            'description' => esc_html__( 'set the facebook profile/page url. ex: https://www.facebook.com/envato/', 'driving_school' ), 
        ),
    )
));


if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_facebook_posts extends WPBakeryShortCode {
        
    }

}