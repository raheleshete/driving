<?php

class driving_school_twitter_posts {

    public function __construct() {
        add_shortcode('twitter_posts', array($this, 'driving_school_twitter_posts_func'));
    }

    function driving_school_twitter_posts_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'author'   => 'https://twitter.com/envato',
            'limit'   => '1'
        ), $atts));

        $output = '<a class="twitter-timeline" href="'.$author.'" data-chrome="nofooter noborders noheader noscrollbar" data-tweet-limit="'.$limit.'">Tweets by @envato</a>
                    <script>
                        ! function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0],
                                p = /^http:/.test(d.location) ? \'http\' : \'https\';
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = p + "://platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, "script", "twitter-wjs");
                    </script>';
                
        return $output;
    }

}

new driving_school_twitter_posts();
