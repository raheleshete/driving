<?php
class Driving_School_Total_Carusel {

    public function __construct() {
        add_shortcode('driving_school_total_carusel', array($this, 'driving_school_total_carusel_func'));
        add_shortcode('driving_school_total_carusel_item', array($this, 'driving_school_total_carusel_item_func'));
    }

    public function driving_school_total_carusel_func($atts = array(), $content = null) {
        extract(shortcode_atts(array(
            'slick_arrow' => 'slick-arrow-02',
            'extra_class' => '',
        ), $atts));

        $output = '
        <div class="tt-extra-total-indent">
            <div class="tt-total-info-row">
                <div class="container">
                    <div class="row">
                        <div class="tt-row  tt-total-carusel '.$slick_arrow.' '.$extra_class.'">'. do_shortcode($content). '</div>
                    </div>
                </div>
            </div>
        </div>';
        return $output;
    }

    public function driving_school_total_carusel_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'name' => '',
            'icon' => '',
            'number' => '',
            'extra_class' => '',
        ), $atts));

        ob_start();
        ?>
        <div class="tt-col <?php echo $extra_class; ?>">
            <div class="tt-total-info">
                <div class="tt-icon">
                    <i class="<?php echo apply_filters('replace_icon_html',$atts) ;?>"></i>
                    <!-- <i class="icon-people-1"></i> -->
                </div>
                <div class="tt-description">
                    <div class="tt-nubers"><?php echo wp_kses_post($number); ?></div>
                    <?php echo wp_kses_post($name); ?>
                </div>
            </div>
        </div>

        <?php
        return ob_get_clean();
    }
}

new Driving_School_Total_Carusel();