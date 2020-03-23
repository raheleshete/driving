<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dricub_driving_school
 */

get_header();
?>
<div id="page-main" class="page-main">
  <div class="container">
				<div class="row">
        <?php if (is_active_sidebar('blog_sideber')) { ?>
          <div class="col-md-9 blog-post with-sidebar-blog">
        <?php }else{ ?>
          <div class="col-md-12 blog-post ">
        <?php } ?>
  				<?php
            if ( have_posts() ) :
            while ( have_posts() ) : the_post();
             	get_template_part( 'template-parts/content', get_post_format() ); 
             endwhile;
            else :
            get_template_part( 'template-parts/content', 'none' );
            endif;  
          ?>
          <?php
   
            // Previous/next page navigation.
          the_posts_pagination( array(
            'prev_text'          => esc_html__( '&laquo; Previous', 'dricub-driving-school' ),
            'next_text'          => esc_html__( 'Next &raquo;', 'dricub-driving-school' ),
            'before_page_number' => '',
          ) );
            ?>
        </div>
        <?php if (is_active_sidebar('blog_sideber')) { ?>
      	 <div class="col-md-3 aside">
	      <?php get_sidebar(); ?>
        </div>
        <?php } ?>
      	</div>
      </div>
</div>
<?php
get_footer();