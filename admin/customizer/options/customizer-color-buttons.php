<?php
add_action( 'customize_register', array( 'Wps_Gutenberg_Blocks_Customizer_Button_Colors', 'register' ) );

class Wps_Gutenberg_Blocks_Customizer_Button_Colors extends Wps_Gutenberg_Blocks_Customizer_Options {

	public static function option_list() {
		$output = array();

		/**
		 *  Text colors
		 */
		$output[] = array(
			'label'        => __( 'Default', 'wps-prime' ),
			'id'           => 'button-color-default',
			'value'        => '#1E1E1C',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);

		$output[] = array(
			'label'        => __( 'Primary', 'wps-prime' ),
			'id'           => 'button-color-primary',
			'value'        => '#20638f',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);
		$output[] = array(
			'label'        => __( 'Secondary', 'wps-prime' ),
			'id'           => 'button-color-secondary',
			'value'        => '#e67e22',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);
		$output[] = array(
			'label'        => __( 'Tertiary', 'wps-prime' ),
			'id'           => 'button-color-secondary',
			'value'        => '#00B0D0',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);
		$output[] = array(
			'label'        => __( 'Negative', 'wps-prime' ),
			'id'           => 'button-color-negative',
			'value'        => '#e74c3c',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);
		$output[] = array(
			'label'        => __( 'Positive', 'wps-prime' ),
			'id'           => 'button-color-positive',
			'value'        => '#2ecc71',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);
		$output[] = array(
			'label'        => __( 'Neutral', 'wps-prime' ),
			'id'           => 'button-color-neutral',
			'value'        => '#505050',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);
		$output[] = array(
			'label'        => __( 'Light', 'wps-prime' ),
			'id'           => 'button-color-light',
			'value'        => '#999999',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);
		$output[] = array(
			'label'        => __( 'White', 'wps-prime' ),
			'id'           => 'button-color-white',
			'value'        => '#ffffff',
			'section'      => 'button_colors_section',
			'control_type' => 'color',
		);

		return $output;
	}

	public static function options() {
		return parent::get_options();
	}


	public static function register( $wp_customize ) {

		$wp_customize->add_section(
			'button_colors_section',
			array(
				'title'       => __( 'Button Colors', 'wps-prime' ), // Visible title of section
				'priority'    => 35, // Determines what order this appears in
				'capability'  => 'edit_theme_options', // Capability needed to tweak
				'description' => __( 'Customize theme button colors', 'wps-prime' ), // Descriptive tooltip
				'panel'       => 'theme_colors_panel',
			)
		);

		parent::generate_settings( $wp_customize );

		// SETTING
		$wp_customize->add_setting(
			WPS_GUTENBERG_BLOCKS_OPTIONS_PREFIX . '_button_color_hover_modifier', // No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
			array(
				'default'    => '-0.2', // Default setting/value to save
				'type'       => 'option', // Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
				'transport'  => 'refresh', // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
			)
		);

		// CONTROL
		$wp_customize->add_control(
			WPS_GUTENBERG_BLOCKS_OPTIONS_PREFIX . '_theme_button_color_hover_modifier', // Set a unique ID for the control
			array(
				'type'              => 'range',
				'label'             => __( 'Button hover color modifier', 'wps-prime' ), // Admin-visible name of the control
				'description'       => __( '<b>Default: -0.2.</b><br>Use the slider to set the hover color darken or lighter, between -1,1 values. 0.1 steps (0.1 = 10%)', 'wps-prime' ),
				'settings'          => WPS_GUTENBERG_BLOCKS_OPTIONS_PREFIX . '_button_color_hover_modifier', // Which setting to load and manipulate (serialized is okay)
				'priority'          => 10, // Determines the order this control appears in for the specified section
				'section'           => 'button_colors_section', // ID of the section this control should render in (can be one of yours, or a WordPress default section)
				'input_attrs'       => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.1,
				),
				'sanitize_callback' => 'intval',
			)
		);
	}
}
