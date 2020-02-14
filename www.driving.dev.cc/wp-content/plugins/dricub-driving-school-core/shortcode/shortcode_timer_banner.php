<?php

class driving_school_timer_banner {

    public function __construct() {
        add_shortcode('timer_banner', array($this, 'driving_school_timer_banner_func'));
    }

    function driving_school_timer_banner_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'cover_img'   => '',
            'date'   => '2018-12-08'
        ), $atts));
        $content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        $output = '<div class="tt-promo-01">
                    <div class="col-info" style="background: url('. wp_get_attachment_image_src((int) $cover_img, 'full')[0] .') top right no-repeat; background-size: cover;">
                        <div class="col-info-description">'.do_shortcode($content).'</div>
                    </div>
                    <div class="col-timer">
                        <div class="countdown_box">
                            <div class="countdown_inner">
                                <div class="countdown"
                                    data-date="'.$date.'"
                                    data-year="'.esc_attr__('Yrs','dricub-driving-school-core').'"
                                    data-month="'.esc_attr__('Mths','dricub-driving-school-core').' "
                                    data-week="'.esc_attr__('Wk','dricub-driving-school-core').' "
                                    data-day="'.esc_attr__('Day','dricub-driving-school-core').' "
                                    data-hour="'.esc_attr__('Hrs','dricub-driving-school-core').' "
                                    data-minute=" '.esc_attr__('Min','dricub-driving-school-core').'"
                                    data-second="'.esc_attr__('Sec','dricub-driving-school-core').'"></div>
                            </div>
                        </div>
                    </div>
                </div>';
                
        return $output;
    }

}

new driving_school_timer_banner();
