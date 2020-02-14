<?php

add_filter('rwmb_meta_boxes', 'dricub_driving_school_register_framework_post_meta_box');

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function dricub_driving_school_register_framework_post_meta_box($meta_boxes) {
    global $wp_registered_sidebars;

    /**
     * prefix of meta keys (optional)
     * Use underscore (_) at the beginning to make keys hidden
     * Alt.: You also can make prefix empty to disable it
     */
    // Better has an underscore as last sign
    $prefix = 'framework';

    $sidebars = array();

    foreach ($wp_registered_sidebars as $key => $value) {
        $sidebars[$key] = $value['name'];
    }

    $opacities = array();

    for ($o = 0.0, $n = 0; $o <= 1.0; $o += 0.1, $n++) {
        $opacities[$n] = $o;
    }


    $meta_boxes[] = array(
        'id' => 'framework-meta-box-post-format-link',
        'title' => esc_html__('Post Format Data', 'dricub-driving-school-core'),
        'pages' => array(
            'post',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Link', 'dricub-driving-school-core'),
                'desc' => esc_html__('Works with link post format.', 'dricub-driving-school-core'),
                'id' => "{$prefix}-link",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Link title', 'dricub-driving-school-core'),
                'desc' => esc_html__('Works with link post format.', 'dricub-driving-school-core'),
                'id' => "{$prefix}-link-title",
                'type' => 'text',
            ),
    ));


    $meta_boxes[] = array(
        'id' => 'framework-meta-box-post-format-video',
        'title' => esc_html__('Post Format Data', 'dricub-driving-school-core'),
        'pages' => array(
            'post',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Video Markup', 'dricub-driving-school-core'),
                'desc' => esc_html__('Put embed src of video. i.e. youtube, vimeo', 'dricub-driving-school-core'),
                'id' => "{$prefix}-video-markup",
                'type' => 'textarea',
                'cols' => 20,
                'rows' => 3,
            ),
    ));

    $meta_boxes[] = array(
        'id' => 'framework-meta-box-post-format-audio',
        'title' => esc_html__('Post Format Data', 'dricub-driving-school-core'),
        'pages' => array(
            'post',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Audio Markup', 'dricub-driving-school-core'),
                'desc' => esc_html__('Put embed src of video. i.e. youtube, vimeo', 'dricub-driving-school-core'),
                'id' => "{$prefix}-audio-markup",
                'type' => 'textarea',
                'cols' => 20,
                'rows' => 3,
            ),
    ));

    $meta_boxes[] = array(
        'id' => 'framework-meta-box-post-format-gallery',
        'title' => esc_html__('Post Format Data', 'dricub-driving-school-core'),
        'pages' => array(
            'post',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Upload Gallery Images', 'dricub-driving-school-core'),
                'id' => "{$prefix}-gallery",
                'desc' => '',
                'type' => 'image_advanced',
                'max_file_uploads' => 24,
            ),
    ));

    $meta_boxes[] = array(
        'id' => 'framework-meta-box-testimonials',
        'title' => esc_html__('Manage Testimonial Meta Fields', 'dricub-driving-school-core'),
        'pages' => array(
            'car-testimonial',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Customer Name', 'dricub-driving-school-core'),
                'desc' => esc_html__('Customer Name.', 'dricub-driving-school-core'),
                'id' => "{$prefix}-client-name",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Customer Ratting', 'dricub-driving-school-core'),
                'desc' => esc_html__('Enter Customer Ratting', 'dricub-driving-school-core'),
                'id' => "{$prefix}-client-ratting",
                'type' => 'select',
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ),
            ),
            array(
                'id' => "{$prefix}-ratting_style",
                'name' => esc_html__('Rating Style', 'dricub-driving-school-core'),
                'desc' => '',
                'type' => 'image_select',
                'std' => '',
                'options' => array(
                    '1' => DRICUB_DRIVING_SCHOOL_THEME_URI . '/images/admin/light.png',
                    '2' => DRICUB_DRIVING_SCHOOL_THEME_URI . '/images/admin/dark.png',
                ),
                'placeholder' => esc_html__('Select', 'dricub-driving-school-core'),
            ),
    ));

    $meta_boxes[] = array(
        'id' => 'framework-meta-box-driving-school',
        'title' => esc_html__('Manage Driving School Meta Fields', 'dricub-driving-school-core'),
        'pages' => array(
            'dricub-driving-school-core',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Icon', 'dricub-driving-school-core'),
                'desc' => esc_html__('Hover Service Icon.', 'dricub-driving-school-core'),
                'id' => "{$prefix}-service-icon",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Page Heading', 'dricub-driving-school-core'),
                'desc' => esc_html__('Heading of Page.', 'dricub-driving-school-core'),
                'id' => "{$prefix}-service-page-head",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Sub Title', 'dricub-driving-school-core'),
                'desc' => esc_html__('Sub Heading of Page.', 'dricub-driving-school-core'),
                'id' => "{$prefix}-service-page-sub-head",
                'type' => 'text',
            ),
    ));

    //Coupons
    $meta_boxes[] = array(
        'id' => 'dricub-driving-school-our-coupons',
        'title' => esc_html__('Our Coupons Meta Fields', 'dricub-driving-school-core'),
        'pages' => array(
            'our_coupons',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Coupon Top Right', 'dricub-driving-school-core'),
                'desc' => esc_html__('Coupon Top Right', 'dricub-driving-school-core'),
                'id' => "{$prefix}-coupon-top-right",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Coupon Middle', 'dricub-driving-school-core'),
                'desc' => esc_html__('Coupon Middle', 'dricub-driving-school-core'),
                'id' => "{$prefix}-coupon-middle",
                'type' => 'textarea',
            ),
            array(
                'name' => esc_html__('Coupon Title', 'dricub-driving-school-core'),
                'desc' => esc_html__('Coupon Title', 'dricub-driving-school-core'),
                'id' => "{$prefix}-coupon-title",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Coupon Ribbon', 'dricub-driving-school-core'),
                'desc' => esc_html__('Coupon Ribbon', 'dricub-driving-school-core'),
                'id' => "{$prefix}-coupon-ribbon",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Coupon Date', 'dricub-driving-school-core'),
                'desc' => esc_html__('Coupon Date', 'dricub-driving-school-core'),
                'id' => "{$prefix}-coupon-date",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Logo Image', 'dricub-driving-school-core'),
                'id' => "{$prefix}-logo",
                'desc' => '',
                'type' => 'image',
                'max_file_uploads' => 1,
            ),
    ));

    $posts_page = get_option('page_for_posts');


    $meta_boxes[] = array(
        'id' => 'framework-meta-box-thumbsize',
        'title' => esc_html__('Select Thumbnail size for gallery', 'dricub-driving-school-core'),
        'pages' => array(
            'projects',
        ),
        'context' => 'normal',
        'priority' => 'high',
        'tab_style' => 'left',
        'fields' => array(
            array(
                'name' => esc_html__('Amount', 'dricub-driving-school-core'),
                'id' => "{$prefix}-amount",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Time duration ( Day or weeks or month )', 'dricub-driving-school-core'),
                'id' => "{$prefix}-timeduration",
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Select Thumbanail size', 'dricub-driving-school-core'),
                'id' => "{$prefix}-thumbnail-size",
                'type' => 'select',
                'options' => array(
                    '' => 'Default',
                    'sm_squier' => 'Small Squier',
                    'big_squier' => 'Big Squier',
                    'single_hor' => 'Single Horizontal',
                    'single_var' => 'Single Vertical',
                ),
            ),
    ));

    $posts_page = get_option('page_for_posts');

    if (!isset($_GET['post']) || intval($_GET['post']) != $posts_page) {

        $meta_boxes[] = array(
            'id' => $prefix . '_page_meta_box',
            'title' => esc_html__('Page Design Settings', 'dricub-driving-school-core'),
            'pages' => array(
                'page','our-programs'
            ),
            'context' => 'normal',
            'priority' => 'core',
            'fields' => array(
                array(
                    'id' => "{$prefix}_show_page_title",
                    'name' => esc_html__('Show page titlebar', 'dricub-driving-school-core'),
                    'desc' => '',
                    'type' => 'radio',
                    'std' => "on",
                    'options' => array('on' => 'Yes', 'off' => 'No'),
                ),
                array(
                    'id' => "{$prefix}_show_breadcrumb",
                    'name' => esc_html__('Show Breadcrumb', 'dricub-driving-school-core'),
                    'desc' => '',
                    'type' => 'radio',
                    'std' => "on",
                    'options' => array('on' => 'Yes', 'off' => 'No'),
                ),
            )
        );
    }


    return $meta_boxes;
}
