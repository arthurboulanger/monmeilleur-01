<?php

/**
 *
 * @link       http://www.69signals.com
 * @version    1.5
 * @package    Signals_FFInviter
 *
 *
 * Plugin Name: 		Facebook Friend Inviter
 * Plugin URI: 			http://www.69signals.com/facebook-friend-inviter.php
 * Description: 		A plugin to allow your website visitors to invite their Facebook friends. It helps increase social media presence and engagement on the website.
 * Version: 			1.5
 * Author: 				akshitsethi
 * Author URI: 			http://www.69signals.com
 * License: 			GPLv3
 * License URI: 		http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: 		signals
 * Domain Path: 		/framework/langs/
 *
 *
 * Facebook Friend Inviter Plugin
 * Copyright (C) 2014, akshitsethi - support@69signals.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Defining constants and activation hook.
 * If this file is called directly, abort.
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

// Defining constants and activation hook
define( 'SIGNALS_FFI_URL', plugins_url( '', __FILE__ ) );
define( 'SIGNALS_FFI_PATH', plugin_dir_path( __FILE__ ) );

// Default options for the plugin.
$signals_default_options = array(
	'caption' 		=> __( 'Invite Friends', 'signals' ),
	'message' 		=> __( 'This blog is dedicated to design, coding, jquery, entrepreneurship, and a little bit here & there to make you do stuff in a better way.', 'signals' ),
	'appid' 		=> '',
	'style' 		=> 'btn',
	'text' 			=> __( 'Spread the word about the website. This won\'t spam your Facebook account.', 'signals' ),
	'widget' 		=> 'disable',
	'pos' 			=> 'bottom',
	'expiry' 		=> '7',
	'bar_bg'		=> 'ff0000',
	'txt_color'		=> 'ffffff',
	'link_color' 	=> 'fff67a'
);

/**
 * For the plugin activation & de-activation.
 * We are doing nothing over here.
 */
function ffi_plugin_activation() {

	global $signals_default_options;

	// Checking if the options exist in the database
	$signals_ffi_options = get_option( 'signals_ffi_options' );

	// If the options are not there in the database, then create the default options for the plugin
	if ( ! $signals_ffi_options ) {
		update_option( 'signals_ffi_options', $signals_default_options );
	}

}
register_activation_hook( __FILE__, 'ffi_plugin_activation' );

// Hook for the plugin deactivation
function ffi_plugin_deactivation() {

	// Silence is golden
	// We might use this in future versions

}
register_deactivation_hook( __FILE__, 'ffi_plugin_deactivation' );

// Getting options from the database
$signals_ffi_options = get_option( 'signals_ffi_options' );

if ( ! $signals_ffi_options ) {
	$signals_ffi_options = $signals_default_options;
}

/**
 * Including files necessary for the management panel of the plugin.
 * Basically, support panel and option to insert custom .css is provided.
 */
if ( is_admin() ) {
	require SIGNALS_FFI_PATH . 'framework/admin/init.php';
}

// Including the widget.php file if the option is enabled
if ( 'enable' == $signals_ffi_options['widget'] ) {
	require SIGNALS_FFI_PATH . 'framework/widget.php';
}

// Let's start the plugin now
require SIGNALS_FFI_PATH . 'framework/public/init.php';
