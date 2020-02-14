<?php

class driving_school_instagram_feed {

    public function __construct() {
        add_shortcode('instagram_feed', array($this, 'driving_school_instagram_feed_func'));
    }

    function driving_school_instagram_feed_func($atts, $content = null) {

        extract(shortcode_atts(array(
        'userid' => '',
        'clientid'  => '',
        'limit'  => '',
        'accesstoken'    => '',
        ), $atts));

        ob_start();
        wp_enqueue_script('instafeed', get_template_directory_uri().'/js/vendor/instafeed.min.js', array('jquery'), '201202124', true);



        ?>


        <div class="instagram-grid">
            <div id="instafeed-gallery" class="instafeed"></div>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function($j) {
                "use strict";

                if ($j('#instafeed-gallery').length > 0) {
                    // Instagram Feed

                    var instaFeedLoad = function(){
                        var galleryFeed = new Instafeed({
                            get: 'user',
                            userId: '<?php echo esc_html($userid);?>',
                            clientId: '<?php echo esc_html($clientid);?>',
                            limit: <?php echo esc_html($limit);?>,
                            sortBy: 'most-liked',
                            resolution: "thumbnail",
                            accessToken: '<?php echo esc_html($accesstoken);?>',
                            template: '<a href="{{link}}" target="_blank" class="instagram-image" ><img src="{{image}}" /></a>',
                            useHttp: "true",
                            target: "instafeed-gallery",
                            // after: function () {    
                            //     $j(".instagram-image").each(function (i) {   
                            //     console.log(i);     
                            //         if(i >= <?php echo esc_html($limit);?>) {            
                            //             $j(this).remove();        
                            //         }    
                            //     });
                            // },
                        });
                        galleryFeed.run();
                    };
                    $j(window).on('scroll keydown touchcancel', function(e){
                        if((e.type == 'keydown' && e.keyCode != 35) || $j('#instafeed-gallery').hasClass('instafeed-loaded')){
                            return true;
                        }
                        var instafeedtop = $j('#instafeed-gallery').offset().top;
                        var wtop = $j(this).scrollTop();
                        var wh = $j(this).height();
                        if(wtop + wh >= instafeedtop){
                            $j('#instafeed-gallery').addClass('instafeed-loaded');
                            instaFeedLoad();
                        }
                    });
                }
            });
        </script>

        <?php        
        return ob_get_clean();
    }
}


new driving_school_instagram_feed();
