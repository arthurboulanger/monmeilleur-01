<?php

/**
 * Settings management panel for the plugin.
 * The user set options are processed over here.
 *
 * @link       http://www.69signals.com
 * @since      1.0
 * @package    Signals_FFInviter
 */

function signals_ffi_settings() {

	global $signals_ffi_options;

	// Saving or Updating options over here.
	if ( isset( $_POST['signals_ffi_submit'] ) ) {
		$signals_ffi_appid 	= sanitize_text_field( $_POST['signals_ffi_appid'] );

		// Saving the record to the database, if the appID is set
		if ( ! empty( $signals_ffi_appid ) ) {
			$signals_ffi_options = array(
				'caption' 		=> isset( $_POST['signals_ffi_caption'] ) ? sanitize_text_field( stripslashes( $_POST['signals_ffi_caption'] ) ) : '',
				'message' 		=> isset( $_POST['signals_ffi_message'] ) ? sanitize_text_field( stripslashes( $_POST['signals_ffi_message'] ) ) : '',
				'appid' 		=> $signals_ffi_appid,
				'style' 		=> isset( $_POST['signals_ffi_style'] ) ? sanitize_text_field( $_POST['signals_ffi_style'] ) : 'btn',
				'text' 			=> isset( $_POST['signals_ffi_text'] ) ? sanitize_text_field( stripslashes( $_POST['signals_ffi_text'] ) ) : '',
				'widget' 		=> isset( $_POST['signals_ffi_widget'] ) ? sanitize_text_field( $_POST['signals_ffi_widget'] ) : 'disable',
				'pos' 			=> isset( $_POST['signals_ffi_pos'] ) ? sanitize_text_field( $_POST['signals_ffi_pos'] ) : 'bottom',
				'expiry' 		=> ( ! isset( $_POST['signals_ffi_expiry'] ) || '' == $_POST['signals_ffi_expiry'] ) ? '7' : absint( $_POST['signals_ffi_expiry'] ),
				'bar_bg' 		=> isset( $_POST['signals_ffi_bar_bg'] ) ? sanitize_text_field( $_POST['signals_ffi_bar_bg'] ) : 'ff0000',
				'txt_color' 	=> isset( $_POST['signals_ffi_txt_color'] ) ? sanitize_text_field( $_POST['signals_ffi_txt_color'] ) : 'ffffff',
				'link_color' 	=> isset( $_POST['signals_ffi_link_color'] ) ? sanitize_text_field( $_POST['signals_ffi_link_color'] ) : 'fff67a'
			);

			// Updating the options in the database and showing message to the user.
			update_option( 'signals_ffi_options', $signals_ffi_options );
			$signals_ffi_err = '<div class="signals-alert signals-alert-success">' . __( '<strong>Hey!</strong> Options have been updated.', 'signals' ) . '</div>';
		} else {
			$signals_ffi_err = '<div class="signals-alert signals-alert-danger">' . __( '<strong>Oops!</strong> Application ID cannot be left empty.', 'signals' ) . '</div>';
		}
	}

	// Admin email for the support request
	$signals_admin_email = get_option( 'admin_email', '' );

	// View template for the settings panel
	require 'views/settings.php';

}

// AJAX request for user support.
function signals_ffi_ajax_support() {

	// We are going to store the response in the $response() array.
	$response = array(
		'code' 		=> 'error',
		'response' 	=> __( 'Please fill in both the fields to create your support ticket.', 'signals' )
	);

	if ( ! empty( $_POST['signals_support_email'] ) && ! empty( $_POST['signals_support_issue'] ) ) {
		// Filtering and sanitizing the support issue.
		$admin_email 	= sanitize_email( $_POST['signals_support_email'] );
		$issue 			= $_POST['signals_support_issue'];

		$subject 		= '[Support Ticket] by '. $admin_email;
		$body 			= "Email: $admin_email \r\nIssue: $issue";
		$headers 		= 'From: ' . $admin_email . "\r\n" . 'Reply-To: ' . $admin_email;

		// Sending the mail to the support email.
		if ( true === wp_mail( 'support@69signals.com', $subject, $body, $headers ) ) {
			// Sending the success response.
			$response = array(
				'code' 		=> 'success',
				'response' 	=> __( 'We have received your support ticket. We will get back to you shortly!', 'signals' )
			);
		} else {
			// Sending the failure response.
			$response = array(
				'code' 		=> 'error',
				'response' 	=> __( 'There was an error creating the support ticket. You can try again later or send us an email directly to <strong>support@69signals.com</strong>', 'signals' )
			);
		}
	}

	// Sending proper headers and sending the response back in the JSON format.
	header( "Content-Type: application/json" );
	echo json_encode( $response );

	// Exiting the AJAX function. This is always required.
	exit();

}
add_action( 'wp_ajax_signals_support', 'signals_ffi_ajax_support' );
