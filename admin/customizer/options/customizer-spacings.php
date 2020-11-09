<?php

add_action( 'customize_register', array( 'Wps_Gutenberg_Blocks_Customizer_Spacings', 'register' ) );

class Wps_Gutenberg_Blocks_Customizer_Spacings extends Wps_Gutenberg_Blocks_Customizer_Options {



	public static function option_list() {
		$output = array();

		$output[] = array(
			'label'        => __( 'Base spacing unit', 'wps-prime' ),
			'description'  => __( 'The base unit used to do all the spacing calcultions (px), min:4, default:24', 'wps-prime' ),
			'id'           => 'spacing-unit-base',
			'value'        => 24,
			'section'      => 'wpsg_spacings_section',
			'control_type' => 'number',
			'input_attrs'  => array(
				'min'  => 4,
				'max'  => 1024,
				'step' => 1,
			),
			'sanitize'     => function( $value ) {
				if ( (int) $value < 4 ) {
					return 4;
				} elseif ( (int) $value > 1024 ) {
					return 1024;
				}
				return (int) $value;
			},
		);

		$output[] = array(
			'label'        => __( 'Spacing unit tiny', 'wps-prime' ),
			'description'  => __( 'min:4, default:6', 'wps-prime' ),
			'id'           => 'spacing-unit-tiny',
			'value'        => 6,
			'section'      => 'wpsg_spacings_section',
			'control_type' => 'number',
			'input_attrs'  => array(
				'min'  => 4,
				'max'  => 1024,
				'step' => 1,
			),
			'sanitize'     => function( $value ) {
				if ( (int) $value < 4 ) {
					return 4;
				} elseif ( (int) $value > 1024 ) {
					return 1024;
				}
				return (int) $value;
			},
		);

		$output[] = array(
			'label'        => __( 'Spacing unit small', 'wps-prime' ),
			'description'  => __( 'min:4, default:12', 'wps-prime' ),
			'id'           => 'spacing-unit-small',
			'value'        => 12,
			'section'      => 'wpsg_spacings_section',
			'control_type' => 'number',
			'input_attrs'  => array(
				'min'  => 4,
				'max'  => 1024,
				'step' => 1,
			),
			'sanitize'     => function( $value ) {
				if ( (int) $value < 4 ) {
					return 4;
				} elseif ( (int) $value > 1024 ) {
					return 1024;
				}
				return (int) $value;
			},
		);

		$output[] = array(
			'label'        => __( 'Spacing unit large', 'wps-prime' ),
			'description'  => __( 'In px value, min:4, default:48', 'wps-prime' ),
			'id'           => 'spacing-unit-large',
			'value'        => 48,
			'section'      => 'wpsg_spacings_section',
			'control_type' => 'number',
			'input_attrs'  => array(
				'min'  => 4,
				'max'  => 1024,
				'step' => 1,
			),
			'sanitize'     => function( $value ) {
				if ( (int) $value < 4 ) {
					return 4;
				} elseif ( (int) $value > 1024 ) {
					return 1024;
				}
				return (int) $value;
			},
		);

		$output[] = array(
			'label'        => __( 'Spacing unit huge', 'wps-prime' ),
			'description'  => __( 'min:4, default:96', 'wps-prime' ),
			'id'           => 'spacing-unit-huge',
			'value'        => 96,
			'section'      => 'wpsg_spacings_section',
			'control_type' => 'number',
			'input_attrs'  => array(
				'min'  => 4,
				'max'  => 1024,
				'step' => 1,
			),
			'sanitize'     => function( $value ) {
				if ( (int) $value < 4 ) {
					return 4;
				} elseif ( (int) $value > 1024 ) {
					return 1024;
				}
				return (int) $value;
			},
		);

		return $output;
	}

	public static function register( $wp_customize ) {

		/******************************
		 * SECTIONS
		 * 1. Define a new section (if desired) to the Theme Customizer
		*/

		$wp_customize->add_section(
			'wpsg_spacings_section',
			array(
				'title'       => __( 'Spacings', 'wps-prime' ),
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'description' => __( 'Setup values used for margins / paddins and other spacings', 'wps-prime' ),
				'panel'       => '',
			)
		);

		parent::generate_settings( $wp_customize, parent::get_options() );
	}
}
