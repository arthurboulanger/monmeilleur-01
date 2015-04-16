<?php 

    add_action( 'widgets_init', 'init_author_widget' );
    function init_author_widget() { return register_widget('author_widget'); }
    
    class author_widget extends WP_Widget {
        function author_widget() {
            parent::WP_Widget( 'init_author_widget', $name = '[ CUSTOM ] Author Box Widget ');
        }

	
	function widget( $args, $instance ) {
		extract( $args );
    $background_cover = $instance['background_cover'];
    $author_image = $instance['author_image'];
    $author_name = $instance['author_name'];
    $author_url = $instance['author_url'];
    $jobtitle = $instance['jobtitle'];
    $description = $instance['description'];
    $live = $instance['live'];
    $avaiblefreelance = $instance['avaiblefreelance'];
    ?>
        <?php echo $before_widget; ?>
        <div class="author-widget custom-widget clearfix">
            <div class="author-cover-background" style="background: url('<?php echo $background_cover; ?>'); background-size:cover;">
                <div class="author-avatar">
                    <img height="80" width="80" src="<?php echo $author_image; ?>" class="img-circle" >
                </div>
            </div>
            <div class="author-info pos-center clearfix">
                <?php if($author_name != "" ){ ?> <h2><a href="<?php echo $author_url; ?> "><?php echo $author_name; ?></a></h2><?php } ?>
                <?php if($description != "" ){ ?><p><?php echo $description; ?></p><?php } ?>
            </div>
            <div class="author-works">
                <div class="works-title"><?php echo __("Currently","theme2035") ?></div>
                <div class="works-details">
                    <ul>
                        <?php if($jobtitle != "" ){ ?><li><p><i class="fa fa-apple"></i><?php echo $jobtitle; ?></p></li><?php } ?>
                        <?php if($live != "" ){ ?><li><p><i class="fa fa-map-marker f-icon"></i>in <span class="active-color"><?php echo $live; ?></span></p></li><?php } ?>
                        <?php if($avaiblefreelance == "true" ){ ?><li><p><i class="fa fa-circle f-icontwo"></i><?php echo __("Avaible for Freelance","theme2035"); ?></p></li><?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php echo $after_widget; ?>
        <?php 
	    }
	
	function update( $new_instance, $old_instance ) {
		    $instance = $old_instance;
            $instance['background_cover'] = strip_tags( $new_instance['background_cover'] );
            $instance['author_image'] = strip_tags( $new_instance['author_image'] );
            $instance['author_name'] = strip_tags( $new_instance['author_name'] );
            $instance['author_url'] = strip_tags( $new_instance['author_url'] );
            $instance['jobtitle'] = strip_tags( $new_instance['jobtitle'] );
            $instance['description'] = strip_tags( $new_instance['description'] );
            $instance['live'] = strip_tags( $new_instance['live'] );
            $instance['avaiblefreelance'] = strip_tags( $new_instance['avaiblefreelance'] );
		    return $instance;
	}
	
    function form( $instance ) {

		$defaults = array(
            'background_cover' => '',
            'author_image' => '',
            'author_name' => '',
            'author_url' => '',
            'jobtitle' => '',
            'description' => '',
            'live' => '',
            'avaiblefreelance' => '',
 			);
		    $instance = wp_parse_args( (array) $instance, $defaults );?>

        <p>
            <label for="<?php echo $this->get_field_id('background_cover'); ?>">Author Background Cover : (360x160px)</label><br />
            <?php
                if ( $instance['background_cover'] != '' ) :
                    echo '<img class="custom_media_image" src="' . $instance['background_cover'] . '" style="margin:0;padding:0;width:100%;float:left;display:inline-block" /><br />';
                endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('background_cover'); ?>" id="<?php echo $this->get_field_id('background_cover'); ?>" value="<?php echo $instance['background_cover']; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('background_cover'); ?>" value="Upload Image" style="margin-top:5px;" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('author_image'); ?>">Author Image : (80px x 80px)</label><br />
            <?php
                if ( $instance['author_image'] != '' ) :
                    echo '<img class="custom_media_image_2" src="' . $instance['author_image'] . '" style="margin:0;padding:0;width:100%;float:left;display:inline-block" /><br />';
                endif;
            ?>

            <input type="text" class="widefat custom_media_url_2" name="<?php echo $this->get_field_name('author_image'); ?>" id="<?php echo $this->get_field_id('author_image'); ?>" value="<?php echo $instance['author_image']; ?>" style="margin-top:5px;">
            <input type="button" class="button button-primary custom_media_button_2" id="custom_media_button_2" name="<?php echo $this->get_field_name('author_image'); ?>" value="Upload Image" style="margin-top:5px;" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'author_name' ); ?>"><?php echo __('Author Name:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'author_name' ); ?>" name="<?php echo $this->get_field_name( 'author_name' ); ?>" value="<?php echo $instance['author_name']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'author_url' ); ?>"><?php echo __('Author Url:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'author_url' ); ?>" name="<?php echo $this->get_field_name( 'author_url' ); ?>" value="<?php echo $instance['author_url']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php echo __('Description:', 'theme2035'); ?></label>
        <textarea class="widefat" type="text" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo $instance['description']; ?></textarea>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'jobtitle' ); ?>"><?php echo __('Job Title & Work:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'jobtitle' ); ?>" name="<?php echo $this->get_field_name( 'jobtitle' ); ?>" value="<?php echo $instance['jobtitle']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'live' ); ?>"><?php echo __('Live in:', 'theme2035'); ?></label>
        <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'live' ); ?>" name="<?php echo $this->get_field_name( 'live' ); ?>" value="<?php echo $instance['live']; ?>"  />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'freelance' ); ?>"><?php echo __('Avaible For Freelance?', 'theme2035'); ?></label>
        <select class="widefat" id="<?php echo $this->get_field_id('avaiblefreelance'); ?>" name="<?php echo $this->get_field_name('avaiblefreelance'); ?>">
            <option value="true" <?php echo ($instance['avaiblefreelance'] == 'true') ? 'selected=""' : ''; ?>>Yes</option> 
            <option value="false" <?php echo ($instance['avaiblefreelance'] == 'false') ? 'selected=""' : ''; ?>>No</option> 
        </select>
        </p>


            

   <?php }} 