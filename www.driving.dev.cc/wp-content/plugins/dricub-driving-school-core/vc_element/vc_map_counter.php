<?php
vc_map(array(
    "name" => "Counter",
    "base" => "driving_school_counter",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_counter_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Column no",
            "param_name" => "col_no",
            "value" => array(
                "2 Column" => "2",
                "3 Column" => "3",
                "4 Column" => "4",
            ),
            "std" => '4',
            "description" => esc_html__('No of column.', 'driving_school'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
    )
));

vc_map(array(
    "name" => "Our Counter Item",
    "base" => "driving_school_counter_item",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_counter'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Title",
            "param_name" => "title",
            "admin_label" => true
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Counter Value(must be numeric)",
            "param_name" => "count_number",
            "admin_label" => false
        ),
        array(
            "type" => "textfield",
            "holder" => "span",
            "heading" => "Postfix of Number",
            "param_name" => "number_postfix",
            "value"     => '%',
            "admin_label" => false
        ),
        array(
            'type' => 'attach_image',
            'heading' => __('Image', 'driving_school'),
            'param_name' => 'image',
            'value' => '',
            'description' => __('Select image from media library.', 'driving_school'),
            'admin_label' => true
        ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class"
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_driving_school_counter extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_counter_item extends WPBakeryShortCode {
        
    }

}
