<?php

class driving_schools_single_program_widget {

    public function __construct() {
        add_shortcode('single_program_widget', array($this, 'driving_schools_single_program_widget_func'));
    }

    public function driving_schools_single_program_widget_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'widget_title' => '',
            'extra_class' => '',
                        ), $atts));
        ob_start();
        ?>
        <div class="">
            <?php
            the_widget('Driving_School_ProgramContactBox');
            ?>
        </div>
        <?php
        return ob_get_clean();
    }

}

new driving_schools_single_program_widget();
