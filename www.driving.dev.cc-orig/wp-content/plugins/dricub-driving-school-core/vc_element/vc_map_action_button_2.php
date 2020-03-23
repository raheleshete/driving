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
    "name" => "Action Button Layout 2",
    "base" => "driving_school_action_button_2",
    "description" => __("Action Button For Pop Up Or Modal", ULTIMA_NAME),
    "category" => 'Driving School',
    "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Button Title",
            "param_name" => "title",
            "admin_label" => true,
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Modal Id', 'js_composer'),
            'param_name' => 'modal_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'js_composer'),
        ),

    )
));

