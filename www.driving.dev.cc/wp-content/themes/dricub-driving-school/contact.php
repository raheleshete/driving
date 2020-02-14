<?php
/* Template Name: Contact Us */
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
						wp_kses( __( 'Continue Reading %s', 'dricub-driving-school' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">', '</span>', false )
					) );

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'dricub-driving-school' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'dricub-driving-school' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
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
			<?php do_action('dricub_driving_school_after_footer');?>
			 
		</main>
	</div>
</div>

<?php get_footer(); ?>
