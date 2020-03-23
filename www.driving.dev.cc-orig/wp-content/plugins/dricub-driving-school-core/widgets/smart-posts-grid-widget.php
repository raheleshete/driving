<?php

class Driving_School_Posts_Grid extends WP_Widget {

    public $defaults;

    public function __construct() {
        $this->defaults = array(
            'title' => esc_html__('Featured Posts', 'dricub-driving-school-core'),
            'limit' => '2',
            'orderby' => 'date',
            'order' => 'DESC',
        );
        parent::__construct(
                'smart_posts_grid', // Base ID  
                esc_html__('Driving School Posts Grid', 'dricub-driving-school-core'), // Name  
                array(
            'description' => esc_html__('This widget will display posts grid on sidebars.', 'dricub-driving-school-core')
                )
        );
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, $this->defaults);
        extract($instance);
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <strong><?php esc_html_e('Title', 'dricub-driving-school-core') ?>:</strong><br /><input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>" />
            </label>
        </p>

        <p><label for="<?php echo esc_attr($this->get_field_id('orderby')); ?>"><?php esc_html_e('Order By:', 'dricub-driving-school-core') ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('orderby')); ?>" name="<?php echo esc_attr($this->get_field_name('orderby')); ?>">
                <option value="ID" <?php selected($orderby, 'ID'); ?>><?php esc_html_e('ID', 'dricub-driving-school-core') ?></option>
                <option value="date" <?php selected($orderby, 'date'); ?>><?php esc_html_e('Date', 'dricub-driving-school-core') ?></option>
                <option value="comment_count" <?php selected($orderby, 'comment_count'); ?>><?php esc_html_e('Comments', 'dricub-driving-school-core') ?></option>
                <option value="rand" <?php selected($orderby, 'rand'); ?>><?php esc_html_e('Random', 'dricub-driving-school-core') ?></option>
            </select>
        </p>

        <p><label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php esc_html_e('Order:', 'dricub-driving-school-core') ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('order')); ?>" name="<?php echo esc_attr($this->get_field_name('order')); ?>">
                <option value="DESC" <?php selected($order, 'DESC'); ?>><?php esc_html_e('Descending', 'dricub-driving-school-core') ?></option>
                <option value="ASC" <?php selected($order, 'ASC'); ?>><?php esc_html_e('Ascending', 'dricub-driving-school-core') ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('limit')); ?>">
                <strong><?php esc_html_e('Posts Limit', 'dricub-driving-school-core') ?>:</strong><br /><input class="widefat" type="number" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" value="<?php echo esc_attr($instance['limit']); ?>" />
            </label>
        </p>

        <?php
    }

    function widget($args, $instance) {
        global $post;

        extract($args);

        echo wp_kses_post($before_widget);

        if (!empty($instance['title'])) {
            $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
            echo wp_kses_post($before_title . $title . $after_title);
        };
        $query_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'orderby' => $instance['orderby'],
            'order' => $instance['order'],
            'posts_per_page' => (int) $instance['limit']
        );

        $results = get_posts($query_args);
        if (!empty($results) && !is_wp_error($results)): 
            ?>
            <div class="tt-post-preview">
        <?php
            foreach ($results as $post): setup_postdata($post);
                ?>
                <div class="blog-post item">
                    <div class="post-image">
                        <a href="<?php the_permalink() ?>">
                            <?php echo the_post_thumbnail('dricub-driving-schools-blog-post-featured-image'); ?>
                            <!--<img src="images/blog/blog-post-featured-1.jpg" alt="">-->
                        </a>
                    </div>
                    <?php
                   dricub_driving_school_posted_on();
                    ?>
                    <h4 class="post-title tt-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                </div>
                <?php
            endforeach;
            ?>
        </div>
        <?php
        endif;
        wp_reset_postdata();
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['orderby'] = strip_tags($new_instance['orderby']);
        $instance['order'] = strip_tags($new_instance['order']);
        $instance['limit'] = strip_tags($new_instance['limit']);
        return $instance;
    }

}
function Driving_School_Posts_Grid_widget() {
    register_widget( 'Driving_School_Posts_Grid' );
}
add_action( 'widgets_init', 'Driving_School_Posts_Grid_widget' );
