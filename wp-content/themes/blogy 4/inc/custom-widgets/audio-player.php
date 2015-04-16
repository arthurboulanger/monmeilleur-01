<?php
    add_action( 'widgets_init', 'init_audio_player' );
    function init_audio_player() { return register_widget('audio_player'); }
    
    class audio_player extends WP_Widget {
        function audio_player() {
            parent::WP_Widget( 'sf_recent_custom_portfolio', $name = '[ CUSTOM ] Audio Player');
        }


	
    function theme2035_audio_player() {
		$widget_ops = array('classname' => 'Audio Player','description' => __('Audio Player','theme2035'));	
		$this->WP_Widget('social_links',__('[ CUSTOM ] Audio Player','theme2035'),$widget_ops);
		}
	
	function widget( $args, $instance ) {
		extract( $args );
	$title = apply_filters('widget_title', $instance['title'] );
    $music_url = $instance['music_url'];
    $image_url = $instance['image_url'];
    $randnumb = substr(uniqid('', true), -5);
    ?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>


<script type="text/javascript">
jQuery(document).ready(function(){jQuery("#jquery_jplayer_<?php echo $randnumb; ?>").jPlayer({ready:function(){jQuery(this).jPlayer("setMedia",{title:"Audio",mp3:"<?php echo $music_url; ?>?<?php echo $randnumb; ?>"})},swfPath:"<?php echo THEMEROOT; ?>/js",supplied:"mp3",wmode:"window",cssSelectorAncestor:"#jp_container_<?php echo $randnumb; ?>",smoothPlayBar:true,keyEnabled:true,remainingDuration:true,toggleDuration:true})})
/*
jQuery(document).ready(function(){
    jQuery("#jquery_jplayer_<?php echo $randnumb; ?>").jPlayer({
        ready: function () {
            jQuery(this).jPlayer("setMedia", {
                title: "Audio",
                mp3: "<?php echo $music_url; ?>?<?php echo $randnumb; ?>"
            });
        },
        swfPath: "<?php echo THEMEROOT; ?>/js",
        supplied: "mp3",
        wmode: "window",
        cssSelectorAncestor: "#jp_container_<?php echo $randnumb; ?>",
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
    });
});
*/
</script>


        <div class="audio-player custom-widget clearfix">
            <div class="audio-player-widget clearfix" style="background : url('<?php echo $image_url; ?>') #000; background-size:310px 210px; ">
                <div id="jquery_jplayer_<?php echo $randnumb; ?>" class="jp-jplayer"></div>
                <div id="jp_container_<?php echo $randnumb; ?>" class="jp-audio">
                    <div class="jp-type-single">
                        <div class="jp-gui jp-interface">
                            <div class="controls-wrapper">
                                <ul class="jp-controls">
                                    <li><a href="javascript:;" class="jp-play" tabindex="1">&#61515;</a></li>
                                    <li><a href="javascript:;" class="jp-pause" tabindex="1">&#61516;</a></li>
                                </ul>
                            </div>
                            <div class="progress-wrapper">
                                <div class="jp-progress">
                                    <div class="jp-seek-bar">
                                        <div class="jp-play-bar"></div>
                                    </div>
                                </div>
                                <div class="jp-time-holder">
                                    <div class="jp-current-time"></div>
                                    <div class="jp-duration"></div>
                                </div>
                            </div>
                            <div class="volume-wrapper">
                                <div class="jp-volume-bar">
                                    <div class="jp-volume-bar-value"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $after_widget; ?>
        <?php 
	    }
	
	function update( $new_instance, $old_instance ) {
		    $instance = $old_instance;
            $instance['title'] = strip_tags( $new_instance['title'] );
            $instance['music_url'] = strip_tags( $new_instance['music_url'] );
            $instance['image_url'] = strip_tags( $new_instance['image_url'] );

		    return $instance;
	}
	
    function form( $instance ) {

		$defaults = array(
			'title' => __('Audio Player', 'theme2035'),
            'music_url' => '',
            'image_url' => '',

 			);
		    $instance = wp_parse_args( (array) $instance, $defaults );?>

        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'music_url' ); ?>"><?php echo __('Music Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'music_url' ); ?>" name="<?php echo $this->get_field_name( 'music_url' ); ?>" value="<?php echo $instance['music_url']; ?>"  />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('image_url'); ?>"><?php echo __('Player Background Image : (310x210px)', 'theme2035'); ?></label><br />
            <?php
                if ( $instance['image_url'] != '' ) :
                    echo '<img class="custom_media_image_2" src="' . $instance['image_url'] . '" style="margin:0;padding:0;width:100%;float:left;display:inline-block" /><br />';
                endif;
            ?>

            <input type="text" class="widefat custom_media_url_2" name="<?php echo $this->get_field_name('image_url'); ?>" id="<?php echo $this->get_field_id('image_url'); ?>" value="<?php echo $instance['image_url']; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_2" id="custom_media_button_2" name="<?php echo $this->get_field_name('image_url'); ?>" value="Upload Image" style="margin-top:5px;" />
        </p>
   <?php }} 