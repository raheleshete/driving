<?php
class driving_school_car_running_banner {

    public $rand_id;
 
    public $cf7_id;

    public function __construct() {
        add_shortcode('car_running_banner', array($this, 'driving_school_car_running_banner_func'));
    }

    function driving_school_car_running_banner_func($atts, $content = null) {
        
        $this->atts = $atts;

        extract(shortcode_atts(array(
            'road_img'      => '',
            'car_img'       => '',
            'car_mob_img'   => '',
            'wheel_img'     => '',
            'limiter_img'   => '',

            'call_action'=> '',
            'show_cf7_modal'   => 'yes',
            'cf7_id'   => '24',
          
            'btn_title'   => 'BECOME A MEMBER'
        ), $atts));

         $href = vc_build_link( $call_action );
 
         $this->cf7_id = $cf7_id;

         $link='';
         if ($show_cf7_modal != 'yes') {

            $link = '<a class="btn-border"';

            if(!(empty($href['url']))) 
                $link .= ' href="'. $href['url'].'"';

            if(!(empty($href['target']))) 
                $link .= ' target="'. $href['target'].'"'; 

            if(!(empty($href['title']))) 
                $link .= ' title="'. $href['title'].'"'; 

            if(!(empty($href['rel']))) 
                $link .= ' rel="'. $href['rel'].'"'; 

            $link .= ' data-target="#enrollment">'.$btn_title.'</a>'; 

        } else {
            
        }

        $content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        $output = '<div class="tt-promo-02">
                        <div class="col-info">
                            <div class="text-banner">
                                '.do_shortcode($content);
        if($link!=''){
            $output .=$link;
        }else{
            $output .= do_shortcode('[driving_school_action_button_2 title="' . $btn_title . '"  modal_id="' . $this->cf7_id . '"  btn_class="btn-border"]');
        }
        $output .='</div>
                        </div>
                        <img class="carObj-mobile" src="'. wp_get_attachment_image_src((int) $car_mob_img, 'full')[0] .'" alt="">
                        <div class="col-moving-car moving-car">
                            <img class="carObj-arrow-down" src="'.get_template_directory_uri().'/images/carObj-arrow-down.png" alt="">
                            <div class="carObj" style="background: url('. wp_get_attachment_image_src((int) $car_img, 'full')[0] .') 0 -10px no-repeat;">
                                 <img class="wheel wheel1" src="'. wp_get_attachment_image_src((int) $wheel_img, 'full')[0] .'" alt="">
                                 <img class="wheel wheel2" src="'. wp_get_attachment_image_src((int) $wheel_img, 'full')[0] .'" alt="">
                            </div>
                             <div class="carObj-mobilemiter"></div>
                        </div>
                    </div>';
        $this->col_no = 0;
        return $output;
    }

}

new driving_school_car_running_banner();

?>
