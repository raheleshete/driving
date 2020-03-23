<?php

class drivingSchoolFooterColumn4 extends WP_Widget {

    public $defaults;

    public function __construct() {
        $this->defaults = array(
            'title' => esc_html__('Footer widget 4', 'dricub-driving-school-core'),
            'facebook' => '#',
            'twitter' => '#',
            'googleplus' => '#',
            'instagram' => '#',
            'logo_image' => 'http://www.example.com/wp-content/uploads/2014/09/strawberries.jpg',
            'phone' => '800-123-4567',
            'address' => '2605 Caton Hill Road, Woodbridge, <br>VA 22192',
        );

        parent::__construct(
                'driving_school_footer_column4', // Base ID  
                esc_html__('Driving School Footer Column 4', 'dricub-driving-school-core'), // Name  
                array('description' => esc_html__(' Footer Column 4', 'dricub-driving-school-core'))
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

        <!-- facebook-->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>"><?php echo wp_kses_post($instance['facebook']); ?></textarea>
        </p>
        <!-- twiiter-->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php esc_html_e('Twitter', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>"><?php echo wp_kses_post($instance['twitter']); ?></textarea>
        </p>
        <!-- googleplus-->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('googleplus')); ?>"><?php esc_html_e('Googleplus', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('googleplus')); ?>" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>"><?php echo wp_kses_post($instance['googleplus']); ?></textarea>
        </p>
        <!-- instagram-->
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php esc_html_e('Instagram', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>"><?php echo wp_kses_post($instance['instagram']); ?></textarea>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('logo_image')); ?>"><?php esc_html_e('Logo Image', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('logo_image')); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>"><?php echo wp_kses_post($instance['logo_image']); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone', 'dricub-driving-school-core') ?></label>
            <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" value="<?php echo esc_attr($instance['phone']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address', 'dricub-driving-school-core') ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>"><?php echo wp_kses_post($instance['address']); ?></textarea>
        </p>


        <?php
    }

    function widget($args, $instance) {
        extract($args);
        echo wp_kses_post($before_widget);
        if (!empty($instance['title'])) {
            $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
            //echo wp_kses_post($before_title . $title . $after_title);
        };
        ?>
        <!-- tt-social-icon -->
        <ul class="tt-social-icon">
            <!--facebook-->
            <?php if (!empty($instance['facebook'])): ?>
                <li>
                    <a href="<?php echo wp_kses_post($instance['facebook']); ?>" target="blank"><i class="icon-facebook-logo"></i></a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['twitter'])): ?>
                <li>
                    <a href="<?php echo wp_kses_post($instance['twitter']); ?>" target="blank"><i class="icon-twitter-logo-silhouette"></i></a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['googleplus'])): ?>
                <li>
                    <a href="<?php echo wp_kses_post($instance['googleplus']); ?>" target="blank"><i class="icon-social-media"></i></a>
                </li>
            <?php endif; ?>
            <?php if (!empty($instance['instagram'])): ?>
                <li>
                    <a href="<?php echo wp_kses_post($instance['instagram']); ?>" target="blank"><i class="icon-instagram-social"></i></a>
                </li>
            <?php endif; ?>
        </ul>
        <!-- /tt-social-icon -->
        <!-- tt-baner-01 -->
        <div class="tt-baner-01">
            <img src="<?php echo $instance['logo_image']; ?>" alt="" />
            <address>
                <span class="tel">
                    <a href="tel:<?php echo esc_html($instance['phone']) ?>"><i class="icon-phone-call"></i><?php echo esc_html($instance['phone']) ?>
                    </a>
                </span>
                <span><?php echo $instance['address']; ?></span>
            </address>
        </div>
        <!-- /tt-baner-01 -->
        <?php
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['logo_image'] = $new_instance['logo_image'];
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['address'] = $new_instance['address'];
        $instance['facebook'] = $new_instance['facebook'];
        $instance['twitter'] = $new_instance['twitter'];
        $instance['googleplus'] = $new_instance['googleplus'];
        $instance['instagram'] = $new_instance['instagram'];
        return $instance;
    }

}
function driving_School_Footer_Column4_widget() {
    register_widget( 'drivingSchoolFooterColumn4' );
}
add_action( 'widgets_init', 'driving_School_Footer_Column4_widget' );

