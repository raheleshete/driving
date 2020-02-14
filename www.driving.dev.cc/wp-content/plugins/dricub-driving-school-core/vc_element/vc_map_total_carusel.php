<?php
 $fonts_array = driving_school_add_fonts_family();
vc_map(array(
    "name" => "Total Carousel",
    "base" => "driving_school_total_carusel",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_total_carusel_item'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Column no",
            "param_name" => "slick_arrow",
            "value" => array(
                "Arrow Style 1" => "slick-arrow-01",
                "Arrow Style 2" => "slick-arrow-02",
                "Arrow Style 3" => "slick-arrow-03",
            ),
            "std" => '',
            "description" => esc_html__('Select the arrow style.', 'driving_school'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
    ),
    "js_view" => 'VcColumnView',
));

vc_map(array(
    "name" => "Total Carousel Item",
    "base" => "driving_school_total_carusel_item",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_total_carusel'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Name", 'driving_school'),
            "param_name" => "name",
            "value" => "",
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
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Number", 'driving_school'),
            "param_name" => "number",
            "value" => "",
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_driving_school_Total_Carusel extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_Total_Carusel_Item extends WPBakeryShortCode {
        
    }

}