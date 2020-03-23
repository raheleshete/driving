<?php
class driving_school_promo_banner {

    public function __construct() {
        add_shortcode('promo_banner', array($this, 'driving_school_promo_banner_func'));
    }

    public function driving_school_promo_banner_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'image'    => '',
            'call'    => '800-123-4567',
            'pre_title'  => 'Schedule',
            'title'  => 'Your Driving Lessons',
            'post_title'  => 'with Us!',
            'extra_class' => '',
        ), $atts)); 
		 $content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ob_start();
		?>
        <div class="container-indent <?php if( $extra_class != '' ){ echo esc_attr( $extra_class ); } ?>">
            <div class="tt-promo-03">
                <div class="container">
                    <div class="tt-description">
                        <h3 class="tt-title"><?php echo $pre_title; ?> <span><?php echo $title; ?></span> <?php echo $post_title; ?></h3>
                        <p>
                            <?php echo do_shortcode($content); ?>
                        </p>
                        <address>
                            <?php echo $call; ?>
                        </address>
                        <img class="tt-icon" src="<?php echo wp_get_attachment_image_src((int) $image, 'full')[0]; ?>" alt="icon">
                    </div>
                </div>
            </div>
        </div>

        <?php 
        $output = ob_get_clean();
        return $output;
    }

}

new driving_school_promo_banner();