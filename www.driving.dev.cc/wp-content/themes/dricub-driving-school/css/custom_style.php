<?php
/*
 * print css with cheking value is empty or not
 *
 */

function dricub_driving_school_print_css($props = '', $values = array(), $vkey = '', $pre_fix = '', $post_fix = '') {

    if (isset($values[$vkey]) && !empty($values[$vkey])) {
        print wp_kses_post($props . ":" . $pre_fix . $values[$vkey] . $post_fix . ";\n");
    }
}

function dricub_driving_school_color_brightness($colourstr, $steps, $darken = false) {
    $colourstr = str_replace('#', '', $colourstr);
    $rhex = substr($colourstr, 0, 2);
    $ghex = substr($colourstr, 2, 2);
    $bhex = substr($colourstr, 4, 2);

    $r = hexdec($rhex);
    $g = hexdec($ghex);
    $b = hexdec($bhex);

    if ($darken) {
        $steps = $steps * -1;
    }

    $r = max(0, min(255, $r + $steps));
    $g = max(0, min(255, $g + $steps));
    $b = max(0, min(255, $b + $steps));

    $hex = "#";
    $hex .= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
    $hex .= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
    $hex .= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
    return $hex;
}

function dricub_driving_school_get_custom_styles() {
    global $dricub_driving_school_options;
    $opt_prefix = 'dricub_driving_school';
    $dricub_driving_school_colors = get_theme_mod('dricub_driving_school_colors', array());
    $dricub_driving_school_css = get_theme_mod('dricub_driving_school_css', array());
    ob_start();
    if (!class_exists('ReduxFrameworkPlugin')) {
        ?>
        @media (min-width: 1220px){

        #tt-header .tt-header-bottom {
        min-height: 64px; 
        }
        }
        <?php
    }
    if (class_exists('ReduxFrameworkPlugin')) {
        ?>

        @media (min-width: 1050px) {
        #tt-footer:before {
        background: url(<?php echo DRICUB_DRIVING_SCHOOL_THEME_URI; ?>/images/tt-foter-bg1.png) top right no-repeat;
        width: 256px;
        height: 266px;
        }
        }
    <?php } ?>

    <?php
    if (class_exists('ReduxFrameworkPlugin')) {
        ?>
        body {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_body_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_body_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_body_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_body_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_body_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_body_typography'], 'color');
        }
        ?>
        }
        h1 {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_heading_1_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_heading_1_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_heading_1_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_heading_1_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_heading_1_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_heading_1_typography'], 'color');
        }
        ?>  
        }
        h2 {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_heading_2_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_heading_2_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_heading_2_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_heading_2_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_heading_2_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_heading_2_typography'], 'color');
        }
        ?>  
        }
        h3 {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_heading_3_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_heading_3_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_heading_3_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_heading_3_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_heading_3_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_heading_3_typography'], 'color');
        }
        ?>  
        }
        h4 {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_heading_4_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_heading_4_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_heading_4_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_heading_4_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_heading_4_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_heading_4_typography'], 'color');
        }
        ?>  
        }
        h5 {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_heading_5_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_heading_5_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_heading_5_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_heading_5_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_heading_5_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_heading_5_typography'], 'color');
        }
        ?>  
        }
        h6 {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_heading_6_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_heading_6_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_heading_6_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_heading_6_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_heading_6_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_heading_6_typography'], 'color');
        }
        ?>  
        }

        #tt-header .tt-menu > ul > li > a {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_menu_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_menu_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_menu_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_menu_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_menu_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_menu_typography'], 'color');
        }
        ?>      
        }
        .tt-block-aside h3.tt-title {
        <?php
        if (isset($dricub_driving_school_options[$opt_prefix . '_widget_title_typography'])) {
            dricub_driving_school_print_css('font-family', $dricub_driving_school_options[$opt_prefix . '_widget_title_typography'], 'font-family');
            dricub_driving_school_print_css('font-weight', $dricub_driving_school_options[$opt_prefix . '_widget_title_typography'], 'font-weight');
            dricub_driving_school_print_css('font-size', $dricub_driving_school_options[$opt_prefix . '_widget_title_typography'], 'font-size');
            dricub_driving_school_print_css('line-height', $dricub_driving_school_options[$opt_prefix . '_widget_title_typography'], 'line-height');
            dricub_driving_school_print_css('color', $dricub_driving_school_options[$opt_prefix . '_widget_title_typography'], 'color');
        }
        ?>      
        }

    <?php } ?>
    <?php
    if (isset($dricub_driving_school_options['extra_css'])) {
        echo esc_attr($dricub_driving_school_options['extra_css']);
    }

    $dricub_driving_school_custom_css = ob_get_clean();
    return $dricub_driving_school_custom_css;
}
