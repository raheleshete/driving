<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dricub_driving_school
 */
?>
<div class="post-content">
    <div class="tt-post contant-main">
    <?php
        if(!is_single()){
        	the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );      
        	dricub_driving_school_posted_on_by();
		}
        ?>
        <?php 
        if ( is_single() ){
            the_content( sprintf(
                wp_kses( __( 'Continue Reading', 'dricub-driving-school' ), array( 'span' => array( 'class' => array() ) ) ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
            ) );
        }else{
            if( get_option('rss_use_excerpt') ){
                the_excerpt();
                echo '<a href="'. esc_url(get_the_permalink()) .'" class="btn">'. esc_html__('Continue Reading', 'dricub-driving-school') . '</a>';
            } else{
                the_content( sprintf(
                    wp_kses( __( 'Continue Reading', 'dricub-driving-school' ), array( 'span' => array( 'class' => array('btn') ) ) ),
                    '') );
            }
        }
        wp_link_pages( array(
        'before'      => '<div class="page-pagination"><div class="page-numbers"><span class="page-links-title">' . esc_html__( 'Pages:', 'dricub-driving-school' ) . '</span>',
        'after'       => '</div></div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'dricub-driving-school' ) . ' </span>%',
        'separator'   => ', ',
        ) );
        ?>
        
        <?php 
        if ( is_single() ){
			echo '<div class="tag-cat-list">';
			$category = get_the_category(get_the_ID());
			if(!empty($category)){
				if(count($category)>1){
					 echo '<h3>'. esc_html__('Categories', 'dricub-driving-school') . '</h3>';
				}else{
					 echo '<h3>'. esc_html__('Category', 'dricub-driving-school') . '</h3>';
				}
				echo get_the_category_list();
			}
			$tag=get_the_tags( get_the_ID() );
			if(!empty($tag)){
				if(count($tag)>1){
					 echo '<h3>'. esc_html__('Tags', 'dricub-driving-school') . '</h3>';
				}else{
					 echo '<h3>'. esc_html__('Tag', 'dricub-driving-school') . '</h3>';
				}
				echo get_the_tag_list('<ul class="tagcloud"><li>','</li><li>','</li></ul>');
			}
			echo '</div>';
        }
        ?>
       
    </div>
</div>