<?php
vc_map(array(
    "name" => "Our Programs",
    "base" => "driving_schools_programs",
    "category" => esc_html__('Driving School', 'driving_school'),
    "params" => array(
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Column no",
            "param_name" => "column",
            "value" => array(
                "2 Column" => "2",
                "3 Column" => "3",
                "4 Column" => "4",
            ),
            "std" => '',
            "description" => esc_html__('No of column.', 'driving_school'),
        ),
        array(
            "type" => "dropdown",
            "holder" => "div",
            "admin_label" => true,
            "heading" => "Condition",
            "param_name" => "condition",
            "value" => array(
                "Show All" => "1",
                "Selected Programs" => "2",
            ),
            "std" => '1',
        ),

        array(
			"type" => "dropdown",
			"heading" => "Order",
			"param_name" => "order",
			'value' => array(
			  	'Select' => '',
                'DESC' => 'desc',
                'ASC' => 'asc',
            ),
			'description' => __('Programs Order', 'driving_school'),
		),
		array(
			"type" => "dropdown",
			"heading" => "Order By",
			"param_name" => "order_by",
			'value' => array(
                    'Date' => 'date',
                    'ID' => 'ID',
                    'Title' => 'title',
                    'Name' => 'name',
                    'Modified' => 'modified',
                    'Author' => 'author',
                    'Rand' => 'rand',
            ),
			'description' => __('Programs Order By', 'driving_school'),
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Posts Per Page', 'driving_school'),
            'param_name' => 'per_page',
            'value' => 6,
            "dependency" => array(
                "element" => "condition",
                "value" => "1"
            ),
        ),

		array(
            "type" => "autocomplete",
            "heading" => "Programs IDs",
            "param_name" => "ids",
            'settings' => array(
                'multiple' => true,
                'sortable' => true,
            ),
            "dependency" => array(
                "element" => "condition",
                "value" => "2"
            ),
            'save_always' => true
        ),
		
        array(
            "type" => "vc_link",
            "holder" => "div",
            "heading" => "Action Button",
            "param_name" => "call_action"
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

    )
));
