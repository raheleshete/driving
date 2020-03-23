<?php
add_shortcode('program_video', 'driving_school_item_func');
function driving_school_item_func($atts, $content = null) {
    extract(shortcode_atts(array(
        'video_src' => '',
        'poster_image' => '',
                    ), $atts));
    ob_start();
    $attachement = wp_get_attachment_image_src((int) $poster_image);
    ?>
    <div class="video-block">
        <a href="#" class="link-video"></a>
        <video class="movie" src="<?php echo esc_html__($video_src); ?>" poster="<?php
               if ($attachement != array()) {
                   echo esc_url($attachement[0]);
               }
               ?>">
        </video>
    </div>
    <?php
    return ob_get_clean();
}
