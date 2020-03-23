<?php
class Driving_School_Action_Button{


    public $modal_id;
    public $title;
    public $modal_title;
 

    public function __construct() {
        add_shortcode('driving_school_action_button', array($this, 'driving_school_action_button_func'));
    }
    

 

public function driving_school_action_button_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => '',
        'modal_title' => 'ORDER PACKAGE',
        'button_action' => 'modal',
        'modal_id' => '54',
        'extra_class' => '',
        'call_action'=> '',
                    ), $atts));
    $this->modal_id = $modal_id;
    $this->title = $title;
    $this->modal_title = $modal_title;
    ob_start();

    if ($button_action == '2'):
    ?>
    
    <a class="btn" href="#" data-toggle="modal" data-target="#ModalOrderPackage<?php echo esc_html($this->modal_id); ?>"><?php echo esc_html($this->title); ?></a>
   
   <?php  add_action( 'contact_form7_modal_hook', array($this,'contact_form7_modal_hook_func') ); ?>


    <?php else: ?>
       <?php  $href = vc_build_link( $call_action ) ;  ?>
                         <a href="<?php echo $href['url'];?>" <?php if(!(empty($href['target']))):?> target="<?php echo $href['target'];?>" <?php endif;?>  class="btn <?php echo esc_html($extra_class); ?>" rel="<?php echo $href['rel'];?>"  >   
            <?php echo esc_html($title); ?>
        </a>
    <?php endif; ?>
    <?php
    $content = ob_get_clean();
    return $content;
}

  public   function contact_form7_modal_hook_func(){

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

new Driving_School_Action_Button();