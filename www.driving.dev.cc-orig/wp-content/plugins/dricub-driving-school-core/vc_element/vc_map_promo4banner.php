<?php

vc_map(array(
    "name" => "Promo 4 Banner",
    "base" => "promo4banner",
    "category" => esc_html__('Driving School', 'driving_school'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => esc_html__("Title", 'driving_school'),
            "param_name" => "title",
            "value" => "",
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Background Image", 'driving_school'),
            "param_name" => "background",
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

    class WPBakeryShortCode_driving_school_promo4banner extends WPBakeryShortCode {
        
    }

}