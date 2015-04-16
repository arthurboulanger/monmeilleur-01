<?php 


add_action('widgets_init','Recent_Comments_Widget');

function Recent_Comments_Widget() {
	register_widget('Recent_Comments_Widget');
	
	}

class Recent_Comments_Widget extends WP_Widget {
	function Recent_Comments_Widget() {
			
		$widget_ops = array('classname' => 'momizat-recent_comments','description' => __('Recent comments','theme'));
		$this->WP_Widget('recentcomments',__('[ CUSTOM ] Recent Comments  ','theme2035'),$widget_ops);

		}
		
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$count = $instance['count'];

		echo $before_widget;

		if ( $title )
			echo $before_title . $title . $after_title;
?>
  <div class="recent-comments custom-widget">
        <ul>
			<?php
			global $wpdb;
			$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_author_email, comment_date_gmt, comment_approved, comment_type, comment_author_url, SUBSTRING(comment_content,1,70) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT $count";
			$comments = $wpdb->get_results($sql);
			foreach ($comments as $comment) :?>	
            <li class="clearfix">
                <div class="pull-left recent-post-image">
                    <a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php echo strip_tags($comment->comment_author); ?> <?php _e('on ', 'framework'); ?><?php echo $comment->post_title; ?>"><?php echo get_avatar( $comment, '60' ); ?></a>
                </div>
                <div class="pull-left recent-comments-title-cont">
                    
	                <a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php echo strip_tags($comment->comment_author); ?> <?php _e('on ', 'framework'); ?><?php echo $comment->post_title; ?>"><?php echo strip_tags($comment->comment_author); ?></a> <span class="rc-post"><?php _e('in', 'theme'); ?>: <a href="<?php echo get_permalink($comment->ID); ?>"><?php echo $comment->post_title; ?></a></span>
	                <div class="recent-post-materials">
	                    <p><?php 
							$excerpt = $comment->com_excerpt;
							echo wp_html_excerpt($excerpt,60);
				            ?> [...] 
	        			</p>
        			</div>
                </div>
            </li>
    		<?php endforeach; ?>
        </ul>
        </div>
	<?php 
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = $new_instance['count'];

		return $instance;
	}
	
function form( $instance ) {

		$defaults = array(
				  'title' => __('Recent Comments','theme'),
				  'count' => 5
 			);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:','theme2035'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php echo __('Number Of Comments:','theme2035'); ?></label>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" />
		</p>

   <?php 
}
	} //end class