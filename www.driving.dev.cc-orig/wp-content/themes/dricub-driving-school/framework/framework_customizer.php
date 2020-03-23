<?php
/* Customizer Code HERE */

function dricub_driving_school_theme_customizer($wp_customize) {

    // Customizer Title Control
    class WP_Customize_Title_Control extends WP_Customize_Control {

        public function __construct($manager, $id, $args = array()) {
            parent::__construct($manager, $id, $args);
        }

        public function render_content() {
            ?><h3><?php echo esc_html($this->label); ?></h3><?php
        }

    }

}

add_action('customize_register', 'dricub_driving_school_theme_customizer');
