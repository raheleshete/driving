<?php

vc_map(array(
    "name" => "Twitter Posts",
    "base" => "twitter_posts",
    "category" => esc_html__('Driving School', 'driving_school'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Author URL", 'driving_school'),
            "param_name" => "author",
            "value" => "",
            'description' => esc_html__( 'set the twitter profile url. ex: http://twitter.com/envato', 'driving_school' ), 
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Posts Limit", 'driving_school'),
            "param_name" => "limit",
            "value" => "",
        ),
    )
));


if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_twitter_posts extends WPBakeryShortCode {
        
    }

}