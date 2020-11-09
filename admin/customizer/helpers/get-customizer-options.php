<?php

function wps_gb_get_customizer_options( $option_name, $default = false ) {

	$db_options = get_option( WPS_GUTENBERG_BLOCKS_OPTIONS_NAME );

	if ( empty( $db_options ) ) {
		return $default;
	}

	if ( $db_options[ $option_name ] ) {
		return $db_options[ $option_name ];
	} else {
		return $default;
	}

}
