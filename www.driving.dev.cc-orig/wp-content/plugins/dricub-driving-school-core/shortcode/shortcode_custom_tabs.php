<?php

add_shortcode('vc_custom_tabs', 'driving_school_tabs_func');

function driving_school_tabs_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => '',
        'extra_class' => '',
                    ), $atts));


    // Extract tab titles
    preg_match_all('/vc_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE);
    $tab_titles = array();
    /**
     * vc_tabs
     *
     */
    if (isset($matches[1])) {
        $tab_titles = $matches[1];
    }

    $tabs_nav = '';
    $tabs_nav .= '<div class="tt-tabs__head"><ul>';
    foreach ($tab_titles as $tab) {
        $tab_atts = shortcode_parse_atts($tab[0]);
        if (isset($tab_atts['title'])) {
            $tabs_nav .= '<li><a href="#tab-' . ( isset($tab_atts['tab_id']) ? $tab_atts['tab_id'] : sanitize_title($tab_atts['title']) ) . '">' . $tab_atts['title'] . '</a></li>';
        }
    }
    $tabs_nav .= '</ul></div>';
    $content_body = '<div class="tt-tabs__body">' . $content . '</div>';
    $output = '<div class="tt-tabs">' . $tabs_nav . wpb_js_remove_wpautop($content_body) . '</div>';


    echo $output;
}
