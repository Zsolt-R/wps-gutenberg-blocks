<?php
class Wps_Gutenberg_Blocks_Customizer {

	public static function register( $wp_customize ) {
		/******************************
		 * PANELS
		 * 0. Define a new panel (if desired) to the Theme Customizer
		*/

		$wp_customize->add_panel(
			'wpsg_colors_panel',
			array(
				'priority'       => 10,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => 'Colors',
				'description'    => '',
			)
		);

		// $wp_customize->add_panel(
		// 'wpsg_spacings_panel',
		// array(
		// 'priority'       => 10,
		// 'capability'     => 'edit_theme_options',
		// 'theme_supports' => '',
		// 'title'          => 'Spacings',
		// 'description'    => '',
		// )
		// );
	}


	/**
	 * This will output the custom WordPress settings to the live theme's WP head.
	 *
	 * Used by hook: 'wp_head'
	 *
	 * @see add_action('wp_head',$func)
	 * @since WPS-PRIME 2.0
	 */
	public static function customizer_style() {
		$style = ':root {';

		/**
		 * Text
		 */
		$style .= self::generate_css_var( '--text-color-primary', 'text_color_primary' );
		$style .= self::generate_css_var( '--text-color-secondary', 'text_color_secondary' );
		$style .= self::generate_css_var( '--text-color-tertiary', 'text_color_tertiary' );
		$style .= self::generate_css_var( '--text-color-heading', 'text_color_heading' );
		$style .= self::generate_css_var( '--text-color-light', 'text_color_light' );
		$style .= self::generate_css_var( '--text-color-body', 'text_color_body' );
		$style .= self::generate_css_var( '--text-color-link', 'text_color_link' );

		/**
		 * Background
		 */
		$style .= self::generate_css_var( '--background-color-one', 'background_color_one' );
		$style .= self::generate_css_var( '--background-color-two', 'background_color_two' );
		$style .= self::generate_css_var( '--background-color-three', 'background_color_three' );
		$style .= self::generate_css_var( '--background-color-four', 'background_color_four' );
		$style .= self::generate_css_var( '--background-color-five', 'background_color_five' );
		$style .= self::generate_css_var( '--background-color-six', 'background_color_six' );
		$style .= self::generate_css_var( '--background-color-light', 'background_color_light' );
		$style .= self::generate_css_var( '--background-color-dark', 'background_color_dark' );
		$style .= self::generate_css_var( '--background-color-body', 'background_color_body' );

		/**
		 * Button
		 */
		$style .= self::generate_css_var( '--button-color-default', 'button_color_default' );
		$style .= self::generate_css_var_hex( '--button-color-default-h', 'button_color_default' );
		$style .= self::generate_css_var( '--button-color-primary', 'button_color_primary' );
		$style .= self::generate_css_var_hex( '--button-color-primary-h', 'button_color_primary' );
		$style .= self::generate_css_var( '--button-color-secondary', 'button_color_secondary' );
		$style .= self::generate_css_var_hex( '--button-color-secondary-h', 'button_color_secondary' );
		$style .= self::generate_css_var( '--button-color-tertiary', 'button_color_tertiary' );
		$style .= self::generate_css_var_hex( '--button-color-tertiary-h', 'button_color_tertiary' );
		$style .= self::generate_css_var( '--button-color-negative', 'button_color_negative' );
		$style .= self::generate_css_var_hex( '--button-color-negative-h', 'button_color_negative' );
		$style .= self::generate_css_var( '--button-color-positive', 'button_color_positive' );
		$style .= self::generate_css_var_hex( '--button-color-positive-h', 'button_color_positive' );
		$style .= self::generate_css_var( '--button-color-neutral', 'button_color_neutral' );
		$style .= self::generate_css_var_hex( '--button-color-neutral-h', 'button_color_neutral' );
		$style .= self::generate_css_var( '--button-color-light', 'button_color_light' );
		$style .= self::generate_css_var_hex( '--button-color-light-h', 'button_color_light' );
		$style .= self::generate_css_var( '--button-color-white', 'button_color_white' );
		$style .= self::generate_css_var_hex( '--button-color-white-h', 'button_color_white' );

		/**
		 * Spacing
		 */
		$style .= self::generate_css_var( '--spacing-tiny', 'spacing_unit_tiny', 'px' );
		$style .= self::generate_css_var( '--spacing-small', 'spacing_unit_small', 'px' );
		$style .= self::generate_css_var( '--spacing-base', 'spacing_unit_base', 'px' );
		$style .= self::generate_css_var( '--spacing-large', 'spacing_unit_large', 'px' );
		$style .= self::generate_css_var( '--spacing-huge', 'spacing_unit_huge', 'px' );

		$style .= '}';
		return $style;
	}

	public static function customizer_output() {
		$output  = '<!--GB Customizer CSS-->';
		$output .= '<style type="text/css">';
		$output .= self::customizer_style();
		$output .= '</style>';
		$output .= '<!--/GB Customizer CSS-->';
		echo $output;
	}


	private static function get_button_colors() {

		$options = array();

		$options = Wps_Gutenberg_Blocks_Customizer_Button_Colors::options();

		return $options;
	}

		/**
		 * This will generate a line of CSS for use in header output. If the setting
		 * ($mod_name) has no defined value, the CSS will not be output.
		 *
		 * @uses get_option()
		 * @param string $selector CSS selector
		 * @param string $style The name of the CSS *property* to modify
		 * @param string $mod_name The name of the 'theme_mod' option to fetch
		 * @param string $prefix Optional. Anything that needs to be output before the CSS property
		 * @param string $postfix Optional. Anything that needs to be output after the CSS property
		 * @param bool   $echo Optional. Whether to print directly to the page (default: true).
		 * @return string Returns a single line of CSS with selectors and a property.
		 * @since WPS-PRIME 2.0
		 */
	public static function generate_css( $selector, $style, $option_id, $echo = false ) {
		$output = '';
		$value  = wps_gb_get_customizer_options( $option_id );
		if ( $value ) {
			$output = sprintf(
				'%s { %s:%s; }',
				$selector,
				$style,
				$value
			);
			if ( $echo ) {
				echo $output;
			}
		}
		return $output;
	}

	/**
	 * unit - string (px,em ...)
	 */
	public static function generate_css_var( $var_name, $option_id, $unit = '', $echo = false ) {
		$output = '';
		$value  = wps_gb_get_customizer_options( $option_id );
		if ( $value ) {
			$output = sprintf(
				'%s:%s%s;',
				$var_name,
				$value,
				$unit
			);
			if ( $echo ) {
				echo $output;
			}
		}
		return $output;
	}

	private static function pharse_array( $needle, $haystack ) {

		if ( empty( $haystack ) ) {
			return false;
		}

		// normalize id's
		$needle = str_replace( '_', '-', $needle );

		foreach ( $haystack as $key => $val ) {
			if ( $val['id'] === $needle ) {
				return $haystack[ $key ];
			}
		}
		return null;

	}

	public static function generate_css_var_hex( $var_name, $option_id, $echo = false ) {
		$output     = '';
		$value      = wps_gb_get_customizer_options( $option_id );
		$luminosity = get_option( WPS_GUTENBERG_BLOCKS_OPTIONS_PREFIX . '_button_color_hover_modifier', '-0.2' );
		// If mod or luminosity is set
		if ( $value || $luminosity ) {

			// If mod is empty set it to default
			if ( $value ) {

				// If default is empty value just return otherwhise will cause error by not delivering HEX to luminance function
				// This will cause:
				// In backend customizer the effect will be visiable because it is using customizer.js to update the setting
				// On front end the update will not happen because it will not be pharsed / storred

				$button = self::pharse_array( $option_id, self::get_button_colors() );

				if ( $button ) {
					// get the default value
					$value = $button['value'];
				} else {
					return $output;
				}

				$output = sprintf(
					'%s:%s;',
					$var_name,
					( new self() )->luminance( $value, $luminosity )
				);
			}
			if ( $echo ) {
				echo $output;
			}
		}

		return $output;
	}

	private function luminance( $hex, $percent ) {
			// validate hex string
			$hex     = preg_replace( '/[^0-9a-f]/i', '', $hex );
			$new_hex = '#';

		if ( strlen( $hex ) < 6 ) {
			$hex = $hex[0] + $hex[0] + $hex[1] + $hex[1] + $hex[2] + $hex[2];
		}

			// convert to decimal and change luminosity
		for ( $i = 0; $i < 3; $i++ ) {
			$dec      = hexdec( substr( $hex, $i * 2, 2 ) );
			$dec      = min( max( 0, $dec + $dec * $percent ), 255 );
			$new_hex .= str_pad( dechex( $dec ), 2, 0, STR_PAD_LEFT );
		}
			return $new_hex;
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register', array( 'Wps_Gutenberg_Blocks_Customizer', 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head', array( 'Wps_Gutenberg_Blocks_Customizer', 'customizer_output' ) );
