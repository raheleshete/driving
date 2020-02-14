<?php
class driving_school_promo4banner {

    public function __construct() {
        add_shortcode('promo4banner', array($this, 'driving_school_promo4banner_func'));
    }

    function driving_school_promo4banner_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'title'   => '',
            'background'   => '',
        ), $atts));

        $output = '<div class="tt-promo-04" style="background: url('. wp_get_attachment_image_src((int) $background, 'full')[0] .')  0 0 repeat;">
                    <div class="description">
                        <h6>'.$title.'</h6>'.do_shortcode($content).'</div>
                </div>';
                
        return $output;
    }

}

new driving_school_promo4banner();