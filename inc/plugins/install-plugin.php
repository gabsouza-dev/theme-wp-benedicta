<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme for publication
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_template_directory_uri() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/inc/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'benedicta_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function benedicta_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */

	$server_url = 'http://evatheme.com/downloads/plugins/';

	$plugins = array(
	
		array(
			'name'     				=> esc_attr__('Contact Form 7', 'benedicta'),
			'slug'     				=> 'contact-form-7',
			'required' 				=> false,
			'version'            	=> '5.0.5',
            'force_activation'      => false,
            'force_deactivation'    => false,
		),

		array(
			'name'     				=> esc_attr__('Contact Form 7 Datepicker', 'benedicta'),
			'slug'     				=> 'contact-form-7-datepicker',
			'required' 				=> false,
			'version'            	=> '2.6.0',
            'force_activation'      => false,
            'force_deactivation'    => false,
		),
		
		array(
            'name'          		=> esc_attr__('Evatheme Core', 'benedicta'),
            'slug'          		=> 'evatheme-core',
            'source'            	=> get_template_directory() . '/inc/plugins/evatheme-core.zip',
            'required'          	=> true,
            'version'           	=> '1.0',
            'force_activation'      => false,
            'force_deactivation'    => false,
        ),
		
		array(
            'name'          		=> esc_attr__('Revolution Slider', 'benedicta'),
            'slug'          		=> 'revslider',
            'source'            	=> $server_url .'revslider.zip',
            'required'          	=> true,
            'version'           	=> '5.4.8',
            'force_activation'      => false,
            'force_deactivation'    => false,
        ),
		
		array(
            'name'         			=> esc_attr__('Ultimate Addons for Visual Composer', 'benedicta'),
            'slug'          		=> 'Ultimate_VC_Addons',
            'source'            	=> $server_url .'Ultimate_VC_Addons.zip',
            'required'          	=> true,
            'version'           	=> '3.17.0',
            'force_activation'      => false,
            'force_deactivation'    => false,
        ),
		
		array(
            'name'          		=> esc_attr__('WPBakery Page Builder', 'benedicta'),
            'slug'          		=> 'js_composer',
            'source'            	=> $server_url .'js_composer.zip',
            'required'   	        => true,
            'version'       	    => '5.5.5',
            'force_activation'      => false,
            'force_deactivation'    => false,
        ),
		
		array(
			'name'     				=> esc_html__('Redux Framework', 'benedicta'),
			'slug'     				=> 'redux-framework',
			'required' 				=> true,
			'force_activation'      => false,
            'force_deactivation'    => false,
		),
		
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'benedicta',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
