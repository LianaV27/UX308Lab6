<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function ice_cream_parlor_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'WooCommerce', 'ice-cream-parlor' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
		array(
            'name'             => __( 'Advanced Appointment Booking & Scheduling', 'ice-cream-parlor' ),
            'slug'             => 'advanced-appointment-booking-scheduling',
            'required'         => false,
            'force_activation' => false,
        ),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'ice_cream_parlor_register_recommended_plugins' );
