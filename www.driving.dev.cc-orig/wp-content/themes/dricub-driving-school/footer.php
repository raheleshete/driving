<?php $dricub_driving_school_options = dricub_driving_school_options(); ?>
<!-- Footer -->
	<footer id="tt-footer" class="index-offset">
		<div class="container">
			<div class="row">
				<?php if(is_active_sidebar('footer_col_1')){ ?>
				<div class="col-md-12 col-lg-3 col-logo">
 					<?php dynamic_sidebar('footer_col_1')?>
				</div>
				<?php } ?>
				<?php if(is_active_sidebar('footer_col_2')||is_active_sidebar('footer_col_3')){ ?>
				<div class="col-md-12 col-lg-6 col-list">
					<div class="row ">
						<?php if(is_active_sidebar('footer_col_2')){ ?>
							<div class="col-xs-12 col-sm-6 extra-indent">
								<?php dynamic_sidebar('footer_col_2')?>
							</div>
						<?php }?>
						<?php if(is_active_sidebar('footer_col_3')){ ?>
							<div class="col-xs-12 col-sm-6 extra-indent">
								<?php dynamic_sidebar('footer_col_3')?>
							</div>
						<?php }?>
					</div>
				</div>
				<?php  }?>
					
				<?php if(is_active_sidebar('footer_col_4')){ ?>
				<div class="col-md-12 col-lg-3 col-promo">
					<?php dynamic_sidebar('footer_col_4')?>
				</div>
				<?php }?>
				<div class="col-md-12">
					<div class="tt-footer-copyright">
						<?php echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_footer_copyright']);?>
					</div>
				</div>
                 <?php if ( $dricub_driving_school_options['dricub_driving_school_back_to_top'] ==1) { ?>
				<div class="back-to-top">
					<i class="icon-down-arrow"></i>
				</div>
                <?php } ?>
			</div>
		</div>
	</footer>
	<!-- /Footer -->
	<!-- / Modal (ORDER PACKAGE) -->
	<?php
	if ( $dricub_driving_school_options['dricub_driving_school_page_header_oder_behaviour'] ==1) { 
		 get_template_part( 'template-parts/modal' );
	} 
	?>
	<?php do_action( 'price_box_hook' ); ?>
	<?php do_action( 'contact_form7_modal_hook' ); ?>
<?php wp_footer(); ?>
</body>
</html>