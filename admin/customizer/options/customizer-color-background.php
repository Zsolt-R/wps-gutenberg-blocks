<?php
add_action( 'customize_register', array( 'Wps_Gutenberg_Blocks_Customizer_Background_Colors', 'register' ) );

class Wps_Gutenberg_Blocks_Customizer_Background_Colors extends Wps_Gutenberg_Blocks_Customizer_Options {


	public static function option_list() {
		$output = array();

		/**
		 *  Background colors
		 */
		$output[] = array(
			'label'        => __( 'Color one', 'wps-prime' ),
			'id'           => 'background-color-one',
			'value'        => '#1e90ff',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color two', 'wps-prime' ),
			'id'           => 'background-color-two',
			'value'        => '#ff6348',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color three', 'wps-prime' ),
			'id'           => 'background-color-three',
			'value'        => '#ff4757',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color four', 'wps-prime' ),
			'id'           => 'background-color-four',
			'value'        => '#ffa502',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color five', 'wps-prime' ),
			'id'           => 'background-color-five',
			'value'        => '#2ed573',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color six', 'wps-prime' ),
			'id'           => 'background-color-six',
			'value'        => '#eccc68',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color body', 'wps-prime' ),
			'id'           => 'background-color-body',
			'value'        => '#ffffff',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color light', 'wps-prime' ),
			'id'           => 'background-color-light',
			'value'        => '#f1f2f6',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color dark', 'wps-prime' ),
			'id'           => 'background-color-dark',
			'value'        => '#2f3542',
			'section'      => 'background_colors_section',
			'control_type' => 'color',
		);
		return $output;
	}


	public static function register( $wp_customize ) {

		/******************************
		 * SECTIONS
		 * 1. Define a new section (if desired) to the Theme Customizer
		*/

		$wp_customize->add_section(
			'background_colors_section',
			array(
				'title'       => __( 'Background Colors', 'wps-prime' ), // Visible title of section
				'priority'    => 35, // Determines what order this appears in
				'capability'  => 'edit_theme_options', // Capability needed to tweak
				'description' => __( 'Customize theme background colors', 'wps-prime' ), // Descriptive tooltip
				'panel'       => 'wpsg_colors_panel',
			)
		);

		parent::generate_settings( $wp_customize, parent::get_options() );
	}
}
