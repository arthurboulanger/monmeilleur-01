<?php


// == Dribbble =============================================


add_action('widgets_init','theme2035_dribbbble');

function theme2035_dribbbble() {
    register_widget('theme2035_dribbbble');
    }


class theme2035_dribbbble extends WP_Widget {
    
    function theme2035_dribbbble() {

        $widget_ops = array( 
            'classname' => 'dribbbble', 
            'description' => __( '[ CUSTOM ] Dribbble Designs ','theme2035') );


        $control_ops = array( "width"=>200);
         parent::WP_Widget(false,__( "[ CUSTOM ] Dribbble Designs " ,'theme2035'),$widget_ops,$control_ops); }
    

    function update($new_instance, $old_instance) {
            $instance = $old_instance; 
            
            $instance['title']= strip_tags($new_instance['title']); 
            $instance['dribble_username']= strip_tags($new_instance['dribble_username']); 
            $instance['numberdesign']= strip_tags($new_instance['numberdesign']); 
            return $instance;
    }


    function form($instance) {
         $title = $dribble_username = $numberdesign = '';

        if(isset($instance['title'])) $title = esc_attr($instance['title']);
        if(isset($instance['dribble_username'])) $dribble_username = esc_attr($instance['dribble_username']);
        if(isset($instance['numberdesign'])) $numberdesign = esc_attr($instance['numberdesign']);
         ?>
        
        <p> 
        <label for="<?php echo $this->get_field_id('title'); ?>"> <?php echo __('Title','theme2035'); ?> </label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        
        <p> 
        <label for="<?php echo $this->get_field_id('dribble_username'); ?>"> <?php echo __('Dribbble Username','theme2035'); ?> </label>
        <input class="widefat" id="<?php echo $this->get_field_id('dribble_username'); ?>" name="<?php echo $this->get_field_name('dribble_username'); ?>" type="text" value="<?php echo $dribble_username; ?>" />
        </p>
     
        <p> 
        <label for="<?php echo $this->get_field_id('numberdesign'); ?>"> <?php echo __('Number of Photos','theme2035'); ?> </label>
        <input class="widefat" id="<?php echo $this->get_field_id('numberdesign'); ?>" name="<?php echo $this->get_field_name('numberdesign'); ?>" type="text" value="<?php echo $numberdesign; ?>" />
        </p>
        
        <?php
         }

        function widget($args, $instance) { 
        
        extract($args); 
        
        $title = esc_attr($instance['title']); 
        $dribble_username = esc_attr($instance['dribble_username']);
        $count = esc_attr($instance['numberdesign']);
        

            echo $before_widget; 
            
            if($title!="")
            echo $before_title." ".$instance['title'].$after_title;
            
            $value = wp_remote_get('http://api.dribbble.com/players/'.$dribble_username.'/shots');
            
            $value = json_decode($value['body'],true);

        if(isset($value['message']) && $value['message'] =="Not found" )
        {
           echo __("Oppss. Houston, We've Got a Problem.",'theme2035');
        }
        else {
        $shots = "<div class='dribbble-widget widget-slider noarrow clearfix'><ul class='slides'>";
        $n=0;

        if(isset($value['shots']) && is_array($value['shots']) )
        foreach($value['shots'] as $shot)
        {
            if($n>=$count) break;
            $shots = $shots . "<li><a itemprop='url' href='".$shot['url']."' title='".$shot['title']."'><img src='".$shot['image_url']."' /></a></li>";
            $n++;
        }
        echo $shots."</ul></div>";
        }
            echo $after_widget; 
            
            }

        }
