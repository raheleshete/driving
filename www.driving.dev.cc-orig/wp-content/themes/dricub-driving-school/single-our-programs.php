<?php
/**
 * Template Name: Single Programs
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @package dricub_driving_school
 */
get_header();
?>
<div id="page-main">
    <div class="container">

        <div class="row">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile; // End of the loop.
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
