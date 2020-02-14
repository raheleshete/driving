<?php
class Driving_School_Ready{
    public $modal_id;
    public $button_text;
    public $modal_title;

    public function __construct() {
        add_shortcode('driving_school_ready', array($this, 'driving_school_ready_func'));
    }

    function driving_school_ready_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' => '',
            'image' => '',
        'button_text' => 'Order Now',
        'modal_title' => 'ORDER PACKAGE',
        'button_action' => '2',
        'modal_id' => '54',
        'call_action'=> '',
            'extra_class' => '',
        ), $atts));

        $this->modal_id = $modal_id;
        $this->button_text = $button_text;
        $this->modal_title = $modal_title;

        $attachement = wp_get_attachment_image_src((int) $image, 'full');

        ob_start();
		$content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ?>

        <div class="tt-layout-01 <?php echo $extra_class; ?>">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="tt-img">
                  <?php if ($attachement != array()) { ?>
                    <img src="<?php echo esc_url($attachement[0]); ?>" alt="">
                  <?php } ?>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 pull-right">
                <h1 class="tt-title-lg"><?php echo $title; ?></h1>
                <div class="tt-img-mobile">
                  <?php if ($attachement != array()) { ?>
                    <img src="<?php echo esc_url($attachement[0]); ?>" alt="">
                  <?php } ?>
                </div>
                <?php echo $content; ?>
                

                <div class="row-btn">

                <?php if ($button_action == '2'): ?>

                  <a class="btn tt-btn-custom" href="#" data-toggle="modal" data-target="#ModalOrderPackage<?php echo esc_html($this->modal_id); ?>"><?php echo esc_html($this->button_text); ?></a>

                  <?php  add_action( 'contact_form7_modal_hook', array($this,'contact_form7_modal_hook_func') ); ?>

                <?php elseif($button_action == '3'): ?>

                  <?php  $href = vc_build_link( $call_action ) ;  ?>
                  <a href="<?php echo $href['url'];?>" <?php if(!(empty($href['target']))):?> 
                    target="<?php echo $href['target'];?>" <?php endif;?>  
                    class="btn tt-btn-custom" 
                    rel="<?php echo $href['rel'];?>">   
                      <?php echo esc_html($button_text); ?>
                  </a>              
                <?php endif; ?>
                </div>
                <div class="tt-img-device">
                  <?php if ($attachement != array()) { ?>
                    <img src="<?php echo esc_url($attachement[0]); ?>" alt="">
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        return ob_get_clean();
    }
    
    public function contact_form7_modal_hook_func(){
        $output='    <!-- Modal (ORDER PACKAGE) -->
            <div class="modal  fade"  id="ModalOrderPackage' .  $this->modal_id.'" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-cancel"></span></button>
                        </div>
                        <div class="modal-body layout-01">
                            <h6 class="tt-title">' .$this->modal_title . '</h6>
                        '. do_shortcode('[contact-form-7 id="' .$this->modal_id . '"]').'
                    </div>
                </div>
            </div>
        </div>';

         echo $output;
    }
}

new Driving_School_Ready();