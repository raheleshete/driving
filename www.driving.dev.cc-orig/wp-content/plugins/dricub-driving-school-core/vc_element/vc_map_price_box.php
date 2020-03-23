<?php
$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');
$contact_forms = array();
if ($cf7) {
    foreach ($cf7 as $cform) {
        $contact_forms[$cform->post_title] = $cform->ID;
    }
} else {
    $contact_forms[__('No contact forms found', 'js_composer')] = 0;
}
vc_map(array(
    "name" => esc_html__("Driving School Price", 'driving_school'),
    "base" => "driving_school_price",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_parent" => array('only' => 'driving_school_price_item'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "js_view" => 'VcColumnView',
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

$fonts_array = driving_school_add_fonts_family();
vc_map(array(
    "name" => "Driving School Price Item",
    "base" => "driving_school_price_item",
    "category" => esc_html__('Driving School', 'driving_school'),
    "as_child" => array('only' => 'driving_school_price'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => esc_html__("Planning Title", "driving_school"),
            "param_name" => "title",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            'type' => 'colorpicker',
            'holder' => 'div',
            'class' => '',
            'admin_label' => true,
            'heading' => __( '', 'driving_school' ),
            'param_name' => 'color',
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
            "heading" => esc_html__("Planning Sub Title", "driving_school"),
            "param_name" => "sub_title",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Planning Type Title", "driving_school"),
            "param_name" => "planning_type_title",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Price Content", 'driving_school'),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Price", "driving_school"),
            "param_name" => "price",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__("Sub Price", "driving_school"),
            "param_name" => "sub_price",
            "holder" => "div",
            "admin_label" => false,
        ),
		 
        array(
            "type" => "dropdown",
            "heading" => "Featured Plan",
            "param_name" => "featured",
            "value" => array(
                "No" =>false,
                "Yes" =>true,
            ),
            "std" => 'false',
            "admin_label" => false,
        ),
		

		array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Button Type",
            "param_name" => "target_plan",
            "value" => array(
                "Modal" =>'modal',
                "Link" =>'new',
            ),
            "std" => '',
            "admin_label" => false,
        ),
		array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action",
            "dependency" => array(
                "element" => "target_plan",
                "value" => "new"
            ),
        ),
		
		array(
            "type" => "textfield",
            "heading" => esc_html__("Modal Button Title", "driving_school"),
            "param_name" => "btn_title",
            "holder" => "div",
            "admin_label" => false,
        ),
		array(
            "type" => "textfield",
            "heading" => esc_html__("Modal Title", "driving_school"),
            "param_name" => "modal_title",
            "holder" => "div",
            "admin_label" => false,
        ),
		
		 array(
            "type" => "dropdown",
            "heading" => esc_html__("Contact Form Shortcode", "driving_school"),
            "param_name" => "cf7scode",
            "holder" => "div",
            "admin_label" => false,
			'value' => $contact_forms,
			"dependency" => array(
				"element" => "target_plan",
				"value" => "modal"
			),
        )
    )
));

class WPBakeryShortCode_Driving_School_Price extends WPBakeryShortCodesContainer {
    
}

class WPBakeryShortCode_Driving_School_Price_Item extends WPBakeryShortCode {
    
}
