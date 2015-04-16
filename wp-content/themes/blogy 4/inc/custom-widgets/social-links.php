<?php 

    add_action('widgets_init','theme2035_social_links');

    function theme2035_social_links() {
	   register_widget('theme2035_social_links');
	}

class theme2035_social_links extends WP_Widget {
	
    function theme2035_social_links() {
		$widget_ops = array('classname' => 'social-links','description' => __('Social Links','theme2035'));	
		$this->WP_Widget('social_links',__('[ CUSTOM ] Social Links ','theme'),$widget_ops);
		}
	
	function widget( $args, $instance ) {
		extract( $args );
	$title = apply_filters('widget_title', $instance['title'] );
    $behance = $instance['behance'];
    $codepen = $instance['codepen'];
    $deviantart = $instance['deviantart'];
    $dribbble = $instance['dribbble'];
    $facebook = $instance['facebook'];
    $flickr = $instance['flickr'];
    $foursquare = $instance['foursquare'];
    $github = $instance['github'];
    $googleplus = $instance['googleplus'];
    $instagram =$instance['instagram'];
    $linkedin = $instance['linkedin'];
    $pinterest = $instance['pinterest'];
    $soundcloud = $instance['soundcloud'];
    $tumblr = $instance['tumblr'];
    $twitter = $instance['twitter'];
    $vimeo = $instance['vimeo'];
    $vine = $instance['vine'];
    $youtube = $instance['youtube'];
    ?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <div class="social-links custom-widget clearfix">
            <ul>
            <?php if ($behance != "") { ?><li class="behance"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Behance","theme2035"); ?>" target="_blank" href="<?php echo $behance; ?>"><i class="fa fa-behance "></i></a></li><?php } ?>
            <?php if ($codepen != "") { ?><li class="codepen"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Codepen","theme2035"); ?>" target="_blank" href="<?php echo $codepen; ?>"><i class="fa fa-codepen "></i></a></li><?php } ?>
            <?php if ($deviantart != "") { ?><li class="deviantart"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Deviantart","theme2035"); ?>" target="_blank" href="<?php echo $deviantart; ?>"><i class="fa fa-deviantart "></i></a></li><?php } ?>
            <?php if ($dribbble != "") { ?><li class="dribbble"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Dribbble","theme2035"); ?>" target="_blank" href="<?php echo $dribbble; ?>"><i class="fa fa-dribbble "></i></a></li><?php } ?>
            <?php if ($facebook != "") { ?><li class="facebook"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Facebook","theme2035"); ?>" target="_blank" href="<?php echo $facebook; ?>"><i class="fa fa-facebook "></i></a></li><?php } ?>
            <?php if ($flickr != "") { ?><li class="flickr"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Flickr","theme2035"); ?>" target="_blank" href="<?php echo $flickr; ?>"><i class="fa fa-flickr "></i></a></li><?php } ?>
            <?php if ($foursquare != "") { ?><li class="foursquare"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Foursquare","theme2035"); ?>" target="_blank" href="<?php echo $foursquare; ?>"><i class="fa fa-foursquare "></i></a></li><?php } ?>
            <?php if ($github != "") { ?><li class="github"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Github","theme2035"); ?>" target="_blank" href="<?php echo $github; ?>"><i class="fa fa-github "></i></a></li><?php } ?>
            <?php if ($googleplus != "") { ?><li class="google-plus"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Google +","theme2035"); ?>" target="_blank" href="<?php echo $googleplus; ?>"><i class="fa fa-google-plus "></i></a></li><?php } ?>
            <?php if ($instagram != "") { ?><li class="instagram"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Instagram","theme2035"); ?>" target="_blank" href="<?php echo $instagram; ?>"><i class="fa fa-instagram "></i></a></li><?php } ?>
            <?php if ($linkedin != "") { ?><li class="linkedin"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Linkedin","theme2035"); ?>" target="_blank" href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin "></i></a></li><?php } ?>
            <?php if ($pinterest != "") { ?><li class="pinterest"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Pinterest","theme2035"); ?>" target="_blank" href="<?php echo $pinterest; ?>"><i class="fa fa-pinterest "></i></a></li><?php } ?>
            <?php if ($soundcloud != "") { ?><li class="soundcloud"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Soundcloud","theme2035"); ?>" target="_blank" href="<?php echo $soundcloud; ?>"><i class="fa fa-soundcloud "></i></a></li><?php } ?>
            <?php if ($tumblr != "") { ?><li class="tumblr"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Tumblr","theme2035"); ?>" target="_blank" href="<?php echo $tumblr; ?>"><i class="fa fa-tumblr "></i></a></li><?php } ?>
            <?php if ($twitter != "") { ?><li class="twitter"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Twitter","theme2035"); ?>" target="_blank" href="<?php echo $twitter; ?>"><i class="fa fa-twitter "></i></a></li><?php } ?>
            <?php if ($vimeo != "") { ?><li class="vimeo"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Vimeo","theme2035"); ?>" target="_blank" href="<?php echo $vimeo; ?>"><i class="fa fa-vimeo-square "></i></a></li><?php } ?>
            <?php if ($vine != "") { ?><li class="vine"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Vine","theme2035"); ?>" target="_blank" href="<?php echo $vine; ?>"><i class="fa fa-vine "></i></a></li><?php } ?>
            <?php if ($youtube != "") { ?><li class="youtube"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Youtube","theme2035"); ?>" target="_blank" href="<?php echo $youtube; ?>"><i class="fa fa-youtube "></i></a></li><?php } ?>

            </ul>
        </div>
        <?php echo $after_widget; ?>
        <?php 
	    }
	
	function update( $new_instance, $old_instance ) {
		    $instance = $old_instance;
            $instance['title'] = strip_tags( $new_instance['title'] );
            $instance['behance'] = strip_tags( $new_instance['behance'] );
            $instance['codepen'] = strip_tags( $new_instance['codepen'] );
            $instance['deviantart'] = strip_tags( $new_instance['deviantart'] );
            $instance['dribbble'] = strip_tags( $new_instance['dribbble'] );
            $instance['facebook'] = strip_tags( $new_instance['facebook'] );
            $instance['flickr'] = strip_tags( $new_instance['flickr'] );
            $instance['foursquare'] = strip_tags( $new_instance['foursquare'] );
            $instance['github'] = strip_tags( $new_instance['github'] );
            $instance['googleplus'] = strip_tags( $new_instance['googleplus'] );
            $instance['instagram'] = strip_tags( $new_instance['instagram'] );
            $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
            $instance['pinterest'] = strip_tags( $new_instance['pinterest'] );
            $instance['soundcloud'] = strip_tags( $new_instance['soundcloud'] );
            $instance['tumblr'] = strip_tags( $new_instance['tumblr'] );
            $instance['twitter'] = strip_tags( $new_instance['twitter'] );
            $instance['vimeo'] = strip_tags( $new_instance['vimeo'] );
            $instance['vine'] = strip_tags( $new_instance['vine'] );
            $instance['youtube'] = strip_tags( $new_instance['youtube'] );

		    return $instance;
	}
	
    function form( $instance ) {

		$defaults = array(
			'title' => __('Socials Links', 'theme2035'),
            'behance' => '',
            'codepen' => '',
            'deviantart' => '',
            'dribbble' => '',
            'facebook' => '',
            'flickr' => '',
            'foursquare' => '',
            'github' => '',
            'googleplus' => '',
            'instagram' => '',
            'linkedin' => '',
            'pinterest' => '',
            'soundcloud' => '',
            'tumblr' => '',
            'twitter' => '',
            'vimeo' => '',
            'vine' => '',
            'youtube' => '',

 			);
		    $instance = wp_parse_args( (array) $instance, $defaults );?>

        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php echo __('Behance Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo $instance['behance']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'codepen' ); ?>"><?php echo __('Codepen Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'codepen' ); ?>" name="<?php echo $this->get_field_name( 'codepen' ); ?>" value="<?php echo $instance['codepen']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'deviantart' ); ?>"><?php echo __('Deviantart Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'deviantart' ); ?>" name="<?php echo $this->get_field_name( 'deviantart' ); ?>" value="<?php echo $instance['deviantart']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php echo __('Dribbble Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo $instance['dribbble']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php echo __('Facebook Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php echo __('Flickr Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo $instance['flickr']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'foursquare' ); ?>"><?php echo __('Foursquare Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'foursquare' ); ?>" name="<?php echo $this->get_field_name( 'foursquare' ); ?>" value="<?php echo $instance['foursquare']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php echo __('Github Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo $instance['github']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'googleplus' ); ?>"><?php echo __('Google Plus Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'googleplus' ); ?>" name="<?php echo $this->get_field_name( 'googleplus' ); ?>" value="<?php echo $instance['googleplus']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php echo __('Instagram Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo $instance['instagram']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php echo __('Linkedin Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo $instance['linkedin']; ?>"  />
        </p>  

        <p>
        <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php echo __('Pinterest Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo $instance['pinterest']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'soundcloud' ); ?>"><?php echo __('Soundcloud Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud' ); ?>" value="<?php echo $instance['soundcloud']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php echo __('Tumblr Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo $instance['tumblr']; ?>"  />
        </p> 

        <p>
        <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php echo __('Twitter Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>"  />
        </p>   

        <p>
        <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php echo __('Vimeo Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo $instance['vimeo']; ?>"  />
        </p>   

        <p>
        <label for="<?php echo $this->get_field_id( 'vine' ); ?>"><?php echo __('Vine Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'vine' ); ?>" name="<?php echo $this->get_field_name( 'vine' ); ?>" value="<?php echo $instance['vine']; ?>"  />
        </p>   

        <p>
        <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php echo __('Youtube Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo $instance['youtube']; ?>"  />
        </p>                

   <?php }} 