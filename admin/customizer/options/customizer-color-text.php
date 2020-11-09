<?php
add_action( 'customize_register', array( 'Wps_Gutenberg_Blocks_Customizer_Text_Colors', 'register' ) );

class Wps_Gutenberg_Blocks_Customizer_Text_Colors extends Wps_Gutenberg_Blocks_Customizer_Options {

	public static function option_list() {

		$output = array();

		/**
		 *  Text colors
		 */
		$output[] = array(
			'label'        => __( 'Body color', 'wps-prime' ),
			'id'           => 'text-color-body',
			'value'        => '#000000',
			'section'      => 'text_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Link color', 'wps-prime' ),
			'id'           => 'text-color-link',
			'value'        => '#2980b9',
			'section'      => 'text_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color light', 'wps-prime' ),
			'id'           => 'text-color-light',
			'value'        => '#dddddd',
			'section'      => 'text_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color heading', 'wps-prime' ),
			'id'           => 'text-color-heading',
			'value'        => '#000000',
			'section'      => 'text_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color primary', 'wps-prime' ),
			'id'           => 'text-color-primary',
			'value'        => '#309bd4',
			'section'      => 'text_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color secondary', 'wps-prime' ),
			'id'           => 'text-color-secondary',
			'value'        => '#e74c3c',
			'section'      => 'text_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Color tertiary', 'wps-prime' ),
			'id'           => 'text-color-terrtiary',
			'value'        => '#FAFA26',
			'section'      => 'text_colors_section',
			'control_type' => 'color',
		);

		return $output;
	}

	public static function options() {
		return parent::get_options();
	}



	public static function register( $wp_customize ) {

		/******************************
		 * SECTIONS
		 * 1. Define a new section (if desired) to the Theme Customizer
		*/

		$wp_customize->add_section(
			'text_colors_section',
			array(
				'title'       => __( 'Text Colors', 'wps-prime' ), // Visible title of section
				'priority'    => 35, // Determines what order this appears in
				'capability'  => 'edit_theme_options', // Capability needed to tweak
				'description' => __( 'Customize theme text colors', 'wps-prime' ), // Descriptive tooltip
				'panel'       => 'theme_colors_panel',
			)
		);

		parent::generate_settings( $wp_customize );
	}
}
