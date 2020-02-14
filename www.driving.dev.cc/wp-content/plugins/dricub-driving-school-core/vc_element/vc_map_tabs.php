<?php

vc_map(array(
    'name' => "Custom Tabs",
    'base' => 'vc_custom_tabs',
    "category" => esc_html__('Driving School', 'driving_school'),
    'description' => __('Tabbed content', 'driving_school'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => __('Widget title', 'driving_school'),
            'param_name' => 'title',
            'description' => __('Enter text used as widget title (Note: located above content element).', 'driving_school'),
        ),
        array(
            'type' => 'dropdown',
            'heading' => __('Auto rotate', 'driving_school'),
            'param_name' => 'interval',
            'value' => array(
                __('Disable', 'driving_school') => 0,
                3,
                5,
                10,
                15,
            ),
            'std' => 0,
            'description' => __('Auto rotate tabs each X seconds.', 'driving_school'),
        ),
        array(
            'type' => 'textfield',
            'heading' => __('Extra class name', 'driving_school'),
            'param_name' => 'el_class',
            'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'driving_school'),
        ),
    ),
       'custom_markup' => '
	<div class="tt-tabs__head"><ul>
        </ul>
        %content%
        </div>',
       'default_content' => '
        [vc_tab title="' . __('Tab 1', 'driving_school') . '" tab_id=""][/vc_tab]
        [vc_tab title="' . __('Tab 2', 'driving_school') . '" tab_id=""][/vc_tab]
        ',
    'js_view' => 'VcTabsView',
));


