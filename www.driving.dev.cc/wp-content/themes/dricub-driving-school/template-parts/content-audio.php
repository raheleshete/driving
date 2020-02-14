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
        $audio_content = get_post_meta(get_the_ID(), 'framework-audio-markup', true);
        if ($audio_content) {
            ?>
            <div class="post-music">
                <div class="box-music">
                    <?php echo wp_kses_post($audio_content); ?>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        if (is_sticky()) {
            echo '<div class="sticky_post_icon pull-right" title="' . esc_html__('Sticky Post', 'dricub-driving-school') . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
        }
        ?>
    </div>
    <?php dricub_driving_school_posted_on(); ?>
    <?php get_template_part('template-parts/content/content'); ?>
</div>