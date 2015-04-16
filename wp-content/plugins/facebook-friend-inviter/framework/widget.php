<?php

/**
 * Plugin Name: Facebook Inviter Widget
 * Description: Widget for the Facebook Friend Inviter plugin.
 *
 * @link 			http://www.69signals.com
 * @since 			1.0
 * @package 		Signals_FFInviter
 */

class Signals_FFI_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_ffi', __( 'Facebook Friend Inviter', 'signals' ), array(
			'classname'   => 'widget_signals_ffi',
			'description' => __( 'Widget for the Facebook Friend Inviter plugin.', 'signals' ),
		) );

	}

	/**
	 * Output the HTML for this widget.
	 *
	 * @access public
	 *
	 * @param array $args     An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 * @return void Echoes its output.
	 */
	public function widget( $args, $instance ) {

		global $signals_ffi_options;

		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

	?>

		<div class="signals-ffi">
			<a href="javascript:;" onclick="signals_ffi_init();"<?php if ( 'btn' == $signals_ffi_options['style'] ) { echo ' class="signals-ffi-btn signals-block"'; } else { echo ' class="signals-strong"'; } ?>>
				<?php echo esc_html__( $signals_ffi_options['caption'] ); ?>
			</a>

			<p class="signals-ffi-text">
				<?php echo esc_html__( $signals_ffi_options['text'] ); ?>
			</p>
		</div>

	<?php

		echo $args['after_widget'];

	}

	/**
	 * Deal with the settings when they are saved by the admin.
	 * Here is where any validation should happen.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $instance     Original widget instance.
	 * @return array Updated widget instance.
	 */
	function update( $new_instance, $instance ) {

		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;

	}

	/**
	 * Display the form for this widget on the Widgets page of the Admin area.
	 *
	 * @param array $instance
	 * @return void
	 */
	function form( $instance ) {

		$defaults = array(
			'title' => __( 'Invite Friends', 'signals' )
		);

		$instance = wp_parse_args( (array) $instance, $defaults );

	?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p><?php _e( 'There is nothing more to configure over here. This widget will display the Facebook Friend Inviter with the settings configured for the plugin.', 'signals' ); ?></p>

	<?php

	}

} // class Signals_FFI_Widget

// Registering the widget
function signals_register_widget() {

	register_widget( 'Signals_FFI_Widget' );

}
add_action( 'widgets_init', 'signals_register_widget' );
