<?php

$cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

$contact_forms = array();
if ($cf7) {
    foreach ($cf7 as $cform) {
        $contact_forms[$cform->post_title] = $cform->ID;
    }
} else {
    $contact_forms[__('No contact forms found', 'driving_school')] = 0;
}

vc_map(array(
    "name" => "Car Running Banner",
    "base" => "car_running_banner",
    "category" => esc_html__('Driving School', 'driving_school'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Right Side Background Road Image", 'driving_school'),
            "param_name" => "road_img",
            "value" => "",
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Car Image", 'driving_school'),
            "param_name" => "car_img",
            "value" => "",
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Car Image in Mobile", 'driving_school'),
            "param_name" => "car_mob_img",
            "value" => "",
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Wheel Image", 'driving_school'),
            "param_name" => "wheel_img",
            "value" => "",
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Limiter Image", 'driving_school'),
            "param_name" => "limiter_img",
            "value" => "",
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Left Side Contents", 'driving_school'),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Show Contact Form 7 in Modal",
            "param_name" => "show_cf7_modal",
            "value" => array(
                "Yes" => "yes",
                "No" => "no",
            ),
            "std" => '',
            "description" => esc_html__('If you want to show Contact Form 7 in Modal, enable it', 'driving_school'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form 7', 'driving_school'),
            'param_name' => 'cf7_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'driving_school'),
            'dependency' => array(
                'element' => 'show_cf7_modal',
                'value' => 'yes',
            ),
        ),     

        array(
            "type" => "textfield",
            "admin_label" => false,
            "heading" => esc_html__("Button Title", 'driving_school'),
            "param_name" => "btn_title",
            "value" => "",
        ),
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action",
            "dependency" => array(
                "element" => "show_cf7_modal",
                "value" => "no"
            ),
        ),
    )
));


if (class_exists('WPBakeryShortCode')) {

    class WPBakeryShortCode_driving_school_car_running_banner extends WPBakeryShortCode {
        
    }

}