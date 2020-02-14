<?php

vc_map(array(
    "name" => "Slick Slider",
    "base" => "driving_school_slick_slider",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_slick_slider_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "dropdown",
            "heading" => __("Enable autoplay", ULTIMA_NAME),
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
            "heading" => __("Autoplay Speed", ULTIMA_NAME),
            "param_name" => "autoplay_speed",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Arrows", ULTIMA_NAME),
            "param_name" => "arrows",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Dots", ULTIMA_NAME),
            "param_name" => "dots",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Enable Fading?", ULTIMA_NAME),
            "param_name" => "fade",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "textfield",
            "heading" => __("Speed", ULTIMA_NAME),
            "param_name" => "speed",
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Pause On Hover?", ULTIMA_NAME),
            "param_name" => "pause_on_hover",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Pause On Dots Hover?", ULTIMA_NAME),
            "param_name" => "pause_on_dots_hover",
            'value' => array(
                'Yes' => 'true',
                'No' => 'false',
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true,
        ),
        
        array(
            "type" => "textfield",
            "heading" => "Extra Class",
            "param_name" => "extra_class",
            'group' => __( 'Slider Settings'),
        )
    )
));

vc_map(array(
    "name" => "Slick Slider Items",
    "base" => "driving_school_slick_slider_item",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_slick_slider'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => esc_html__("Slider Image", ULTIMA_NAME),
            "param_name" => "image",
        ),
        array(
            'type'        => 'dropdown',
            'heading'     => __('Image Position From Left'),
            'param_name'  => 'image_position_x',
            'admin_label' => true,
            'value'       => array(
                'center'   => 'Center',
                'left'   => 'Left',
                'right' => 'Right'
            ),
            'std'         => 'center', // Your default value
            'description' => __('Select the slider image position form left')
        ),

        array(
            'type'        => 'dropdown',
            'heading'     => __('Image Position From Top'),
            'param_name'  => 'image_position_y',
            'admin_label' => true,
            'value'       => array(
                'bottom' => 'Bottom',
                'top'   => 'Top',
                'center'   => 'Center',
            ),
            'std'         => 'bottom', // Your default value
            'description' => __('Select the slider image position form top')
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "First Title",
            "param_name" => "first_title",
        ),

        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Bottom Title",
            "param_name" => "bottom_title",
        ),

        array(
            "type" => "textarea_html",
            "holder" => "div",
            "heading" => "Content",
            "param_name" => "content",
        ),
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action",

        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Unique ID', ULTIMA_NAME),
            'param_name' => 'unqid',
            'value' => array(
                'unq' . str_replace('.', '', str_replace(' ', '', microtime())) . rand(1, 999) => 'unq' . str_replace('.', '', str_replace(' ', '', microtime())) . rand(1, 999),
            )
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_driving_school_Slick_Slider extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_Slick_Slider_Item extends WPBakeryShortCode {
        
    }

}
 
 