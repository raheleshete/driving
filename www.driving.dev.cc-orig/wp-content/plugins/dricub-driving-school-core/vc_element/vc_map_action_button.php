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
    "name" => "Action Button Layout 1",
    "base" => "driving_school_action_button",
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
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Modal Title",
            "param_name" => "modal_title",
            'value' => 'ORDER PACKAGE',
            "admin_label" => true,
            'dependency' => array(
                'element' => 'button_action',
                'value' => '2',
            ),
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Action', ULTIMA_NAME),
            'param_name' => 'button_action',
            'value' => array(
                'None' => '1',
                'Modal' => '2',
                'Link' => '3',
            )
        ),

        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Modal Id', 'js_composer'),
            'param_name' => 'modal_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', 'js_composer'),
            'dependency' => array(
                'element' => 'button_action',
                'value' => '2',
            ),
        ),
        array(
                "type" => "vc_link",
                "holder" => "div",
                "heading" => "Action Button",
                "param_name" => "call_action",
                 'dependency' => array(
                    'element' => 'button_action',
                    'value' => '3',
                        ),  
             ),
        array(
            "type" => "textfield",
            "heading" => "Add Extra Class",
            "param_name" => "extra_class",
        ),
    )
));

