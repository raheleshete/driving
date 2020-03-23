<?php

vc_map(array(
    "name" => "Promo Banner",
    "base" => "promo_banner",
    "category" => esc_html__('Driving School', 'driving_school'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Image", 'driving_school'),
            "param_name" => "image",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "admin_label" => false,
            "heading" => esc_html__("Call", 'driving_school'),
            "param_name" => "call",
        ),
        array(
            "type" => "textfield",
            "admin_label" => false,
            "heading" => esc_html__("Pre-Title", 'driving_school'),
            "param_name" => "pre_title",
            "value" => "Schedule",
        ),
        array(
            "type" => "textfield",
            "admin_label" => false,
            "heading" => esc_html__("Title", 'driving_school'),
            "param_name" => "title",
            "value" => "Your Driving Lessons",
        ),
        array(
            "type" => "textfield",
            "admin_label" => false,
            "heading" => esc_html__("Post Title", 'driving_school'),
            "param_name" => "post_title",
            "value" => "with Us!",
        ),
        array(
            "type" => "textfield",
            "admin_label" => false,
            "heading" => esc_html__("Extra Class", 'driving_school'),
            "param_name" => "extra_class",
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

    class WPBakeryShortCode_driving_school_promo_banner extends WPBakeryShortCode {
        
    }

}