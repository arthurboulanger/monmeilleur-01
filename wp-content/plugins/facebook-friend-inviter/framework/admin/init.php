<?php

/**
 * WordPress management panel.
 *
 * @link       http://www.69signals.com
 * @since      1.4
 * @package    Signals_FFInviter
 *
 * Including required files for the management panel
 */

require 'settings.php';

function signals_ffi_admin_template() {

	// Registering .js and .css files over here.
	wp_register_style( 'ffi-admin', SIGNALS_FFI_URL . '/framework/admin/css/admin.css', false, '1.4' );
	wp_enqueue_style( 'ffi-admin' );

	wp_register_script( 'ffi-admin', SIGNALS_FFI_URL . '/framework/admin/js/admin.js', 'jquery', '1.4' );
	wp_register_script( 'ffi-jscolor', SIGNALS_FFI_URL . '/framework/admin/js/colorpicker/jscolor.js', 'jquery', '1.4' );

	wp_enqueue_script( 'ffi-admin' );
	wp_enqueue_script( 'ffi-jscolor' );

}

// Loading the admin panel scripts and styles only on the settings page.
function signals_ffi_load_admin() {

	add_action( 'admin_enqueue_scripts', 'signals_ffi_admin_template' );

}

// Adding item to the options panel
function signals_ffi_add_menu() {

	if ( is_admin() && current_user_can( 'manage_options' ) ) {
		// Adding to the plugin panel link to the settings menu
		$signals_ffi_menu = add_options_page(
			__( 'Facebook Friend Inviter', 'signals' ),
			__( 'FB Friend Inviter', 'signals' ),
			'manage_options',
			'fb_inviter_settings',
			'signals_ffi_settings'
		);

		// Loading the JS conditionally
		add_action( 'load-' . $signals_ffi_menu, 'signals_ffi_load_admin' );
	}

}
add_action( 'admin_menu', 'signals_ffi_add_menu' );
