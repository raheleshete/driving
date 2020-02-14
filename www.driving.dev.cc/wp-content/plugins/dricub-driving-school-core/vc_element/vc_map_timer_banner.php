<?php

vc_map(array(
    "name" => "Timer Banner",
    "base" => "timer_banner",
    "category" => esc_html__('Driving School', 'driving_school'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Date", 'driving_school'),
            "param_name" => "date",
            "value" => "2018-12-08",
            "description" => esc_html__('put the date like: 2018-12-08', 'driving_school'),
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Cover Image", 'driving_school'),
            "param_name" => "cover_img",
            "value" => "2018-12-08",
            "description" => esc_html__('put the date like: 2018-12-08', 'driving_school'),
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Contents", 'driving_school'),
            "param_name" => "content",
            "value" => "",
        ),
    )
));


if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_timer_banner extends WPBakeryShortCode {
        
    }

}