<?php

vc_map(array(
    "name" => "Single Program Widget",
    "base" => "single_program_widget",
    "category" => esc_html__('Driving School', 'driving_school'),
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Widget title ', 'driving_school'),
            'param_name' => 'title',
            'value' => ''
        )
     
    )
));
