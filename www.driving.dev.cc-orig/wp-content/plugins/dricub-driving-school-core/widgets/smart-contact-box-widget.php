<?php

class Driving_School_ContactBox extends WP_Widget {

    public $defaults;

    public function __construct() {
        $this->defaults = array(
            'title' => esc_html__('Contacts', 'dricub-driving-school-core'),
            'address' => '3261 Anmoore Road
                <br>Brooklyn, NY 11230',
            'phone' => '800-123-4567, Fax: 718-724-3312',
            'hours' => 'Mon-Fri: 9:00 am – 5:00 pm
                <br>Sat-Sun: 11:00 am – 16:00 pm',
            'address_title' => 'Address',
            'phone_title' => 'Phone 24/7',
            'hours_title' => 'Operating Hours',
        );
        parent::__construct(
                'Driving_School_contact_box', // Base ID  
                esc_html__('Driving School Contact Box', 'dricub-driving-school-core'), // Name  
                array(
            'description' => esc_html__('Side Bar Contact Box.', 'dricub-driving-school-core')
                )
        );
    }

    function form($instance) {

        $instance = wp_parse_args((array) $instance, $this->defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <strong><?php esc_html_e('Title', 'dricub-driving-school-core') ?>:</strong><br />
                <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </label>
        </p> 



         <p>
            <label for="<?php echo esc_attr($this->get_field_id('address_title')); ?>"><?php esc_html_e('Address Title', 'dricub-driving-school-core') ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('address_title')); ?>" name="<?php echo esc_attr($this->get_field_name('address_title')); ?>" value="<?php echo esc_attr($instance['address_title']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo wp_kses_post($instance['address']); ?></textarea>
        </p>


        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_title')); ?>"><?php esc_html_e('Phone Title', 'dricub-driving-school-core') ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('phone_title')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_title')); ?>" value="<?php echo esc_attr($instance['phone_title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>"><?php echo wp_kses_post($instance['phone']); ?></textarea>
        </p>




        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hours_title')); ?>"><?php esc_html_e('Hours Title', 'dricub-driving-school-core') ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('hours_title')); ?>" name="<?php echo esc_attr($this->get_field_name('hours_title')); ?>" value="<?php echo esc_attr($instance['hours_title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('hours')); ?>"><?php esc_html_e('Hours', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('hours')); ?>" name="<?php echo esc_attr($this->get_field_name('hours')); ?>"><?php echo wp_kses_post($instance['hours']); ?></textarea>
        </p>

        <?php
    }

    function widget($args, $instance) {

        extract($args);
        echo wp_kses_post($before_widget);
        if (!empty($instance['title'])) {
            $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
            echo wp_kses_post($before_title . $title . $after_title);
        };
        ?>
        <div class="list-addess">
            <div class="item">
                <h6><?php echo esc_html($instance['address_title'] ) ?></h6>
                <i class="icon icon-placeholder-for-map"></i>
                <?php if (!empty($instance['address'])): ?>
                    <div>  <?php echo wp_kses_post($instance['address']); ?> 
                    </div>
                <?php endif; ?>
            </div>
            <div class="item">
                <h6><?php echo esc_html($instance['phone_title'] ) ?></h6>
                <i class="icon icon-phone-call"></i>
                <?php if (!empty($instance['phone'])): ?>
                    <div>  <?php echo wp_kses_post($instance['phone']); ?> 
                    </div>
                <?php endif; ?>
            </div>
            <div class="item">
                <h6><?php echo esc_html($instance['hours_title'] ) ?></h6>
                <i class="icon icon-clock"></i>
                <?php if (!empty($instance['hours'])): ?>
                    <div>  <?php echo wp_kses_post($instance['hours']); ?> 
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['phone'] = $new_instance['phone'];
        $instance['address'] = $new_instance['address'];
        $instance['hours'] = $new_instance['hours'];
        $instance['address_title'] = strip_tags($new_instance['address_title']);
        $instance['phone_title'] = strip_tags($new_instance['phone_title']);
        $instance['hours_title'] = strip_tags($new_instance['hours_title']);
        return $instance;
    }

}
function Driving_School_Contact_Box() {
    register_widget( 'Driving_School_ContactBox' );
}
add_action( 'widgets_init', 'Driving_School_Contact_Box' );
