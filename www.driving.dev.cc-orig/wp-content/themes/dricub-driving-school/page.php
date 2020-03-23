<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dricub-driving-school
 */
get_header();
?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="page-main" class="site-main">
			<div class="container">
			<?php
			while ( have_posts() ) : the_post();
				
					/* translators: %s: Name of current post */
					the_content( sprintf(
						wp_kses( __( 'Continue Reading', 'dricub-driving-school' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );
					
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dricub-driving-school' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'dricub-driving-school' ) . ' </span>%',
						'separator'   => ', ',
						) );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					echo '<div class="container">'; 
						comments_template();
					echo '</div>'; 
				endif;
			endwhile; 
			?>
			</div>
		</main>
	</div>
</div>
<?php get_footer();
