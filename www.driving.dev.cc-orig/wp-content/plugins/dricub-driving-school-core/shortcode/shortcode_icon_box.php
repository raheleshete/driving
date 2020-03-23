<?php
class driving_school_iconBox {

    public function __construct() {

        add_shortcode('driving_school_icon_box_items', array($this, 'driving_school_icon_box_items_func'));
        add_shortcode('driving_school_icon_box', array($this, 'driving_school_icon_box_func'));
    }

    function driving_school_icon_box_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'extra_class' => '',
                        ), $atts));
		$content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ob_start();
        $output = '';
        $output .= '<div class="box-row col-third tt-box-layout-icon slick-arrow-01 ' . $extra_class . '">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        return $output;
    }

    function driving_school_icon_box_items_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'icon' => '',
            'heading' => '',
            'call_action' => '',
                        ), $atts));
        ob_start();
        ?>

        <div class="col-item">
            <div class="icon">
                 <!--<i class="icon <?php // echo wp_kses_post($icon); ?>"></i>-->
                <i class="<?php echo  apply_filters('replace_icon_html',$atts) ;?>"></i>
                <!--<i class="icon-protection-shield-with-a-check-mark"></i>-->
            </div>
            <h6><?php echo wp_kses_post($heading); ?></h6>
            <p><?php echo wp_kses_post($content); ?></p>
        </div>
        <?php
        $content = ob_get_clean();
        return $content;
    }

}

new driving_school_iconBox();

