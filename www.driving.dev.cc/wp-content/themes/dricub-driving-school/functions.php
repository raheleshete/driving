<?php
/**
 * dricub-driving-school Services functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dricub_driving_school_
 */
if (!defined('DRICUB_DRIVING_SCHOOL_THEME_URI')) 
define('DRICUB_DRIVING_SCHOOL_THEME_URI', get_template_directory_uri());
define('DRICUB_DRIVING_SCHOOL_THEME_DIR', get_template_directory());
define('DRICUB_DRIVING_SCHOOL_CSS_URL', get_template_directory_uri() . '/css');
define('DRICUB_DRIVING_SCHOOL_JS_URL', get_template_directory_uri() . '/js');
define('DRICUB_DRIVING_SCHOOL_IMG_URL', DRICUB_DRIVING_SCHOOL_THEME_URI . '/images/');
define('DRICUB_DRIVING_SCHOOL_FREAMWORK_DIRECTORY', DRICUB_DRIVING_SCHOOL_THEME_DIR . '/framework/');
define('DRICUB_DRIVING_SCHOOL_INC_DIRECTORY', DRICUB_DRIVING_SCHOOL_THEME_DIR . '/inc/');


/*
 * plugin.php has to load to know which plugin is active
 */
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

require_once(DRICUB_DRIVING_SCHOOL_FREAMWORK_DIRECTORY . "plugin-list.php");

/*
 * Enable support TGM features.
 */
require_once(DRICUB_DRIVING_SCHOOL_FREAMWORK_DIRECTORY . "class-tgm-plugin-activation.php");
/*
 * Enable support TGM configuration.
 */
require_once(DRICUB_DRIVING_SCHOOL_FREAMWORK_DIRECTORY . "config.tgm.php");


require_once DRICUB_DRIVING_SCHOOL_FREAMWORK_DIRECTORY. '/dashboard/class-dricub-driving-school-dashboard.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * comment walker.
 */
require get_template_directory() . '/inc/class-walker-comment.php';
/*
 * Redux framework configuration
 */
require_once(DRICUB_DRIVING_SCHOOL_FREAMWORK_DIRECTORY . "redux.fallback.php");
require_once(DRICUB_DRIVING_SCHOOL_FREAMWORK_DIRECTORY . "redux.config.php");
require_once(DRICUB_DRIVING_SCHOOL_FREAMWORK_DIRECTORY . "nav_menu_walker.php");

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!function_exists('dricub_driving_school_content_width')) :

    function dricub_driving_school_content_width() {
        $GLOBALS['content_width'] = apply_filters('dricub_driving_school_content_width', 640);
    }

endif;

add_action('after_setup_theme', 'dricub_driving_school_content_width', 0);


if (!function_exists('dricub_driving_school_setup')) {

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function dricub_driving_school_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Pool Services, use a find and replace
         * to change 'dricub-driving-school' to the name of your theme in all the template files.
         */
        load_theme_textdomain('dricub-driving-school', get_template_directory() . '/languages');

        add_editor_style(DRICUB_DRIVING_SCHOOL_CSS_URL . '/editor-style.css');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary', 'dricub-driving-school'),
        ));

        $defaults = array(
            'default-image' => '',
            'width' => 0,
            'height' => 0,
            'flex-height' => false,
            'flex-width' => false,
            'uploads' => true,
            'random-default' => false,
            'header-text' => true,
            'default-text-color' => '',
            'wp-head-callback' => '',
            'admin-head-callback' => '',
            'admin-preview-callback' => '',
        );

        add_theme_support('custom-header', $defaults);

        /*
         * Enable support for custom-background.
         */
        $defaults = array(
            'default-color' => '',
            'default-image' => '',
            'default-repeat' => '',
            'default-position-x' => '',
            'default-attachment' => '',
            'wp-head-callback' => '_custom_background_cb',
            'admin-head-callback' => '',
            'admin-preview-callback' => ''
        );
        add_theme_support('custom-background', $defaults);

        /*
         * Enable support for Post Formats.
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'gallery',
            'audio',
            'video',
            'link',
            'quote',
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'align-wide' );
        add_theme_support( 'editor-styles' );
        add_theme_support( 'responsive-embeds' );


 		set_post_thumbnail_size(870, 483, false);
        add_image_size('dricub-driving-schools-programs-thumbnail', 483, 261);
        add_image_size('dricub-driving-schools-team-thumbnail', 462, 291);
        add_image_size('dricub-driving-schools-blog-post-featured-image', 270, 150, true);
    }
}
add_action('after_setup_theme', 'dricub_driving_school_setup');

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('dricub_driving_school_scripts')) {

    function dricub_driving_school_scripts() {
        /* ===============================================================
         * CSS Files 
         * --------------------------------------------------------------- */
        wp_enqueue_style('dricub-driving-school-style', get_stylesheet_uri());

        $dricub_driving_school_options = dricub_driving_school_options();
		wp_enqueue_style('dricub-driving-school-wp-default-norm', DRICUB_DRIVING_SCHOOL_CSS_URL . '/wp-default-norm.css', '', null);
        require_once(DRICUB_DRIVING_SCHOOL_THEME_DIR.'/css/custom_style.php');
        $dricub_driving_school_custom_inline_style = '';
        if (function_exists('dricub_driving_school_get_custom_styles')) {
            $dricub_driving_school_custom_inline_style = dricub_driving_school_get_custom_styles();
        }
        wp_add_inline_style('dricub-driving-school-style', $dricub_driving_school_custom_inline_style);

        if ( isset($dricub_driving_school_options['dricub_driving_school_use_predefined_color']) && $dricub_driving_school_options['dricub_driving_school_use_predefined_color'] == 1) {
			$color_css_file =  $dricub_driving_school_options['dricub_driving_school_main_color'];
			if($color_css_file!='default')
            	wp_enqueue_style( 'dricub-driving-school-color', DRICUB_DRIVING_SCHOOL_CSS_URL . '/colors/' . $color_css_file . '.css', '', null );
        }else{
			require_once(DRICUB_DRIVING_SCHOOL_THEME_DIR.'/css/colors/stylecss.php');
			$dricub_driving_school_custom_inline_style = '';
			if (function_exists('dricub_driving_school_custom_primary_color')) {
				$dricub_driving_school_custom_primary_color = dricub_driving_school_custom_primary_color();
			}
			wp_add_inline_style('dricub-driving-school-style', $dricub_driving_school_custom_primary_color);
		}

        

        /* ===============================================================
         * JS Files 
         * --------------------------------------------------------------- */

        wp_enqueue_script('bootstrap', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/bootstrap.min.js', array('jquery'), '', true);
        wp_enqueue_script('slick', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/slick.min.js',  array('jquery','imagesloaded'), '', true);
        wp_enqueue_script('custom-modernizr', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/modernizr.custom.js',  array('jquery'), '', true);
		wp_enqueue_script('classie', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/classie.js',  array('jquery'), '', true);
		wp_enqueue_script('AnimOnScroll', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/AnimOnScroll.js',  array('jquery','imagesloaded','jquery-masonry'), '', true);
        wp_enqueue_script('jquery-countdown', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/countdown/jquery.plugin.min.js', array('jquery'), '', true);
        wp_enqueue_script('countdown', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/countdown/jquery.countdown.min.js', array('jquery'), '', true);
        wp_enqueue_script('countTo', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/jquery.countTo.js', array('jquery'), '', true);
        wp_enqueue_script('bootstrap-datepicker', DRICUB_DRIVING_SCHOOL_JS_URL . '/vendor/bootstrap-datepicker/bootstrap-datepicker.js', array('jquery'), '', true);
		
        /* ====================== Custom JavaScripts -- */

        wp_enqueue_script('dricub-driving-school-custom', DRICUB_DRIVING_SCHOOL_JS_URL . '/custom.js', array('jquery','jquery-masonry'), '', true);
        wp_localize_script( 'dricub-driving-school-custom', 'ajax_object', array('ajax_nonce_morepost'=>wp_create_nonce( "morepost" ) ,'ajax_url' => esc_url(admin_url( 'admin-ajax.php' )),'loader_img' => DRICUB_DRIVING_SCHOOL_IMG_URL.'ajax-loader.gif' ) );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

}
add_action('wp_enqueue_scripts', 'dricub_driving_school_scripts', 10000);
add_action('wp_enqueue_scripts', 'dricub_driving_school_front_init_js_var', 1001);

/**
 * Enqueue scripts and styles.
 */
if (!function_exists('dricub_driving_school_front_init_js_var')) :

    function dricub_driving_school_front_init_js_var() {
        global $yith_wcwl, $post, $product;
        wp_localize_script('dricub-driving-school-custom', 'THEMEURL', DRICUB_DRIVING_SCHOOL_THEME_URI);
        wp_localize_script('dricub-driving-school-custom', 'IMAGEURL', DRICUB_DRIVING_SCHOOL_THEME_URI . '/images');
        wp_localize_script('dricub-driving-school-custom', 'CSSURL', DRICUB_DRIVING_SCHOOL_THEME_URI . '/css');
    }

endif;

add_action('wp_enqueue_scripts', 'dricub_driving_school_front_init_js_var', 1001);

/*
  default config variable
 */
$fonts_areas = array(
    'dricub_driving_school_body_typography',
    'dricub_driving_school_heading_1_typography',
    'dricub_driving_school_heading_2_typography',
    'dricub_driving_school_headin_3_typography',
    'dricub_driving_school_heading_4_typography',
    'dricub_driving_school_heading_5_typography',
    'dricub_driving_school_heading_6_typography',
    'dricub_driving_school_widget_title_typography',
);

if ( ! function_exists( 'dricub_driving_school_fonts_url' ) ) :

function dricub_driving_school_fonts_url() {

    $dricub_driving_school_opt = dricub_driving_school_options();
    global $fonts_areas;
    $protocol = is_ssl() ? 'https' : 'http';
    $subsets = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
    $variants = ':100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i';
    $font_families = array();
    $font_families_name = array();

    if ( class_exists( 'ReduxFrameworkPlugin' )) {
        $open_sans = _x( 'on', 'Open Sans font: on or off', 'dricub-driving-school' ); 
        if ( 'off' !== $open_sans ) {
         $font_families[] = 'Open Sans'.$variants ;
         $font_families_name[]='Open Sans';
         $font_families[] = 'Roboto'.$variants ;
         $font_families_name[]='Roboto';
        }
    }
    foreach ($fonts_areas as $option) {
        if (isset($dricub_driving_school_opt[$option]['font-family']) && $dricub_driving_school_opt[$option]['font-family'] && !in_array($dricub_driving_school_opt[$option]['font-family'], $font_families_name)
        ) {
            $font_families_name[]=$dricub_driving_school_opt[$option]['font-family'];
            foreach (explode(',', $dricub_driving_school_opt[$option]['font-family']) as  $fontvalue) {
                $fontvalue=str_replace("'", "", $fontvalue);
                $fontvalue=trim($fontvalue);
                $font_families[] = $fontvalue.$variants;
            } 
        }
    }
    $fonts_url=array();
    if (!empty($font_families)) {
       $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( $subsets ),
        ),  $protocol.'://fonts.googleapis.com/css' );
    }
	if(!empty($fonts_url)){
		return esc_url_raw( $fonts_url );
	}
}

endif;



function dricub_driving_school_scripts_styles() {
    wp_enqueue_style( 'dricub-driving-school-fonts', dricub_driving_school_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'dricub_driving_school_scripts_styles' );





function driving_school_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'driving_school_add_editor_styles' );


function driving_school_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'dricub-driving-school' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'dricub-driving-school' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'dricub-driving-school' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'dricub-driving-school' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'dricub-driving-school' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'dricub-driving-school' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'dricub-driving-school' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'dricub-driving-school' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'dricub-driving-school' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'driving_school_gutenberg_editor_palette_styles' );


function dricub_add_google_font() {
    wp_enqueue_style( 'dricub-google-fonts-admin', dricub_build_google_font(), array(), NULL );
}

add_action( 'admin_enqueue_scripts', 'dricub_add_google_font');

function dricub_build_google_font(){
    $protocol = is_ssl() ? 'https:' : 'http:';
    $subsets = 'latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,greek,vietnamese';
    $query_args = array(
        'family' => urlencode('Inconsolata|Open+Sans:300,400,600,700|Roboto:300,400,500,700'),
    );
    $font_url = add_query_arg($query_args,  $protocol."//fonts.googleapis.com/css");
	return $font_url;
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

if (!function_exists('dricub_driving_school_widgets_init')) {

    function dricub_driving_school_widgets_init() {
        
        register_sidebar(array(
            'name' => esc_html__('Blog Sidebar', 'dricub-driving-school'),
            'id' => 'blog_sideber',
            'description' => esc_html__('Blog sidebar area', 'dricub-driving-school'),
            'before_widget' => '<div class="%2$s tt-block-aside widget" id="%1$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="tt-title">',
            'after_title' => '</h3>',
        ));
        
        register_sidebar(array(
            'name' => esc_html__('Program Sidebar', 'dricub-driving-school'),
            'id' => 'program_sideber',
            'description' => esc_html__('Program sidebar area', 'dricub-driving-school'),
            'before_widget' => '<div class="%2$s  widget" id="%1$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="">',
            'after_title' => '</h3>',
        ));
        
        register_sidebar(array(
            'name' => esc_html__('Contact Us', 'dricub-driving-school'),
            'id' => 'contact_us',
            'description' => esc_html__('Contact Us', 'dricub-driving-school'),
            'before_widget' => '<div id="%1$s" class="contact-us-widget  %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="title-aside tt-title-md">',
            'after_title' => '</h3>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Sidebar 1', 'dricub-driving-school'),
            'id' => 'footer_col_1',
            'description' => esc_html__('Footer Column 1', 'dricub-driving-school'),
            'before_widget' => '<div id="%1$s" class="footer-widget  %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h4 class="title-aside">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Column 2', 'dricub-driving-school'),
            'id' => 'footer_col_2',
            'description' => esc_html__('Footer Column 2', 'dricub-driving-school'),
            'before_widget' => '<div id="%1$s" class="footer-widget2  %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h4 class="title-aside">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => esc_html__('Footer Column 3', 'dricub-driving-school'),
            'id' => 'footer_col_3',
            'description' => esc_html__('Footer Column 3', 'dricub-driving-school'),
            'before_widget' => '<div id="%1$s" class="footer-widget3  %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h4 class="title-aside">',
            'after_title' => '</h4>',
        ));
        register_sidebar(array(
            'name' => esc_html__('Footer Column 4', 'dricub-driving-school'),
            'id' => 'footer_col_4',
            'description' => esc_html__('Footer Column 4', 'dricub-driving-school'),
            'before_widget' => '<div id="%1$s" class="footer-widget4  %2$s">',
            'after_widget' => "</div>",
            'before_title' => '<h4 class="title-aside">',
            'after_title' => '</h4>',
        ));
    }

}

add_action('widgets_init', 'dricub_driving_school_widgets_init');


if (!function_exists('dricub_driving_school_options')) :

    function dricub_driving_school_options() {
        global $dricub_driving_school_options;
		if(empty($dricub_driving_school_options)){
			$dricub_driving_school_options=get_option('dricub_driving_school_options');
		}
        return $dricub_driving_school_options;
    }

endif;

if (!function_exists('dricub_driving_school_breadcrumb')) :

    function dricub_driving_school_breadcrumb() {
        global $post, $dricub_driving_school_options;
        if (!isset($post->ID)) {
            return false;
        }
        if (!is_front_page() || is_home()) {
            if ((isset($post->post_type) && is_page()) || is_search() || is_home() || is_single() || is_archive() || is_category()) {
               ?>
                <div class="breadcrumbs">
                    <div class="container">
                        <div class="breadcrumb">
                            <?php
                            if (function_exists('yoast_breadcrumb')) {
                                yoast_breadcrumb('', '');
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }

endif;

add_action('dricub_driving_school_breadcrumb', 'dricub_driving_school_breadcrumb');

if (!function_exists('dricub_driving_school_comment_nav')) :

    function dricub_driving_school_comment_nav() {
        // Are there comments to navigate through?
        if (get_comment_pages_count() > 1 && get_option('page_comments')) :
            ?>
            <nav class="navigation comment-navigation">
                <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'dricub-driving-school'); ?></h2>
                <div class="nav-links">
                    <?php
                    if ($prev_link = get_previous_comments_link(esc_html__('Older Comments', 'dricub-driving-school'))) :
                        printf('<div class="nav-previous">%s</div>', $prev_link);
                    endif;

                    if ($next_link = get_next_comments_link(esc_html__('Newer Comments', 'dricub-driving-school'))) :
                        printf('<div class="nav-next">%s</div>', $next_link);
                    endif;
                    ?>
                </div>
            </nav>
            <?php
        endif;
    }

endif;

function dricub_driving_school_read_more_link() {
    return '<div class="post-read-more"><a class="more-link btn" href="' . esc_url(get_permalink()) . '">'.esc_html__('read more', 'dricub-driving-school').'</a></div>';
}
add_filter( 'the_content_more_link', 'dricub_driving_school_read_more_link' );



add_action('dricub_driving_school_header_loader', 'dricub_driving_school_header_loader_function');

if (!function_exists('dricub_driving_school_header_loader_function')) {

	function dricub_driving_school_header_loader_function()
	{
	$dricub_driving_school = dricub_driving_school_options();

	  if(isset($dricub_driving_school['dricub_driving_school_site_preloader']) && $dricub_driving_school['dricub_driving_school_site_preloader']){
	  	if(isset($dricub_driving_school['dricub_driving_school_site_preloader_image']) && $dricub_driving_school['dricub_driving_school_site_preloader_image']['url']!=''){
	  		?>
	  		<div class="loader-wrapper">
				<div class="custom-loader">
					<img alt="<?php esc_html__( 'Loader Image', 'dricub-driving-school' ); ?>" src="<?php echo esc_url($dricub_driving_school['dricub_driving_school_site_preloader_image']['url']) ; ?>">
				</div>
			</div>
	  		<?php
	  	}else{
		?>
			<div class="loader-wrapper">
                <div class="loader">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
	<?php
		} 
	  }
	}
}


function dricub_driving_school_more_post_ajax(){
    check_ajax_referer( 'morepost', 'security' );
    if( isset($_POST['pageNumber']) ){ $pageNumber = sanitize_text_field($_POST['pageNumber']); }else{ $pageNumber = ''; };
    if( isset($_POST['post_per_load']) ){ $posts_per_page = sanitize_text_field($_POST['post_per_load']); }else{ $posts_per_page = ''; };
    // WP_Query arguments
    $args = array(
        'post_type'              => array( 'post' ),
        'post_status'            => array( 'publish' ),
        'nopaging'               => false,
        'paged'                  => $pageNumber,
        'posts_per_page'         => $posts_per_page,
		'orderby' => 'ID',
        'order' => 'DESC',
    );

    // The Query
    $query = new WP_Query( $args );
    $post_count=$query->found_posts;
    $nextPost='';

    if(ceil($post_count/$posts_per_page)== $pageNumber || $post_count ==0)
        $nextPost='blank';

    ob_start();
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            echo '<li class="item animate"><div class="post-all-content">';
            get_template_part( 'template-parts/content',get_post_format() );
            echo '</div></li>';
        }
    } else {
        // no posts found
    }
    $output =ob_get_clean();
    $resultArray = array("html" => $output,"count" => $nextPost);
    echo json_encode($resultArray);
    // Restore original Post Data
    wp_reset_postdata();
    die();
}
add_action('wp_ajax_dricub_driving_school_more_post_ajax', 'dricub_driving_school_more_post_ajax');
add_action('wp_ajax_nopriv_dricub_driving_school_more_post_ajax', 'dricub_driving_school_more_post_ajax');

add_action( 'vc_before_init', 'driving_school_services_vcsetsstheme' );
function driving_school_services_vcsetsstheme() {
    vc_set_as_theme();
}
