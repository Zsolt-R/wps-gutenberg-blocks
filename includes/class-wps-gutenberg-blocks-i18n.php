<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://wpshapers.com/
 * @since      1.0.0
 *
 * @package    Wps_Gutenberg_Blocks
 * @subpackage Wps_Gutenberg_Blocks/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wps_Gutenberg_Blocks
 * @subpackage Wps_Gutenberg_Blocks/includes
 * @author     Zsolt Revay G. < zsolt.revay@wpshapers.com>
 */
class Wps_Gutenberg_Blocks_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wps-gutenberg-blocks',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
