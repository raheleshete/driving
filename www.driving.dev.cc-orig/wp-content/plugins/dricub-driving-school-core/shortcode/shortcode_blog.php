<?php
add_shortcode('driving_school_post_loop', 'driving_school_post_loop_func');

function driving_school_post_loop_func($atts, $content = null) {
	
    extract(shortcode_atts(array(
        'post_loop' => '',
        'layout' => '',
        'is_pagination' => '',
        'extra_class' => '',
                    ), $atts));
    $pg_num = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => array('post'),
        'post_status' => array('publish'),
        'nopaging' => false,
        'paged' => $pg_num,
        'posts_per_page' => get_option('posts_per_page'),
        'orderby' => 'ID',
        'order' => 'DESC',
		
    );

    if (!empty($post_loop)) {
        // NEED TO WORK HERE...
        $post_loop = explode('|', $post_loop);
        $temp_args = array();
        if (!empty($post_loop)) {
            foreach ($post_loop as $param) {
                $param = explode(':', $param);
                if (isset($param[0])) {
                    $temp_args[$param[0]] = $param[1];
                }
            }
        }
        $post_loop = $temp_args;

        if (isset($post_loop['size']) && $post_loop['size']) {
            $args['posts_per_page'] = (int) $post_loop['size'];
        }
        if (isset($post_loop['post_type']) && $post_loop['post_type']) {
            $args['post_type'] = $post_loop['post_type'];
        }
        if (isset($post_loop['order_by']) && $post_loop['order_by']) {
            $args['orderby'] = $post_loop['order_by'];
        }
        if (isset($post_loop['order']) && $post_loop['order']) {
            $args['order'] = $post_loop['order'];
        }
		if (isset($post_loop['categories']) && $post_loop['categories']) {
            $args['cat'] = $post_loop['categories'];
        }
    }

    ob_start();
    $pg_num = (get_query_var('paged')) ? get_query_var('paged') : 1;
    // WP_Query arguments
    // The Query
	
    $query = new WP_Query($args);
	
    if ($layout == 'card') {
        ?>
        <div class="blog-isotope">
            <div class="post_loop_cont_wrap" style="height: 100%;">
                <?php
                // The Loop
                if ($query->have_posts()) {
                    ?>
                    <ul class="post_loop_cont effect-2 blog-masonry grid-col-3"  id="blog-masonry" style="height: 100%;"><?php
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <li class="item">
                                <div class="post-all-content">

                                    <?php get_template_part('template-parts/content', get_post_format()); ?> 
                                </div>
                               
                            </li>
                            <?php
                        }
                        ?>

                    </ul>

                    <div class="clearfix"></div>
                    <?php
                    if ($is_pagination == 'navigation') {
                        previous_posts_link('&laquo; Prev post');
                        next_posts_link('Next posts &raquo;', $query->max_num_pages);
                    } elseif ($is_pagination == 'ajax-load') {
                        ?>
                        <div id="postPreload"></div>
                        <div id="post_ajax_load"></div>
                        <div class="text-center"><a class="btn btn-default view-more-post ajax_load_post_btn blog-grid" data-post_per_load="<?php echo get_option('posts_per_page'); ?>" data-load="post-more-ajax-card.txt" ><?php esc_html_e('More Posts', 'dricub-driving-school-core'); ?></a>
                            <img class="ajax_load_post_img" src="<?php echo DRICUB_DRIVING_SCHOOL_IMG_URL; ?>/ajax-loader.gif" style="display: none;" />
                        </div>
                        <div class="divider"></div>
                        <?php
                    } else {
                        echo '';
                    }
                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();
                ?></div>
        </div>

    <?php } else { ?>



        <?php
        if ($query->have_posts()) {
            ?>
            <div class="post_loop_cont_wrap" style="height: auto;">

                <div class="post_loop_cont" style="height: 100%;">
                    <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                        ?>
                        <div class="blog-post">
                            <div class="post-image">
                                <?php get_template_part('template-parts/media/content', get_post_format()); ?> 
                            </div>
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li class="post-message"><i class="icon icon-chat-bubble"></i><span> <?php comments_number('0', '1', '%'); ?></span></li>
                                    <li><?php echo get_the_date('d / m / Y') ?></li>
                                </ul>
                                <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <div class="post-author"><?php esc_html_e('by', 'dricub-driving-school-core'); ?> <?php printf(esc_html__('%s', 'dricub-driving-school-core'), get_the_author()) ?></div>
                                <div class="post-teaser">
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="clearfix"></div>
                <?php
                if ($is_pagination == 'navigation') {

                    previous_posts_link('&laquo; Prev post');
                    next_posts_link('Next posts &raquo;', $query->max_num_pages);
                } elseif ($is_pagination == 'ajax-load') {
                    ?>
                    <div id="postPreload"></div>
                    <div id="post_ajax_load"></div>
                    <div class="text-center"><a class="btn btn-default view-more-post ajax_load_post_btn" data-post_per_load="<?php echo get_option('posts_per_page'); ?>" data-load="post-more-ajax-card.txt" ><?php esc_html_e('More Posts', 'dricub-driving-school-core'); ?></a>
                        <img class="ajax_load_post_img" src="<?php echo CAR_REPAIR_SERVICES_IMG_URL; ?>/ajax-loader.gif" style="display: none;" />
                    </div>
                    <div class="divider"></div>
                    <?php
                } else {
                    echo '';
                }
                ?></div><?php
        } else {

            get_template_part('template-parts/content', 'none');
        }

        wp_reset_postdata();
        ?>

    <?php } ?>


    <?php
    $output = ob_get_clean();
    return $output;
}
