<?php

vc_map(array(
    "name" => esc_html__("Driving School Testimonials", 'driving_school'),
    "base" => "driving_school_testimonials",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_testimonials_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Slider Type",
            "param_name" => "slider_type",
            "value" => array(
                "Single Slider" => 1,
                "Grid" => 2,
            ),
            "std" => '',
            "description"=> esc_html__('No of column of the team.', 'driving_school'),
        ),     array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Mobile First", 'driving_school'),
            "param_name" => "mobile_first",
            'group' => __( 'Slider Settings'),
            'value' => array(
                'No' => 'false',
                'Yes' => 'true',            
            ),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many slides to show", 'driving_school'),
            "param_name" => "slides_to_show",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_show' => '1',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("How many slides to scroll", 'driving_school'),
            "param_name" => "slides_to_scroll",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'slides_to_scroll' => '1',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Pause On Hover", 'driving_school'),
            "param_name" => "pause_on_hover",
            'value' => array(
                'No' => 'false',
                'Yes' => 'true'
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Autoplay", 'driving_school'),
            "param_name" => "autoplay",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Autoplay Speed", 'driving_school'),
            "param_name" => "autoplay_speed",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
            'value' => array(
                'autoplay_speed' => '6000',
            ),
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Infinite", 'driving_school'),
            "param_name" => "infinite",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
                
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable AdaptiveHeight", 'driving_school'),
            "param_name" => "adaptiveHeight",
            'value' => array(
                'No' => 'false',
                'Yes' => 'true',           
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Dots", 'driving_school'),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
                
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Arrows", 'driving_school'),
            "param_name" => "arrows",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false'
                
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        )
    )
));

vc_map(array(
    "name" => esc_html__("Driving School Testimonials Item", 'driving_school'),
    "base" => "driving_school_testimonials_items",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_testimonials'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Name", 'driving_school'),
            "param_name" => "rev_name",
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Text", 'driving_school'),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Ratting', 'driving_school'),
            'param_name' => 'ratting',
            'value' => array(
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
            ),
            "admin_label" => true,
        ),        
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action",
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_driving_school_testimonials extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_testimonials_items extends WPBakeryShortCode {
        
    }

}
