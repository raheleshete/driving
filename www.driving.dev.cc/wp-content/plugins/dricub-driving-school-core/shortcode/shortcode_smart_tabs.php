<?php
class driving_school_smart_tabs {

    public $tab_title, $tab_title_small, $tab_content, $tab_icon;
    public $counter;

    public function __construct() {
        add_shortcode('driving_school_smart_tabs', array($this, 'driving_school_smart_tabs_func'));
        add_shortcode('driving_school_smart_tabs_item', array($this, 'driving_school_smart_tabs_item_func'));
        $this->counter = 0;
        $this->tab_title = [];
        $this->tab_title_small = [];
        $this->tab_content = [];
        $this->tab_icon = [];
    }

    function driving_school_smart_tabs_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'active_tab_no' => '1',
            'extra_class' => '',
        ), $atts));        
		 $content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ob_start();
        do_shortcode($content);
        $active = '';

        $output = '<div class="tt-tabs '.esc_attr($extra_class).'">
                            <div class="tt-tabs__head">
                                <ul>';

        for ($i=1; $i <= $this->counter; $i++) { 

            $active = $active_tab_no == $i ? ' data-active="true"' : '';

            $output .= '            <li'.$active.'><span>
                                        <i class="'. wp_kses_post($this->tab_icon[$i]).'"></i>
                                        <span>'. $this->tab_title[$i] .'</span>
                                    </span></li>';
        }

        $output .= '            </ul>
                                <div class="tt-tabs__border"></div>
                            </div>
                            <div class="tt-tabs__body">';


        for ($i=1; $i <= $this->counter; $i++) {  

        $output .= '            <div>
                                   <span class="tt-tabs__title">'. $this->tab_title_small[$i] .' <i class="'. wp_kses_post($this->tab_icon[$i]).'"></i></span>
                                   <div class="tt-tabs__content">
                                        '. $this->tab_content[$i] .'
                                        <div class="clear"></div>
                                   </div>
                                </div>';
        }

        $output .= '        </div>
                        </div>';

        $output .= ob_get_clean();
        return $output;
    }

    function driving_school_smart_tabs_item_func($atts, $content = null) {
        extract(shortcode_atts(array(
            'tab_title' => '',
            'tab_title_small' => '',
            'tab_icon' => 'icon-motorcyclist',
        ), $atts));

       $icon = apply_filters('replace_icon_html',$atts);
 
        if($icon == ""){
            $icon = $tab_icon;
        }
        ++$this->counter;

        $this->tab_icon[$this->counter] = $icon;
        $this->tab_title[$this->counter] = $tab_title;
        $this->tab_title_small[$this->counter] = $tab_title_small;
        $this->tab_content[$this->counter] = $content;

    }

}

new driving_school_smart_tabs();