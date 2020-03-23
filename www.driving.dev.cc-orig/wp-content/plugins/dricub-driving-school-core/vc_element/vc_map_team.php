<?php
vc_map(array(
    "name" => "Team Carousel",
    "base" => "driving_school_team_carousel",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_team'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Column no",
            "param_name" => "team_col",
            "value" => array(
                "2 Column" => "2",
                "3 Column" => "3",
                "4 Column" => "4",
            ),
            "std" => '',
            "description" => esc_html__('No of column of the team.', 'driving_school'),
        ),
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
                'slides_to_scroll' => '2',
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
                'No' => 'false',
                'Yes' => 'true'
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
                'autoplay_speed' => '3200',
            ),
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
    ),
    "js_view" => 'VcColumnView',
));

vc_map(array(
    "name" => "Our Team",
    "base" => "driving_school_team",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_team_carousel'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Name Of Team Member", 'driving_school'),
            "param_name" => "name",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Designation of Team Member", 'driving_school'),
            "param_name" => "designation",
            "value" => "",
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Description", 'driving_school'),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Picture Of Team Member", 'driving_school'),
            "param_name" => "image",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("URL", 'driving_school'),
            "param_name" => "url",
            "value" => "",
        ),
    )
));

if (class_exists('WPBakeryShortCodesContainer')) {

    class WPBakeryShortCode_driving_school_Team_Carousel extends WPBakeryShortCodesContainer {
        
    }

}
if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_Team extends WPBakeryShortCode {
        
    }

}