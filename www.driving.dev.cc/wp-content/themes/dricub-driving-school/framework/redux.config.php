<?php

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "dricub_driving_school_options";

$theme = wp_get_theme(); // For use with some settings. Not necessary.
$opt_prefix = 'dricub_driving_school';

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name' => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name' => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version' => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type' => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu' => true,
    // Show the sections below the admin menu item or not
    'menu_title' => esc_html__('Dricub Driving School Options', 'dricub-driving-school'),
    'page_title' => esc_html__('Dricub Driving School Options', 'dricub-driving-school'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key' => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'disable_google_fonts_link' => true,
    'async_typography' => false,
    // Use a asynchronous font on the front end or font string
    'admin_bar' => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon' => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority' => 50,
    // Choose an priority for the admin bar menu
    'global_variable' => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode' => false,
    // Show the time the page took to load, etc
    'update_notice' => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer' => false,
    // OPTIONAL -> Give you extra features
    'page_priority' => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent' => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions' => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon' => '',
    // Specify a custom URL to an icon
    'last_tab' => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon' => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug' => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults' => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show' => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark' => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export' => true,
    // Shows the Import/Export panel when not used as a field.
    // CAREFUL -> These options are for advanced use only
    'transient_time' => 60 * MINUTE_IN_SECONDS,
    'output' => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database' => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn' => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.
    // HINTS
    'hints' => array(
        'icon' => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color' => 'lightgray',
        'icon_size' => 'normal',
        'tip_style' => array(
            'color' => 'red',
            'shadow' => true,
            'rounded' => false,
            'style' => '',
        ),
        'tip_position' => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect' => array(
            'show' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'mouseover',
            ),
            'hide' => array(
                'effect' => 'slide',
                'duration' => '500',
                'event' => 'click mouseleave',
            ),
        ),
    )
);


Redux::setArgs($opt_name, $args);

Redux::setSection($opt_name, array(
    'title' => esc_html__('Header Settings', 'dricub-driving-school'),
    'id' => 'header_settings',
    'desc' => esc_html__('All header settings', 'dricub-driving-school'),
    'customizer_width' => '400px',
    'icon' => 'el el-website',
    'fields' => array(

        array(
                'id'       => $opt_prefix.'_site_preloader',
                'type'     => 'switch',
                'title'    => esc_html__('Display preloader before page load', 'dricub-driving-school'),
                'subtitle' => esc_html__('Enable or Disable site preloader', 'dricub-driving-school'),
                'default'  => false,
                'on'       => esc_html__('Enable', 'dricub-driving-school'),
                'off'      => esc_html__('Disable', 'dricub-driving-school'),
            ),
			array(
				'id'       => $opt_prefix.'_site_preloader_image',
				'type'     => 'media',
				'url'       => true,
				'compiler'  => 'true',
                'desc'      => esc_html__('Basic media uploader with disabled URL input field.', 'dricub-driving-school'),
				'subtitle'  => esc_html__('Add/Upload preloader using the WordPress native uploader', 'dricub-driving-school'),
				'title'    => esc_html__('Site Preloader', 'dricub-driving-school'),
            ),
            array(
                'id' => $opt_prefix . '_site-favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Favicon URL', 'dricub-driving-school'),
                'compiler' => 'true',
                'desc' => esc_html__('Set favicon for your theme', 'dricub-driving-school'),
                'subtitle' => esc_html__('Upload favicon for the theme', 'dricub-driving-school'),
                'default' => array(
                    'url' => esc_url(DRICUB_DRIVING_SCHOOL_THEME_URI . '/images/favicon.ico')
                ),
            ),
        array(
				'id'       => $opt_prefix.'_logo',
				'type'     => 'media',
				'url'       => true,
				'compiler'  => 'true',
                'desc'      => esc_html__('Basic media uploader with disabled URL input field.', 'dricub-driving-school'),
				'subtitle'  => esc_html__('Add/Upload logo using the WordPress native uploader', 'dricub-driving-school'),
				'title'    => esc_html__('Site Logo', 'dricub-driving-school'),
				'default'     => array(
					'url'       => esc_url(DRICUB_DRIVING_SCHOOL_THEME_URI . '/images/logo.png'),
				),
			),
        array(
                'id'       => $opt_prefix.'_page_header_enable',
                'type'     => 'switch',
                'title'    => esc_html__('Display Page Header Contact', 'dricub-driving-school'),
                'subtitle' => esc_html__('Enable or Disable Page Header Contact', 'dricub-driving-school'),
                'default'  => false,
                'on'       => esc_html__('Enable', 'dricub-driving-school'),
                'off'      => esc_html__('Disable', 'dricub-driving-school'),
            ),
        array(
            'id' => $opt_prefix . '_page_header_mobile_location',
            'type' => 'editor',
            'title' =>  esc_html__( 'Page Header location', 'dricub-driving-school'),
            'default' => esc_html__( '3261 Anmoore Road Brooklyn, NY 11230', 'dricub-driving-school')
        ),
        array(
            'id' => $opt_prefix . '_page_header_mobile_location_url',
            'type' => 'text',
            'title' => esc_html__( 'Page Header location Url', 'dricub-driving-school'), 
            'default' => esc_url('#')
        ),

        array(
            'id' => $opt_prefix . '_page_header_mobile_phone',
            'type' => 'editor',
            'title' => esc_html__(  'Page Header Phone', 'dricub-driving-school'), 
            'default' => esc_html__( '800-123-4567', 'dricub-driving-school')
        ),
        array(
            'id' => $opt_prefix . '_page_header_mobile_hour',
            'type' => 'editor',
            'title' => esc_html__( 'Page Header Hour', 'dricub-driving-school'),
            'default' => esc_html__( '9:00 AM to 6:00 PM / 6 Days', 'dricub-driving-school')
        ),
        array(
            'id' => $opt_prefix . '_page_header_mobile_email',
            'type' => 'editor',
            'title' => esc_html__( 'Page Header Email', 'dricub-driving-school'),
            'default' => esc_html__( 'info@youremal.com', 'dricub-driving-school')
        ),

        array(
            'id' => $opt_prefix . '_header_facebook',
            'type' => 'text',
            'title' => esc_html__('Facebook URL', 'dricub-driving-school'),
            'default' => esc_url('#')
        ),
        array(
            'id' => $opt_prefix . '_header_twitter',
            'type' => 'text',
            'title' => esc_html__('Twitter URL', 'dricub-driving-school'),
            'default' => esc_url('#')
        ),
        array(
            'id' => $opt_prefix . '_header_google_plus',
            'type' => 'text',
            'title' => esc_html__('Google Plus URL', 'dricub-driving-school'),
            'default' => esc_url('#')
        ),
        array(
            'id' => $opt_prefix . '_header_instagram',
            'type' => 'text',
            'title' => esc_html__('Instagram URL', 'dricub-driving-school'),
            'default' => esc_url('#')
        ),
        array(
            'id' => $opt_prefix . '_page_header_oder_button',
            'type' => 'switch',
            'title' => esc_html__('Display Mobile Order Button', 'dricub-driving-school'),
            'subtitle' => esc_html__('Enable or disable header Right Mobile Order Button', 'dricub-driving-school'),
            'default' => false,
            'on' => esc_html__('Enable', 'dricub-driving-school'),
            'off' => esc_html__('Disable', 'dricub-driving-school'),
        ),

        array(
            'id' => $opt_prefix . '_page_header_oder_button',
            'type' => 'switch',
            'title' => esc_html__('Display Mobile Order Button', 'dricub-driving-school'),
            'subtitle' => esc_html__('Enable or disable header Right Mobile Order Button', 'dricub-driving-school'),
            'default' => false,
            'on' => esc_html__('Enable', 'dricub-driving-school'),
            'off' => esc_html__('Disable', 'dricub-driving-school'),
        ),
        array(
            'id' => $opt_prefix . '_page_header_oder_behaviour',
            'type' => 'switch',
            'title' => esc_html__('Order Button Show Modal or External Page', 'dricub-driving-school'),
            'subtitle' => esc_html__('Enable modal button', 'dricub-driving-school'),
            'default' => false,
            'on' => esc_html__('Enable', 'dricub-driving-school'),
            'off' => esc_html__('Disable', 'dricub-driving-school'),
        ),
        array(
            'id' => $opt_prefix . '_header_order_button_text',
            'type' => 'text',
            'title' =>  esc_html__('Order Button Title', 'dricub-driving-school'),
            'default' =>  esc_html__('ORDER COURSE', 'dricub-driving-school')
        ),
        array(
            'id' => $opt_prefix . '_header_order_modal_mc_form',
            'type' => 'text',
            'title' => esc_html__('Order Button Form', 'dricub-driving-school'),
            'subtitle' => esc_html__('Mobile Header Order Button Form', 'dricub-driving-school'),
            'desc' => esc_html__('You need to put your contact form 7 short code here', 'dricub-driving-school'),
            'default' => '',
        ),
        array(
            'id' => $opt_prefix . '_header_order_button_url',
            'type' => 'text',
            'title' =>  esc_html__('Text Order - URL Validated', 'dricub-driving-school'),
            'subtitle' =>  esc_html__('This must be a URL.', 'dricub-driving-school'),
            'validate' => 'url',
            'default' => esc_url('#'),
        ),
    )
));

Redux::setSection( $opt_name, array(
    'title'            => esc_html__('Contact', 'dricub-driving-school'),
    'id'               => 'contact_settings',
    'desc'             => esc_html__('Contact', 'dricub-driving-school'),
    'customizer_width' => '400px',
    'icon'             => 'el el-th-large',
    'fields'           => array(
        array(
            'id'       => $opt_prefix.'_display_gmap',
            'type'     => 'switch',
            'title'    => esc_html__('Display Google Map', 'dricub-driving-school'),
            'subtitle' => esc_html__('Display Google Map', 'dricub-driving-school'),
            'default'  => true,
            'on'       => esc_html__('Enable', 'dricub-driving-school'),
            'off'      => esc_html__('Disable', 'dricub-driving-school'),
        ),
        array(
            'id'       => $opt_prefix.'_gmap_api_key',
            'type'     => 'text',
            'title'    => esc_html__('Google Map Api Key', 'dricub-driving-school'),
            'subtitle' => esc_html__('Set Google Map Api Key', 'dricub-driving-school'),
            'default'  => ''
        ),
        array(
            'id'       => $opt_prefix.'_gmap_zoom',
            'type'     => 'text',
            'title'    => esc_html__('Google Map Zoom Level', 'dricub-driving-school'),
            'subtitle' => esc_html__('Set Google Map Zoom Level', 'dricub-driving-school'),
            'default'  => '14'
        ),
        array(
            'id'       => $opt_prefix.'_gmap_latitude',
            'type'     => 'text',
            'title'    => esc_html__('Google Map Latitude', 'dricub-driving-school'),
            'subtitle' => esc_html__('Set Google Map Latitude', 'dricub-driving-school'),
            'default'  => '55.8610112'
        ),
        array(
            'id'       => $opt_prefix.'_gmap_longitude',
            'type'     => 'text',
            'title'    => esc_html__('Google Map Longitude', 'dricub-driving-school'),
            'subtitle' => esc_html__('Set Google Map Longitude', 'dricub-driving-school'),
            'default'  => '-4.2547319'
        ),
)));

Redux::setSection($opt_name, array(
    'title' => esc_html__('Typography', 'dricub-driving-school'),
    'id' => 'fonts_settings',
    'desc' => esc_html__('Typography', 'dricub-driving-school'),
    'customizer_width' => '400px',
    'icon' => 'el el-font',
    'fields' => array(
        array(
            'id' => $opt_prefix . '_body_typography',
            'type' => 'typography',
            'title' => esc_html__('Body Typography', 'dricub-driving-school'),
            'subtitle' => esc_html__('Select body font family, size, line height, color and weight.', 'dricub-driving-school'),
            'text-align' => false,
            'subsets' => false,
        ), array(
            'id' => $opt_prefix . '_heading_1_typography',
            'type' => 'typography',
            'title' => esc_html__('H1 Font', 'dricub-driving-school'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'dricub-driving-school'),
            'google' => true,
            'text-align' => false,
        ),
        array(
            'id' => $opt_prefix . '_heading_2_typography',
            'type' => 'typography',
            'title' => esc_html__('H2 Font', 'dricub-driving-school'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'dricub-driving-school'),
            'google' => true,
            'text-align' => false,
        ),
        array(
            'id' => $opt_prefix . '_heading_3_typography',
            'type' => 'typography',
            'title' => esc_html__('H3 Font', 'dricub-driving-school'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'dricub-driving-school'),
            'google' => true,
            'text-align' => false,
        ),
        array(
            'id' => $opt_prefix . '_heading_4_typography',
            'type' => 'typography',
            'title' => esc_html__('H4 Font', 'dricub-driving-school'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'dricub-driving-school'),
            'google' => true,
            'text-align' => false,
            'default' => array(
                'color' => '#000',
                'font-size' => '26px',
                'font-family' => 'Open Sans',
                'font-weight' => '600',
                'line-height' => '40px',
            ),
        ),
        array(
            'id' => $opt_prefix . '_heading_5_typography',
            'type' => 'typography',
            'title' => esc_html__('H5 Font', 'dricub-driving-school'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'dricub-driving-school'),
            'google' => true,
            'text-align' => false,
        ),
        array(
            'id' => $opt_prefix . '_heading_6_typography',
            'type' => 'typography',
            'title' => esc_html__('H6 Font', 'dricub-driving-school'),
            'subtitle' => esc_html__('Select heading font family and weight.', 'dricub-driving-school'),
            'google' => true,
            'text-align' => false,
        ),
        array(
            'id' => $opt_prefix . '_menu_typography',
            'type' => 'typography',
            'title' => esc_html__('Menu', 'dricub-driving-school'),
            'subtitle' => esc_html__('Menu typography settings', 'dricub-driving-school'),
            'text-align' => false,
            'line-height' => false,
            'subsets' => false,
        ),
        array(
            'id' => $opt_prefix . '_widget_title_typography',
            'type' => 'typography',
            'title' => esc_html__('Widget Title', 'dricub-driving-school'),
            'subtitle' => esc_html__('Widget title typography settings', 'dricub-driving-school'),
            'text-align' => false,
            'line-height' => false,
            'subsets' => false,
        ),
)));



Redux::setSection($opt_name, array(
    'title' => esc_html__('Footer Settings', 'dricub-driving-school'),
    'id' => 'footer_settings',
    'desc' => esc_html__('All Footer settings', 'dricub-driving-school'),
    'customizer_width' => '400px',
    'icon' => 'el el-website',
    'fields' => array(
            array(
                'id'       => $opt_prefix.'_footer_copyright',
                'type'     => 'text',
                'title'    => esc_html__('Copyright', 'dricub-driving-school'),
                'subtitle' => esc_html__('Copyright Text', 'dricub-driving-school'),
                 'default' => esc_html__('&copy; 2017 Safe Drive Driving School. ', 'dricub-driving-school')
            ),
        array(
                'id'       => $opt_prefix.'_back_to_top',
                'type'     => 'switch',
                'title'    => esc_html__('Display back to top button', 'dricub-driving-school'),
                'default'  => false,
                'on'       => esc_html__('Enable', 'dricub-driving-school'),
                'off'      => esc_html__('Disable', 'dricub-driving-school'),
            )
    )
));


Redux::setSection($opt_name, array(
 'title'  => esc_html__( 'Styling', 'dricub-driving-school' ),
 'icon' => 'el el-font',
 'fields' => array(
  array(
   'id'  => 'styling_general_info_start',
   'type'  => 'section',
   'title'  => esc_html__( 'General', 'dricub-driving-school' ),
   'subtitle' => esc_html__( 'General Theme Style Settings', 'dricub-driving-school' ),
   'indent' => TRUE,
  ),

  array(
   'title'  => esc_html__( 'Use a predefined color scheme', 'dricub-driving-school' ),
   'on'  => esc_html__('Yes', 'dricub-driving-school'),
   'off'  => esc_html__('No', 'dricub-driving-school'),
   'type'  => 'switch',
   'default' => 0,
   'id'  => $opt_prefix.'_use_predefined_color'
  ),

  array(
   'id'  => $opt_prefix.'_main_color',
   'title'  => esc_html__( 'Main Theme Color', 'dricub-driving-school' ),
   'subtitle' => esc_html__( 'The main color of the site.', 'dricub-driving-school' ),
   'type'  => 'select',
   'options' => array(
    'default'        => esc_html__( 'Default', 'dricub-driving-school' ),
    'yellow'        => esc_html__( 'Yellow', 'dricub-driving-school' ),
    'gold'          => esc_html__( 'Gold', 'dricub-driving-school' ),
    'blue'          => esc_html__( 'Blue', 'dricub-driving-school' ),   
    'orange'        => esc_html__( 'Orange', 'dricub-driving-school' ),
    'green'         => esc_html__( 'Green', 'dricub-driving-school' ),
    'pink'          => esc_html__( 'Pink', 'dricub-driving-school' ),
   ),
   'default' => 'yellow',
   'required' => array( $opt_prefix.'_use_predefined_color', 'equals', 1 ),
  ),

  array(
   'id'    => $opt_prefix.'_custom_primary_color',
   'title'    => esc_html__( 'Custom Primary Color', 'dricub-driving-school' ),
   'type'    => 'color',
   'transparent' => false,
   'default'   => '#fdc400',
   'required'   => array( $opt_prefix.'_use_predefined_color', 'equals', 0 ),
  ),
 

 

  array(
   'id'  => 'styling_general_info_end',
   'type'  => 'section',
   'indent' => FALSE,
  ),
 )
) );


Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Extra Settings', 'dricub-driving-school' ),
        'id'               => 'extra_settings',
        'desc'             => esc_html__( 'These are really basic fields!', 'dricub-driving-school' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-share',
        'fields'           => array(

                array(
                'id'       => $opt_prefix.'-slug_postype_program',
                'type'     => 'text',
                'title'    => esc_html__('Slug Program', 'dricub-driving-school'),
                'subtitle' => esc_html__('Change Program Slug Name', 'dricub-driving-school'),
                'desc'  => 'You might have to flush your permalinks after you performed this action Settings=> Permalink Settings',
                ),
            array(
                    'id'       => 'extra_css',
                    'type'     => 'ace_editor',
                    'title'    => esc_html__( 'Extra CSS', 'dricub-driving-school' ),
                    'subtitle' => esc_html__( 'Extra CSS just after theme styles', 'dricub-driving-school' ),
                    'mode' => 'css'
            ),
        )
));