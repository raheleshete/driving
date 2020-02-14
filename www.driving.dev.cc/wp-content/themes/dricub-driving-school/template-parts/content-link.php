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
        $link_title = get_post_meta(get_the_ID(), 'framework-link-title', true);
        $link = get_post_meta(get_the_ID(), 'framework-link', true);
        if ($link) { 
                if (is_sticky()) {
                    echo '<div class="sticky_post_icon pull-right" title="' . esc_html__('Sticky Post', 'dricub-driving-school') . '"><span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span></div>';
                }
                ?>
            <a class="link-images" href="<?php esc_url(the_permalink()) ?>">
                <?php the_post_thumbnail('full') ?>
            </a>
            <a target="blank" href="<?php echo esc_url($link) ?>" class="post-img-link">
                <span><?php echo wp_kses_post($link_title); ?></span>
                <i class="icon-link"></i>
             </a>
        <?php } ?>
    </div>
    <?php dricub_driving_school_posted_on(); ?>
    <?php get_template_part('template-parts/content/content'); ?>					 
</div>