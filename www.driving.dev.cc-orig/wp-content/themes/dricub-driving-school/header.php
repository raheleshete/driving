<?php 
$show_breadcrumb = get_post_meta(get_the_ID(), 'framework_show_breadcrumb', true);
$show_title = get_post_meta(get_the_ID(), 'framework_show_page_title', true);
$dricub_driving_school_options = dricub_driving_school_options();
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
      if( function_exists( 'has_site_icon' ) && has_site_icon()){ // since 4.3.0
          wp_site_icon();
      }else{ 
        if (isset($dricub_driving_school_options['dricub_driving_school_site-favicon']['url']) && !empty($dricub_driving_school_options['dricub_driving_school_site-favicon']['url'])) { ?>
        <link rel="shortcut icon" href="<?php echo esc_url($dricub_driving_school_options['dricub_driving_school_site-favicon']['url']) ?>" type="image/x-icon"/>
        <?php
        }
      }
    ?>
<!-- Template Style -->
<?php wp_head(); ?>
</head>
<body   <?php body_class(); ?>>
<?php do_action('dricub_driving_school_header_loader'); ?>

<!-- Header -->
<header id="tt-header">
  <?php if ( isset($dricub_driving_school_options['dricub_driving_school_page_header_enable']) &&   $dricub_driving_school_options['dricub_driving_school_page_header_enable'] == 1) {?>
  <div class="tt-header-wrapper-top">
    <div class="container">
      <div class="tt-header-top">
      <?php if (isset($dricub_driving_school_options['dricub_driving_school_page_header_mobile_location']) && $dricub_driving_school_options['dricub_driving_school_page_header_mobile_location'] != '') { ?>
      <address class="tt-box-location">
        <?php if (isset($dricub_driving_school_options['dricub_driving_school_page_header_mobile_location_url']) && $dricub_driving_school_options['dricub_driving_school_page_header_mobile_location_url'] != ''){ ?>
        <a href="<?php echo esc_url($dricub_driving_school_options['dricub_driving_school_page_header_mobile_location_url']); ?>">
        <?php } ?>
        <i class="icon-placeholder-for-map"></i> 
        <?php  echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_page_header_mobile_location']);?>
        <?php if (isset($dricub_driving_school_options['dricub_driving_school_page_header_mobile_location_url']) && $dricub_driving_school_options['dricub_driving_school_page_header_mobile_location_url'] != '') {?>
        </a>
        <?php } ?>
        </address>
        <?php } ?>
          <?php if (isset($dricub_driving_school_options['dricub_driving_school_page_header_mobile_phone']) && $dricub_driving_school_options['dricub_driving_school_page_header_mobile_phone'] != '') { ?>
            <address class="tt-box-phone">
          <a href="tel: <?php  echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_page_header_mobile_phone']);?>">
          <i class="icon-phone-call"></i>
          <?php  echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_page_header_mobile_phone']);?>
          </a>
          </address>
          <?php } ?>
          <?php if (isset($dricub_driving_school_options['dricub_driving_school_page_header_mobile_email']) && $dricub_driving_school_options['dricub_driving_school_page_header_mobile_email'] != '') { ?>
            <address class="tt-box-email">
          <a href="mailto:<?php echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_page_header_mobile_email']); ?>">
              <i class="icon-interface"></i>
              <?php echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_page_header_mobile_email']); ?>
          </a>
          </address>
          <?php } ?>

        <?php if (isset($dricub_driving_school_options['dricub_driving_school_page_header_mobile_hour']) && $dricub_driving_school_options['dricub_driving_school_page_header_mobile_hour'] != '') { ?>
          <address class="tt-box-time">
          <i class="icon-clock"></i>
          <?php echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_page_header_mobile_hour']); ?>
          </address>    
         <?php } ?>
        <ul class="tt-social-icon">
          <?php if (isset($dricub_driving_school_options['dricub_driving_school_header_facebook']) && !empty($dricub_driving_school_options['dricub_driving_school_header_facebook'])) { ?>
            <li> <a href="<?php echo esc_url($dricub_driving_school_options['dricub_driving_school_header_facebook']); ?>"><i class="icon-facebook-logo"></i></a> </li>
            <?php } ?>
          <?php if (isset($dricub_driving_school_options['dricub_driving_school_header_twitter']) && !empty($dricub_driving_school_options['dricub_driving_school_header_twitter'])) { ?>
            <li> <a href="<?php echo esc_url($dricub_driving_school_options['dricub_driving_school_header_twitter']); ?>"><i class="icon-twitter-logo-silhouette"></i></a> </li>
            <?php } ?>
          <?php if (isset($dricub_driving_school_options['dricub_driving_school_header_google_plus']) && !empty($dricub_driving_school_options['dricub_driving_school_header_google_plus'])) { ?>
            <li> <a href="<?php echo esc_url($dricub_driving_school_options['dricub_driving_school_header_google_plus']); ?>"><i class="icon-social-media"></i></a> </li>
            <?php } ?>
          <?php if (isset($dricub_driving_school_options['dricub_driving_school_header_instagram']) && !empty($dricub_driving_school_options['dricub_driving_school_header_instagram'])) { ?>
            <li> <a href="<?php echo esc_url($dricub_driving_school_options['dricub_driving_school_header_instagram']); ?>"><i class="icon-instagram-social"></i></a> </li>
            <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <!-- end of top header-->
  
  <?php } ?>
  <?php if(
    (isset($dricub_driving_school_options['dricub_driving_school_page_header_oder_button']) 
        && $dricub_driving_school_options['dricub_driving_school_page_header_oder_button'] == 1) ||
    (isset($dricub_driving_school_options['dricub_driving_school_page_header_enable']) &&
        $dricub_driving_school_options['dricub_driving_school_page_header_enable'] == 1)
  ) { ?>
  <div class="tt-header-top-toggle">
    <?php if ( isset($dricub_driving_school_options['dricub_driving_school_page_header_enable']) &&
        $dricub_driving_school_options['dricub_driving_school_page_header_enable'] == 1) {?>
    <a href="<?php echo esc_js('javascript:void(0)')?>" class="btn-toggle"> <i class="icon-down-arrow"></i> </a>
    <?php }?>
    <?php	if(isset($dricub_driving_school_options['dricub_driving_school_page_header_oder_button']) 
      && $dricub_driving_school_options['dricub_driving_school_page_header_oder_button'] == 1){
      ?>
    <?php	if(isset($dricub_driving_school_options['dricub_driving_school_page_header_oder_behaviour']) 
          && $dricub_driving_school_options['dricub_driving_school_page_header_oder_behaviour'] == 1){
          ?>
    <a href="<?php echo esc_url("#");?>" class="btn-extra" data-toggle="modal" data-target="#ModalOrderPackage01">
    <?php } else { ?>
    <?php if (isset($dricub_driving_school_options['dricub_driving_school_header_order_button_url']) && !empty($dricub_driving_school_options['dricub_driving_school_header_order_button_url'])) { ?>
      <a href="<?php echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_header_order_button_url']); ?>" class="btn-extra" >
      <?php } ?>
    <?php } ?>
    <?php if (isset($dricub_driving_school_options['dricub_driving_school_header_order_button_text']) && !empty($dricub_driving_school_options['dricub_driving_school_header_order_button_text'])) { ?>
      <?php echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_header_order_button_text']); 
          } ?> </a>
    <?php } ?>
  </div>
  <?php } ?>
  <div class="tt-header-wrapper-bottom">
    <div class="container">
      <div class="row tt-header-bottom"> 
        <!-- toggle menu -->
        <div class="tt-toggle-menu icon-menu-three-horizontal-lines-symbol"></div>
        <!-- / -->
        <?php if (isset($dricub_driving_school_options['dricub_driving_school_logo']['url']) && !empty($dricub_driving_school_options['dricub_driving_school_logo']['url'])) { ?>
          <div class="col-md-5 col-lg-4 col-logo"> <a  class="tt-logo" href="<?php echo get_home_url(); ?>"> <img class="logo-icon" src="<?php echo esc_url($dricub_driving_school_options['dricub_driving_school_logo']['url']); ?>" alt="<?php echo esc_attr__( 'Logo Image', 'dricub-driving-school' ); ?>"> </a> </div>
          <?php }?>
        <?php if (isset($dricub_driving_school_options['dricub_driving_school_logo']['url']) && !empty($dricub_driving_school_options['dricub_driving_school_logo']['url'])) { ?>
          <div class="col-md-7 col-lg-8 col-menu">
          <?php }else{ ?>
          <div class="col-md-12 col-lg-12 col-menu">
          <?php } ?>
        <nav class="tt-menu">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu(
              array(
                'theme_location' => 'primary',
                'menu_class' => 'menu navbar-nav',
                'container' => 'ul',
                'walker' => new Walker_Dricub_Driving_School_Menu() //use our custom walker
              )
          );
        }else{ 
          wp_nav_menu(
            array(
              'menu_class' => 'menu navbar-nav',
              'container' => 'ul',
              'walker' => new Walker_Dricub_Driving_School_Menu() //use our custom walker
            )
          );
        }
        ?>
        </nav>
      </div>
    </div>
  </div>
  </div>
  
  <!-- tt-menu-stuck -->
  <div class="tt-menu-stuck-row">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-10">
          <div class="tt-menu-stuck"></div>
        </div>
        <?php if(isset($dricub_driving_school_options['dricub_driving_school_page_header_oder_button']) 
        && $dricub_driving_school_options['dricub_driving_school_page_header_oder_button'] == 1){
        ?>
        <div class="col-xs-2">
          <div class="tt-btn-box">
            <?php if(isset($dricub_driving_school_options['dricub_driving_school_page_header_oder_behaviour']) 
            && $dricub_driving_school_options['dricub_driving_school_page_header_oder_behaviour'] == 1){
            ?>
            <a href="<?php echo esc_url("#");?>" class="btn" data-toggle="modal" data-target="#ModalOrderPackage01">
            <?php } else { ?>
            <?php if (isset($dricub_driving_school_options['dricub_driving_school_header_order_button_url']) && !empty($dricub_driving_school_options['dricub_driving_school_header_order_button_url'])) { ?>
              <a href="<?php echo esc_url($dricub_driving_school_options['dricub_driving_school_header_order_button_url']); ?>" class="btn">
              <?php } ?>
            <?php } ?>
            <?php if (isset($dricub_driving_school_options['dricub_driving_school_header_order_button_text']) && !empty($dricub_driving_school_options['dricub_driving_school_header_order_button_text'])) { ?>
              <?php echo wp_kses_post($dricub_driving_school_options['dricub_driving_school_header_order_button_text']); 
                } ?> </a> </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- /tt-menu-stuck --> 
</header>
<!-- /Header -->
<?php
	if (!is_front_page() && ( $show_breadcrumb != 'off') ) : ?>
<?php do_action('dricub_driving_school_breadcrumb'); ?>
<?php endif;?>
<?php if($show_title != 'off') : ?>
<?php if  ( !is_home() && ! is_front_page()) : ?>
<header class="entry-header">
  <div class="container">
    <h1 class="tt-title-lg text-center title-sub-page yy"><?php single_post_title(); ?> </h1>
  </div>
</header>
<?php endif;?>
<?php endif;?>
