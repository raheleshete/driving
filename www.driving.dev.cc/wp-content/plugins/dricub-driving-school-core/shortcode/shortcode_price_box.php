<?php
class driving_school_price
{
    public $col_no;
    public $contact_form_ids = array();
    public $contact_form_title = array();
    public $randdom_number;
    public $randdom_numbers;
    public $action;

    public function __construct()
    {
        add_shortcode('driving_school_price', array($this, 'driving_price_func'));
        add_shortcode('driving_school_price_item', array($this, 'driving_school_price_item_func'));
    }

    public function driving_price_func($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'extra_class' => 0,
            'col_no' => '1',
        ), $atts));
        $this->col_no = $col_no;
        $content = str_replace('<p>', "", $content);
        $content = str_replace('</p>', "", $content);
        ob_start();
        ?>
        <div class="tt-promo-table-carusel slick-arrow-01">
            <?php echo do_shortcode($content); ?>
        </div>
        <?php
add_action('price_box_hook', array($this, 'price_box_hook_func'));
        $output = ob_get_clean();
        $this->col_no = 0;
        return $output;
    }

    public function driving_school_price_item_func($atts, $content = null)
    {
        extract(shortcode_atts(array(
            'title' => '',
            'color'=>'',
            'sub_title' => '',
            'planning_type_title' => '',
            'price' => '',
            'sub_price' => '',
            'featured' => false,
            'target_plan' => 'modal',
            'call_action' => '',
            'call_action_main' => '',
            'btn_title' => '',
            'cf7scode' => '',
            'modal_title' => '',
            'icon' => '',
        ), $atts));
        $this->modaltarget[] = $cf7scode;
        $column_no = $this->col_no;
        $style="";
        
        if(isset($color)&& $color!='')
             $style = 'style="background:'.$color . '"';
        ob_start();
        ?>
        <div class="item">
            <div class="tt-promo-table<?php echo $featured ? ' active' : '' ?>" >
                <div class="time"><?php if($icon == ""){ ?>
                    <i class="icon-clock"></i>
                <?php }else{ ?>
                    <i class="<?php echo  apply_filters('replace_icon_html',$atts) ;?>"></i>
               <?php }?><?php echo wp_kses_post($planning_type_title); ?></div>
                <h6 <?php echo  $style;?>>
                    <strong><?php echo wp_kses_post($title); ?></strong>
                    <?php echo wp_kses_post($sub_title); ?>
                </h6>
                <?php
                    $content = str_replace('<p>', "", $content);
                    $content = str_replace('</p>', "", $content);
                    echo ($content);
                ?>

                <div class="price">
                    <span><?php echo wp_kses_post($price); ?></span>
                    <span><?php echo wp_kses_post($sub_price); ?></span>
                </div>
		    <?php
            if ($target_plan == 'modal') {
                $this->randdom_number = $this->customrandomfunction();
            ?>
                <a href="#" class="btn btn-long no-hover" data-title="<?php echo $modal_title ?>" data-cid="<?php echo $cf7scode ?>" data-animation="fadeInUp" data-animation-delay="0.5s" data-toggle="modal" data-target="#ModalOrderPackage<?php echo $this->randdom_number ?>" >
                <?php echo ($btn_title); ?>
                <?php
                $this->contact_form_ids[] = $cf7scode;
                $this->contact_form_title[] = $modal_title;
        
                $this->randdom_numbers[] = $this->randdom_number;
                ?>
                </a>
            <?php
            } else {
                $href = vc_build_link($call_action);
                if (!empty($href['url']) && ($href['url'] != '')) {?>

                    <a href="<?php echo $href['url'] ?>" <?php if (!(empty($href['target']))): ?> target="<?php echo $href['target']; ?>" <?php endif;?> class="btn btn-long no-hover" >
                        <?php echo $href['title']; ?>
                    </a>
            <?php }?>
            <?php
            }
            ?>
            </div>
        </div>
    <?php
    $content = ob_get_clean();
        return $content;
    }
    public function price_box_hook_func()
        {
        if (isset($this->randdom_numbers)&&(is_array($this->randdom_numbers))) {

            foreach ($this->randdom_numbers as $key => $value) {
                ?>
                <div class="modal  fade"  id="ModalOrderPackage<?php echo $this->randdom_numbers[$key] ?>" tabindex="-1" role="dialog" aria-label="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="icon-cancel"></span></button>
                            </div>
                            <div class="modal-body layout-01">
                                <h6 class="tt-title"><?php echo $this->contact_form_title[$key] ?></h6>
                                <?php echo do_shortcode('[contact-form-7 id="' . $this->contact_form_ids[$key] . '"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
    }

    public function customrandomfunction()
    {
        $num = mt_rand(100000, 999999);
        return $num;
    }
}

new driving_school_price();