<?php $dricub_driving_school_options = dricub_driving_school_options();  
if(isset($dricub_driving_school_options['dricub_driving_school_page_header_oder_behaviour'])   && $dricub_driving_school_options['dricub_driving_school_page_header_oder_behaviour'] == 1){  ?>
    <div class="modal  fade"  id="ModalOrderPackage01" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-cancel"></span></button>
                </div>
                <div class="modal-body layout-01">
                    <h6 class="tt-title"><?php echo wp_kses_post( $dricub_driving_school_options['dricub_driving_school_header_order_button_text'] ); ?></h6>
                      <?php echo sprintf(__('%s','dricub-driving-school'),  do_shortcode($dricub_driving_school_options['dricub_driving_school_header_order_modal_mc_form']) ) ;  ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>