<?php

/**
 * Add Shortcode To Visual Composer
 */
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
    "name" => "Promo 5 Banner",
    "base" => "driving_school_promo5banner",
    "description" => __("Testimonial page Banner", ULTIMA_NAME),
    "category" => 'Driving School',
    "params" => array(        
        array(
            "type" => "attach_image",
            "holder" => "div",
            "heading" => esc_html__("Image", 'driving_school'),
            "param_name" => "image",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Banner Title",
            "param_name" => "title",
            "admin_label" => true,
            "value" => "Start your Engine",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Button Title",
            "param_name" => "button_title",
            "admin_label" => true,
            "value" => "BOOK YOUR LESSONS NOW",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Modal Title",
            "param_name" => "modal_title",
            "admin_label" => true,
            "value" => "ORDER PACKAGE",
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Modal Id', 'js_composer'),
            'param_name' => 'modal_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'js_composer'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Contents", 'driving_school'),
            "param_name" => "content",
            "value" => "Choosing Safe Drive Driving School will put you on the road to be a better driver.",
        ),

    )
));

