import pSBC from './helpers/psbc';

/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {



        ///////////////////////////////////
        //	Text colors
        //////////////////////////////////

        wp.customize('wps_gb_customizer_settings[text_color_body]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--text-color-body', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[text_color_link]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--text-color-link', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[text_color_heading]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--text-color-heading', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[text_color_light]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--text-color-light', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[text_color_primary]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--text-color-primary', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[text_color_secondary]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--text-color-secondary', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[text_color_tertiary]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--text-color-tertiary', newval,
                        );
                    }

                );
            }

        );

        ///////////////////////////////////
        //	Background colors
        //////////////////////////////////
        wp.customize('wps_gb_customizer_settings[background_color_one]', function(value) {
                value.bind(function(newval) {
                        console.log(newval);
                        document.documentElement.style.setProperty('--background-color-one', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[background_color_two]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--background-color-two', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[background_color_three]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--background-color-three', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[background_color_four]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--background-color-four', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[background_color_five]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--background-color-five', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[background_color_six]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--background-color-six', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[background_color_light]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--background-color-light', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[background_color_dark]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--background-color-dark', newval,
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[background_color_body]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--background-color-body', newval,
                        );
                    }

                );
            }

        );

        ///////////////////////////////////
        //	Button colors
        //////////////////////////////////

        wp.customize('wps_gb_customizer_settings[button_color_default]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-default', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-default-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[button_color_primary]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-primary', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-primary-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[button_color_secondary]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-secondary', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-secondary-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[button_color_tertiary]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-tertiary', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-tertiary-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[button_color_negative]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-negative', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-negative-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[button_color_positive]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-positive', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-positive-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[button_color_neutral]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-neutral', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-neutral-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[button_color_light]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-light', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-light-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

        wp.customize('wps_gb_customizer_settings[button_color_white]', function(value) {
                value.bind(function(newval) {
                        document.documentElement.style.setProperty('--button-color-white', newval,
                        );
                        document.documentElement.style.setProperty('--button-color-white-h', pSBC (-0.3, newval),
                        );
                    }

                );
            }

        );

    /**
	 * Spacings
	 */
    wp.customize('wps_gb_customizer_settings[spacing_unit_tiny]', function(value) {
            value.bind(function(newval) {
                    document.documentElement.style.setProperty('--spacing-tiny', newval + 'px',
                    );
                }

            );
        }

    );

    wp.customize('wps_gb_customizer_settings[spacing_unit_small]', function(value) {
            value.bind(function(newval) {
                    document.documentElement.style.setProperty('--spacing-small', newval+ 'px',
                    );
                }

            );
        }

    );

    wp.customize('wps_gb_customizer_settings[spacing_unit_base]', function(value) {
            value.bind(function(newval) {
                    document.documentElement.style.setProperty('--spacing-base', newval+ 'px',
                    );
                }

            );
        }

	);
	wp.customize('wps_gb_customizer_settings[spacing_unit_large]', function(value) {
		value.bind(function(newval) {
				document.documentElement.style.setProperty('--spacing-large', newval+ 'px',
				);
			}

		);
	}

);
wp.customize('wps_gb_customizer_settings[spacing_unit_huge]', function(value) {
	value.bind(function(newval) {
			document.documentElement.style.setProperty('--spacing-huge', newval+ 'px',
			);
		}

	);
}

);
}

)(jQuery);