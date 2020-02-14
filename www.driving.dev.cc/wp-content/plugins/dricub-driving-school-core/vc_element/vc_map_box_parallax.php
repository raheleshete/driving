<?php

vc_map(array(
    "name" => "Box Parallex",
    "base" => "box_parallax",
    "category" => esc_html__('Driving School', 'driving_school'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Parallex Image", 'driving_school'),
            "param_name" => "cover_img",
            "value" => "",
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

    class WPBakeryShortCode_driving_school_box_parallax extends WPBakeryShortCode {
        
    }

}