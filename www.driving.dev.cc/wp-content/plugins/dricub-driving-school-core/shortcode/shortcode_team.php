<?php
class Driving_School_Team {

    public $col_no, $mask, $style;

    public function __construct() {
        add_shortcode('driving_school_team_carousel', array($this, 'driving_school_team_carousel_func'));
        add_shortcode('driving_school_team', array($this, 'driving_school_team_func'));
    }

    public function driving_school_team_carousel_func($atts = array(), $content = null) {
        extract(shortcode_atts(array(
            'team_col' => '4',
            'extra_class' => '',
            'slick_arrow' => '',
                        ), $atts));

        $changed_atts = shortcode_atts( array(
            'mobile_first' => 'false',
            'slides_to_show' => '3',
            'slides_to_scroll' => '2',
            'pause_on_hover' => 'false',
            'autoplay' => 'false',
            'autoplay_speed' => '3200',
            'dots' => 'true',
            'arrows' => 'true',
        ), $atts );

        wp_localize_script( 'dricub-driving-school-custom', 'ajax_ttslider', $changed_atts);
        
		 $content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        $this->col_no = $team_col;
        $output = '<div class="tt-carusel tt-carusel-top '.$slick_arrow.' '.$extra_class.'">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        $this->col_no = 0;
        return $output;
    }

    public function driving_school_team_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'name' => '',
            'designation' => '',
            'image' => '',
            'url' => '#',
                        ), $atts));

        $column_no = $this->col_no;
        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-sm-6 col-xs-12';
                break;
            case 4:
                $colclass = 'col-md-3 col-sm-4 col-xs-12';
                break;
            default:
                $colclass = 'col-md-4 col-sm-4 col-xs-12';
                break;
        }

        ob_start();
        ?>
        <div class="item <?php echo $colclass; ?>">
            <a href="<?php echo esc_url($url);?>" class="tt-box-subjects1">
                <div class="img"><?php echo wp_get_attachment_image((int) $image, 'dricub-driving-schools-team-thumbnail'); ?></div>
                <div class="description">
                    <h6><?php echo wp_kses_post($name); ?></h6>
                    <p><b><?php echo wp_kses_post($designation); ?></b></p>
                    <?php if(isset($content) && !empty($content)) {?>
                        <p><?php echo wp_kses_post($content); ?></p>
                    <?php }?>
                </div>
            </a>
        </div>

        <?php
        return ob_get_clean();
    }

}

new Driving_School_Team();