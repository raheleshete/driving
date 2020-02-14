<?php
/*
  Plugin Name: Dricub Driving School Core
  Plugin URI: http://smartdatasoft.com/
  Description: Helping for the SmartDataSoft  theme.
  Author: SmartDataSoft
  Version: 1.6
  Author URI: http://smartdatasoft.com/
  Text Domain: dricub-driving-school-core
 */
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function dricub_driving_school_load_textdomain() {
    load_plugin_textdomain('dricub-driving-school-core', false, basename(dirname(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'dricub_driving_school_load_textdomain');

/**
 *
 */

if (!defined('DRICUB_DRIVING_SCHOOL_THEME_URI')) {
    define('DRICUB_DRIVING_SCHOOL_THEME_URI', get_template_directory_uri());
}
if (!defined('ULTIMA_NAME'))
    define('ULTIMA_NAME', 'driving_school');

//add_action('wp_enqueue_scripts', 'driving_school_core_enqueue', 1001);
//remove_filter('the_content', 'wpautop');

function dricub_driving_school_core_enqueue() {
    wp_enqueue_style('dricub-driving-school-forms',plugin_dir_url( __FILE__ ) . '/js/forms.js',1001);
   
}

add_action('admin_enqueue_scripts', 'dricub_driving_school_core_admin_enqueue');

function dricub_driving_school_core_admin_enqueue($hook) {
    wp_enqueue_style('iconfont-style', get_template_directory_uri() . '/fonts/style.css', '', null);
//laod custom post type js
    if ($hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php')
        return;
     wp_enqueue_script( 'custom-js',  plugin_dir_url( __FILE__ ) . '/js/admin.js' );
}

/* ============================================================
 * Visual Composer shorrtcode config
 * ============================================================ */

define('DRICUB_PLUGIN_DIR', dirname(__FILE__) . '/');

$classesDir = array(
    DRICUB_PLUGIN_DIR . 'shortcode/',
    DRICUB_PLUGIN_DIR . 'vc_element/'
);

function __autoloadShortCode() {
    global $classesDir;
    foreach ($classesDir as $directory) {

        foreach (glob($directory . '*.php') as $filename) {
            if (file_exists($filename)) {
                include_once ($filename);
            }
        }
    }
}

function __autoloadVcMap() {
    __autoloadShortCode();
}

add_action('vc_before_init', '__autoloadVcMap');


$classesPostTypeDir = DRICUB_PLUGIN_DIR . 'post_type/';

function __autoloadPostType($directory) {

    foreach (glob($directory . '*.php') as $filename) {
        if (file_exists($filename)) {
            include_once ($filename);
        }
    }
}

__autoloadPostType($classesPostTypeDir);


/*
 * widgets auto load
 */


$classesWidgetsDir = DRICUB_PLUGIN_DIR . 'widgets/';

function __autoloadWidgets($directory) {
    foreach (glob($directory . '*.php') as $filename) {
        if (file_exists($filename)) {
            include_once ($filename);
        }
    }
}

__autoloadWidgets($classesWidgetsDir);


add_action('dricub_driving_school_after_footer', 'dricub_driving_school_after_footer_function');

function dricub_driving_school_after_footer_function() {
    
    $dricub_driving_school_option = dricub_driving_school_options();
    $gmap_latitude = (isset($dricub_driving_school_option['dricub_driving_school_gmap_latitude']) && !empty($dricub_driving_school_option['dricub_driving_school_gmap_latitude'])) ? $dricub_driving_school_option['dricub_driving_school_gmap_latitude'] : '';
    $gmap_longitude = (isset($dricub_driving_school_option['dricub_driving_school_gmap_longitude']) && !empty($dricub_driving_school_option['dricub_driving_school_gmap_longitude'])) ? $dricub_driving_school_option['dricub_driving_school_gmap_longitude'] : '';

    $gmap_zoom = $dricub_driving_school_option['dricub_driving_school_gmap_zoom'];



    //footer_map
    $mapkey = '';
    if (isset($dricub_driving_school_option['dricub_driving_school_gmap_api_key']) && !empty($dricub_driving_school_option['dricub_driving_school_gmap_api_key'])) {
        $mapkey .= '&key=' . $dricub_driving_school_option['dricub_driving_school_gmap_api_key'];
    }


    if(isset($dricub_driving_school_option['dricub_driving_school_display_gmap']) && $dricub_driving_school_option['dricub_driving_school_display_gmap'] == 1){
    ?>

    <!-- map -->
    <div id="googleMap" class="google-map"></div>

   
    <!-- /map -->  
    <!-- Google map -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false<?php echo $mapkey; ?>"></script>
    <script type="text/javascript">

        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            var mapOptions = {
                zoom: <?php echo esc_html($gmap_zoom); ?>,
                center: new google.maps.LatLng(<?php echo esc_html($gmap_latitude); ?>, <?php echo esc_html($gmap_longitude); ?>),
                styles: [
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            }, {
                                "lightness": 17
                            }]
                    }, {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            }, {
                                "lightness": 20
                            }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 17
                            }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 29
                            }, {
                                "weight": 0.2
                            }]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 18
                            }]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            }, {
                                "lightness": 16
                            }]
                    }, {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            }, {
                                "lightness": 21
                            }]
                    }, {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            }, {
                                "lightness": 21
                            }]
                    }, {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            }, {
                                "color": "#ffffff"
                            }, {
                                "lightness": 16
                            }]
                    }, {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            }, {
                                "color": "#333333"
                            }, {
                                "lightness": 40
                            }]
                    }, {
                        "elementType": "labels.icon",
                        "stylers": [{
                                "visibility": "off"
                            }]
                    }, {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            }, {
                                "lightness": 19
                            }]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            }, {
                                "lightness": 20
                            }]
                    }, {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            }, {
                                "lightness": 17
                            }, {
                                "weight": 1.2
                            }]
                    }]
            };
            var mapElement = document.getElementById('googleMap');
            var map = new google.maps.Map(mapElement, mapOptions);
            var image = "<?php if (isset($dricub_driving_school_option['dricub_driving_school_gmap_marker']) && !empty($dricub_driving_school_option['dricub_driving_school_gmap_marker'])) echo $dricub_driving_school_option['dricub_driving_school_gmap_marker']['url']; ?>";
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo esc_html($gmap_latitude); ?>, <?php echo esc_html($gmap_longitude); ?>),
                map: map,
                icon: image
            });
        }
    </script>

    <?php
    }
}


function driving_school_add_fonts_family($target='') {

    return array(
        array(
            'type' => 'dropdown',
            'heading' => __('Icon library', ULTIMA_NAME),
            'default' => 'drivingschoolicon',
            'value' => array(
                __('Driving School Icon', ULTIMA_NAME) => 'drivingschoolicon',
                __('Font Awesome', ULTIMA_NAME) => 'fontawesome',
                __('Open Iconic', ULTIMA_NAME) => 'openiconic',
                __('Typicons', ULTIMA_NAME) => 'typicons',
                __('Entypo', ULTIMA_NAME) => 'entypo',
                __('Linecons', ULTIMA_NAME) => 'linecons',
                __('Mono Social', ULTIMA_NAME) => 'monosocial',
            ),
            'param_name' => 'icon_type'.$target,
            'description' => __('Select icon library.', ULTIMA_NAME),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', ULTIMA_NAME),
            'param_name' => 'icon_fontawesome'.$target,
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type'.$target,
                'value' => 'fontawesome',
            ),
            'description' => __('Select icon from library.', ULTIMA_NAME),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', ULTIMA_NAME),
            'param_name' => 'icon_openiconic'.$target,
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'openiconic',
                'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type'.$target,
                'value' => 'openiconic',
            ),
            'description' => __('Select icon from library.', ULTIMA_NAME),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', ULTIMA_NAME),
            'param_name' => 'icon_typicons'.$target,
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'typicons',
                'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type'.$target,
                'value' => 'typicons',
            ),
            'description' => __('Select icon from library.', ULTIMA_NAME),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', ULTIMA_NAME),
            'param_name' => 'icon_entypo'.$target,
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'entypo',
                'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type'.$target,
                'value' => 'entypo',
            ),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', ULTIMA_NAME),
            'param_name' => 'icon_linecons'.$target,
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'linecons',
                'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type'.$target,
                'value' => 'linecons',
            ),
            'description' => __('Select icon from library.', ULTIMA_NAME),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', ULTIMA_NAME),
            'param_name' => 'icon_monosocial'.$target,
            'value' => 'vc-mono vc-mono-fivehundredpx',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'monosocial',
                'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type'.$target,
                'value' => 'monosocial',
            ),
            'description' => __('Select icon from library.', ULTIMA_NAME),
        ),
        array(
            'type' => 'iconpicker',
            'heading' => __('Icon', ULTIMA_NAME),
            'param_name' => 'icon'.$target,
            'value' => 'icon-decor1',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'type' => 'drivingschoolicon',
                'iconsPerPage' => 4000,
            // default 100, how many icons per/page to display
            ),
            'dependency' => array(
                'element' => 'icon_type'.$target,
                'value' => 'drivingschoolicon',
            ),
            'description' => __('Select icon from library.', ULTIMA_NAME),
        ),
    );
}

function driving_schools_programs_vc_get_ajax_programs_ids_render( $query ) {
    
    $query = trim( $query['value'] );

    // get value from requested
    if ( ! empty( $query ) ) {
    $post_object = get_post( (int) $query );
    if ( is_object( $post_object ) ) {
    $post_title = $post_object->post_title;
    $post_id = $post_object->ID;
    $data = array();
    $data['value'] = $post_id;
    $data['label'] = __( 'Id', 'hill' ) . ': ' . $post_id . ( ( strlen( $post_title ) > 0 ) ? ' - ' . __( 'Title', 'hill' ) . ': ' . $post_title : '' ) ;
    return ! empty( $data ) ? $data : false;
    }
    return false;
    }
    return false;

  }
  
  add_filter('vc_autocomplete_driving_schools_programs_ids_render', 'driving_schools_programs_vc_get_ajax_programs_ids_render', 10, 1 );


function driving_schools_programs_vc_get_ajax_ids( $query ) {
  global $wpdb;
  $programs_id = (int) $query;
  $post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title, b.meta_value AS sku
        FROM {$wpdb->posts} AS a
        LEFT JOIN ( SELECT meta_value, post_id  FROM {$wpdb->postmeta} WHERE `meta_key` = '_sku' ) AS b ON b.post_id = a.ID
        WHERE a.post_type = 'our-programs' AND ( a.ID = '%d' OR b.meta_value LIKE '%%%s%%' OR a.post_title LIKE '%%%s%%' )", $programs_id > 0 ? $programs_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

  $results = array();
  if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
    foreach ( $post_meta_infos as $value ) {
      $data = array();
      $data['value'] = $value['id'];
      $data['label'] = __( 'Id', 'hill' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . __( 'Title', 'hill' ) . ': ' . $value['title'] : '' ) ;
      $results[] = $data;
    }
  }

  return $results;
}

add_filter('vc_autocomplete_driving_schools_programs_ids_callback', 'driving_schools_programs_vc_get_ajax_ids');


function driving_school_replace_icon_html($atts,$target='') {
    extract(shortcode_atts(array(
        'icon'.$target => '',
        'heading'.$target => '',
        'description'.$target => '',
        'icon_type'.$target => '',
        'type'.$target => 'drivingschoolicon',
        'icon_fontawesome'.$target => '',
        'icon_openiconic'.$target => '',
        'icon_typicons'.$target => '',
        'icon_entypo'.$target => '',
        'icon_linecons'.$target => '',
        'icon_monosocial'.$target => '',
                    ), $atts));
    if (${'icon_type'.$target} == '') {
        $icon_type = ${'type'.$target};
        $icon=${'icon'.$target};
    }else{
         $icon_type = ${'icon_type'.$target};
    }
    if (($icon_type) != 'drivingschoolicon' && !empty($icon_type) && function_exists('vc_icon_element_fonts_enqueue')) {
        vc_icon_element_fonts_enqueue($icon_type);
        if (${'icon_' . $icon_type.$target} != '')
            $icon = ${'icon_' . $icon_type.$target};
    }
    return $icon;
}



add_filter('replace_icon_html', 'driving_school_replace_icon_html', 1, 2);



/*
 * fonts auto load
 */

require_once( DRICUB_PLUGIN_DIR . 'fonts-loader.php');

/*
 * Gallery load
 */

require_once( DRICUB_PLUGIN_DIR . "/lib/sds_cpt_gallery.php" );
/*
 * sidebar load
 */
require_once( DRICUB_PLUGIN_DIR . "/lib/sidebar_generator.php" );

/*
 * Meta Box Configuration Post Meta Option
 */
require_once(DRICUB_PLUGIN_DIR . "/lib/config.meta.box.php");



