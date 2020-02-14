<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dricub_driving_school
 */
?>
<div class="tt-post contant-main">      
    <div class="post-image">
        <?php
        $video_content = get_post_meta(get_the_ID(), 'framework-video-markup', true);
        if($video_content) { ?>
            <div class="video-services">
                <?php echo get_post_meta(get_the_ID(), 'framework-video-markup', true); ?>
            </div>
        <?php } 
        if (is_sticky()) {
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__('Sticky Post', 'dricub-driving-school') . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
        }
        ?>
    </div>
    <?php dricub_driving_school_posted_on(); ?>
    <?php get_template_part('template-parts/content/content'); ?>
</div>