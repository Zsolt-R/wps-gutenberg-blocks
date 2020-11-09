<?php

abstract class Wps_Gutenberg_Blocks_Customizer_Options {

	abstract protected static function option_list();

	private static function generate_id( $id ) {
		$str    = $id;
		$new_id = str_replace( '-', '_', $str );
		return $new_id;
	}

	/**
	 * Inject value by checking if there is theme mod set
	 */
	public static function get_options() {
		$options     = static::option_list();
		$new_options = array();
		foreach ( $options as $option ) {

			$updated_value   = wps_gb_get_customizer_options( self::generate_id( $option['id'] ), $option['value'] );
			$option['value'] = $updated_value;

			$new_options[] = $option;
		}
		return $new_options;
	}


	public static function generate_settings( $wp_customize ) {

		foreach ( static::get_options() as $option ) {

			$db_option_name = WPS_GUTENBERG_BLOCKS_OPTIONS_NAME;
			$prefix_control = WPS_GUTENBERG_BLOCKS_OPTIONS_PREFIX . '-plugin-';

			$setting_id = str_replace( '-', '_', $option['id'] );
			$control_id = str_replace( '-', '_', $prefix_control . $option['id'] );

			$control_type = $option['control_type'] ? $option['control_type'] : 'textarea';
			$transport    = $option['transport'] ? $option['transport'] : 'postMessage';
			$description  = $option['description'] ? $option['description'] : false;
			$priority     = $option['priority'] ? $option['priority'] : 10;

			$input_attrs = $option['input_attrs'] ? $option['input_attrs'] : false;
			$section     = $option['section'] ? $option['section'] : false;
			$panel       = $option['panel'] ? $option['panel'] : false;
			$sanitize    = $option['sanitize'] ? $option['sanitize'] : false;

			$wp_customize->add_setting(
				$db_option_name . '[' . $setting_id . ']', // No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
				array(
					'default'           => $option['value'], // Default setting/value to save
					'type'              => 'option', // Is this an 'option' or a 'theme_mod'?
					'capability'        => 'edit_theme_options', // Optional. Special permissions for accessing this setting.
					'transport'         => $transport, // What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
					'sanitize_callback' => $sanitize,
				)
			);

			if ( 'color' === $control_type ) {
				$wp_customize->add_control(
					new WP_Customize_Color_Control( // Instantiate the color control class
						$wp_customize, // Pass the $wp_customize object (required)
						$control_id, // Set a unique ID for the control
						array(
							'label'    => $option['label'], // Admin-visible name of the control
							'settings' => $db_option_name . '[' . $setting_id . ']', // Which setting to load and manipulate (serialized is okay)
							'priority' => $priority, // Determines the order this control appears in for the specified section
							'section'  => $section, // ID of the section this control should render in (can be one of yours, or a WordPress default section)
							'panel'    => $panel,
						)
					)
				);
			} else {
				$wp_customize->add_control(
					$db_option_name . '[' . $setting_id . ']',
					array(
						'type'        => $control_type,
						'label'       => $option['label'],
						'description' => $description,
						'priority'    => $priority, // Determines the order this control appears in for the specified section
						'section'     => $section, // ID of the section this control should render in (can be one of yours, or a WordPress default section)
						'panel'       => $panel,
						'input_attrs' => $input_attrs,
					)
				);
			}

			$wp_customize->get_setting( $db_option_name . '[' . $setting_id . ']' )->transport = $transport;
		}

	}
}
