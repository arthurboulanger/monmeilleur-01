<?php

//Start footer recent posts widgets
class Theme2035_Footer_Recent_Posts_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'widget_footer_recent_entries', 'description' => __( "The most recent posts", "Theme2035") );
		parent::__construct('blogy-footer-recent-posts', __('[ CUSTOM ] Recent Posts  ', 'Theme2035'), $widget_ops);
		$this->alt_option_name = 'widget_footer_recent_entries';
		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_footer_recent_posts', 'widget');
		if ( !is_array($cache) )
			$cache = array();
		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;
		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}
		ob_start();
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? __('[ CUSTOM ] Recent Posts  ', 'Theme2035') : $instance['title'], $instance, $this->id_base);
		if ( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
 			$number = 10;
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<div class="recent-post-custom">
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
			<div class="recent-post-box clearfix">
				<div class="pull-left recent-post-image"> 
				 <?php 
				the_post_thumbnail('thumbnail'); ?> 
				</div>
				<div class="pull-left recent-post-title-cont"> 

					<a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
					<span class="recent-post-materials">
						<ul>
							<li><a href="<?php the_permalink(); ?>"><?php echo $post_date = the_time('F j'); ?></a></li>
							<li class="recent-post-category"><?php the_category(', '); ?></li>
						</ul>
					</span> 

				 </div>
			</div>
		<?php endwhile; ?>
		</div>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_footer_recent_posts', $cache, 'widget');
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();
		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_footer_recent_entries']) )
			delete_option('widget_footer_recent_entries');
		return $instance;
	}
	function flush_widget_cache() {
		wp_cache_delete('widget_footer_recent_posts', 'widget');
	}
	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$number = isset($instance['number']) ? absint($instance['number']) : 5;
		$thumb = isset($instance['thumb']) ? absint($instance['thumb']) : 5;

?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'Theme2035'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:', 'Theme2035'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

<?php
	}
} 
register_widget('Theme2035_Footer_Recent_Posts_Widget');
//End footer recent posts widgets

?>