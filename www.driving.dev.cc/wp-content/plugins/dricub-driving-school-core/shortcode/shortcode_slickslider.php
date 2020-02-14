<?php

class Driving_School_SlickSlider extends WPBakeryShortCode {

    public function __construct() {
        add_shortcode('driving_school_slick_slider', array($this, 'driving_school_slick_slider_func'));
        add_shortcode('driving_school_slick_slider_item', array($this, 'driving_school_slick_slider_item_func'));
    }

    public function driving_school_slick_slider_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'navigation_type' => 0,
            'extra_class' => '',

            ), $atts));

        $changed_atts = shortcode_atts(array(
            'autoplay' => 'true',
            'autoplay_speed' => '3000',
            'arrows' => 'true',
            'dots' => 'false',
            'fade' => 'true',
            'speed' => '500',
            'pause_on_hover' => 'true',
            'pause_on_dots_hover' => 'true'
        ), $atts);

        wp_localize_script( 'dricub-driving-school-custom', 'ajax_slickslider', $changed_atts);
						 

        $content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);

        ob_start();


        ?>
        <!-- Slider -->
        <div id="mainSliderWrapper"  class="<?php
        if ($extra_class != '') {
            echo esc_attr($extra_class);
        }
        ?>">
            <div class="mainSlider" >
                <?php echo do_shortcode($content); ?>
            </div>  
        </div>  
        <?php
        $output = ob_get_clean();
        return $output;
    }

    public function driving_school_slick_slider_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'image' => '',
            'extra_class' => '',
            'unqid' => '',
            'call_action' => '',
            'first_title' => '',
            'image_position_x' => 'center',
            'image_position_y' => 'bottom',
            'bottom_title'=>'',
                        ), $atts));
        $unqid = $unqid . rand(1, 999);
        $attachement = wp_get_attachment_image_src((int) $image, 'full');
        $href = vc_build_link($call_action);
        //now we assing anmation style wise animation in different element
        ob_start();
        ?>
            <div class="slide <?php if ($extra_class != '') { echo esc_attr($extra_class); } ?>">
            <div class="img--holder" <?php if ($attachement != array()) { ?>  style="background-image: url(<?php echo esc_url($attachement[0]); ?>); <?php echo "background-position:  {$image_position_x} {$image_position_y};" ?>" <?php } ?>></div>
            <div class="slide-content">
                <div class="container" data-animation="fadeInUpSm" data-animation-delay="0s">
                    <div class="tp-caption-01-01" ><?php echo wp_kses_post($first_title) ?></div>
                    <div class="tp-caption-01-02"><?php echo wp_kses_post($content); ?></div>
                   <?php if(!empty($bottom_title) && $bottom_title != '' ){ ?>
                        <div class="tp-caption-02-01" ><?php echo wp_kses_post($bottom_title) ?></div>
                   <?php } ?>
                    
                    <?php if (!empty($href['url']) && ( $href['url'] != '')) : ?>
                    <a href="<?php echo $href['url']; ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif; ?>    class="btn" data-animation="fadeInUp" data-animation-delay="0.5s"  rel="<?php echo $href['rel']; ?>"  >   
                        <?php echo $href['title']; ?>   
                    </a>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <?php
        return ob_get_clean();
    }

}

new Driving_School_SlickSlider();
