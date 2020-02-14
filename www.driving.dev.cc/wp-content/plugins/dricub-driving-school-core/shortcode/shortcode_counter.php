<?php

class driving_school_counter {

    public $col_no, $style;
    public function __construct() {
        add_shortcode('driving_school_counter', array($this, 'driving_school_counter_func'));
        add_shortcode('driving_school_counter_item', array($this, 'driving_school_counter_item_func'));
    }

    function driving_school_counter_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'col_no' => 4,
            'extra_class' => '',
                        ), $atts));
        $this->col_no = $col_no;
		$content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ob_start();
        $output = '';
        $output .= '<div class="row ' . $extra_class . '">';
        $output .= do_shortcode($content);
        $output .= '</div>';
        echo $output;
        $this->col_no = 0;
          return ob_get_clean();
    }

    function driving_school_counter_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => '',
            'number_prefix' => '',
            'number_postfix' => '%',
            'count_number' => '100',
            'image' => '',
            'extra_class' => '',
            'call_action' => '',
                        ), $atts));

        $column_no = $this->col_no;

        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-sm-6 col-xs-12';
                break;
            case 4:
                $colclass = 'col-xs-6 col-md-3';
                break;
            default:
                $colclass = 'col-xs-6 col-md-3';
                break;
        }

        ob_start()
        ?>

        <div class="<?php echo esc_html($colclass); ?>">
            <div class="item-counter">
                <div class="counter">
                    <?php echo wp_get_attachment_image((int) $image, 'full'); ?>
                </div>
                <div class="description">
                    <div class="value">
                        <?php if($number_prefix != ''): ?>
                        <span class="tt-prefix"><?php echo esc_html($number_prefix); ?></span>
                        <?php endif; ?>
                        <span class="tt-counter" data-from="0" data-to="<?php echo esc_html($count_number); ?>"><?php echo esc_html($count_number); ?></span>
                        <?php if($number_postfix != ''): ?>
                            <span class="tt-postfix"><?php echo esc_html($number_postfix); ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="title"><?php echo esc_html($title) ?></div>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }

}

new driving_school_counter();



