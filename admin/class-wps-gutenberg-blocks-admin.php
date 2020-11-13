<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wpshapers.com/
 * @since      1.0.0
 *
 * @package    Wps_Gutenberg_Blocks
 * @subpackage Wps_Gutenberg_Blocks/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wps_Gutenberg_Blocks
 * @subpackage Wps_Gutenberg_Blocks/admin
 * @author     Zsolt Revay G. < zsolt.revay@wpshapers.com>
 */
class Wps_Gutenberg_Blocks_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
	}

	/**
	 * Register gutenberg scripts and styles
	 */

	public function gutenberg_init() {

		/**
		 * The class responsible for defining customizer in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/customizer/helpers/get-customizer-options.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/customizer/options/customizer-options.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/customizer/options/customizer-color-background.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/customizer/options/customizer-color-text.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/customizer/options/customizer-color-buttons.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/customizer/options/customizer-spacings.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/customizer/class-customizer.php';

		// wp_enqueue_script(
		// 'wps-gutenberg-spacings-js',
		// plugin_dir_url( __FILE__ ) . 'gutenberg/wps-gutenberg-spacings.js',
		// array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
		// filemtime( plugin_dir_path( __FILE__ ) . 'gutenberg/wps-gutenberg-spacings.js' )
		// );
	}

	/**
	 * Register gutenberg scripts and styles
	 */

	public function enqueue_block_editor_assets() {

		/**
		 * WPS Gutenberg Grid
		 */
		wp_register_script(
			'wps-guten-blocks-grid-js',
			plugin_dir_url( __FILE__ ) . 'gutenberg/block-wps-prime-grid.js',
			array( 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' )
		);

		/**
		 * WPS Gutenberg Grid
		 */
		wp_register_script(
			'wps-guten-blocks-grid-block-js',
			plugin_dir_url( __FILE__ ) . 'gutenberg/block-wps-prime-grid-block.js',
			array( 'wp-i18n', 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' )
		);

		// wp_register_style(
		// 'wps-guten-blocks-row-editor-css',
		// plugins_url( $style_css, __FILE__ ),
		// array(),
		// filemtime( "$dir/$style_css" )
		// );

		register_block_type(
			'wps-gutenberg/grid',
			array(
				// 'editor_style'  => 'wps-guten-blocks-row-editor-css',
				'editor_script' => 'wps-guten-blocks-grid-js',
			)
		);

		register_block_type(
			'wps-gutenberg/grid-block',
			array(
				// 'editor_style'  => 'wps-guten-blocks-grid-block-editor-css',
				'editor_script' => 'wps-guten-blocks-grid-block-js',
			)
		);

		wp_enqueue_script(
			'wps-gutenberg-custom-controls-js',
			plugin_dir_url( __FILE__ ) . 'gutenberg/wps-gutenberg-custom-controls.js',
			array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'gutenberg/wps-gutenberg-custom-controls.js' )
		);

		/**
		* Gutenberg general settings
		*/
		wp_register_script(
			'wps-guten-blocks-settings-js',
			plugin_dir_url( __FILE__ ) . 'gutenberg/wps-gutenberg-settings.js',
			array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'gutenberg/wps-gutenberg-settings.js' )
		);

		// Expose customizer settings to be used by the editor
		wp_localize_script( 'wps-guten-blocks-settings-js', 'wpsCustomizer', $this->get_color_settings() );
		wp_enqueue_script( 'wps-guten-blocks-settings-js' );

		wp_register_style(
			'wps-gutenberg-editor-css',
			plugin_dir_url( __FILE__ ) . 'gutenberg/wps-guten-blocks-editor.css',
			array(),
			filemtime( plugin_dir_path( __FILE__ ) . 'gutenberg/wps-guten-blocks-editor.css' )
		);
		wp_register_style(
			'wps-gutenberg-editor-grid-css',
			plugin_dir_url( __FILE__ ) . 'gutenberg/wps-editor-grid.css',
			array(),
			filemtime( plugin_dir_path( __FILE__ ) . 'gutenberg/wps-editor-grid.css' )
		);

		// wp_register_style(
		// 'wps-gutenberg-grid',
		// plugin_dir_url( __FILE__ ) . 'gutenberg/wps-grid.css',
		// array(),
		// filemtime( plugin_dir_path( __FILE__ ) . 'gutenberg/wps-grid.css' )
		// );

		wp_enqueue_style( 'wps-gutenberg-editor-css' );
		// wp_enqueue_style( 'wps-gutenberg-grid' );
		wp_enqueue_style( 'wps-gutenberg-editor-grid-css' );
		// Overwrite defaults with customizer generated styles
		wp_add_inline_style( 'wps-gutenberg-editor-css', Wps_Gutenberg_Blocks_Customizer::customizer_style() );

	}
	/**
	 * This outputs the javascript needed to automate the live settings preview.
	 * Also keep in mind that this function isn't necessary unless your settings
	 * are using 'transport'=>'postMessage' instead of the default 'transport'
	 * => 'refresh'
	 *
	 * Used by hook: 'customize_preview_init'
	 *
	 * @see add_action('customize_preview_init',$func)
	 * @since WPS-PRIME 2.0
	 */
	public function enqueue_customizer_assets() {

		wp_enqueue_script(
			'wps-guten-blocks-customizer', // Give the script a unique ID
			plugin_dir_url( __FILE__ ) . 'assets/dist/js/wps-gutenberg-blocks-customizer.min.js', // Define the path to the JS file
			array( 'jquery', 'customize-preview' ), // Define dependencies
			WPS_GUTENBERG_BLOCKS_VERSION, // Define a version (optional)
			true // Specify whether to put in footer (leave this true)
		);
	}

	/**
	 * Register gutenberg scripts and styles
	 */

	public function enqueue_block_assets() {}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wps_Gutenberg_Blocks_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wps_Gutenberg_Blocks_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/dist/css/wps-gutenberg-blocks-admin.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wps_Gutenberg_Blocks_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wps_Gutenberg_Blocks_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/dist/js/wps-gutenberg-blocks-admin.min.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Helper function that grabs colors from customizer theme mods and returns a gutenberg compatible array
	 */
	private function get_color_settings() {

		$colors = array();

		$colors['buttonColors']     = Wps_Gutenberg_Blocks_Customizer_Button_Colors::get_options();
		$colors['backgroundColors'] = Wps_Gutenberg_Blocks_Customizer_Background_Colors::get_options();
		$colors['textColors']       = Wps_Gutenberg_Blocks_Customizer_Text_Colors::get_options();

		return $colors;
	}

}
