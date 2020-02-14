<?php

vc_map(array(
    "name" => "Video",
    "base" => "program_video",
    "category" => esc_html__('Driving School', 'driving_school'),
    "params" => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Vedio Source', 'driving_school'),
            'param_name' => 'video_src',
            'value' => ''
        ),
        array(
            "type" => "attach_image",
            "holder" => "div",
            "class" => "",
            "heading" => esc_html__("Picture Of Poster", 'driving_school'),
            "param_name" => "poster_image",
            "value" => "",
        )
    )
));
