<?php

class driving_school_box_parallax {

    public function __construct() {
        add_shortcode('box_parallax', array($this, 'driving_school_box_parallax_func'));
        wp_enqueue_script( 'box-parallax', get_template_directory_uri() . '/js/vendor/jquery.parallax-scroll.js', array('jquery'), '1.0.0', true );
    }

    function driving_school_box_parallax_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'cover_img'   => ''
        ), $atts));
		$content=str_replace('</p>', '', $content);
		$cover_img_src=wp_get_attachment_image_src((int) $cover_img, 'full');
        $output = '<div class="box-parallax-02">
                <img src="'.$cover_img_src[0] .'" class="img-parallax" data-parallax=\'{"y": -100}\' alt="">
                <div class="container-fluid">
                    <div class="row">
                        <div class="description">'.do_shortcode($content).'</div>
                    </div>
                </div>
            </div>';
                
        return $output;
    }

}

new driving_school_box_parallax();
