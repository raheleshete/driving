<?php

class driving_school_testimonials {

    public $style, $col_no;

    public function __construct() {
        add_shortcode('driving_school_testimonials', array($this, 'driving_school_testimonials_func'));
        add_shortcode('driving_school_testimonials_items', array($this, 'driving_school_testimonials_items_func'));
    }

    function driving_school_testimonials_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'slider_type'=>1,
            'col_no' => '',
            'extra_class' => '',
                        ), $atts));

        $changed_atts = shortcode_atts( array(
            'mobile_first' => 'false',
            'slides_to_show' => '1',
            'slides_to_scroll' => '1',
            'pause_on_hover' => 'false',
            'autoplay' => 'true',
            'autoplay_speed' => '6000',
            'dots' => 'true',
            'arrows' => 'true',
            'infinite' => 'true',
            'adaptiveHeight' => 'false',
        ), $atts );

        wp_localize_script( 'dricub-driving-school-custom', 'ajax_tesSlider', $changed_atts);

        $this->style = $slider_type;
        $this->col_no = $col_no;
		$content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ob_start();
        if($slider_type==1):   
            $output = '<div class="tt-testimonials-carousel slick-arrow-01 white-dots '.$extra_class.'">';
            $output .= do_shortcode($content);
            $output .= '</div>';
        else:
            $output = '<div class="testimonials-listing">';
            $output .= do_shortcode($content);
            $output .= '</div>';


        endif;

        $this->style = 0;
        $this->col_no = 0;
        $output .= ob_get_clean();
        return $output;
    }

    function driving_school_testimonials_items_func($atts, $content = null) {
        extract(shortcode_atts(array(
            //'title' => '',
            'rev_name' => '',
            'ratting' => '4',
            'image' => '',
            'call_action' => '',
        ), $atts));

        $attachement_url = wp_get_attachment_image((int) $image, 'full');

        $href = vc_build_link($call_action);
        $url = 'javascript:void(0)';
        $target = '';
        if ($href['url']) 
            $url = $href['url'];
        
        if (!(empty($href['target'])))
            $target = 'target="'.$href['target'].'"';

        $rating_content = '';
        for ($i=0; $i < $ratting; $i++) {             
            $rating_content .= '<i class="icon-star-black-fivepointed-shape"></i>';
        }
        for ($i=$i; $i < 5; $i++) {             
            $rating_content .= '<i class="icon-star-black-fivepointed-shape white"></i>';
        }
        
        $style_class='';
        $box_indent ='';
        $output ='';
        if( $this->style==1){
            $style_class ='testimonials-box';
        }else{
               $style_class ='testimonials-box-02';
        }


        $output .= '<div class="item">';
        if($this->style==1){
        $output .= '<div class="testimonials-box-indent">';
        }
        if($this->style==1){
            $output .= ' <div class="tt-icon"><div class="tt-bg"></div></div>';     
        }
        $output .= '<a href="'.$url.'" '.$target.' class="'.$style_class.'">';
        if($this->style==2){
            $output .= ' <div class="tt-icon"><div class="tt-bg"></div></div>';  
        }
        $output .= '    <div class="rating rating-' . $ratting . '"> 
                                    '.$rating_content.'
                                </div>
                                <p>' . wp_kses_post($content) . '</p>
                                <p>
                                    <span class="author">– ' . wp_kses_post($rev_name) . ' </span>
                                </p>';
        $output .= '     </a>';
        if($this->style==1){
        $output .= '     </div>';
        }
        $output .= ' </div>';



        return $output;
    }

}

new driving_school_testimonials();


