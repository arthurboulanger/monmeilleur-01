<?php

/**
 * Public facing side of the plugin.
 *
 * @link       http://www.69signals.com
 * @since      1.4
 * @package    Signals_FFInviter
 *
 * Injecting the front styles in the header of the page.
 */

function signals_ffi_header_script() {

	global $signals_ffi_options;

	// Registering .js and .css files over here.
	wp_register_style( 'fb-social-inviter', SIGNALS_FFI_URL . '/framework/public/css/public.css', false, '1.4' );
	wp_register_script( 'fb-notify-header', SIGNALS_FFI_URL . '/framework/public/js/public.js', 'jquery', '1.4', true );

	/**
	 * Calling the files in the step.
	 * Including the cookie.js if the notification option is enabled.
	 */
	wp_enqueue_style( 'fb-social-inviter' );

	if ( 'disable' == $signals_ffi_options['widget'] ) {
		wp_enqueue_script( 'fb-notify-header' );
	}

}
add_action( 'wp_enqueue_scripts', 'signals_ffi_header_script' );

// Injecting the Facebook script in the footer of the page.
function signals_ffi_footer_script() {

	global $signals_ffi_options;

	?>

	<script src="https://connect.facebook.net/en_US/all.js"></script>
	<script type="text/javascript">
		FB.init({
			appId: '<?php echo $signals_ffi_options["appid"]; ?>',
			cookie: true,
			status: true,
			xfbml: true
		});

		function signals_ffi_init() {
			FB.ui({
				method: 'apprequests',
				message: '<?php echo $signals_ffi_options["message"]; ?>'
			});
		}
	</script>
	<div id="fb-root"></div>

	<?php

}
add_action( 'wp_footer', 'signals_ffi_footer_script' );

/**
 * Including the notification function if the widget option is disabled.
 * This will display the Invite friends option via the Notification bar.
 */
if ( 'disable' == $signals_ffi_options['widget'] ) {
	function signals_ffi_notification_script() {

		global $signals_ffi_options;

 		// Setting the position for the Invite bar if no position is defined in the settings.
		if ( '' == $signals_ffi_options['pos'] || 'bottom' == $signals_ffi_options['pos'] ) {
			$signals_ffi_options['pos'] = 'bottom';
		} else {
			$signals_ffi_options['pos'] = 'top';
		}

	?>

		<style>
			<?php

				// Defining the user styles for the notification bar.
				if ( ! empty( $signals_ffi_options['bar_bg'] ) ) {
					echo '#signals-ffi-bar {background: #' . $signals_ffi_options['bar_bg'] . '}';
				}

				if ( ! empty( $signals_ffi_options['txt_color'] ) ) {
					echo '#signals-ffi-bar p {color: #' . $signals_ffi_options['txt_color'] . '}';
				}

				if ( ! empty( $signals_ffi_options['link_color'] ) ) {
					echo '#signals-ffi-bar a {color: #' . $signals_ffi_options['link_color'] . '; border-bottom: 1px dotted #' . $signals_ffi_options['link_color'] . '}';
				}

			?>

			@media(max-width: 480px) {.signals-ffi-bar {display: block; margin: 4px 10px 0 10px}}
		</style>

		<div id="signals-ffi-bar" class="signals-hide" style="<?php echo $signals_ffi_options['pos']; ?>: 0">
			<div class="signals-ffi-bar-container">
				<p class="signals-ffi-text"><?php echo esc_html__( $signals_ffi_options['text'] ); ?>
					<a href="javascript:;" onclick="signals_ffi_init();"<?php if ( 'btn' == $signals_ffi_options['style'] ) { echo ' class="signals-ffi-btn"'; } else { echo ' class="signals-strong"'; } ?>>
						<?php echo esc_html__( $signals_ffi_options['caption'] ); ?>
					</a>
				</p>

				<div class="signals-close-btn">
					<a href="javascript:;">X</a>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			(function( $ ) {
				$( function() {

					'use strict';
					var wrapper = $( '#signals-ffi-bar' );

					$( '.signals-close-btn' ).click( function() {
						wrapper.fadeOut( function() {
							$.cookie( 'signals_ffi_bar', 'close', { expires: <?php echo $signals_ffi_options['expiry']; ?>, path: '/' } );
						} );

						return false;
					} );

					if( $.cookie( 'signals_ffi_bar' ) !== 'close' ) {
						wrapper.show();
					}
				} );
			} )(jQuery);
		</script>

	<?php

	}

	add_action( 'wp_footer', 'signals_ffi_notification_script' );
}
