<?php
vc_map(array(
    "name" => "Why Choose Us",
    "base" => "driving_school_icon_box",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_icon_box_items'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('extra class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
    )
));

$fonts_array = driving_school_add_fonts_family();
vc_map(array(
    "name" => "Why Choose Us items",
    "base" => "driving_school_icon_box_items",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_icon_box'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        $fonts_array[0],
        $fonts_array[1],
        $fonts_array[2],
        $fonts_array[3],
        $fonts_array[4],
        $fonts_array[5],
        $fonts_array[6],
        $fonts_array[7],
        array(
            "type" => "textfield",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Heading 1st line",
            "param_name" => "heading",
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Description", 'driving_school'),
            "param_name" => "content",
            "value" => "",
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

    class WPBakeryShortCode_Driving_School_Icon_Box extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Driving_School_Icon_Box_Items extends WPBakeryShortCode {
        
    }

}
