<?php

vc_map(array(
    "name" => "News Slider",
    "base" => "driving_school_news_slider",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_news_slider_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Extra Class",
            "param_name" => "extra_class",
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
                'slides_to_show' => '3',
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
                'autoplay_speed' => '2000',
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
                'Yes' => 'true',
                'No' => 'false',                        
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
                'No' => 'false',
                'Yes' => 'true',               
            ),
            'group' => __( 'Slider Settings'),
            "admin_label" => true
        )
    )
));

vc_map(array(
    "name" => "News Slider Items",
    "base" => "driving_school_news_slider_item",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_news_slider'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
                  "type" => "attach_image",
                  "class" => "",
                  "heading" => esc_html__( "Thumbnail Image", "driving_school" ),
                  "param_name" =>  "image",
            ),
        array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => "Type date news Item",
                "param_name" => "date",
            ),
        array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => "Type month news Item",
                "param_name" => "month",
            ),
        array(
                "type" => "textfield",
                "holder" => "div",
                "heading" => "Comments News Item",
                "param_name" => "comments",
            ),
        array(
              "type" => "textfield",
              "class" => "",
              "heading" => esc_html__( "Title", "driving_school" ),
              "param_name" => "title",
                "holder" => "div",
                "admin_label" => false,
            ),
        array(
              "type" => "textarea",
              "class" => "",
              "heading" => esc_html__( "Description text", "driving_school" ),
              "param_name" =>  "content",
        ),
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Link URL",
            "param_name" => "link_url",
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_Driving_School_News_Slider extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_Driving_School_News_Slider_Item extends WPBakeryShortCode {
        
    }

}
 
 