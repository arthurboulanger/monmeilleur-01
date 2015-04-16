<?php

/**
 * For uninstalling the plugin completely from the system.
 *
 * @link       	http://www.69signals.com
 * @since      	1.0
 * @package    	Signals_FFInviter
 *
 * Checking whether the file is called by the Wordpress uninstall action or not.
 * If not, then exit and prevent unauthorized access.
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

// Removing the options from the database set by the plugin.
delete_option( 'signals_ffi_options' );
