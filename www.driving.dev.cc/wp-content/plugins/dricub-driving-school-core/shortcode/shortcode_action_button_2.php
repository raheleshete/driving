<?php

class Driving_School_Action_Button_Two{

    public $modal_id;
    public $title;
    public $btn_class;
    public $rand_id;

    public function __construct() {
        add_shortcode('driving_school_action_button_2', array($this, 'driving_school_action_button_2_func'));
    }
    

public function driving_school_action_button_2_func($atts, $content = null) {

    extract(shortcode_atts(array(
        'title' => '',
        'modal_id' => '54',
        'btn_class'=>'btn'
                    ), $atts));
    ob_start();

    $this->modal_id = $modal_id;
    $this->title = $title;
    $this->btn_class = $btn_class;
    $this->rand_id = $this->get_id();
    add_action( 'contact_form7_modal_hook', array($this,'contact_form7_modal_hook_func') );
    ?>
    <a class="<?php echo esc_html($btn_class); ?>" href="#" data-toggle="modal" data-target="#ModalOrderPackage<?php echo esc_html($this->rand_id); ?>"><?php echo esc_html($title); ?></a>
    <?php
    $content = ob_get_clean();
    return $content;
}
  public   function contact_form7_modal_hook_func(){

   $output= ' <!-- Modal (ORDER PACKAGE) -->
    <div class="modal  fade"  id="ModalOrderPackage'.$this->rand_id.'" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-cancel"></span></button>
                </div>
                <div class="modal-body layout-02">
                '.  do_shortcode('[contact-form-7 id="'.$this->modal_id.'"]') .'
            </div>
        </div>
    </div>
</div>';

         echo $output;  
           
    }

    public function get_id(){
        $num = mt_rand(100000,999999); 
        return $num;
    }
}
new Driving_School_Action_Button_Two();