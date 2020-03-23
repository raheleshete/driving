<?php

class Driving_School_NewsSlider extends WPBakeryShortCode {

    public function __construct() {
        add_shortcode('driving_school_news_slider', array($this, 'driving_school_news_slider_func'));
        add_shortcode('driving_school_news_slider_item', array($this, 'driving_school_news_slider_item_func'));
    }

    public function driving_school_news_slider_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'navigation_type' => 0,
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts( array(
            'mobile_first' => 'false',
            'slides_to_show' => '3',
            'slides_to_scroll' => '1',
            'pause_on_hover' => 'false',
            'autoplay' => 'true',
            'autoplay_speed' => '2000',
            'dots' => 'true',
            'arrows' => 'false',
            'infinite' => 'true',
            'adaptiveHeight' => 'true',
        ), $atts );

        wp_localize_script( 'dricub-driving-school-custom', 'ajax_newsSlider', $changed_atts);

		$content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ob_start();
        ?>
            <div class="tt-news-carousel carousel-top slick-arrow-01 <?php if( $extra_class != '' ){ echo esc_attr( $extra_class ); } ?>">
                <?php echo do_shortcode($content); ?>
            </div>  
        <?php
        $output = ob_get_clean();
        return $output;
    }

    public function driving_school_news_slider_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => '',
            'image' => '',
            'date' => '',
            'month' => '',
            'comments' => '',
            'link_url' => '',
            'extra_class'=>'',
                        ), $atts));
         $href = vc_build_link($link_url);

         $sigle_img = wp_get_attachment_image_src($image, "large");
          ob_start();
         ?>
        <div class="item <?php if( $extra_class != '' ){ echo esc_attr( $extra_class ); } ?>">
            <div class="tt-box-news">
                <a href="<?php echo $href['url'];?>" class="image">
                    <img src="<?php echo esc_attr__( $sigle_img[0]) ?>" alt="">
                    <div class="time"><span><?php echo esc_html__($date); ?></span><?php echo esc_html__($month); ?></div>
                </a>
                <div class="description">
                    <h6><a href="<?php echo $href['url'];?>"><?php echo esc_html__($title); ?></a></h6>
                    <p><?php echo esc_html__($content); ?></p>
                    <div class="info">
                        <a href="<?php echo $href['url'];?>" class="comments"><?php echo esc_html__($comments); ?></a>
                         <?php if(isset($href['url']) && $href['url']!=''){ ?>
                        <a  class="link-transition icon-right-arrow"  <?php if($href['target']){ ?> target="<?php echo esc_url( $href['target']) ;?>" <?php } ?> href="<?php echo esc_url( $href['url']) ;?>">
                         
                        </a>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
         $content = ob_get_clean();
        return $content;    
    }
}

new Driving_School_NewsSlider();
