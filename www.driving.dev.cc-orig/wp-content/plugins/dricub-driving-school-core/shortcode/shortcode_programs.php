<?php
class driving_schools_programs {

    public function __construct() {
        add_shortcode('driving_schools_programs', array($this, 'driving_schools_programs_func'));
    }

    public function driving_schools_programs_func($atts, $content = null) {

        extract(shortcode_atts(array(
            'condition'=> '1',
            'extra_class' => '',
            'column' => 4,
            'per_page' => -1,
            'call_action' => '',
            'order' => 'DESC',
            'order_by' => '',
            'ids' => '',
                        ), $atts,'driving_schools_programs'));



   

        $changed_atts = shortcode_atts( array(
            'mobile_first' => 'false',
            'slides_to_show' => '3',
            'slides_to_scroll' => '2',
            'pause_on_hover' => 'false',
            'autoplay' => 'false',
            'autoplay_speed' => '3200',
            'dots' => 'true',
            'arrows' => 'true',
        ), $atts );

        wp_localize_script( 'dricub-driving-school-custom', 'ajax_ttslider', $changed_atts);

        if($condition=='2'){
        $args = array(
            'post_type' => 'our-programs',
            'posts_per_page' => 10,
            'post__in' =>  explode(',',$ids),
            'order' => $order,
            'orderby' => $order_by,

        );
       
    }else{
        $args = array(
            'posts_per_page' => $per_page,
            'post_type' => 'our-programs',
            'order' => $order,
            'orderby' => $order_by,
            'no_found_rows' => true,
        );
    }

        $column_no = $column;
        switch ((int) $column_no) {
            case 2:
                $colclass = 'col-sm-6 col-xs-12';
                break;
            case 4:
                $colclass = 'col-md-3 col-sm-4 col-xs-12';
                break;
            default:
                $colclass = 'col-md-4 col-sm-4 col-xs-12';
                break;
        }

        $query = new WP_Query($args);
  
        ob_start();
        ?>
        <div class="tt-carusel tt-carusel-top slick-arrow-02 <?php if( $extra_class != '' ){ echo esc_attr( $extra_class ); } ?>">
            <?php
            //echo esc_html__($colclass);
            $i = 0;
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $post_id = get_the_ID();
                    $image_url = wp_get_attachment_url(get_post_thumbnail_id());
                    $href = vc_build_link($call_action);
                    ?>
                    <div class="item">
                        <!--<a href="<?php //echo $url; ?>" <?php // if (!(empty($href['target']))): ?> target="<?php // echo $href['target']; ?>" <?php // endif; ?> class="tt-box-subjects">-->
                        <?php if($href['url'] == ''){?>   
                        <a href="<?php the_permalink(); ?>" class="tt-box-subjects">
                        <?php }else{ ?>
                        <a href="<?php echo esc_url($href['url']) ?>" class="tt-box-subjects">
                        <?php } ?>
                            <div class="img">
                                <?php the_post_thumbnail('dricub-dricub-driving-schools-programs-thumbnail'); ?>
                            </div>
                            <div class="tt-nomber">
                                <span class="tt-fon"><span></span></span>
                                <div class="tt-text"><?php echo ++$i; ?></div>                              
                            </div>
                            <div class="description">
                                <h6><?php the_title(); ?></h6>
                                <span class="btn"><?php  echo esc_attr($href['title']); ?></span>
                            </div>
                        </a>
                    </div>

                    <?php
                endwhile;
            endif;
            ?>
        </div>
        <?php
        $output = ob_get_clean();
        return $output;
    }

}

new driving_schools_programs();