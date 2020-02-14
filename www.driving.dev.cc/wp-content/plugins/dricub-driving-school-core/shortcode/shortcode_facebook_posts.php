<?php

class driving_school_facebook_posts {

    public function __construct() {
        add_shortcode('facebook_posts', array($this, 'driving_school_facebook_posts_func'));
    }

    function driving_school_facebook_posts_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'fb_page_link'   => 'https://www.facebook.com/envato/'
        ), $atts));

        $output = '<iframe class="iframe-facebook" src="https://www.facebook.com/plugins/page.php?href='.$fb_page_link.'%2F&tabs=timeline&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=653691078039193"></iframe>';
                
        return $output;
    }

}

new driving_school_facebook_posts();
