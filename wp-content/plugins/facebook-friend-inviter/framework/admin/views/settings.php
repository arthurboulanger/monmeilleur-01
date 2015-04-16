<?php

/**
 * Settings panel view for the plugin
 *
 * @link       http://www.69signals.com
 * @since      1.0
 * @package    Signals_FFInviter
 */

require_once 'header.php';

?>

	<form role="form" method="post" class="signals-admin-form">
		<div class="signals-body signals-clearfix">
			<?php

				// Display the message if $signals_ffi_err is set.
				if ( isset( $signals_ffi_err ) ) {
					echo $signals_ffi_err;
				}

			?>

			<div class="signals-float-left">
				<div class="signals-mobile-menu">
					<a href="javascript:void;">
						<img src="<?php echo SIGNALS_FFI_URL; ?>/framework/admin/img/toggle.png" />
					</a>
				</div>

				<ul class="signals-main-menu">
					<li><a href="#settings"><?php _e( 'Settings', 'signals' ); ?></a></li>
					<li><a href="#support"><?php _e( 'Support', 'signals' ); ?></a></li>
					<li><a href="#about"><?php _e( 'About', 'signals' ); ?></a></li>
				</ul>
			</div><!-- .signals-float-left -->

			<div class="signals-float-right">
				<div class="signals-tile" id="settings">
					<div class="signals-tile-body">
						<div class="signals-tile-title"><?php _e( 'SETTINGS', 'signals' ); ?></div>

						<div class="signals-section-content">
							<div class="signals-form-group">
								<label for="signals_ffi_caption" class="signals-strong"><?php _e( 'Caption', 'signals' ); ?></label>
								<input type="text" name="signals_ffi_caption" id="signals_ffi_caption" value="<?php echo esc_attr( $signals_ffi_options['caption'] ); ?>" placeholder="<?php _e( 'Provide caption text over here', 'signals' ); ?>" class="signals-form-control">

								<p class="signals-form-help-block"><?php _e( 'Provide the caption you would like to display on the Invite button.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_message" class="signals-strong"><?php _e( 'Message', 'signals' ); ?></label>
								<input type="text" name="signals_ffi_message" id="signals_ffi_message" value="<?php echo esc_attr( $signals_ffi_options['message'] ); ?>" placeholder="<?php _e( 'Message that will be shown in the Invite friends popup.', 'signals' ); ?>" class="signals-form-control">

								<p class="signals-form-help-block"><?php _e( 'Provide the message you would like to display in the Invite friends popup.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_appid" class="signals-strong"><?php _e( 'App ID', 'signals' ); ?></label>
								<input type="text" name="signals_ffi_appid" id="signals_ffi_appid" value="<?php echo esc_attr( $signals_ffi_options['appid'] ); ?>" placeholder="<?php _e( 'Facebook App ID', 'signals' ); ?>" class="signals-form-control">

								<p class="signals-form-help-block"><?php _e( 'ID for your Facebook application.', 'signals' ); ?><br/><a href="http://www.hyperarts.com/blog/how-to-create-facebook-application-to-get-an-app-id-for-your-website/?utm_source=69signals" target="_blank"><?php _e( 'Click here', 'signals' ); ?></a> <?php _e( 'for more information on creating and configuring Facebook app.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_style" class="signals-strong"><?php _e( 'Select Style', 'signals' ); ?></label>
								<select name="signals_ffi_style" id="signals_ffi_style" class="signals-block">
									<option value="btn"<?php selected( $signals_ffi_options['style'], 'btn' ); ?>><?php _e( 'Button style', 'signals' ); ?></option>
									<option value="link"<?php selected( $signals_ffi_options['style'], 'link' ); ?>><?php _e( 'Link only', 'signals' ); ?></option>
								</select>

								<p class="signals-form-help-block"><?php _e( 'Select the appropriate styling for the Inviter link.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_text" class="signals-strong"><?php _e( 'Additional Text', 'signals' ); ?></label>
								<input type="text" name="signals_ffi_text" id="signals_ffi_text" value="<?php echo esc_attr( $signals_ffi_options['text'] ); ?>" placeholder="<?php _e( 'Additional text to display', 'signals' ); ?>" class="signals-form-control">

								<p class="signals-form-help-block"><?php _e( 'If you would like to display any additional text along the Inviter link, enter it over here.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_widget" class="signals-strong"><?php _e( 'Enable Widget?', 'signals' ); ?></label>
								<select name="signals_ffi_widget" id="signals_ffi_widget" class="signals-block">
									<option value="enable"<?php selected( $signals_ffi_options['widget'], 'enable' ); ?>><?php _e( 'Enable', 'signals' ); ?></option>
									<option value="disable"<?php selected( $signals_ffi_options['widget'], 'disable' ); ?>><?php _e( 'Disable', 'signals' ); ?></option>
								</select>

								<p class="signals-form-help-block"><?php _e( 'Select whether to enable this plugin via Widget or not. If the widget is disabled, the Inviter link will be shown via a Notification bar.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_pos" class="signals-strong"><?php _e( 'Position for the Notification bar', 'signals' ); ?></label>
								<select name="signals_ffi_pos" id="signals_ffi_pos" class="signals-block">
									<option value="top"<?php selected( $signals_ffi_options['pos'], 'top' ); ?>><?php _e( 'Top', 'signals' ); ?></option>
									<option value="bottom"<?php selected( $signals_ffi_options['pos'], 'bottom' ); ?>><?php _e( 'Bottom', 'signals' ); ?></option>
								</select>

								<p class="signals-form-help-block"><?php _e( 'Select the position for the Notification bar. This setting does not affect the widget.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_expiry" class="signals-strong"><?php _e( 'Cookire expiry time (in days)', 'signals' ); ?></label>
								<input type="text" name="signals_ffi_expiry" id="signals_ffi_expiry" value="<?php echo esc_attr( $signals_ffi_options['expiry'] ); ?>" placeholder="<?php _e( 'Cookie expiry time (in days)', 'signals' ); ?>" class="signals-form-control">

								<p class="signals-form-help-block"><?php _e( 'Number of days after which the header notification will show again if the user closes it. Only enter numeric value into this field. Default value is 7 days.', 'signals' ); ?></p>
							</div><br/>

							<p class="signals-simple-header"><strong><?php _e( 'DESIGN', 'signals' ); ?></strong>. <?php _e( 'Configure the design settings for the plugin. You have the option to modify every aspect of the design so that it matches the look and feel of your website.', 'signals' ); ?></p><br/>

							<div class="signals-form-group">
								<label for="signals_ffi_bar_bg" class="signals-strong"><?php _e( 'Notification Bar Background', 'signals' ); ?></label>
								<input type="text" name="signals_ffi_bar_bg" id="signals_ffi_bar_bg" value="<?php echo esc_attr( $signals_ffi_options['bar_bg'] ); ?>" placeholder="<?php _e( 'Notification bar background color', 'signals' ); ?>" class="signals-form-control color">

								<p class="signals-form-help-block"><?php _e( 'Provide the background color for the notification bar.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_txt_color" class="signals-strong"><?php _e( 'Text Color', 'signals' ); ?></label>
								<input type="text" name="signals_ffi_txt_color" id="signals_ffi_txt_color" value="<?php echo esc_attr( $signals_ffi_options['txt_color'] ); ?>" placeholder="<?php _e( 'Text color', 'signals' ); ?>" class="signals-form-control color">

								<p class="signals-form-help-block"><?php _e( 'Provide the Text color.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group">
								<label for="signals_ffi_link_color" class="signals-strong"><?php _e( 'Link Color', 'signals' ); ?></label>
								<input type="text" name="signals_ffi_link_color" id="signals_ffi_link_color" value="<?php echo esc_attr( $signals_ffi_options['link_color'] ); ?>" placeholder="<?php _e( 'Link color', 'signals' ); ?>" class="signals-form-control color">

								<p class="signals-form-help-block"><?php _e( 'Provide the Link color.', 'signals' ); ?></p>
							</div>
						</div>
					</div>
				</div><!-- #settings -->

				<div class="signals-tile" id="support">
					<div class="signals-tile-body">
						<div class="signals-tile-title"><?php _e( 'SUPPORT', 'signals' ); ?></div>
						<p><?php _e( 'Getting help is just a click away now. Report issue using the form below and we will get back to you at your admin email address. If the below support form is not working for you, kindly send us an email at ', 'signals'); ?><a href="mailto:support@69signals.com">support@69signals.com</a><?php _e(' explaining the issue you are facing with the plugin.', 'signals' ); ?></p>

						<div class="signals-section-content signals-support-form">
							<div class="signals-ajax-response"></div>

							<div class="signals-form-group">
								<label for="signals_support_email" class="signals-strong"><?php _e( 'Email Address', 'signals' ); ?></label>
								<input type="text" name="signals_support_email" id="signals_support_email" value="<?php echo sanitize_text_field( $signals_admin_email ); ?>" placeholder="<?php _e( 'Please provide your email address', 'signals' ); ?>" class="signals-form-control">

								<p class="signals-form-help-block"><?php _e( 'You will receive support response at this email address.', 'signals' ); ?></p>
							</div>

							<div class="signals-form-group" style="border-bottom: none; padding-bottom: 0">
								<label for="signals_support_issue" class="signals-strong"><?php _e( 'Issue / Feedback', 'signals' ); ?></label>
								<textarea name="signals_support_issue" id="signals_support_issue" class="signals-block" rows="10" placeholder="<?php _e( 'Please explain the issue you are facing with the plugin. Provide as much detail as possible.', 'signals' ); ?>"></textarea>

								<p class="signals-form-help-block"><?php _e( 'Please explain the issue you are facing with the plugin. Provide as much detail as possible.', 'signals' ); ?></p>
							</div>

							<button class="signals-btn signals-create-ticket"><strong><?php _e( 'Ask for Support', 'signals' ); ?></strong></button>
						</div>
					</div>
				</div><!-- #support -->

				<div class="signals-tile" id="about">
					<div class="signals-tile-body">
						<p class="signals-strong"><?php _e( 'We are a creative digital agency.', 'signals' ); ?></p>
						<p><?php _e( 'We love to weave the web, simple but amazing. We create flawless web and mobile applications. Our perfectly crafted products will make you believe us.', 'signals' ); ?></p>

						<div class="signals-section-content">
							<p><?php _e( 'Show us some love. Connect with us via Social channels.', 'signals' ); ?></p>

							<div class="signals-share">
								<a href="https://www.twitter.com/69signals" target="_blank">
									<img src="<?php echo SIGNALS_FFI_URL; ?>/framework/admin/img/twitter.png" />
								</a>
								<a href="https://www.facebook.com/69Signals" target="_blank">
									<img src="<?php echo SIGNALS_FFI_URL; ?>/framework/admin/img/facebook.png" />
								</a>
							</div>
						</div>
					</div>
				</div><!-- #about -->
			</div><!-- .signals-float-right -->

			<div class="signals-fixed-save-btn">
				<div class="signals-tile-body">
					<p class="signals-form-help-block" style="margin: 0; padding: 0 20px 0 10px"><button type="submit" name="signals_ffi_submit" class="signals-btn signals-btn-red"><strong><?php _e( 'Save Changes', 'signals' ); ?></strong></button></p>
				</div><!-- .signals-tile-body -->
			</div><!-- .signals-fixed-save-btn -->
		</div><!-- .signals-body -->
	</form><!-- form.signals-admin-form -->

<?php

require_once 'footer.php';
