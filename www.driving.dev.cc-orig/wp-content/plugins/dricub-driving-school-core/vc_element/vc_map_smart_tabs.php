<?php
vc_map(array(
    "name" => esc_html__("Driving School Smart Tabs", 'driving_school'),
    "base" => "driving_school_smart_tabs",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_smart_tabs_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Active Tab Number", 'driving_school'),
            "param_name" => "active_tab_no",
            "value" => "1",
            'description' => __('Enter the number of tab that will be active initioally.ex: if first tab is active, put 1. to set active second tab, set 2 and so on.', 'driving_school'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
    )
));
$fonts_array = driving_school_add_fonts_family();
vc_map(array(
    "name" => esc_html__("Driving School Smart Tabs Item", 'driving_school'),
    "base" => "driving_school_smart_tabs_item",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_smart_tabs'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Name", 'driving_school'),
            "param_name" => "tab_title",
        ),
        array(
            "type" => "textfield",
            "admin_label" => true,
            "heading" => esc_html__("Name For Small Device", 'driving_school'),
            "param_name" => "tab_title_small",
        ),
        $fonts_array[0],
        $fonts_array[1],
        $fonts_array[2],
        $fonts_array[3],
        $fonts_array[4],
        $fonts_array[5],
        $fonts_array[6],
        $fonts_array[7],
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Text", 'driving_school'),
            "param_name" => "content",
            "value" => "",
        )
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_driving_school_smart_tabs extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_smart_tabs_item extends WPBakeryShortCode {
        
    }

}
