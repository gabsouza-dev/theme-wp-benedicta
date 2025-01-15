<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "benedicta_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'benedicta_option/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

	//	Url
	$benedicta_theme_url = get_template_directory_uri();
	$benedicta_theme_options_url = get_template_directory_uri() . '/inc/theme-options/';
	
    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => $theme->get( 'Name' ) . esc_html__( ' Options', 'benedicta' ),
        'page_title'           => $theme->get( 'Name' ) . esc_html__( ' Options', 'benedicta' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => $benedicta_theme_options_url . 'img/emblem.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );
	
	
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'benedicta' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'benedicta' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'benedicta' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'benedicta' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'benedicta' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

	/* General */
	Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'General', 'benedicta' ),
		'heading'		=> esc_html__( 'General Settings', 'benedicta'),
		'id'			=> 'general',
		'customizer_width' => '400px',
        'icon'			=> 'el el-cogs',
		'fields' 		=> array(
			array(
				'id'		=> 'section-favicon-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Favicon', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'favicon',
				'type'		=> 'media',
				'title'		=> esc_html__( 'Favicon', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Please insert your favicon 16x16px or 32x32px icon.', 'benedicta' ) . '<br>' . esc_html__( 'Please note that if you"ve already uploaded the Site Icon in the Theme Customizer (Appearance -> Customize), the settings from the theme options panel will be ignored.', 'benedicta' ),
				'compiler'	=> 'true',
				'desc'		=> esc_html__( 'Upload your Favicon.', 'benedicta' ),
				'default'	=> array('url'=>get_template_directory_uri() . '/assets/images/favicon.ico'),
			),
			array(
				'id'		=> 'favicon-retina',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Retina Favicon', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Check this option if you want to have a Retina Favicon.', 'benedicta' ),
				'default'	=> '0'
			),
			array(
				'id'		=> 'apple_icons_57x57',
				'type'		=> 'media',
				'required'	=> array( 'favicon-retina', '=', '1' ),
				'title'		=> esc_html__( 'Apple touch icon (57px)', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Icon must be 57x57px. Please note that if you"ve already uploaded the Site Icon in the Theme Customizer (Appearance -> Customize), the settings from the theme options panel will be ignored.', 'benedicta' ),
				'compiler'	=> 'true',
				'desc'		=> esc_html__( 'Upload your Favicon.', 'benedicta' ),
				'default'	=> '',
			),
			array(
				'id'		=> 'apple_icons_72x72',
				'type'		=> 'media',
				'required'	=> array( 'favicon-retina', '=', '1' ),
				'title'		=> esc_html__( 'Apple touch icon (72px)', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Icon must be 72x72px. Please note that if you"ve already uploaded the Site Icon in the Theme Customizer (Appearance -> Customize), the settings from the theme options panel will be ignored.', 'benedicta' ),
				'compiler'	=> 'true',
				'desc'		=> esc_html__( 'Upload your Favicon.', 'benedicta' ),
				'default'	=> '',
			),
			array(
				'id'		=> 'apple_icons_114x114',
				'type'		=> 'media',
				'required'	=> array( 'favicon-retina', '=', '1' ),
				'title'		=> esc_html__( 'Apple touch icon (114px)', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Icon must be 114x114px. Please note that if you"ve already uploaded the Site Icon in the Theme Customizer (Appearance -> Customize), the settings from the theme options panel will be ignored.', 'benedicta' ),
				'compiler'	=> 'true',
				'desc'		=> esc_html__( 'Upload your Favicon.', 'benedicta' ),
				'default'	=> '',
			),
			array(
				'id'		=> 'section-favicon-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
			array(
				'id'		=> 'section-preloader-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Preloader Settings', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'preloader',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Preloader', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Enable a preloader screen on first page load. It displays a running line until the browser fetch the whole web content and will fade out the moment the page has been completely cached.', 'benedicta' ),
				'default'	=> '0'
			),
			array(
				'id'		=> 'section-preloader-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
			
			array(
				'id'		=> 'section-google_maps_api-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Google Maps API Key Field', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'google_maps_api',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Google Maps API Key', 'benedicta' ),
				'subtitle'	=> esc_html__('Google maps requires unique API key for each site, click here to learn more about generating ', 'benedicta') .'<a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">'. esc_html__( 'Google API Key', 'benedicta') .'</a>',
				'default'	=> ''
			),
			array(
				'id'		=> 'section-google_maps_api-end',
				'type'		=> 'section',
				'indent'	=> false,
			),

			array(
				'id'		=> 'section-codefield-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Custom Code Fields', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'custom-js',
				'type'		=> 'ace_editor',
				'title'		=> esc_html__( 'JS Code', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Paste your custom JS code here.', 'benedicta' ),
				'mode'		=> 'javascript',
				'theme'		=> 'monokai',
				'desc'		=> '',
				'default'	=> ''
			),
			array(
				'id'		=> 'section-codefield-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
		)
	) );
	
	// Theme Layout
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Theme Layout', 'benedicta' ),
		'heading'		=> esc_html__( 'Theme Layout Settings', 'benedicta' ),
		'id'			=> 'theme_layout_settings',
		'subsection'	=> true,
		'fields'		=> array(
			array(
				'id'		=> 'section-theme_layout-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Theme Layout', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'theme_layout',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Theme Layout', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select the layout for you site.', 'benedicta' ),
				'options' 	=> array(
								'full-width' 	=> esc_html__( 'Full-Width', 'benedicta' ),
								'boxed' 		=> esc_html__( 'Boxed', 'benedicta' ),
							),
				'default'	=> 'full-width'
			),
			array(
				'id'        => 'theme_bg_image',
				'type'      => 'background',
				'title'     => esc_html__('Theme Background Color / Image', 'benedicta'),
				'subtitle'  => esc_html__('Select the for theme background color or image.', 'benedicta'),
				'required' => array('theme_layout', 'equals', array('boxed')),
				'default'   => array(
									'background-color' => '#696969',
								),
				'transparent' => false,
			),
			array(
				'id'		=> 'theme_boxed_margin',
				'type'		=> 'slider',
				'title'		=> esc_html__( 'Indentation Site', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select margins for the entire site from above and below', 'benedicta' ),
				'required' => array('theme_layout', 'equals', array('boxed')),
				'default'	=> 0,
				'min'		=> 0,
				'step'		=> 10,
				'max'		=> 200,
				'display_value' => 'text'
			),
			array(
				'id'		=> 'section-theme_layout-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
		)
	) );
	
	// Page 404
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Page 404', 'benedicta' ),
		'heading'		=> esc_html__( 'Page 404 Settings', 'benedicta' ),
		'id'			=> 'page404_settings',
		'subsection'	=> true,
		'fields'		=> array(
			array(
				'id'		=> 'section-page404-start',
				'type'		=> 'section',
				'title'		=> '',
				'indent'	=> true,
			),
			array(
				'id'		=> 'page404_subtitle',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Subtitle', 'benedicta' ),
				'default'	=> 'Page not found'
			),
			array(
				'id'		=> 'page404_descr',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Description', 'benedicta' ),
				'default'	=> 'The page requested could not be found. This could be a spelling error in the URL or a removed page.'
			),
			array(
				'id'		=> 'section-page404-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
		)
	) );
	
	
	//	Typography
    Redux::setSection( $opt_name, array(
        'title'			=> esc_html__( 'Typography', 'benedicta' ),
		'heading'		=> esc_html__('Typography Settings', 'benedicta'),
        'id'			=> 'typography',
        'icon'			=> 'el el-font',
        'fields'		=> array(
            array(
				'id'		=> 'section-main-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Main font', 'benedicta' ),
				'indent'	=> true,
			),
			array(
                'id'		=> 'body-font',
                'type'		=> 'typography',
                'title'		=> esc_html__( 'Body Font', 'benedicta' ),
                'subtitle'	=> esc_html__( 'Specify the body font properties.', 'benedicta' ),
                'google'	=> true,
				'preview'	=> false,
				'output'	=> array( 'body' ),
                'compiler'	=> array( 'body' ),
				'text-transform' => true,
				'text-align' => false,
				'subsets' => false,
				'letter-spacing' => true,
                'default'	=> array(
                    'font-family'	=> 'Arvo',
                    'text-transform' => 'none',
					'font-weight'	=> '400',
					'line-height'	=> '32px',
                    'font-size'		=> '18px',
					'color'			=> '#333333',
					'letter-spacing' => '0px'
                ),
            ),
			array(
				'id'		=> 'section-main-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
			array(
				'id'		=> 'section-heading-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Heading font', 'benedicta' ),
				'indent'	=> true,
			),
            array(
                'id'		=> 'h1-font',
                'type'		=> 'typography',
                'title'		=> esc_html__( 'Heading 1', 'benedicta' ),
                'google'	=> true,
                'letter-spacing' => true,
                'preview'	=> false,
                'all_styles' => true,
                'output'	=> array( 'h1' ),
                'compiler'	=> array( 'h1' ),
                'default'	=> array(
                    'font-family'	=> 'Oswald',
					'font-weight'	=> '300',
					'line-height'	=> '98px',
					'font-size'		=> '84px',
					'color'			=> '#333333',
					'letter-spacing' => '0px'
                ),
            ),
			array(
                'id'		=> 'h2-font',
                'type'		=> 'typography',
                'title'		=> esc_html__( 'Heading 2', 'benedicta' ),
                'google'	=> true,
                'letter-spacing' => true,
                'preview'	=> false,
                'all_styles' => true,
                'output'	=> array( 'h2' ),
                'compiler'	=> array( 'h2' ),
                'default'	=> array(
                    'font-family' 	=> 'Oswald',
					'font-weight' 	=> '300',
					'line-height' 	=> '86px',
					'font-size' 	=> '72px',
					'color' 		=> '#333333',
					'letter-spacing' => '0px'
                ),
            ),
			array(
                'id' 		=> 'h3-font',
                'type' 		=> 'typography',
                'title' 	=> esc_html__( 'Heading 3', 'benedicta' ),
                'google' 	=> true,
                'letter-spacing' => true,
                'preview' 	=> false,
                'all_styles' => true,
                'output' 	=> array( 'h3' ),
                'compiler' 	=> array( 'h3' ),
                'default' 	=> array(
                    'font-family' 	=> 'Oswald',
					'font-weight' 	=> '300',
					'line-height' 	=> '74px',
					'font-size' 	=> '60px',
					'color' 		=> '#333333',
					'letter-spacing' => '0px'
                ),
            ),
			array(
                'id' 		=> 'h4-font',
                'type' 		=> 'typography',
                'title' 	=> esc_html__( 'Heading 4', 'benedicta' ),
                'google' 	=> true,
                'letter-spacing' => true,
                'preview' 	=> false,
                'all_styles' => true,
                'output' 	=> array( 'h4' ),
                'compiler' 	=> array( 'h4' ),
                'default' 	=> array(
                    'font-family' 	=> 'Oswald',
					'font-weight' 	=> '300',
					'line-height' 	=> '62px',
					'font-size' 	=> '48px',
					'color' 		=> '#333333',
					'letter-spacing' => '0px'
                ),
            ),
			array(
                'id' 		=> 'h5-font',
                'type' 		=> 'typography',
                'title' 	=> esc_html__( 'Heading 5', 'benedicta' ),
                'google' 	=> true,
                'letter-spacing' => true,
                'preview' 	=> false,
                'all_styles' => true,
                'output' 	=> array( 'h5' ),
                'compiler' 	=> array( 'h5' ),
                'default' 	=> array(
                    'font-family' 	=> 'Oswald',
					'font-weight' 	=> '300',
					'line-height' 	=> '50px',
					'font-size' 	=> '36px',
					'color' 		=> '#333333',
					'letter-spacing' => '0px'
                ),
            ),
			array(
                'id' 		=> 'h6-font',
                'type' 		=> 'typography',
                'title' 	=> esc_html__( 'Heading 6', 'benedicta' ),
                'google' 	=> true,
                'letter-spacing' => true,
                'preview' 	=> false,
                'all_styles' => true,
                'output' 	=> array( 'h6' ),
                'compiler' 	=> array( 'h6' ),
                'default' 	=> array(
                    'font-family' 	=> 'Oswald',
					'font-weight' 	=> '300',
					'line-height' 	=> '38px',
					'font-size' 	=> '24px',
					'color' 		=> '#333333',
					'letter-spacing' => '0px'
                ),
            ),
			array(
				'id'		=> 'section-heading-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
			array(
				'id'		=> 'section-blog-content-font-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Blog Content', 'benedicta' ),
				'indent'	=> true,
			),
			array(
                'id'		=> 'blog_content_font',
                'type'		=> 'typography',
                'title'		=> esc_html__( 'Post Content Font', 'benedicta' ),
                'subtitle'	=> esc_html__( 'Specify the post font properties.', 'benedicta' ),
                'google'	=> true,
				'preview'	=> false,
				'output'	=> array( '.single-post-content p' ),
                'compiler'	=> array( '.single-post-content p' ),
                'default'	=> array(
                   'font-family' 	=> 'Arvo',
					'font-weight' 	=> '400',
					'line-height' 	=> '32px',
					'font-size' 	=> '18px',
					'color' 		=> '#333333',
					'letter-spacing' => '0px'
                ),
            ),
			array(
				'id'		=> 'section-blog-content-font-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
        )
    ) );
	
	
	// Color Selection
    Redux::setSection( $opt_name, array(
        'title'			=> esc_html__( 'Colors', 'benedicta' ),
		'heading'		=> esc_html__('Colors Settings', 'benedicta'),
        'id'			=> 'color',
		'icon'			=> 'el el-brush',
        'fields'		=> array(
            array(
				'id' 		=> 'section-theme-color-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Theme Color', 'benedicta' ),
				'indent'	=> true,
			),
			array(
                'id'		=> 'theme_color',
                'type'		=> 'color',
				'transparent' => false,
                'output'	=> array( '.theme_color' ),
                'title'		=> esc_html__( 'Default Theme Color', 'benedicta' ),
                'subtitle'	=> esc_html__( 'Pick a color for the theme (default: #d3ab55).', 'benedicta' ),
                'default'	=> '#d3ab55',
            ),
			array(
				'id'		=> 'section-theme-color-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
        ),
    ) );
	
	
	// Header
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Header', 'benedicta' ),
		'heading'		=> '',
		'id'			=> 'header',
		'icon'			=> 'dashicons dashicons-align-center',
		'fields'		=> array(

/* Header Settings */
            array(
                'id'        => 'section-header_settings-start',
                'type'      => 'section',
                'title'     => esc_html__( 'Header Settings', 'benedicta' ),
                'indent'    => true,
            ),
            array(
                'id'        => 'onepage_menu',
                'type'      => 'switch',
                'title'     => esc_html__( 'One Page Menu', 'benedicta' ),
                'default'   => '0',
            ),
            array(
                'id'        => 'section-header_settings-end',
                'type'      => 'section',
                'indent'    => false,
            ),

			array(
				'id'		=> 'section-header_styles-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Header Styles', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'header-layout',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Header Layout', 'benedicta' ),
				'subtitle'	=> esc_html__( 'You can choose between a header full width style menu or a boxed style menu.', 'benedicta' ),
				'options'	=> array(
								'full_width'	=> esc_html__( 'Full Width', 'benedicta' ),
								'boxed'			=> esc_html__( 'Boxed', 'benedicta' ),
								'left_fixed'	=> esc_html__( 'Left Fixed', 'benedicta' )
							),
				'default'	=> 'full_width'
			),
			array(
				'id'		=> 'header_sticky',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Header Sticky', 'benedicta' ),
				'subtitle'	=> esc_html__( 'You can choose between a header full width style menu or a boxed style menu.', 'benedicta' ),
				'required' 	=> array('header-layout', 'equals', array('full_width','boxed')),
				'options'	=> array(
								''			=> esc_html__( 'not Sticky', 'benedicta' ),
								'fixed'		=> esc_html__( 'Always Sticky', 'benedicta' ),
								'headroom'	=> esc_html__( 'Appearance only on scroll top', 'benedicta' )
							),
				'default'	=> 'headroom'
			),
			array(
				'id'		=> 'header_type',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__( 'Header Type', 'benedicta' ),
				'required' 	=> array('header-layout', 'equals', array('full_width','boxed')),
				'options' 	=> array(
					'1' 	=> array('alt' => esc_html__('Default', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/header_type1.jpg'),
					'2' 	=> array('alt' => esc_html__('Sandwich Button', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/header_type2.jpg'),
					'3' 	=> array('alt' => esc_html__('Centered', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/header_type3.jpg'),
					'4' 	=> array('alt' => esc_html__('Logo in Menu', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/header_type4.jpg'),
				),
				'default' 	=> '3'
			),
			array(
				'id'		=> 'header_bg_style',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Header Background Style', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select a background style for the header.', 'benedicta' ),
				'required' 	=> array('header-layout', 'equals', array('full_width','boxed')),
				'options'	=> array(
								'gradient'	=> esc_html__( 'Gradient', 'benedicta' ),
								'bgcolor'	=> esc_html__( 'Background Color', 'benedicta' ),
								'bgline'	=> esc_html__( 'Bottom Line', 'benedicta' ),
							),
				'default'	=> 'bgline'
			),
			array(
				'id'		=> 'header_bgcolor',
				'type'		=> 'color',
				'title'		=> esc_html__( 'Header Background Color or Bottom Line color', 'benedicta' ), 
				'subtitle'	=> esc_html__( 'Pick a color for the header background or background for bottom line.', 'benedicta' ),
				'required'	=> array(
									array('header_bg_style', 'equals', array('bgcolor', 'bgline') ),
									array('header-layout', 'equals', array('full_width','boxed')),
								),
				'default'	=> '#ffffff',
				'transparent' => false,
				'validate'	=> 'color',
			),
			array(
				'id'		=> 'header_bgcolor_opacity',
				'type'		=> 'slider',
				'title'		=> esc_html__( 'Header Background Color Opacity or Bottom Line', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Pick a opacity for the header background color or for bottom line.', 'benedicta' ),
				'required'	=> array(
									array('header_bg_style', 'equals', array('bgcolor', 'bgline')),
									array('header-layout', 'equals', array('full_width','boxed')),
								),
				'min'		=> 0,
				'step'		=> 1,
				'max'		=> 99,
				'default'	=> 95,
				'display_value' => 'text'
			),
			array(
				'id'		=> 'header_gradient',
				'type'		=> 'color_gradient',
				'title'		=> esc_html__( 'Header Gradient Color', 'benedicta' ), 
				'subtitle'	=> esc_html__( 'Pick a gradient colors for the header text color.', 'benedicta' ),
				'required'	=> array(
									array('header_bg_style', 'equals', array('gradient') ),
									array('header-layout', 'equals', array('full_width','boxed')),
								),
				'default'   => array(
							'from'      => 'transparent',
                            'to'        => 'transparent',
				),
				'transparent' => true,
				'validate'	=> 'color',
			),
			array(
				'id'		=> 'header_color',
				'type'		=> 'color',
				'title'		=> esc_html__( 'Header Text Color', 'benedicta' ), 
				'subtitle'	=> esc_html__( 'Pick a color for the header text color. Tagline text, social icons color, Creative Menu button', 'benedicta' ),
				'required' 	=> array('header-layout', 'equals', array('full_width','boxed')),
				'default'	=> '#ffffff',
				'transparent' => false,
				'validate'	=> 'color',
			),
			array(
				'id'		=> 'header_fixed_bgcolor',
				'type'		=> 'color',
				'title'		=> esc_html__( 'Fixed Header Background', 'benedicta' ), 
				'subtitle'	=> esc_html__( 'Pick a color for the header background when fixed style.', 'benedicta' ),
				'required' 	=> array('header-layout', 'equals', array('full_width','boxed')),
				'default'	=> '#353330',
				'transparent' => false,
				'validate'	=> 'color',
			),
			
/* if Header Left Fixed */
			array(
				'id'		=> 'header_left_bgcolor',
				'type'		=> 'color',
				'title'		=> esc_html__( 'Header Background Color', 'benedicta' ), 
				'subtitle'	=> esc_html__( 'Pick a color for the header background color.', 'benedicta' ),
				'required'	=> array( 'header-layout', '=', 'left_fixed' ),
				'default'	=> '#222222',
				'transparent' => false,
				'validate'	=> 'color',
			),
			array(
				'id'		=> 'header_left_align',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Elements Alignment', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select the alignment of the elements for the left header', 'benedicta' ),
				'required'	=> array( 'header-layout', '=', 'left_fixed' ),
				'options'	=> array(
								'left'		=> esc_html__( 'Left', 'benedicta' ),
								'center'	=> esc_html__( 'Center', 'benedicta' ),
								'right'		=> esc_html__( 'Right', 'benedicta' ),
							),
				'default'	=> 'left'
			),

			array(
				'id'		=> 'section-header_styles-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
			
/* Tag Line */			
			array(
				'id'		=> 'section-tagline-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Tagline Area Settings', 'benedicta' ),
				'required' 	=> array(
									array('header_type', 'equals', array('1', '4')),
									array('header-layout', 'equals', array('full_width','boxed'))
								),
				'indent'	=> true,
			),
			array(
				'id'		=> 'tagline_area',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Tagline Area', 'benedicta' ),
				'default'	=> '0',
			),
			array(
				'id'		=> 'tagline_type',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Tagline Type', 'benedicta' ),
				'required'	=> array( 'tagline_area', '=', '1' ),
				'options'	=> array(
								'contacts'	=> esc_html__( 'Contacts Info', 'benedicta' ),
								'menu'		=> esc_html__( 'Tagline Menu', 'benedicta' ),
							),
				'default'	=> 'contacts',
			),
			array(
				'id'		=> 'tagline_area_phone',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Phone Number', 'benedicta' ),
				'required'	=> array(
									array( 'tagline_area', '=', '1' ),
									array( 'tagline_type', '=', 'contacts' ),
								),
				'default'	=> '1-800-985-357',
			),
			array(
				'id'		=> 'tagline_area_email',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Email Address', 'benedicta' ),
				'required'	=> array(
									array( 'tagline_area', '=', '1' ),
									array( 'tagline_type', '=', 'contacts' ),
								),
				'default'	=> 'hello@example.com',
			),
			array(
				'id'		=> 'tagline_address',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Address', 'benedicta' ),
				'required'	=> array(
									array( 'tagline_area', '=', '1' ),
									array( 'tagline_type', '=', 'contacts' ),
								),
				'default'	=> '15 Avenue Street, Holly Building, California, USA',
			),
			array(
				'id'		=> 'tagline_time',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Working Hours', 'benedicta' ),
				'required'	=> array(
									array( 'tagline_area', '=', '1' ),
									array( 'tagline_type', '=', 'contacts' ),
								),
				'default'	=> 'Mn - St: 10:00am - 20:00pm Sn: 10:00am – 17:00pm',
			),
			array(
				'id'		=> 'section-tagline-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
			
			array(
				'id'		=> 'section-logo-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Theme Logo', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'header-logo',
				'type'		=> 'media',
				'title'		=> esc_html__( 'Upload Standard Logo', 'benedicta' ),
				'compiler'	=> 'true',
				'desc'		=> esc_html__( 'Upload your header logo.', 'benedicta' ),
				'default'	=> array('url' => get_template_directory_uri() . '/assets/images/logo.png'),
			),
			array(
				'id'		=> 'header-logo-retina',
				'type'		=> 'media',
				'title'		=> esc_html__( 'Retina Logo', 'benedicta' ),
				'compiler'	=> 'true',
				'desc'		=> esc_html__( 'Upload your header retina logo.', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Note: You retina logo must be larger than 2x. Example: Main logo 120x200 then Retina must be 240x400.', 'benedicta' ),
				'default'	=> '',
			),
			array(
				'id'		=> 'header-logo-width',
				'type'		=> 'slider',
				'title'		=> esc_html__( 'Standard Logo Width', 'benedicta' ),
				'subtitle'	=> esc_html__( 'You need to insert Non retina logo width. Height auto.', 'benedicta' ),
				'min'		=> 0,
				'step'		=> 1,
				'max'		=> 300,
				'default'	=> 134,
				'display_value' => 'text'
			),
			array(
				'id'		=> 'section-logo-end',
				'type'		=> 'section',
				'indent'	=> false,
			),

/* Header Elements */
			array(
				'id'		=> 'section-header_elements-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Header Elements', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'header_social_links',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Social Links', 'benedicta' ),
				'default'	=> '0'
			),
			array(
				'id'		=> 'header_social_links_position',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Social Icons Position', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select the social icons position at the header', 'benedicta' ),
				'required'	=> array(
									array( 'header_social_links', '=', '1' ),
									array( 'header_type', '=', '1' )
								),
				'options'	=> array(
								'tagline'	=> esc_html__( 'Tagline', 'benedicta' ),
								'menuline'	=> esc_html__( 'Menu Line', 'benedicta' ),
							),
				'default'	=> 'tagline'
			),
			array(
				'id'		=> 'header_copyright',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Copyright in the Fixed Menu', 'benedicta' ),
				'required'	=> array('header_type', '=', '2'),
				'default'	=> '0'
			),
			array(
				'id'		=> 'header_left_copyright',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Copyright in the Fixed Menu', 'benedicta' ),
				'required'	=> array('header-layout', '=', 'left_fixed'),
				'default'	=> '0'
			),
			array(
				'id'		=> 'header_search',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Header Search', 'benedicta' ),
				'default'	=> '0'
			),
			array(
				'id'		=> 'header_search_position',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Search Icon Position', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select the search icon position at the header', 'benedicta' ),
				'required'	=> array(
									array( 'header_search', '=', '1' ),
									array( 'header_type', '=', '1' )
								),
				'options'	=> array(
								'tagline'	=> esc_html__( 'Tagline', 'benedicta' ),
								'menuline'	=> esc_html__( 'Menu Line', 'benedicta' ),
							),
				'default'	=> 'menuline'
			),
			array(
				'id'		=> 'header_phone_big',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Header Phone at menu line', 'benedicta' ),
				'required'	=> array('header_type', 'equals', '1'),
				'default'	=> '0'
			),
			array(
				'id'		=> 'header_phone_big_txt',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Phone', 'benedicta' ),
				'required' 	=> array('header_phone_big', '=', '1'),
				'default'	=> '1-800-985-357'
			),
			array(
				'id'		=> 'header_btn',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Header Button', 'benedicta' ),
				'required'	=> array('header_type', 'equals', '1'),
				'default'	=> '0'
			),
			array(
				'id'		=> 'header_btn_txt',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Button Text', 'benedicta' ),
				'required' 	=> array('header_btn', '=', '1'),
				'default'	=> 'Contacs Us'
			),
			array(
				'id'		=> 'header_btn_url',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Button Url', 'benedicta' ),
				'required' 	=> array('header_btn', '=', '1'),
				'default'	=> '#'
			),
			array(
				'id'		=> 'lang_switcher',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Language Switcher', 'benedicta' ),
				'default'	=> '0'
			),
			array(
				'id'		=> 'lang_switcher_position',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Language Switcher Position', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select the language switcher position at the header', 'benedicta' ),
				'required'	=> array(
									array( 'header_type', '=', '1' ),
									array( 'lang_switcher', '=', '1' )
								),
				'options'	=> array(
								'tagline'	=> esc_html__( 'Tagline', 'benedicta' ),
								'menuline'	=> esc_html__( 'Menu Line', 'benedicta' ),
							),
				'default'	=> 'menuline'
			),
			array(
				'id'		=> 'section-header_elements-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
		)
	) );
	
	
	// Header Menu
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Header Menu', 'benedicta' ),
		'heading'		=> '',
		'id'			=> 'header_menu',
		'subsection'	=> true,
		'fields'		=> array(
			array(
				'id'     	=> 'section-menustyle-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Menu Styles', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'		=> 'menu_position',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Menu Position', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select the Primary Menu position at the header', 'benedicta' ),
				'required' 	=> array(
                                    array( 'header-layout', 'equals', array('full_width','boxed') ),
                                    array( 'header_type', 'equals', '1' )
                                ),
				'options'	=> array(
								'pull-left'		=> esc_html__( 'Left', 'benedicta' ),
								'text-center'	=> esc_html__( 'Center', 'benedicta' ),
								'pull-right'	=> esc_html__( 'Right', 'benedicta' ),
							),
				'default'	=> 'pull-right'
			),
			array(
				'id'     => 'section-menustyle-end',
				'type'   => 'section',
				'indent' => false,
			),

			array(
				'id'     	=> 'section-headermenu-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Style Menu Items', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
                'id'		=> 'headermenu_font',
                'type'		=> 'typography',
                'title'		=> esc_html__( 'Main Menu Items', 'benedicta' ),
				'subtitle'  => esc_html__('Styles for the main menu items', 'benedicta'),
                'google'	=> true,
                'letter-spacing' => true,
                'preview'	=> false,
                'all_styles' => false,
				'text-transform' => true,
				'text-align' => false,
				'subsets' => false,
                'default'	=> array(
                    'font-family'	=> 'Oswald',
					'text-transform' => 'uppercase',
					'font-weight'	=> '600',
					'line-height'	=> '26px',
					'font-size'		=> '12px',
					'color'			=> '#ffffff',
					'letter-spacing' => '1px'
                ),
            ),
			array(
				'id'        => 'headermenu_hover_color',
				'type'      => 'color',
				'title'     => esc_html__('Hover Color', 'benedicta'),
				'subtitle'  => esc_html__('The color of the text when you hover on the main menu items', 'benedicta'),
				'default'   => '#d3ab55',
				'transparent' => false,
			),
			array(
                'id'		=> 'headersubmenu_font',
                'type'		=> 'typography',
                'title'		=> esc_html__( 'Sub Menu Items', 'benedicta' ),
				'subtitle'  => esc_html__('Styles for the main sub menu items', 'benedicta'),
                'google'	=> true,
                'letter-spacing' => true,
                'preview'	=> false,
                'all_styles' => false,
				'text-transform' => true,
				'text-align' => false,
				'subsets' => false,
                'default'	=> array(
                    'font-family'	=> 'Oswald',
					'text-transform' => 'uppercase',
					'font-weight'	=> '500',
					'line-height'	=> '26px',
					'font-size'		=> '9px',
					'color'			=> '#ffffff',
					'letter-spacing' => '1px'
                ),
            ),
			array(
				'id'        => 'headersubmenu_bgcolor',
				'type'      => 'color',
				'title'     => esc_html__('Background Color', 'benedicta'),
				'subtitle'  => esc_html__('Background for drop-down menu', 'benedicta'),
				'required' 	=> array('header-layout', 'equals', array('full_width','boxed')),
				'default'   => '#353330',
				'transparent' => false,
			),
			array(
				'id'        => 'headersubmenu_hover_bgcolor',
				'type'      => 'color',
				'title'     => esc_html__('Hover Background Color', 'benedicta'),
				'subtitle'  => esc_html__('Background of the text when you hover or active on the menu items', 'benedicta'),
				'required' 	=> array('header-layout', 'equals', array('full_width','boxed')),
				'default'   => '#2c2a27',
				'transparent' => false,
			),
			array(
				'id'     => 'section-headermenu-end',
				'type'   => 'section',
				'indent' => false,
			),
		)
	) );
	
	
	// Page Title
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Page Title', 'benedicta' ),
		'heading'		=> '',
		'id'			=> 'pagetitle',
		'icon'			=> 'dashicons dashicons-editor-insertmore',
		'fields'		=> array(
			array(
				'id'     	=> 'section-pagetitle-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Page Title Styles', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'        => 'pagetitle',
				'type'      => 'select',
				'title'     => esc_html__('Show Page Title?', 'benedicta'),
				'subtitle'  => esc_html__('Turn on to show the page title.', 'benedicta'),
				'options' => array(
					'show' => esc_html__( 'Show', 'benedicta' ),
					'hide' => esc_html__( 'Hide', 'benedicta' ),
				),
				'default' => 'show',
			),
			array(
				'id'        => 'pagetitle_bg_image',
				'type'      => 'background',
				'title'     => esc_html__('Page Title Background Color / Image', 'benedicta'),
				'subtitle'  => esc_html__('Select the Title background color or image.', 'benedicta'),
				'required' => array('pagetitle', 'equals', array('show')),
				'default'   => array(
									'background-color' => '#111111',
								),
				'transparent' => false,
			),
			array(
				'id'        => 'pagetitle_bg_image_parallax',
				'type'      => 'select',
				'title'     => esc_html__('Parallax Effect', 'benedicta'),
				'subtitle'  => esc_html__('Enable this to the parallax effect for background image.', 'benedicta'),
				'options' => array(
					'disable' => esc_html__( 'Disable', 'benedicta' ),
					'enable' => esc_html__( 'Enable', 'benedicta' ),
				),
				'default' => 'disable',
			),
			array(
				'id'        => 'pagetitle_text_color',
				'type'      => 'color',
				'title'     => esc_html__('Title Text Color', 'benedicta'),
				'subtitle'  => esc_html__('Title text color (default: #ffffff).', 'benedicta'),
				'required' => array('pagetitle', 'equals', array('show')),
				'default'   => '#ffffff',
				'transparent' => false,
			),
			array(
				'id'     => 'section-pagetitle-end',
				'type'   => 'section',
				'indent' => false,
			),
			array(
				'id'     	=> 'section-breadcrumbs-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Breadcrumbs Styles', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'        => 'breadcrumbs',
				'type'      => 'select',
				'title'     => esc_html__('Show breadcrumbs?', 'benedicta'),
				'subtitle'  => esc_html__('Turn on to show the breadcrumbs in the title.', 'benedicta'),
				'options' => array(
					'show' => esc_html__( 'Show', 'benedicta' ),
					'hide' => esc_html__( 'Hide', 'benedicta' ),
				),
				'default' => 'hide',
			),
			array(
				'id'        => 'breadcrumbs_color',
				'type'      => 'color',
				'title'     => esc_html__('Breadcrumbs Text Color', 'benedicta'),
				'subtitle'  => esc_html__('Breadcrumbs text color (default: #ffffff).', 'benedicta'),
				'required' => array('breadcrumbs', 'equals', array('show')),
				'default'   => '#ffffff',
				'transparent' => false,
			),
			array(
				'id'     => 'section-breadcrumbs-end',
				'type'   => 'section',
				'indent' => false,
			),
		)
	) );
	
	
	// Blog
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Blog', 'benedicta' ),
		'heading'		=> esc_html__( 'Default Blog Settings', 'benedicta' ),
		'id'			=> 'blog',
		'icon'			=> 'dashicons dashicons-welcome-write-blog',
		'fields'		=> array(
			array(
				'id'     	=> 'section-blog-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Blog Title Styles', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'        => 'blog_pagetitle',
				'type'      => 'select',
				'title'     => esc_html__('Show Page Title?', 'benedicta'),
				'subtitle'  => esc_html__('Turn on to show the page title.', 'benedicta'),
				'options' => array(
					'show' => esc_html__( 'Show', 'benedicta' ),
					'hide' => esc_html__( 'Hide', 'benedicta' ),
				),
				'default' => 'show',
			),
			array(
				'id'        => 'blog_pagetitle_bg_image',
				'type'      => 'background',
				'title'     => esc_html__('Page Title Background Color / Image', 'benedicta'),
				'subtitle'  => esc_html__('Select the Title background color or image.', 'benedicta'),
				'required' => array('blog_pagetitle', 'equals', array('show')),
				'transparent' => false,
			),
			array(
				'id'        => 'blog_pagetitle_text_color',
				'type'      => 'color',
				'title'     => esc_html__('Title Text Color', 'benedicta'),
				'subtitle'  => esc_html__('Title text color (default: #212e4e).', 'benedicta'),
				'required' => array('blog_pagetitle', 'equals', array('show')),
				'default'   => '',
				'transparent' => false,
			),
			array(
				'id'		=> 'blog_pagetitle_text',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Blog Title', 'benedicta' ),
				'required' => array('blog_pagetitle', 'equals', array('show')),
				'default'	=> 'Blog Classic'
			),
			array(
				'id'		=> 'blog_pagetitle_subtext',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Blog Subheading', 'benedicta' ),
				'required' => array('blog_pagetitle', 'equals', array('show')),
				'default'	=> 'Our Best Posts'
			),
			array(
				'id'		=> 'blog_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__( 'Blog Layout', 'benedicta' ),
				'options' 	=> array(
					'no-sidebar' 		=> array('alt' => esc_html__('No Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/no-sidebar.png'),
					'right-sidebar' 	=> array('alt' => esc_html__('Right Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/right-sidebar.png'),
					'left-sidebar' 		=> array('alt' => esc_html__('Left Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/left-sidebar.png'),
				),
				'default' 	=> 'right-sidebar'
			),
			array(
				'id'     => 'section-blog-end',
				'type'   => 'section',
				'indent' => false,
			),
			
			array(
				'id'     	=> 'section-blog_posts_elements-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Blog Post Elements', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'		=> 'blog_element_author',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Post Author', 'benedicta' ),
				'subtitle'	=> esc_html__( 'show the author name of this post in the meta tags?', 'benedicta' ),
				'default'	=> '1',
			),
			array(
				'id'		=> 'blog_element_comments',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Post Comments', 'benedicta' ),
				'subtitle'	=> esc_html__( 'show the counter of comments for this post in the meta tags?', 'benedicta' ),
				'default'	=> '1',
			),
			array(
				'id'		=> 'blog_element_likes',
				'type'		=> 'switch',
				'title'		=> esc_html__( 'Post Likes', 'benedicta' ),
				'subtitle'	=> esc_html__( 'show the counter of likes for this post in the meta tags?', 'benedicta' ),
				'default'	=> '1',
			),
			array(
				'id'     => 'section-blog_posts_elements-end',
				'type'   => 'section',
				'indent' => false,
			),
		)
	) );
	
	
	// Single Post
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Single Post', 'benedicta' ),
		'heading'		=> esc_html__( 'Single Post Settings', 'benedicta' ),
		'id'			=> 'single_post',
		'subsection'	=> true,
		'fields'		=> array(
			array(
				'id'     	=> 'section-blogsingle-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Single Post Title Styles', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'		=> 'blogsingle_layout',
				'type' 		=> 'image_select',
				'title' 	=> esc_html__( 'Single Post Layout', 'benedicta' ),
				'options' 	=> array(
					'no-sidebar' 		=> array('alt' => esc_html__('No Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/no-sidebar.png'),
					'right-sidebar' 	=> array('alt' => esc_html__('Right Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/right-sidebar.png'),
					'left-sidebar' 		=> array('alt' => esc_html__('Left Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/left-sidebar.png'),
				),
				'default' 	=> 'left-sidebar'
			),
			array(
				'id'     => 'section-blogsingle-end',
				'type'   => 'section',
				'indent' => false,
			),
			array(
				'id'     	=> 'section-blogsingle-sharebox-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Social sharing box icons', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id' => 'single_post_sharebox',
				'type' => 'switch',
				'title' => esc_html__( 'Sharebox', 'benedicta' ),
				'subtitle' => esc_html__( 'Enable social share-box on single post view?', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_sharebox_facebook',
				'type' => 'switch',
				'title' => esc_html__( 'Facebook', 'benedicta' ),
				'required' => array( 'single_post_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Facebook in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_sharebox_twitter',
				'type' => 'switch',
				'title' => esc_html__( 'Twitter', 'benedicta' ),
				'required' => array( 'single_post_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Twitter in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_sharebox_linkedin',
				'type' => 'switch',
				'title' => esc_html__( 'LinkedIn', 'benedicta' ),
				'required' => array( 'single_post_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable LinkedIn in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_sharebox_reddit',
				'type' => 'switch',
				'title' => esc_html__( 'Reddit', 'benedicta' ),
				'required' => array( 'single_post_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Reddit in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_sharebox_digg',
				'type' => 'switch',
				'title' => esc_html__( 'Digg', 'benedicta' ),
				'required' => array( 'single_post_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Digg in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_sharebox_delicious',
				'type' => 'switch',
				'title' => esc_html__( 'Delicious', 'benedicta' ),
				'required' => array( 'single_post_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Delicious in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_sharebox_google',
				'type' => 'switch',
				'title' => esc_html__( 'Google plus', 'benedicta' ),
				'required' => array( 'single_post_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Google plus in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_sharebox_pinterest',
				'type' => 'switch',
				'title' => esc_html__( 'Pinterest', 'benedicta' ),
				'required' => array( 'single_post_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Pinterest in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id'     => 'section-blogsingle-sharebox-end',
				'type'   => 'section',
				'indent' => false,
			),
			array(
				'id'     	=> 'section-blogsingle-elements-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Single Post Elements', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id' => 'single_post_author',
				'type' => 'switch',
				'title' => esc_html__( 'Author Box', 'benedicta' ),
				'subtitle' => esc_html__( 'Enable Author Box on single post view?', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_navigation',
				'type' => 'switch',
				'title' => esc_html__( 'Post Navigation', 'benedicta' ),
				'subtitle' => esc_html__( 'Enable Navigation on single post view?', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_related_posts',
				'type' => 'switch',
				'title' => esc_html__( 'Related Posts', 'benedicta' ),
				'subtitle' => esc_html__( 'Enable Related Posts on single post view?', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'single_post_related_posts_title',
				'type' => 'text',
				'title' => esc_html__( 'Related Posts Title', 'benedicta' ),
				'required' => array( 'single_post_related_posts', '=', '1' ),
				'default' => 'Related Posts'
			),
			array(
				'id'     => 'section-blogsingle-elements-end',
				'type'   => 'section',
				'indent' => false,
			),
		)
	) );
	
	
	//	Portfolio
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Portfolio', 'benedicta' ),
		'heading'		=> esc_html__( 'Portfolio Settings', 'benedicta' ),
		'id'			=> 'portfolio',
		'icon'			=> 'dashicons dashicons-portfolio',
		'fields'		=> array(
			array(
				'id'     	=> 'section-portfolio_list-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'List of portfolio works', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'        => 'portfolio_filter_color',
				'type'      => 'color',
				'title'     => esc_html__('Portfolio Filter Color', 'benedicta'),
				'subtitle'  => esc_html__('Select a color for portfolio filter text', 'benedicta'),
				'default'   => '#000000',
				'transparent' => false,
			),
			array(
				'id'        => 'portfolio_overlay',
				'type'      => 'color',
				'title'     => esc_html__('Portfolio Overlay Color', 'benedicta'),
				'subtitle'  => esc_html__('Select a color for the overlay in portfolio', 'benedicta'),
				'default'   => '#000000',
				'transparent' => false,
			),
			array(
				'id'		=> 'portfolio_overlay_opacity',
				'type'		=> 'slider',
				'title'		=> esc_html__( 'Portfolio Overlay Opacity', 'benedicta' ),
				'subtitle'	=> esc_html__( 'Select opacity for the overlay in portfolio', 'benedicta' ),
				'default'	=> 30,
				'min'		=> 0,
				'step'		=> 1,
				'max'		=> 99,
				'display_value' => 'text'
			),
			array(
				'id'     => 'section-portfolio_list-end',
				'type'   => 'section',
				'indent' => false,
			),
			array(
				'id'     	=> 'section-portfolio_single_title-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Single Portfolio Title', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'        => 'portfolio_single_pagetitle',
				'type'      => 'select',
				'title'     => esc_html__('Show Page Title?', 'benedicta'),
				'subtitle'  => esc_html__('Turn on to show the page title.', 'benedicta'),
				'options' => array(
					'show' => esc_html__( 'Show', 'benedicta' ),
					'hide' => esc_html__( 'Hide', 'benedicta' ),
				),
				'default' => 'show',
			),
			array(
				'id'        => 'portfolio_single_pagetitle_bg_image',
				'type'      => 'background',
				'title'     => esc_html__('Page Title Background Color / Image', 'benedicta'),
				'subtitle'  => esc_html__('Select the Title background color or image.', 'benedicta'),
				'required' => array('portfolio_single_pagetitle', 'equals', array('show')),
				'default'   => array(
									'background-color' => '#696969',
								),
				'transparent' => false,
			),
			array(
				'id'        => 'portfolio_single_pagetitle_text_color',
				'type'      => 'color',
				'title'     => esc_html__('Title Text Color', 'benedicta'),
				'subtitle'  => esc_html__('Title text color (default: #ffffff).', 'benedicta'),
				'required' => array('portfolio_single_pagetitle', 'equals', array('show')),
				'default'   => '#ffffff',
				'transparent' => false,
			),
			array(
				'id'		=> 'portfolio_single_pagetitle_text',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Single Portfolio Title', 'benedicta' ),
				'required' => array('portfolio_single_pagetitle', 'equals', array('show')),
				'default'	=> 'Single Portfolio'
			),
			array(
				'id'		=> 'portfolio_single_pagetitle_subtext',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Single Portfolio Subheading', 'benedicta' ),
				'required' => array('portfolio_single_pagetitle', 'equals', array('show')),
				'default'	=> 'Our Best Work'
			),
			array(
				'id'        => 'portfolio_single_breadcrumbs',
				'type'      => 'select',
				'title'     => esc_html__('Show breadcrumbs?', 'benedicta'),
				'subtitle'  => esc_html__('Turn on to show the breadcrumbs in the title.', 'benedicta'),
				'options' => array(
					'show' => esc_html__( 'Show', 'benedicta' ),
					'hide' => esc_html__( 'Hide', 'benedicta' ),
				),
				'default' => 'hide',
			),
			array(
				'id'     => 'section-portfolio_single_title-end',
				'type'   => 'section',
				'indent' => false,
			),
			array(
				'id'     	=> 'section-portfolio_single-sharebox-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Social sharing box icons', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id' => 'portfolio_single_sharebox',
				'type' => 'switch',
				'title' => esc_html__( 'Sharebox', 'benedicta' ),
				'subtitle' => esc_html__( 'Enable social share-box on single post view?', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'portfolio_single_sharebox_facebook',
				'type' => 'switch',
				'title' => esc_html__( 'Facebook', 'benedicta' ),
				'required' => array( 'portfolio_single_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Facebook in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'portfolio_single_sharebox_twitter',
				'type' => 'switch',
				'title' => esc_html__( 'Twitter', 'benedicta' ),
				'required' => array( 'portfolio_single_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Twitter in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'portfolio_single_sharebox_linkedin',
				'type' => 'switch',
				'title' => esc_html__( 'LinkedIn', 'benedicta' ),
				'required' => array( 'portfolio_single_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable LinkedIn in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'portfolio_single_sharebox_reddit',
				'type' => 'switch',
				'title' => esc_html__( 'Reddit', 'benedicta' ),
				'required' => array( 'portfolio_single_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Reddit in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'portfolio_single_sharebox_digg',
				'type' => 'switch',
				'title' => esc_html__( 'Digg', 'benedicta' ),
				'required' => array( 'portfolio_single_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Digg in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'portfolio_single_sharebox_delicious',
				'type' => 'switch',
				'title' => esc_html__( 'Delicious', 'benedicta' ),
				'required' => array( 'portfolio_single_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Delicious in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'portfolio_single_sharebox_google',
				'type' => 'switch',
				'title' => esc_html__( 'Google plus', 'benedicta' ),
				'required' => array( 'portfolio_single_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Google plus in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id' => 'portfolio_single_sharebox_pinterest',
				'type' => 'switch',
				'title' => esc_html__( 'Pinterest', 'benedicta' ),
				'required' => array( 'portfolio_single_sharebox', '=', '1' ),
				'subtitle' => esc_html__( 'Check to enable Pinterest in social sharing box', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id'     => 'section-portfolio_single-sharebox-end',
				'type'   => 'section',
				'indent' => false,
			),
			array(
				'id'     	=> 'section-portfolio_single-elements-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Single Post Elements', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id' => 'portfolio_single_navigation',
				'type' => 'switch',
				'title' => esc_html__( 'Post Navigation', 'benedicta' ),
				'subtitle' => esc_html__( 'Enable Navigation on single post view?', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id'		=> 'portfolio_single_navigation_backbtn',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Portfolio Page Link', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'link to go to the home page portfolio', 'benedicta' ),
				'default' 	=> ''
			),
			array(
				'id'     => 'section-portfolio_single-elements-end',
				'type'   => 'section',
				'indent' => false,
			),
		)
	) );
	
	
	//	Shop
	Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Shop', 'benedicta' ),
		'heading'		=> '',
		'id'			=> 'shop',
		'icon'			=> 'dashicons dashicons-products',
		'fields'		=> array(
			array(
				'id'     	=> 'section-shop_page_title-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Shop Page Title', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id'        => 'shop_pagetitle',
				'type'      => 'select',
				'title'     => esc_html__('Show Page Title?', 'benedicta'),
				'subtitle'  => esc_html__('Turn on to show the page title.', 'benedicta'),
				'options' => array(
					'show' => esc_html__( 'Show', 'benedicta' ),
					'hide' => esc_html__( 'Hide', 'benedicta' ),
				),
				'default' => 'show',
			),
			array(
				'id'        => 'pageshop_bg_image',
				'type'      => 'background',
				'title'     => esc_html__('Shop Page Title Background Color / Image', 'benedicta'),
				'subtitle'  => esc_html__('Select the for shop page title background color or image.', 'benedicta'),
				'required' => array('shop_pagetitle', 'equals', array('show')),
				'default'   => array(
								'background-color' => '#4c4e50',
							),
				'transparent' => false,
			),
			array(
				'id'        => 'shop_pagetitle_text_color',
				'type'      => 'color',
				'title'     => esc_html__('Title Text Color', 'benedicta'),
				'subtitle'  => esc_html__('Title text color (default: #ffffff).', 'benedicta'),
				'required' => array('shop_pagetitle', 'equals', array('show')),
				'default'   => '#ffffff',
				'transparent' => false,
			),
			array(
				'id'		=> 'shop_pagetitle_text',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Shop Page Title', 'benedicta' ),
				'required' => array('shop_pagetitle', 'equals', array('show')),
				'default'	=> 'Online Store'
			),
			array(
				'id'		=> 'shop_pagetitle_subtext',
				'type'		=> 'text',
				'title'		=> esc_html__( 'Shop Page Subheading', 'benedicta' ),
				'required' => array('shop_pagetitle', 'equals', array('show')),
				'default'	=> 'Start Selling'
			),
			array(
				'id'     => 'section-shop_page_title-end',
				'type'   => 'section',
				'indent' => false,
			),
			
            array(
                'id'        => 'section-shop_page_settings-start',
                'type'      => 'section',
                'title'     => esc_html__( 'Shop Page Settings', 'benedicta' ),
                'indent'    => true,
            ),
            array(
                'id'        => 'shop_layout',
                'type'      => 'image_select',
                'title'     => esc_html__( 'Shop Layout', 'benedicta' ),
                'options'   => array(
                    'no-sidebar'        => array('alt' => esc_html__('No Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/no-sidebar.png'),
                    'right-sidebar'     => array('alt' => esc_html__('Right Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/right-sidebar.png'),
                    'left-sidebar'      => array('alt' => esc_html__('Left Sidebar', 'benedicta'), 'img' => $benedicta_theme_options_url . 'img/left-sidebar.png'),
                ),
                'default'   => 'right-sidebar'
            ),
            array(
                'id' => 'shop_columns',
                'type' => 'select',
                'title' => esc_html__( 'Columns', 'benedicta' ),
                'options' => array(
                    'col2' => esc_html__( '2 Columns', 'benedicta' ),
                    'col3' => esc_html__( '3 Columns', 'benedicta' ),
                    'col4' => esc_html__( '4 Columns', 'benedicta' ),
                ),
                'default' => 'col3',
            ),
            array(
                'id'        => 'products_per_page',
                'type'      => 'text',
                'title'     => esc_html__( 'Products Per Page', 'benedicta' ),
                'default'   => '12'
            ),
            array(
                'id' => 'products_no_padding',
                'type' => 'switch',
                'title' => esc_html__( 'No Paddings', 'benedicta' ),
                'subtitle' => esc_html__( 'enable this option to disable padding between products in product list', 'benedicta' ),
                'default' => '0'
            ),
            array(
                'id' => 'shop_icon',
                'type' => 'switch',
                'title' => esc_html__( 'Cart Iocn', 'benedicta' ),
                'subtitle' => esc_html__( 'enable icon of cart in the header', 'benedicta' ),
                'default' => '1'
            ),
            array(
                'id' => 'products_list_type',
                'type' => 'select',
                'title' => esc_html__( 'Products List Type', 'benedicta' ),
                'options' => array(
                    'type1' => esc_html__( 'Type 1', 'benedicta' ),
                    'type2' => esc_html__( 'Type 2', 'benedicta' ),
                    'type3' => esc_html__( 'Type 3', 'benedicta' ),
                    'type4' => esc_html__( 'Type 4', 'benedicta' ),
                    'type5' => esc_html__( 'Type 5', 'benedicta' ),
                ),
                'default' => 'type3',
            ),
            array(
                'id'     => 'section-shop_page_settings-end',
                'type'   => 'section',
                'indent' => false,
            ),

//  Single Shop Page
            array(
				'id'     	=> 'section-shop_single_settings-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Single Shop Page Settings', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id' => 'shop_single_share',
				'type' => 'switch',
				'title' => esc_html__( 'Share Icons', 'benedicta' ),
				'subtitle' => esc_html__( 'enable this option to hide services for share icons.', 'benedicta' ),
				'default' => '0'
			),
			array(
				'id'     => 'section-shop_single_settings-end',
				'type'   => 'section',
				'indent' => false,
			),

		)
	) );
	
	
	// Footer
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Footer', 'benedicta' ),
		'heading'		=> esc_html__( 'Footer Settings', 'benedicta' ),
		'id'			=> 'footer',
		'icon'			=> 'dashicons dashicons-align-center',
		'fields'		=> array(
			array(
				'id'     	=> 'section-footer_fixed-start',
				'type'   	=> 'section',
				'title' 	=> '',
				'indent' 	=> true,
			),
			array(
				'id' => 'footer_fixed',
				'type' => 'switch',
				'title' => esc_html__( 'Footer Fixed', 'benedicta' ),
				'subtitle' => esc_html__( 'Make fixed footer', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id'		=> 'footer_layout',
				'type'		=> 'select',
				'title'		=> esc_html__( 'Footer Layout', 'benedicta' ),
				'subtitle'	=> esc_html__( 'You can choose between a full width style or a boxed style footer.', 'benedicta' ),
				'options'	=> array(
								'full_width'		=> esc_html__( 'Full Width', 'benedicta' ),
								'boxed'				=> esc_html__( 'Boxed', 'benedicta' )
							),
				'default'	=> 'boxed'
			),
			array(
				'id' => 'footer_backtop',
				'type' => 'switch',
				'title' => esc_html__( 'Footer "Back to Top" button', 'benedicta' ),
				'subtitle' => esc_html__( 'Show/Hide button', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id'     => 'section-footer_fixed-end',
				'type'   => 'section',
				'indent' => false,
			),
			array(
				'id'     	=> 'section-prefooter-background-start',
				'type'   	=> 'section',
				'title' 	=> esc_html__( 'Prefooter Styles', 'benedicta' ),
				'indent' 	=> true,
			),
			array(
				'id' => 'enable_prefooter',
				'type' => 'select',
				'title' => esc_html__( 'Prefooter Area', 'benedicta' ),
				'subtitle' => esc_html__( 'Check this option if you want show prefooter area', 'benedicta' ),
				'options' => array(
					'show' => esc_html__( 'Show', 'benedicta' ),
					'hide' => esc_html__( 'Hide', 'benedicta' ),
				),
				'default' => 'hide',
			),
			array(
				'id'        => 'prefooter_bgcolor',
				'type'      => 'color',
				'title'     => esc_html__( 'Prefooter Background Color', 'benedicta' ), 
				'subtitle'  => esc_html__( 'Please select a color.', 'benedicta' ),
				'required' => array('enable_prefooter', 'equals', array('show')),
				'default'   => '#111111',
				'transparent' => false,
				'validate'  => 'color',
			),
			array(
				'id' => 'prefooter_col',
				'type' => 'image_select',
				'title' => esc_html__( 'Prefooter Columns', 'benedicta' ),
				'subtitle' => esc_html__( 'Choose the number of desired column in the prefooter widget area.', 'benedicta' ),
				'required' => array('enable_prefooter', 'equals', array('show')),
				'options' => array(
					'12' => array('alt' => '1 Columns', 'img' => $benedicta_theme_options_url . 'img/1col.png'),
					'6-6' => array('alt' => '2 Columns', 'img' => $benedicta_theme_options_url . 'img/2col.png'),
					'4-4-4' => array('alt' => '3 Columns', 'img' => $benedicta_theme_options_url . 'img/3col.png'),
					'3-3-3-3' => array('alt' => '4 Columns', 'img' => $benedicta_theme_options_url . 'img/4col.png')
				),
				'default' => '4-4-4'
			),
			array(
                'id'		=> 'prefooter_headings',
                'type'		=> 'typography',
                'title'		=> esc_html__( 'Widgets Hedings', 'benedicta' ),
				'subtitle'  => esc_html__('Styles for the headings of widgets', 'benedicta'),
				'required' => array('enable_prefooter', 'equals', array('show')),
                'google'	=> true,
                'letter-spacing' => true,
                'preview'	=> false,
                'all_styles' => false,
				'text-transform' => true,
				'text-align' => false,
				'subsets' => false,
                'default'	=> array(
                    'font-family'	=> 'Oswald',
					'text-transform' => 'uppercase',
					'font-weight'	=> '300',
					'line-height'	=> '36px',
					'font-size'		=> '18px',
					'color'			=> '#ffffff',
					'letter-spacing' => '0px'
                ),
            ),
			array(
				'id'        => 'prefooter_color',
				'type'      => 'color',
				'title'     => esc_html__( 'Prefooter Text Color', 'benedicta' ), 
				'subtitle'  => esc_html__( 'Please select a color.', 'benedicta' ),
				'required' => array('enable_prefooter', 'equals', array('show')),
				'default'   => '#ffffff',
				'transparent' => false,
				'validate'  => 'color',
			),
			array(
				'id'     => 'section-prefooter-background-end',
				'type'   => 'section',
				'indent' => false,
			),
			array(
				'id'     => 'section-footer-start',
				'type'   => 'section',
				'title' => esc_html__( 'Footer Styles', 'benedicta' ),
				'indent' => true,
			),
			array(
				'id' => 'footer',
				'type' => 'select',
				'title' => esc_html__( 'Footer Area', 'benedicta' ),
				'subtitle' => esc_html__( 'Check this option if you want the footer bottom area.', 'benedicta' ),
				'options' => array(
					'show' => esc_html__( 'Show', 'benedicta' ),
					'hide' => esc_html__( 'Hide', 'benedicta' ),
				),
				'default' => 'show',
			),
			array(
				'id'        => 'footer_bgcolor',
				'type'      => 'color',
				'title'     => esc_html__( 'Footer Background Color', 'benedicta' ), 
				'subtitle'  => esc_html__( 'Please select a color.', 'benedicta' ),
				'required' => array('footer', 'equals', array('show')),
				'default'   => '#1c2947',
				'transparent' => false,
				'validate'  => 'color',
			),
			array(
				'id'        => 'footer_color',
				'type'      => 'color',
				'title'     => esc_html__( 'Footer Text Color', 'benedicta' ), 
				'subtitle'  => esc_html__( 'Please select a color.', 'benedicta' ),
				'required' => array('footer', 'equals', array('show')),
				'default'   => '#ffffff',
				'transparent' => false,
				'validate'  => 'color',
			),
			array(
				'id' => 'footer_copyright',
				'type' => 'textarea',
				'title' => esc_html__( 'Footer Copyright Text', 'benedicta' ),
				'subtitle' => esc_html__( 'Please enter the copyright text.', 'benedicta' ),
				'required' => array('footer', 'equals', array('show')),
				'default' => 'Copyright &#169; 2018 <a href="http://www.evatheme.com/">Evatheme</a>. All Rights Reserved.'
			),
			array(
				'id' => 'footer-social',
				'type' => 'switch',
				'title' => esc_html__( 'Footer Social Icon', 'benedicta' ),
				'subtitle' => esc_html__( 'Check this option if you to add social icons inside the footer.', 'benedicta' ),
				'required' => array('footer', 'equals', array('show')),
				'default' => '1'
			),
			array(
				'id'     => 'section-footer-bootom-end',
				'type'   => 'section',
				'indent' => false,
			),
		)
	) );
	
	
	// Social Icons
    Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'Social Icons', 'benedicta' ),
		'heading'		=> esc_html__( 'Social Icons Settings', 'benedicta' ),
		'id'			=> 'social-icons',
		'icon'			=> 'dashicons dashicons-share',
		'fields'		=> array(
			array(
				'id'		=> 'section-social-icons-start',
				'type'		=> 'section',
				'indent'	=> true,
			),
			array(
				'id'		=> 'facebook_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Facebook', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Facebook icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'twitter_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Twitter', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Twitter icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'linkedin_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'LinkedIn', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for LinkedIn icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'pinterest_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Pinterest', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Pinterest icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'googleplus_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Google Plus+', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Google Plus+ icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'flickr_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Flickr', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Flickr icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'instagram_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Instagram', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Instagram icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'behance_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Behance', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Behance icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> "#"
			),
			array(
				'id'		=> 'youtube_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Youtube', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Youtube icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'vimeo_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Vimeo', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Vimeo icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'rss_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'RSS', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for RSS icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'tumblr_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Tumblr', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Tumblr icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'reddit_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Reddit', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Reddit icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'dribbble_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Dribbble', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Dribbble icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'digg_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Digg', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Digg icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'skype_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Skype', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Skype icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'yahoo_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Yahoo', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Yahoo icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'vk_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'VKontakte', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for VKontakte icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'tripadvisor_link',
				'type'     	=> 'text',
				'title' 	=> esc_html__( 'Tripadvisor', 'benedicta' ),
				'subtitle' 	=> esc_html__( 'Enter the link for Tripadvisor icon to appear. To remove it, just leave it blank.', 'benedicta' ),
				'default' 	=> ""
			),
			array(
				'id'		=> 'section-social-icons-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
		)
	) );
	
	
	//	Sidebars
	$fields = get_option('benedicta_options');
	if (is_array($fields) && array_key_exists ('unlimited_sidebar', $fields)) {
		$options = $fields['unlimited_sidebar'];
		$sidebars =  array();
		if ($options != null) {
			foreach($options as $sidebar) {
				$sidebars[$sidebar] = $sidebar;
			}
		} else {
			$sidebars = null;
		}
	} else {
		$sidebars = null;
	}
		
	Redux::setSection( $opt_name, array(
		'title'			=> esc_html__( 'SideBar', 'benedicta' ),
		'id'			=> 'unlimited-sideBar',
		'customizer_width' => '400px',
        'icon'			=> 'dashicons dashicons-align-left',
		'fields'		=> array(
			array(
				'id'		=> 'sidebars-start',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Sidebar Generator', 'benedicta' ),
				'indent'	=> true,
			),
			array(
				'id'		=> 'info_sidebars',
				'type'		=> 'info',
				'title'		=> esc_html__( 'In this option panel, you can create and add unlimited number of sidebar.', 'benedicta' ) . '<br>' . esc_html__( 'Give a name to your sidebar, add it, then save changes.', 'benedicta' ) . '<br>' . esc_html__( 'Your new created sidebar will appear on the widget page', 'benedicta' ) . ' (<a href="'. admin_url( "widgets.php", "http" ) . '">' . esc_html__( 'widget pages', 'benedicta' ) . '</a>) ' . esc_html__( 'Manage it by adding widget as usual.', 'benedicta' ) . '<br>' . esc_html__( 'To set the sidebar, you will see on post, portfolio and page a custom meta box named Sidebar. Select the name of the desired sidebar that you want to display on the current post/page.', 'benedicta' ),
				'icon'		=> 'el-icon-info-sign',
			),
			array(
				'id'		=> 'sidebars-end',
				'type'		=> 'section',
				'title'		=> esc_html__( 'Sidebar Generator', 'benedicta' ),
				'indent'	=> false,
			),
			array(
				'id'		=> 'sidebars2-start',
				'type'		=> 'section',
				'indent'	=> true,
			),
			array(
				'id'		=> 'unlimited_sidebar',
				'type'		=> 'multi_text',
				'title'		=> esc_html__( 'Sidebar generator', 'benedicta' ),
				'validate'	=> 'no_html',
				'subtitle'	=> esc_html__( 'Enter a name ', 'benedicta' ) . '<strong>' . esc_html__( '(Without special characters)', 'benedicta' ) . '</strong>' . esc_html__( ' for the sidebar, then click on ', 'benedicta' ) . '<i>' . esc_html__( '"add more"', 'benedicta' ) . '</i>' . esc_html__( ' to add a new sidebar.', 'benedicta' ),
				'default'	=> '',
			),
			array(
				'id'		=> 'sidebars-end',
				'type'		=> 'section',
				'indent'	=> false,
			),
			array(
				'id'     => 'section-functions-fixed-sidebar-start',
				'type'   => 'section',
				'title' => esc_html__( 'Fixed Sidebar', 'benedicta' ),
				'indent' => true,
			),
			array(
				'id' => 'func_fixed_sidebar',
				'type' => 'switch',
				'title' => esc_html__( 'Fixed Sidebar (Functions)', 'benedicta' ),
				'subtitle' => esc_html__( 'enable or disable the fixed sidebar function.', 'benedicta' ),
				'default' => '1'
			),
			array(
				'id'     => 'section-functions-fixed-sidebar-end',
				'type'   => 'section',
				'indent' => false,
			),
		)
	) );

	
	Redux::setSection( $opt_name, array(
		'title'			=> '',
		'type'			=> 'divide',
	) );
	
	
	function encodeURIComponent($str) {
		$revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
		return strtr(rawurlencode($str), $revert);
	}
	$theme_doc = '<iframe src="http://benedicta.evatheme.com/docs/" style="width:90%;height:800px"></iframe>';
	
	Redux::setSection( $opt_name, array(
		'icon'			=> 'dashicons dashicons-book-alt',
		'title'			=> esc_html__( 'Documentation', 'benedicta' ),
		'heading'		=> '',
		'fields'		=> array(
			array(
				'id'		=> '1000',
				'type'		=> 'raw',
				'content'	=> $theme_doc,
			)
		),
	) );
	
    
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'benedicta' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'benedicta' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }