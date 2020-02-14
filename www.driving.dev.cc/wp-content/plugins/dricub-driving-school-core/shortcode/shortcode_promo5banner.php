<?php

class Driving_School_Promo5Banner{

    public $modal_id;
    public $modal_title;
    public $rand_id;

    public function __construct() {
        add_shortcode('driving_school_promo5banner', array($this, 'driving_school_promo5banner_func'));
    }
    

public function driving_school_promo5banner_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'image'    => '',
        'modal_id' => '54',
        'title' => 'Start your Engine',
        'button_title' => 'BOOK YOUR LESSONS NOW',
        'modal_title' => 'ORDER PACKAGE',
        'extra_class' => '',
        'btn_class'=>'btn'
    ), $atts));
    ob_start();

    $this->modal_id = $modal_id;
    $this->modal_title = $modal_title;
    $this->rand_id = $this->get_id();
    add_action( 'contact_form7_modal_hook', array($this,'contact_form7_modal_hook_func') );
    ?>
    <div class="container-indent offset-bottom-0 <?php echo $extra_class; ?>">
        <div class="container">
            <div class="tt-promo-05">
                <div class="col-content col-sm-8 col-xs-12 pull-right">
                    <h6><?php echo $title; ?></h6>
                    <div class="text-center text-md"><?php echo $content; ?></div>
                    <a class="<?php echo esc_html($btn_class); ?>" href="#" data-toggle="modal" data-target="#ModalOrderPackage<?php echo esc_html($this->rand_id); ?>"><?php echo esc_html($button_title); ?></a>
                </div>
                <div class="col-img col-sm-4 col-xs-12 pull-left">
                    <img src="<?php echo wp_get_attachment_image_src((int) $image, 'full')[0]; ?>" alt="">
                </div>
            </div>
        </div>
    </div>

    
    <?php
    $content = ob_get_clean();
    return $content;
}
  public   function contact_form7_modal_hook_func(){

   $output= ' <!-- Modal (ORDER PACKAGE) -->
        <div class="modal  fade"  id="ModalOrderPackage'.$this->rand_id.'" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-cancel"></span></button>
                    </div>
                    <div class="modal-body layout-01">
                        <h6 class="tt-title">'.$this->modal_title.'</h6>
                        '.  do_shortcode('[contact-form-7 id="'.$this->modal_id.'"]') .'
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal (ORDER PACKAGE) -->';

         echo $output;  
           
    }

    public function get_id(){
        $num = mt_rand(100000,999999); 
        return $num;
    }
}
new Driving_School_Promo5Banner();