<?php

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

global $exclude;
$exclude=array();

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
        
            if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }   
    return $count.' Views'; 
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// Add view counter to each page

add_filter ('the_content', 'view_counter');
function view_counter($content) {
  if(is_single() && !is_page()) {
      setPostViews(get_the_ID());
  }
   return $content;
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

// add widget to sidebar

class PopularPostsWidget extends WP_Widget
{
  function PopularPostsWidget()
  {
    $widget_ops = array('classname' => 'PopularPostsWidget', 'description' => 'Displays a list of the most viewed content.' );
    $this->WP_Widget('PopularPostsWidget', '[ CUSTOM ] Most Popular Post ', $widget_ops);
      }
 
  function form($instance)
  {
    $exclude=array();
    $instance = wp_parse_args( (array) $instance, array( 'title' => 'Most Popular' ) );
    $title = $instance['title'];
    $instance = wp_parse_args( (array) $instance, array( 'max' => '10' ) );
    $max = $instance['max'];
    $instance = wp_parse_args( (array) $instance, array( 'exclude' => '' ) );
    $exclude = $instance['exclude'];    
    $instance = wp_parse_args( (array) $instance, array( 'showviews' => 'true' ) );
    $showviews = $instance['showviews'];
    $instance = wp_parse_args( (array) $instance, array( 'reset' => 'No' ) );
    $reset = $instance['reset'];
    
?>



        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:','theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'max' ); ?>"><?php echo __('Number of posts/pages to show:','theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'max' ); ?>" name="<?php echo $this->get_field_name( 'max' ); ?>" value="<?php echo $instance['max']; ?>" />
        </p>
        
        <p>
        <label for="<?php echo $this->get_field_id( 'exclude' ); ?>"><?php echo __('Exclude IDs of posts/pages (separate by commas):','theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'exclude' ); ?>" name="<?php echo $this->get_field_name( 'exclude' ); ?>" value="<?php echo $instance['exclude']; ?>" />
        </p>

       <p>
        <label for="<?php echo $this->get_field_id( 'showviews' ); ?>"><?php echo __('Show Views Number?', 'theme2035'); ?></label>
        <select class="widefat" id="<?php echo $this->get_field_id('showviews'); ?>" name="<?php echo $this->get_field_name('showviews'); ?>">
            <option value="true" <?php echo ($instance['showviews'] == 'true') ? 'selected=""' : ''; ?>>Yes</option> 
            <option value="false" <?php echo ($instance['showviews'] == 'false') ? 'selected=""' : ''; ?>>No</option> 
        </select>
        </p>


        <p>
        <label for="<?php echo $this->get_field_id( 'exclude' ); ?>"><?php echo __('Reset Statics : ','theme2035'); ?></label>
        <input  name="<?php echo $this->get_field_name('reset'); ?>" type="checkbox" id="<?php echo $this->get_field_id('reset'); ?>" value="Yes"  <?php if ($reset=="Yes"){
        echo "checked=\"checked\"";
        } ?>>
          Yes</label>
        </p>
        <?php
 }
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['max'] = $new_instance['max'];
    $instance['exclude'] = $new_instance['exclude'];
    $instance['showviews'] = $new_instance['showviews'];
    $instance['reset'] = $new_instance['reset'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 $exclude=array();
  echo $before_widget;
  $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
  $max = empty($instance['max']) ? ' ' : apply_filters('widget_title', $instance['max']);
  $showviews = empty($instance['showviews']) ? ' ' : apply_filters('widget_title', $instance['showviews']);
  $exclude = empty($instance['exclude']) ? ' ' : apply_filters('widget_title', $instance['exclude']);
   $reset = empty($instance['reset']) ? ' ' : apply_filters('widget_title', $instance['reset']);
     if (!empty($title))
      echo $before_title . $title . $after_title;      
 
    // WIDGET CODE GOES HERE        
?>

<?php setPostViews(get_the_ID());
$ex=explode(",",$exclude);
query_posts(array('meta_key'=> 'post_views_count','posts_per_page'=>$max,'orderby'=>'meta_value_num','order'=>'DESC','post_type' => array('post', 'page'), 'post__not_in' =>$ex)); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); 
if ($reset=="Yes") { 
$id=get_the_ID();
update_post_meta($id, 'post_views_count','0');
}
else {
$reset="No";
}

?>

            <div class="recent-post-box clearfix">
                <div class="pull-left recent-post-image"> 
                 <?php 
                the_post_thumbnail('thumbnail'); ?> 
                </div>
                <div class="pull-left recent-post-title-cont "> 

                    <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
                    <span class="recent-post-materials">
                        <ul>
                            <li><a href="<?php the_permalink(); ?>"><?php echo $post_date = the_time('F j'); ?></a></li>
                            <li><?php echo "&nbsp;&nbsp;&nbsp;"; the_category(', '); ?></li>
                        </ul>
                    </span> 
                 </div>
            </div>

<?php endwhile; endif; wp_reset_query(); ?>

<?php 

// END WIDGET CODE

    echo $after_widget;  
}
}
add_action( 'widgets_init', create_function('', 'return register_widget("PopularPostsWidget");') );

?>