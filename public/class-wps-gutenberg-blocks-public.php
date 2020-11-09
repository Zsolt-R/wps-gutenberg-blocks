<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://wpshapers.com/
 * @since      1.0.0
 *
 * @package    Wps_Gutenberg_Blocks
 * @subpackage Wps_Gutenberg_Blocks/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wps_Gutenberg_Blocks
 * @subpackage Wps_Gutenberg_Blocks/public
 * @author     Zsolt Revay G. < zsolt.revay@wpshapers.com>
 */
class Wps_Gutenberg_Blocks_Public {

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
	 * @param      string $plugin_name       The name of the plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/dist/css/wps-gutenberg-blocks-public.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'assets/dist/js/wps-gutenberg-blocks-public.min.js', array( 'jquery' ), $this->version, true );
		wp_register_script(
			'wps-guten-blocks-ytvid-js',
			plugin_dir_url( __FILE__ ) . 'assets/dist/js/lib/wps-gutenberg-block-ytbg.min.js',
			array( 'jquery' ),
			$this->version,
			false
		);

		/**
		 * Conditional load gutenberg script
		 */
		$content = get_post_field( 'post_content', get_the_ID() );

		if ( has_block( 'wps-gutenberg/grid' ) ) {
			$blocks = parse_blocks( $content );
			foreach ( $blocks as $block ) {
				$source_block = $block;
				$block        = apply_filters( 'render_block_data', $block, $source_block );
				if ( 'wps-gutenberg/grid' === $block['blockName'] ) {
					if ( isset( $block['attrs']['videoUrlYoutube'] ) ) {
						wp_enqueue_script( 'wps-guten-blocks-ytvid-js' );
					}
				}
			}
		}

	}

}
