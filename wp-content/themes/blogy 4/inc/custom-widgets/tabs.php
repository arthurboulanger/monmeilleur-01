<?php
class wpt_widget extends WP_Widget {
    function __construct() {
        
        // add image sizes and load language file
        add_action( 'init', array(&$this, 'wpt_init') );
        
        // ajax functions
        add_action('wp_ajax_wpt_widget_content', array(&$this, 'ajax_wpt_widget_content'));
        add_action('wp_ajax_nopriv_wpt_widget_content', array(&$this, 'ajax_wpt_widget_content'));
        
        // css
        add_action('wp_enqueue_scripts', array(&$this, 'wpt_register_scripts'));
        add_action('admin_enqueue_scripts', array(&$this, 'wpt_admin_scripts'));
        
        $widget_ops = array('classname' => 'widget_wpt', 'description' => __('Display popular posts, recent posts, comments, and tags in tabbed format.', 'theme2035'));
        $control_ops = array('width' => 300, 'height' => 350);
        $this->WP_Widget('wpt_widget', __('[ CUSTOM ] Tab Widget ', 'theme2035'), $widget_ops, $control_ops);
    }   
    
    function wpt_init() {

        
        add_image_size( 'wp_review_small', 65, 65, true ); // small thumb
        add_image_size( 'wp_review_large', 320, 240, true ); // large thumb
    }
    function wpt_admin_scripts($hook) {
        if ($hook != 'widgets.php')
            return;
        wp_register_script('wpt_widget_admin', get_template_directory_uri() . '/js/widget/wpt-admin.js', array('jquery'));  
        wp_enqueue_script('wpt_widget_admin');
    }
    function wpt_register_scripts() { 
        // JS    
        wp_register_script('wpt_widget', get_template_directory_uri() . '/js/widget/wp-tab-widget.js', array('jquery'));     
        wp_localize_script( 'wpt_widget', 'wpt',         
            array( 'ajax_url' => admin_url( 'admin-ajax.php' )) 
        );        
    }  
        
    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'tabs' => array('recent' => 1, 'popular' => 1, 'comments' => 0, 'tags' => 0), 'tab_order' => array('popular' => 1, 'recent' => 2, 'comments' => 3, 'tags' => 4), 'post_num' => '5', 'comment_num' => '5', 'show_thumb' => 1, 'thumb_size' => 'small', 'show_date' => 1, 'show_excerpt' => 0, 'excerpt_length' => 10, 'show_comment_num' => 0, 'show_avatar' => 1) );
        extract($instance);
        ?>
        <div class="wpt_options_form">
        
        <h4><?php _e('Select Tabs', 'theme2035'); ?></h4>
        
        <div class="wpt_select_tabs">
            <label class="alignleft" style="display: block; width: 50%; margin-bottom: 5px" for="<?php echo $this->get_field_id("tabs"); ?>_popular">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("tabs"); ?>_popular" name="<?php echo $this->get_field_name("tabs"); ?>[popular]" value="1" <?php if (isset($tabs['popular'])) { checked( 1, $tabs['popular'], true ); } ?> />
                <?php _e( 'Popular Tab', 'theme2035'); ?>
            </label>
            <label class="alignleft" style="display: block; width: 50%; margin-bottom: 5px;" for="<?php echo $this->get_field_id("tabs"); ?>_recent">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("tabs"); ?>_recent" name="<?php echo $this->get_field_name("tabs"); ?>[recent]" value="1" <?php if (isset($tabs['recent'])) { checked( 1, $tabs['recent'], true ); } ?> />       
                <?php _e( 'Recent Tab', 'theme2035'); ?>
            </label>
            <label class="alignleft" style="display: block; width: 50%;" for="<?php echo $this->get_field_id("tabs"); ?>_comments">
                <input type="checkbox" class="checkbox wpt_enable_comments" id="<?php echo $this->get_field_id("tabs"); ?>_comments" name="<?php echo $this->get_field_name("tabs"); ?>[comments]" value="1" <?php if (isset($tabs['comments'])) { checked( 1, $tabs['comments'], true ); } ?> />
                <?php _e( 'Comments Tab', 'theme2035'); ?>
            </label>
            <label class="alignleft" style="display: block; width: 50%;" for="<?php echo $this->get_field_id("tabs"); ?>_tags">
                <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("tabs"); ?>_tags" name="<?php echo $this->get_field_name("tabs"); ?>[tags]" value="1" <?php if (isset($tabs['tags'])) { checked( 1, $tabs['tags'], true ); } ?> />
                <?php _e( 'Tags Tab', 'theme2035'); ?>
            </label>
        </div>
        <div class="clear"></div>
        
        <h4 class="wpt_tab_order_header"><a href="#"><?php _e('Tab Order', 'theme2035'); ?></a></h4>
        
        <div class="wpt_tab_order" style="display: none;">
            
            <label class="alignleft" for="<?php echo $this->get_field_id('tab_order'); ?>_popular" style="width: 50%;">
                <input id="<?php echo $this->get_field_id('tab_order'); ?>_popular" name="<?php echo $this->get_field_name('tab_order'); ?>[popular]" type="number" min="1" step="1" value="<?php echo $tab_order['popular']; ?>" style="width: 48px;" />
                <?php _e('Popular', 'theme2035'); ?>
            </label>
            <label class="alignleft" for="<?php echo $this->get_field_id('tab_order'); ?>_recent" style="width: 50%;">
                <input id="<?php echo $this->get_field_id('tab_order'); ?>_recent" name="<?php echo $this->get_field_name('tab_order'); ?>[recent]" type="number" min="1" step="1" value="<?php echo $tab_order['recent']; ?>" style="width: 48px;" />
                <?php _e('Recent', 'theme2035'); ?>
            </label>
            <label class="alignleft" for="<?php echo $this->get_field_id('tab_order'); ?>_comments" style="width: 50%;">
                <input id="<?php echo $this->get_field_id('tab_order'); ?>_comments" name="<?php echo $this->get_field_name('tab_order'); ?>[comments]" type="number" min="1" step="1" value="<?php echo $tab_order['comments']; ?>" style="width: 48px;" />
                <?php _e('Comments', 'theme2035'); ?>
            </label>
            <label class="alignleft" for="<?php echo $this->get_field_id('tab_order'); ?>_tags" style="width: 50%;">
                <input id="<?php echo $this->get_field_id('tab_order'); ?>_tags" name="<?php echo $this->get_field_name('tab_order'); ?>[tags]" type="number" min="1" step="1" value="<?php echo $tab_order['tags']; ?>" style="width: 48px;" />
                <?php _e('Tags', 'theme2035'); ?>
            </label>
        </div>
        <div class="clear"></div>
        
        <h4 class="wpt_advanced_options_header"><a href="#"><?php _e('Advanced Options', 'theme2035'); ?></a></h4>
        
        <div class="wpt_advanced_options" style="display: none;">

        
        <div class="wpt_post_options">

        <p>
            <label for="<?php echo $this->get_field_id('post_num'); ?>"><?php _e('Number of posts & comments to show:', 'theme2035'); ?>
                <br />
                <input id="<?php echo $this->get_field_id('post_num'); ?>" name="<?php echo $this->get_field_name('post_num'); ?>" type="number" min="1" step="1" value="<?php echo $post_num; ?>" />
            </label>
        </p>

        
        <p>         
            <label for="<?php echo $this->get_field_id("show_excerpt"); ?>">    
                <input type="checkbox" class="checkbox wpt_show_excerpt" id="<?php echo $this->get_field_id("show_excerpt"); ?>" name="<?php echo $this->get_field_name("show_excerpt"); ?>" value="1" <?php if (isset($show_excerpt)) { checked( 1, $show_excerpt, true ); } ?> />
                <?php _e( 'Show Comment excerpt', 'theme2035'); ?>
            </label>        
        </p>
        
        <p class="wpt_excerpt_length"<?php echo (empty($show_excerpt) ? ' style="display: none;"' : ''); ?>>
            <label for="<?php echo $this->get_field_id('excerpt_length'); ?>">
                <?php _e('Excerpt length (letter):', 'theme2035'); ?>   
                <br />
                <input type="number" min="1" step="1" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" value="<?php echo $excerpt_length; ?>" />
            </label>
        </p>    
          
     

        

        </div><!-- .wpt_comment_options -->
        </div><!-- .wpt_advanced_options -->
        </div><!-- .wpt_options_form -->
        <?php 
    }   
    
    function update( $new_instance, $old_instance ) {   
        $instance = $old_instance;    
        $instance['tabs'] = $new_instance['tabs'];  
        $instance['tab_order'] = $new_instance['tab_order'];  
        $instance['post_num'] = $new_instance['post_num'];  
        $instance['comment_num'] =  $new_instance['comment_num'];       
        $instance['show_thumb'] = $new_instance['show_thumb'];     
        $instance['thumb_size'] = $new_instance['thumb_size'];      
        $instance['show_date'] = $new_instance['show_date'];    
        $instance['show_excerpt'] = $new_instance['show_excerpt'];  
        $instance['excerpt_length'] = $new_instance['excerpt_length'];  
        $instance['show_comment_num'] = $new_instance['show_comment_num'];  
        $instance['show_avatar'] = $new_instance['show_avatar'];    
        return $instance;   
    }   
    function widget( $args, $instance ) {   
        extract($args);     
        extract($instance);    
        wp_enqueue_script('wpt_widget'); 
        wp_enqueue_style('wpt_widget');  
        if (empty($tabs)) $tabs = array('recent' => 1, 'popular' => 1);    
        $tabs_count = count($tabs);     
        if ($tabs_count <= 1) {       
            $tabs_count = 1;       
        } elseif($tabs_count > 3) {   
            $tabs_count = 4;      
        }
        
        $available_tabs = array('popular' => __('Popular', 'theme2035'), 
            'recent' => __('Recent', 'theme2035'), 
            'comments' => __('Comments', 'theme2035'), 
            'tags' => __('Tags', 'theme2035'));
            
        array_multisort($tab_order, $available_tabs);
        
        ?>  
       
        <div class="wpt_widget_content" id="<?php echo $widget_id; ?>_content">     
            <ul class="wpt-tabs <?php echo "has-$tabs_count-"; ?>tabs">
                <?php foreach ($available_tabs as $tab => $label) { ?>
                    <?php if (!empty($tabs[$tab])): ?>
                        <li class="tab_title"><a href="#" id="<?php echo $tab; ?>-tab"><?php echo $label; ?></a></li>   
                    <?php endif; ?>
                <?php } ?> 
            </ul> <!--end .tabs-->  
            <div class="clear"></div>  
            <div class="inside">        
                <?php if (!empty($tabs['popular'])): ?> 
                    <div id="popular-tab-content" class="tab-content">              
                    </div> <!--end #popular-tab-content-->       
                <?php endif; ?>       
                <?php if (!empty($tabs['recent'])): ?>  
                    <div id="recent-tab-content" class="tab-content">        
                    </div> <!--end #recent-tab-content-->       
                <?php endif; ?>                     
                <?php if (!empty($tabs['comments'])): ?>      
                    <div id="comments-tab-content" class="tab-content">     
                        <ul>                            
                        </ul>       
                    </div> <!--end #comments-tab-content-->     
                <?php endif; ?>            
                <?php if (!empty($tabs['tags'])): ?>       
                    <div id="tags-tab-content" class="tab-content">     
                        <ul>                        
                        </ul>            
                    </div> <!--end #tags-tab-content-->  
                <?php endif; ?> 
                <div class="clear"></div>   
            </div> <!--end .inside -->  
            <div class="clear"></div>
        </div><!--end #tabber -->    
        <?php    
        // inline script 
        // to support multiple instances per page with different settings   
        
        unset($instance['tabs'], $instance['tab_order']); // unset unneeded  
        ?>  
        <script type="text/javascript">  
            jQuery(function($) {    
                $('#<?php echo $widget_id; ?>_content').data('args', <?php echo json_encode($instance); ?>);  
            });  
        </script>  
       
        <?php 
    }  
    
     
    function ajax_wpt_widget_content() {     
        $tab = $_POST['tab'];       
        $args = $_POST['args'];  
        $page = intval($_POST['page']);    
        if ($page < 1)        
            $page = 1;            
        if (!is_array($args))      
            return '';
        
        // sanitize args        
        $post_num = (empty($args['post_num']) ? 5 : intval($args['post_num']));    
        if ($post_num > 20 || $post_num < 1) { // max 20 posts
            $post_num = 5;   
        }      
        $comment_num = (empty($args['comment_num']) ? 5 : intval($args['comment_num']));   
        if ($comment_num > 20 || $comment_num < 1) {  
            $comment_num = 5;    
        }       
        $show_thumb = !empty($args['show_thumb']);
        $thumb_size = $args['thumb_size'];
        if ($thumb_size != 'small' && $thumb_size != 'large') {
            $thumb_size = 'small'; // default
        }
        $show_date = !empty($args['show_date']);     
        $show_excerpt = !empty($args['show_excerpt']);  
        $excerpt_length = intval($args['excerpt_length']);
        if ($excerpt_length > 50 || $excerpt_length < 1) {  
            $excerpt_length = 10;   
        }   
        $show_comment_num = !empty($args['show_comment_num']);  
        $show_avatar = !empty($args['show_avatar']);   
 
        
        /* ---------- Tab Contents ---------- */    
        switch ($tab) {        
          
            /* ---------- Popular Posts ---------- */   
            case "popular":      
                ?>       
                <ul>                

<?php setPostViews(get_the_ID());
$exclude = "";
$reset = "";
$ex=explode(",",$exclude);
query_posts(array('meta_key'=> 'post_views_count','posts_per_page'=>$post_num,'orderby'=>'meta_value_num','order'=>'DESC','post_type' => array('post', 'page'), 'post__not_in' =>$ex)); ?>
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

                </ul>
                <div class="clear"></div>                  
                <?php           
            break;              
            
            /* ---------- Recent Posts ---------- */      
            case "recent":           
                ?>         
                <ul>            
                    <?php              
                    $recent = new WP_Query('posts_per_page='. $post_num .'&orderby=post_date&order=desc&post_status=publish&paged='. $page);       
                    $last_page = $recent->max_num_pages;      
                    while ($recent->have_posts()) : $recent->the_post();    
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
                    <?php endwhile; wp_reset_query(); ?>        
                </ul>
                <div class="clear"></div>               
                <?php       
            break;     
            
            /* ---------- Latest Comments ---------- */        
            case "comments":         
                ?>          
                <ul>            
                    <?php              
                    $no_comments = false;         
                    $avatar_size = 65;                   
                    $comments_total = new WP_Comment_Query();     
                    $comments_total_number = $comments_total->query(array('count' => 1));   
                    $last_page = ceil($comments_total_number / $post_num);       
                    $comments_query = new WP_Comment_Query();   
                    $offset = ($page-1) * $post_num;         
                    $comments = $comments_query->query( array( 'number' => $post_num, 'offset' => $offset ) );    
                    if ( $comments ) : foreach ( $comments as $comment ) : ?>       
                        <li>                        
                                



                                <div class="pull-left recent-post-image">
                                    <a href="<?php echo get_permalink($comment->ID); ?>#comment-<?php echo $comment->comment_ID; ?>" title="<?php echo strip_tags($comment->comment_author); ?> <?php _e('on ', 'framework'); ?><?php echo $comment->post_title; ?>"><?php echo get_avatar( $comment, '60' ); ?></a>
                                </div>            
                                <div class="pull-left recent-comments-title-cont">
                                    <a href="<?php echo get_comment_link($comment->comment_ID); ?>">   
                                        <span class="wpt_comment_author"><?php echo get_comment_author( $comment->comment_ID ); ?> </span> - <span class="wpt_comment_post"><?php echo get_the_title($comment->comment_post_ID); ?></span>                   
                                    </a>
                                                        <div class="recent-post-materials">
                       <p><?php echo $this->truncate(strip_tags(apply_filters( 'get_comment_text', $comment->comment_content )), $excerpt_length);?></p>
                    </div>
                                </div> 



                 
                            </a>                
                            <div class="clear"></div>      
                        </li>           
                    <?php endforeach; else : ?>           
                        <li>                   
                            <div class="no-comments"><?php _e('No comments yet.', 'theme2035'); ?></div>        
                        </li>                             
                        <?php $no_comments = true; 
                    endif; ?>       
                </ul>       
                <?php $allow_pagination = ""; if ($allow_pagination && !$no_comments) : ?>           
                    <?php $this->tab_pagination($page, $last_page); ?>      
                <?php endif; ?>                     
                <?php           
            break;             
            
            /* ---------- Tags ---------- */   
            case "tags":        
                ?>
                <div class="tagcloud clearfix"> 
                    <div class="pull-left margint20 tag-tab-box clearfix">           
                    <?php
                        $tag_check = wp_tag_cloud('format=array');
                        $tags = wp_tag_cloud();
                        if(count($tag_check) == 0){
                            _e('No tags created.', 'theme2035');
                        }
                    ?>
                    </div>
                </div>
                <?php            
            break;            
        }              
        die(); // required to return a proper result  
    }    
    function tab_pagination($page, $last_page) {  
        ?>   
        <div class="wpt-pagination">     
            <?php if ($page > 1) : ?>               
                <a href="#" class="previous"><span><?php _e('&laquo; Previous', 'theme2035'); ?></span></a>      
            <?php endif; ?>        
            <?php if ($page != $last_page) : ?>     
                <a href="#" class="next"><span><?php _e('Next &raquo;', 'theme2035'); ?></span></a>      
            <?php endif; ?>          
        </div>                   
        <div class="clear"></div>
        <input type="hidden" class="page_num" name="page_num" value="<?php echo $page; ?>" />    
        <?php   
    }
    
    function excerpt($limit = 10) {
          $excerpt = explode(' ', get_the_excerpt(), $limit);
          if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
          } else {
            $excerpt = implode(" ",$excerpt);
          }
          $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
          return $excerpt;
    }
    function truncate($str, $length = 24) {
        if (mb_strlen($str) > $length) {
            return mb_substr($str, 0, $length).'...';
        } else {
            return $str;
        }
    }
}
add_action( 'widgets_init', create_function( '', 'register_widget( "wpt_widget" );' ) );

// unregister MTS Tabs Widget and Tabs Widget v2
add_action('widgets_init', 'unregister_mts_tabs_widget', 100);
function unregister_mts_tabs_widget() {
    unregister_widget('mts_Widget_Tabs_2');
    unregister_widget('mts_Widget_Tabs');
}

?>