<?php
function hex2rgba($color, $opacity = false) {
 
    $default = 'rgb(0,0,0)';
 
    //Return default if no color provided
    if(empty($color))
          return $default; 
 
    //Sanitize $color if "#" is provided 
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }
 
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }
 
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
 
        //Check if opacity is set(rgba or rgb)
        if($opacity >= 0 ){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }
 
        //Return rgb(a) color string
        return $output;
}
function dricub_driving_school_custom_primary_color() {
	 global $dricub_driving_school_options;
$mainColor= $dricub_driving_school_options['dricub_driving_school_custom_primary_color'];
ob_start();

?>
a:active,
a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
::selection {
  background: <?php echo esc_attr($mainColor); ?>;
}
::-moz-selection {
  background: <?php echo esc_attr($mainColor); ?>;
}
.color {
  color: <?php echo esc_attr($mainColor); ?>;
}
.btn-border:hover {
  border-color: <?php echo esc_attr($mainColor); ?>;
  color: <?php echo esc_attr($mainColor); ?>;
}
.list-icon li a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
/*---------------------------------------*/
/*------------- list-disc ---------------*/
/*---------------------------------------*/
ul.list-disc li a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
@keyframes loaderBlock {
  0%,
  30% {
    transform: rotate(0);
  }
  55% {
    background-color: <?php echo esc_attr($mainColor); ?>;
  }
  100% {
    transform: rotate(90deg);
  }
}
@keyframes loaderBlockInverse {
  0%,
  20% {
    transform: rotate(0);
  }
  55% {
    background-color: <?php echo esc_attr($mainColor); ?>;
  }
  100% {
    transform: rotate(-90deg);
  }
}
.loader span {
  background-color: <?php echo esc_attr($mainColor); ?>;
}
.radio:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
/*---------------------------------------*/
/*------------ form-default -------------*/
/*---------------------------------------*/
.wpcf7-form .wpcf7-form-control-wrap .wpcf7-form-control:focus,
.form-default .form-control:focus {
  border-color: <?php echo esc_attr($mainColor); ?>;
}

.form-default-02 .form-control:focus {
  border-color: <?php echo esc_attr($mainColor); ?>;
}
#tt-header .tt-header-top .tt-box-phone a:hover,
#tt-header .tt-header-top .tt-box-email a:hover,
#tt-header .tt-header-top .tt-box-time a:hover,
#tt-header .tt-header-top .tt-box-location a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
@media (max-width: 1219px) {
  #tt-header .tt-header-wrapper-top .tt-header-top .tt-box-phone a:hover,
  #tt-header .tt-header-wrapper-top .tt-header-top .tt-box-email a:hover,
  #tt-header .tt-header-wrapper-top .tt-header-top .tt-box-time a:hover,
  #tt-header .tt-header-wrapper-top .tt-header-top .tt-box-location a:hover {
    color: <?php echo esc_attr($mainColor); ?>;
  }
}
#tt-header .tt-header-top-toggle .btn-toggle:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
@media (min-width: 701px) {
  #tt-header .tt-menu > ul > li.current-menu-item a {
    color: <?php echo esc_attr($mainColor); ?>;
  }
  #tt-header .tt-menu > ul > li.is-hover > a,
  #tt-header .tt-menu > ul > li.active > a {
    color: <?php echo esc_attr($mainColor); ?>;
  }
  #tt-header .tt-menu > ul > li.is-hover > a {
    color: <?php echo esc_attr($mainColor); ?>;
  }
  #tt-header .tt-menu > ul > li.is-hover > ul a a:hover {
    color: <?php echo esc_attr($mainColor); ?>;
  }
  #tt-header .tt-menu > ul .sub-menu li a:hover {
    background: <?php echo esc_attr($mainColor); ?>;
  }
  #tt-header .tt-menu > ul .sub-menu li.active a {
    background: <?php echo esc_attr($mainColor); ?>;
  }
}
@media (max-width: 700px) {
  #tt-header .tt-menu ul li.is-hover > a,
  #tt-header .tt-menu ul li.active > a {
    color: <?php echo esc_attr($mainColor); ?>;
  }
}
#tt-header .tt-toggle-menu.active {
  color: <?php echo esc_attr($mainColor); ?>;
}
#tt-header .tt-social-icon a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
@media (max-width: 1219px) {
  #tt-header .tt-social-icon a:hover {
    color: <?php echo esc_attr($mainColor); ?>;
  }
}
#tt-footer:after {
  background: <?php echo esc_attr($mainColor); ?>;
}
#tt-footer .title-aside {
  color: <?php echo esc_attr($mainColor); ?>;
}
#tt-footer ul.menu li a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
#tt-footer .tt-social-icon a:before {
  background: <?php echo esc_attr($mainColor); ?>;
}
#tt-footer .tt-social-icon li:hover i {
  color: <?php echo esc_attr($mainColor); ?>;
}
#tt-footer .tt-baner-01 address span.tel i {
  color: <?php echo esc_attr($mainColor); ?>;
}
.breadcrumbs .breadcrumb span[typeof="v:Breadcrumb"] a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.calendar_wrap table tr td:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.calendar_wrap table tr td.today,
.calendar_wrap table tr td.today:hover,
.calendar_wrap table tr td.today.disabled,
.calendar_wrap table tr td.today.disabled:hover {
  background-color: #fde19a;
  border-color: #fdf59a #fdf59a #fbed50;
}
.calendar_wrap table tr td.today:hover,
.calendar_wrap table tr td.today:hover:hover,
.calendar_wrap table tr td.today.disabled:hover,
.calendar_wrap table tr td.today.disabled:hover:hover,
.calendar_wrap table tr td.today:active,
.calendar_wrap table tr td.today:hover:active,
.calendar_wrap table tr td.today.disabled:active,
.calendar_wrap table tr td.today.disabled:hover:active,
.calendar_wrap table tr td.today.active,
.calendar_wrap table tr td.today:hover.active,
.calendar_wrap table tr td.today.disabled.active,
.calendar_wrap table tr td.today.disabled:hover.active,
.calendar_wrap table tr td.today.disabled,
.calendar_wrap table tr td.today:hover.disabled,
.calendar_wrap table tr td.today.disabled.disabled,
.calendar_wrap table tr td.today.disabled:hover.disabled,
.calendar_wrap table tr td.today[disabled],
.calendar_wrap table tr td.today:hover[disabled],
.calendar_wrap table tr td.today.disabled[disabled],
.calendar_wrap table tr td.today.disabled:hover[disabled] {
  background-color: #fdf59a;
}
.calendar_wrap table tr td.today:active,
.calendar_wrap table tr td.today:hover:active,
.calendar_wrap table tr td.today.disabled:active,
.calendar_wrap table tr td.today.disabled:hover:active,
.calendar_wrap table tr td.today.active,
.calendar_wrap table tr td.today:hover.active,
.calendar_wrap table tr td.today.disabled.active,
.calendar_wrap table tr td.today.disabled:hover.active {
  background-color: #fbf069 \9;
}
.calendar_wrap table tr td.active,
.calendar_wrap table tr td.active:hover,
.calendar_wrap table tr td.active.disabled,
.calendar_wrap table tr td.active.disabled:hover {
  background-color: <?php echo esc_attr($mainColor); ?>;
  color: #fff;
}
.calendar_wrap table tr td.active:hover,
.calendar_wrap table tr td.active:hover:hover,
.calendar_wrap table tr td.active.disabled:hover,
.calendar_wrap table tr td.active.disabled:hover:hover,
.calendar_wrap table tr td.active:active,
.calendar_wrap table tr td.active:hover:active,
.calendar_wrap table tr td.active.disabled:active,
.calendar_wrap table tr td.active.disabled:hover:active,
.calendar_wrap table tr td.active.active,
.calendar_wrap table tr td.active:hover.active,
.calendar_wrap table tr td.active.disabled.active,
.calendar_wrap table tr td.active.disabled:hover.active,
.calendar_wrap table tr td.active.disabled,
.calendar_wrap table tr td.active:hover.disabled,
.calendar_wrap table tr td.active.disabled.disabled,
.calendar_wrap table tr td.active.disabled:hover.disabled,
.calendar_wrap table tr td.active[disabled],
.calendar_wrap table tr td.active:hover[disabled],
.calendar_wrap table tr td.active.disabled[disabled],
.calendar_wrap table tr td.active.disabled:hover[disabled] {
  background-color: <?php echo esc_attr($mainColor); ?>;
}
.calendar_wrap table tr td span:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.calendar_wrap table tr td span.active,
.calendar_wrap table tr td span.active:hover,
.calendar_wrap table tr td span.active.disabled,
.calendar_wrap table tr td span.active.disabled:hover {
  background-color: <?php echo esc_attr($mainColor); ?>;
}
.calendar_wrap table tr td span.active:hover,
.calendar_wrap table tr td span.active:hover:hover,
.calendar_wrap table tr td span.active.disabled:hover,
.calendar_wrap table tr td span.active.disabled:hover:hover,
.calendar_wrap table tr td span.active:active,
.calendar_wrap table tr td span.active:hover:active,
.calendar_wrap table tr td span.active.disabled:active,
.calendar_wrap table tr td span.active.disabled:hover:active,
.calendar_wrap table tr td span.active.active,
.calendar_wrap table tr td span.active:hover.active,
.calendar_wrap table tr td span.active.disabled.active,
.calendar_wrap table tr td span.active.disabled:hover.active,
.calendar_wrap table tr td span.active.disabled,
.calendar_wrap table tr td span.active:hover.disabled,
.calendar_wrap table tr td span.active.disabled.disabled,
.calendar_wrap table tr td span.active.disabled:hover.disabled,
.calendar_wrap table tr td span.active[disabled],
.calendar_wrap table tr td span.active:hover[disabled],
.calendar_wrap table tr td span.active.disabled[disabled],
.calendar_wrap table tr td span.active.disabled:hover[disabled] {
  background-color: <?php echo esc_attr($mainColor); ?>;
}
.calendar_wrap thead tr:first-child th:hover,
.calendar_wrap tfoot tr:first-child th:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.calendar_wrap thead th.next:hover i,
.calendar_wrap thead th.prev:hover i {
  color: <?php echo esc_attr($mainColor); ?>;
}
.back-to-top:hover {
  background-color: <?php echo esc_attr($mainColor); ?>;
}
.tt-promo-03 .tt-title span {
  color: <?php echo esc_attr($mainColor); ?>;
}
/*---------------------------------------*/
/*--- tt-promo-01 (Banner with timer) ---*/
/*---------------------------------------*/
.tt-promo-01 .col-info .description strong {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-promo-01 .col-info [class^="icon-"] {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-promo-01 .col-timer:before {
  background: <?php echo esc_attr($mainColor); ?>;
}
.tt-box-layout-icon .col-item .icon {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-box-subjects1:hover .description .h6 {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-promo-table.active {
  border: 2px solid <?php echo esc_attr($mainColor); ?>;
}
.tt-promo-table:hover .btn {
  background: <?php echo esc_attr($mainColor); ?>;
}
.tt-promo-table.active h6 {
  background: <?php echo esc_attr($mainColor); ?>;
}
.tt-promo-table.active:before {
  border-color: <?php echo esc_attr($mainColor); ?>;
}
.tt-box-news .description h6 a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-box-news .description .info .comments:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-box-news .description .info .link-transition {
  color: <?php echo esc_attr($mainColor); ?>;
}
.testimonials-box-02 .rating {
  color: #ffc219;
}
.tt-accordion-box .item .tt-title:hover, .vc_toggle_title h4:hover{
  color: <?php echo esc_attr($mainColor); ?>;
}
.pagination .nav-links .page-numbers:hover,
.pagination li:hover a {
  color: <?php echo esc_attr($mainColor); ?>;
  border: 1px solid <?php echo esc_attr($mainColor); ?>;
}
.pagination .nav-links .page-numbers.current,
.pagination li.active a {
  border: 1px solid <?php echo esc_attr($mainColor); ?>;
  background: <?php echo esc_attr($mainColor); ?>;
}
.list-addess .item .icon {
    color: <?php echo esc_attr($mainColor); ?>;
}
.tt-total-info-row .tt-row .tt-total-info .tt-icon {
  color: <?php echo esc_attr($mainColor); ?>;
}
@media only screen and (max-width: 1025px) {
  .tt-tabs .tt-tabs__body > div:hover > span {
    color: <?php echo esc_attr($mainColor); ?>;
  }
  .tt-tabs .tt-tabs__body > div.active > span {
    background: <?php echo esc_attr($mainColor); ?>;
  }
}
@media only screen and (min-width: 1025px) {
  .tt-tabs .tt-tabs__head > ul > li:hover span {
    color: <?php echo esc_attr($mainColor); ?>;
  }
  .tt-tabs .tt-tabs__head > ul > li.active > span {
    background: <?php echo esc_attr($mainColor); ?>;
  }
  .tt-tabs .tt-tabs__head > ul > li.active > span:before {
    background: <?php echo esc_attr($mainColor); ?>;
  }
}
.tt-block-aside ul li > a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tagcloud li a:hover,.tt-post.single .post-categories li a:hover {
  border-color: <?php echo esc_attr($mainColor); ?>;
  color: <?php echo esc_attr($mainColor); ?>;
}
.tagcloud li.active a, .tt-post.single .post-categories li.active a{
  border-color: <?php echo esc_attr($mainColor); ?>;
  background: <?php echo esc_attr($mainColor); ?>;
}
.category-list li:hover a {
  color: <?php echo esc_attr($mainColor); ?>;
}
.widget_tag_cloud .tagcloud a:hover {
  border-color: <?php echo esc_attr($mainColor); ?>;
  color: <?php echo esc_attr($mainColor); ?>;
}
.tags-list li.active a {
  border-color: <?php echo esc_attr($mainColor); ?>;
  background: <?php echo esc_attr($mainColor); ?>;
}
.tt-post-preview .item .post-title a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-post .post-image .post-img-link:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-post .post-image .post-img-link:hover i {
  background-color: <?php echo esc_attr($mainColor); ?>;
}
.tt-post .post-title a:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-post .post-content blockquote:before {
  background: <?php echo esc_attr($mainColor); ?>;
}
.tt-post .post-content blockquote:after {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-post .post-read-more .post-link {
  color: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-01 .slick-prev:hover:before,
.slick-arrow-01 .slick-next:hover:before {
  color: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-01 .slick-dots li:hover button,
.slick-arrow-01 .slick-dots li.slick-active button {
  background: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-01.white-dots.slick-arrow-01 .slick-dots li.slick-active button {
  background: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-02 .slick-prev:hover:before,
.slick-arrow-02 .slick-next:hover:before {
  color: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-02 .slick-dots li:hover button,
.slick-arrow-02 .slick-dots li.slick-active button {
  background: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-02.white-dots.slick-arrow-01 .slick-dots li.slick-active button {
  background: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-03 .slick-prev:hover:before,
.slick-arrow-03 .slick-next:hover:before {
  color: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-03 .slick-dots li:hover button,
.slick-arrow-03 .slick-dots li.slick-active button {
  background: <?php echo esc_attr($mainColor); ?>;
}
.slick-arrow-03.white-dots.slick-arrow-01 .slick-dots li.slick-active button {
  background: <?php echo esc_attr($mainColor); ?>;
}
.modal .modal-header .close:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.modal .modal-content {
  border-top: 6px solid <?php echo esc_attr($mainColor); ?>;
}
.testimonials-box {
  border: 1px solid <?php echo esc_attr($mainColor); ?>;
}
.testimonials-box .rating {
  color: <?php echo esc_attr($mainColor); ?>;
}
.testimonials-box-indent .tt-icon .tt-bg {
  background: <?php echo esc_attr($mainColor); ?>;
}
.testimonials-box:hover .author {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-box-subjects .img + .tt-nomber .tt-fon {
  background: <?php echo esc_attr($mainColor); ?>;
}
.tt-box-subjects:hover .btn {
  background: <?php echo esc_attr($mainColor); ?>;
}
.btn:hover:not(.no-hover) {
  background: <?php echo esc_attr($mainColor); ?>;
}
.mainSlider .slick-arrow:hover {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-promo-01 {
  background: <?php echo esc_attr($mainColor); ?>;
}
.box-parallax-counter .item-counter .description .value {
  color: <?php echo esc_attr($mainColor); ?>;
}
.btn.inverse {
  background: <?php echo esc_attr($mainColor); ?>;
}
.social-services .title-icon {
  color: <?php echo esc_attr($mainColor); ?>;
}
.tt-accordion-box .item.active .tt-title, .vc_toggle_active h4 {
  color: <?php echo esc_attr($mainColor); ?> !important;
}
.testimonials-box-02 .tt-icon .tt-bg {
  background: <?php echo esc_attr($mainColor); ?>;
}
.testimonials-box-02 {
  border: 1px solid <?php echo esc_attr($mainColor); ?>;
}
.testimonials-box-02 .rating {
  color: <?php echo esc_attr($mainColor); ?>;
}
html input[type="button"]:hover:not(.no-hover), input[type="reset"]:hover:not(.no-hover), input[type="submit"]:hover:not(.no-hover) {
  background: <?php echo esc_attr($mainColor); ?>;
}
#tt-header .tt-header-top-toggle .btn-extra {
  background: <?php echo esc_attr($mainColor); ?>;
}

.back-to-top:hover { background-color: <?php echo esc_attr($mainColor); ?>; -webkit-animation: ripple 0.5s linear 1; animation: ripple 0.5s linear 1; }

@keyframes ripple {
  0% {
    -webkit-box-shadow: 0 0 0 0 <?php echo hex2rgba($mainColor,'0.3')?>, 0 0 0 10px <?php echo hex2rgba($mainColor,'0.3')?>;
    box-shadow: 0 0 0 0 <?php echo hex2rgba($mainColor,'0.3')?>, 0 0 0 10px <?php echo hex2rgba($mainColor,'0.3')?>;
  }
  100% {
    -webkit-box-shadow: 0 0 0 10px <?php echo hex2rgba($mainColor)?>, 0 0 0 20px <?php echo hex2rgba($mainColor)?>;
    box-shadow: 0 0 0 10px <?php echo hex2rgba($mainColor)?>, 0 0 0 20px <?php echo hex2rgba($mainColor)?>;
  }
}

}

<?php
$dricub_driving_school_custom_css = ob_get_clean();
    return $dricub_driving_school_custom_css;
}