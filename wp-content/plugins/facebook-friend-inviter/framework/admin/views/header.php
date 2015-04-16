<?php

/**
 * Provide admin header view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      1.4
 * @package    Signals_FFInviter
 */

?>

<div class="signals-cnt-fix">
	<div class="signals-fix-wp38">
		<div class="signals-header signals-clearfix">
			<img src="<?php echo SIGNALS_FFI_URL; ?>/framework/admin/img/lrg-icon.png" class="signals-logo">
			<p>
				<strong><?php esc_html_e( 'Facebook Friend Inviter', 'signals' ); ?></strong>
				<span><?php esc_html_e( 'by', 'signals' ); ?> <a href="http://www.69signals.com/" target="_blank"><?php esc_html_e( '69signals', 'signals' ); ?></a></span>
			</p>

			<?php if ( isset( $signals_header_addon ) ) { echo $signals_header_addon; } ?>
		</div><!-- .signals-header -->
