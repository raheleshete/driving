<?php

add_action('admin_enqueue_scripts', 'dricub_driving_school_core_admin_fonts_enqueue');

function dricub_driving_school_core_admin_fonts_enqueue() {
    wp_enqueue_style('iconfont-style', get_template_directory_uri() . '/iconfont/style.css', '', null);
}

/* * *************************************************************
 * Get Theme Font Icon
 * ************************************************************** */
if (!function_exists('dricub_driving_school_get_theme_font')) {

    function &dricub_driving_school_get_theme_font() {
        if (isset($GLOBALS['driving_school_theme_icons']) && is_array($GLOBALS['driving_school_theme_icons'])) {
            return $GLOBALS['driving_school_theme_icons'];
        }
        $GLOBALS['driving_school_theme_icons'] = apply_filters('driving_school_theme_icons', array(

            array('icon-protection-shield-with-a-check-mark' => 'icon-protection-shield-with-a-check-mark'),
            array('icon-black-and-white-credit-cards' => 'icon-black-and-white-credit-cards'),
            array('icon-car-steering-wheel' => 'icon-car-steering-wheel'),
            array('icon-money' => 'icon-money'),
            array('icon-people-1' => 'icon-people-1'),
            array('icon-star-black-fivepointed-shape' => 'icon-star-black-fivepointed-shape'),
            array('icon-smile' => 'icon-smile'),
            array('icon-checked' => 'icon-checked'),
            array('icon-profile' => 'icon-profile'),
            array('icon-cancel' => 'icon-cancel'),
            array('icon-down-arrow' => 'icon-down-arrow'),
            array('icon-right-arrow' => 'icon-right-arrow'),
            array('icon-left-arrow' => 'icon-left-arrow'),
            array('icon-social-media' => 'icon-social-media'),
            array('icon-twitter-logo-silhouette' => 'icon-twitter-logo-silhouette'),
            array('icon-facebook-logo' => 'icon-facebook-logo'),
            array('icon-instagram-social' => 'icon-instagram-social'),
            array('icon-phone-call' => 'icon-phone-call'),
            array('icon-interface' => 'icon-interface'),
            array('icon-arrows' => 'icon-arrows'),
            array('icon-people' => 'icon-people'),
            array('icon-heart' => 'icon-heart'),
            array('icon-quote-1' => 'icon-quote-1'),
            array('icon-quote' => 'icon-quote'),
            array('icon-placeholder-for-map' => 'icon-placeholder-for-map'),
            array('icon-school' => 'icon-school'),
            array('icon-arrow-down-sign-to-navigate' => 'icon-arrow-down-sign-to-navigate'),
            array('icon-right-arrow' => 'icon-right-arrow'),
            array('icon-menu-three-horizontal-lines-symbol' => 'icon-menu-three-horizontal-lines-symbol'),
            array('icon-motorcyclist' => 'icon-motorcyclist'),
            array('icon-car' => 'icon-car'),
            array('icon-delivery-truck' => 'icon-delivery-truck'),
            array('icon-truck' => 'icon-truck'),
            array('icon-coach-side-view' => 'icon-coach-side-view'),
            array('icon-play-button' => 'icon-play-button'),
            array('icon-link' => 'icon-link'),
            array('icon-play3' => 'icon-play3'),
            array('icon-clock' => 'icon-clock'),
            array('icon-pause2' => 'icon-pause2'),
            array('icon-id-card' => 'icon-id-card'),
            array('icon-balloons' => 'icon-balloons')


        ));

        return $GLOBALS['driving_school_theme_icons'];
    }

}

/* * *************************************************************
 * Get Theme Font Icon
 * ************************************************************** */
if (!function_exists('dricub_driving_school_get_theme_font')) {

    function &dricub_driving_school_get_theme_font() {
        if (function_exists('dricub_driving_school_get_theme_font')) {
            return dricub_driving_school_get_theme_font();
        }
        $fonts = array();
        return $fonts;
    }

}


/* * *************************************************************
 * Add theme icon
 * ************************************************************** */
if (!function_exists('dricub_driving_school_add_theme_icon')) {

    function dricub_driving_school_add_theme_icon($icons) {
        $icons['Driving School Icon'] = &dricub_driving_school_get_theme_font();
        return $icons;
    }
    add_filter('vc_iconpicker-type-drivingschoolicon', 'dricub_driving_school_add_theme_icon');
}
