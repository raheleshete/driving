<?php

vc_map(array(
    "name" => "Blog posts",
    "base" => "driving_school_post_loop",
    "category" => 'Driving School',
    "params" => array(
        array(
            "type" => "loop",
            "class" => "",
            "heading" => esc_html__("Select post loop", "driving_school"),
            "param_name" => "post_loop",
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Layout', 'driving_school'),
            'param_name' => 'layout',
            'value' => array(
                'Default' => '',
                'Card view' => 'card',
            )
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Pagination', 'driving_school'),
            'param_name' => 'is_pagination',
            'value' => array(
                'No pagination' => '',
                'Post Navigation' => 'navigation',
                'Ajax load' => 'ajax-load',
            )
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Extra Class', 'driving_school'),
            'param_name' => 'extra_class',
        ),
    )
));

