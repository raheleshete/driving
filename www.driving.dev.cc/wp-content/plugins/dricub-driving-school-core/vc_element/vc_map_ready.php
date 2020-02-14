<?php
vc_map(array(
    "name" => "Driving School Ready",
    "base" => "driving_school_ready",
    "category" => esc_html__('Driving School', ULTIMA_NAME),
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "class" => "",
            "heading" => esc_html__( "Title", ULTIMA_NAME ),
            "param_name" => "title",
            "holder" => "div",
            "admin_label" => false,
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Picture", ULTIMA_NAME),
            "param_name" => "image",
            "value" => "",
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', ULTIMA_NAME),
            'param_name' => 'extra_class',
        ),        
        array(
            "type" => "textarea_html",
            "admin_label" => false,
            "heading" => esc_html__("Contents", ULTIMA_NAME),
            "param_name" => "content",
            "value" => "",
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "heading" => "Button Title",
            "param_name" => "button_text",
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
                'Modal' => '2',
                'Link' => '3',
                'None' => '1',
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Select contact form for Modal Id', ULTIMA_NAME),
            'param_name' => 'modal_id',
            'value' => $contact_forms,
            'save_always' => true,
            'description' => __('Choose previously created contact form from the drop down list.', ULTIMA_NAME),
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
    )
));