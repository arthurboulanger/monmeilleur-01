<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign

	
add_filter( 'rwmb_meta_boxes', 'Theme2035_register_meta_boxes' );

function Theme2035_register_meta_boxes( $meta_boxes )
{






$prefix = 'theme2035_';
global $theme_prefix;
global $meta_boxes;

$sidebars = $GLOBALS['wp_registered_sidebars'];
foreach ( $sidebars as $sidebar ) { 
   $sidebar_options[$sidebar['id']] = $sidebar['name'];
}

$meta_boxes = array();


/*-----------------------------------------------------------------------------------*/
/*  Team Metabox
/*-----------------------------------------------------------------------------------*/

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'team-member',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Team', 'theme2035-fm' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array('team' ),


	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			'name'		=> __('Member Team Position',"theme2035"),
			'id'		=> $prefix . 'team_member_position',
			'desc'		=> __('Enter member Team Position','theme2035-fm'),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	
		array(
			'name'		=> __('Team Description',"theme2035"),
			'id'		=> $prefix . 'team_member_desc',
			'desc'		=> __('Enter member Description','theme2035-fm'),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),						
		array(
			'type' => 'heading',
			'name' => __( 'Social Media (We suggest use max 4 social links)', 'theme2035-fm' ),
			'id'   => 'fake_id', // Not used but needed for plugin
		),					
		array(
			'name'		=> __('E-Mail',"theme2035"),
			'id'		=> $prefix .'team_email',
			'desc'		=> __('Enter member E-Mail Address','theme2035-fm'),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),					
		array(
			'name'		=> __('Dribble',"theme2035"),
			'id'		=> $prefix .'team_member_dribbble',
			'desc'		=> __('Enter member just Dribbble username http://dribbble.com/<b>2035themes</b>','theme2035-fm'),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	
		array(
			'name'		=> __('Facebook',"theme2035"),
			'id'		=> $prefix .'team_member_facebook',
			'desc'		=> __('Enter member just Facebook username http://facebook.com/<b>2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),				
		array(
			'name'		=> __('Flickr',"theme2035"),
			'id'		=> $prefix .'team_member_flickr',
			'desc'		=> __('Enter member just Flickr username http://flickr.com/<b>2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Github',"theme2035"),
			'id'		=> $prefix .'team_member_github',
			'desc'		=> __('Enter member just Github username http://github.com/<b>2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'		=> __('Instagram',"theme2035"),
			'id'		=> $prefix .'team_member_instagram',
			'desc'		=> __('Enter member just Instagram username http://instagram.com/<b>2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),				
		array(
			'name'		=> __('Linkedin',"theme2035"),
			'id'		=> $prefix .'team_member_linkedin',
			'desc'		=> __('Enter member just Linkedin username http://linkedin.com/in/<b>2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),			

		array(
			'name'		=> __('Pinterest',"theme2035"),
			'id'		=> $prefix .'team_member_pinterest',
			'desc'		=> __('Enter member just Pinterest username http://pinterest.com/<b>2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	
		array(
			'name'		=> __('Tumblr',"theme2035"),
			'id'		=> $prefix .'team_member_tumblr',
			'desc'		=> __('Enter your tumblr blog name http://<b>2035themes</b>.tumblr.com',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	
		array(
			'name'		=> __('Twitter',"theme2035"),
			'id'		=> $prefix .'team_member_twitter',
			'desc'		=> __('Enter member just Twitter username http://twitter.com/<b>2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),			
		array(
			'name'		=> __('Youtube',"theme2035"),
			'id'		=> $prefix .'team_member_youtube',
			'desc'		=> __('Enter member just Youtube username http://youtube.com/<b>2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	
		array(
			'type' => 'heading',
			'name' => __( 'Add Custom Link - 1', 'theme2035-fm' ),
			'id'   => 'fake_id', // Not used but needed for plugin
		),	
		array(
			'name'		=> __('Custom Link Name',"theme2035"),
			'id'		=> $prefix .'team_member_custom_link_name_1',
			'desc'		=> __('Enter member custom Link Name Example : <b>Twitter</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),							
		array(
			'name'		=> __('Custom Link Url',"theme2035"),
			'id'		=> $prefix .'team_member_custom_link_url_1',
			'desc'		=> __('Enter member custom Link Url <b>http://example.com/2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	
		array(
			'name' => __( 'Custom Link Icon', 'theme2035-fm' ),
			'id'   => "{$prefix}team_member_custom_link_icon_1",
			'type' => 'thickbox_image',
			'desc'		=> __('Icon Must be 25x25px',"theme2035"),		
			 ),	
		array(
			'type' => 'heading',
			'name' => __( 'Add Custom Link - 2', 'theme2035-fm' ),
			'id'   => 'fake_id', // Not used but needed for plugin
		),	
		array(
			'name'		=> __('Custom Link Name',"theme2035"),
			'id'		=> $prefix .'team_member_custom_link_name_2',
			'desc'		=> __('Enter member custom Link Name Example : <b>Twitter</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),								
		array(
			'name'		=> __('Custom Link Url',"theme2035"),
			'id'		=> $prefix .'team_member_custom_link_url_2',
			'desc'		=> __('Enter member custom Link Url <b>http://example.com/2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	

		array(
			'name' => __( 'Custom Link Icon', 'theme2035-fm' ),
			'id'   => "{$prefix}team_member_custom_link_icon_2",
			'type' => 'thickbox_image',
			'desc'		=> __('Icon Must be 25x25px',"theme2035"),	
			 ),	
		array(
			'type' => 'heading',
			'name' => __( 'Add Custom Link - 3', 'theme2035-fm' ),
			'id'   => 'fake_id', // Not used but needed for plugin
		),
		array(
			'name'		=> __('Custom Link Name',"theme2035"),
			'id'		=> $prefix .'team_member_custom_link_name_3',
			'desc'		=> __('Enter member custom Link Name Example : <b>Twitter</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),									
		array(
			'name'		=> __('Custom Link Url',"theme2035"),
			'id'		=> $prefix .'team_member_custom_link_url_3',
			'desc'		=> __('Enter member custom Link Url <b>http://example.com/2035themes</b>',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),	

		array(
			'name' => __( 'Custom Link Icon', 'theme2035-fm' ),
			'id'   => "{$prefix}team_member_custom_link_icon_3",
			'type' => 'thickbox_image',
			'desc'		=> __('Icon Must be 25x25px',"theme2035"),		
			 ),				 			 			
	)
);

/*-----------------------------------------------------------------------------------*/
/*  Portfolio Metabox
/*-----------------------------------------------------------------------------------*/

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'portfolio-slide',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Images', 'theme2035-fm' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array('portfolio' ),

	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			'name'		=> __('Clients Name',"theme2035"),
			'id'		=> $prefix . 'clients_name',
			'desc'		=> __('Enter your clients name',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Portfolio Description',"theme2035"),
			'id'		=> $prefix . 'portfolio_desc',
			'desc'		=> __('Enter portfolio Description','theme2035-fm'),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		array(
			'name'		=> __('Project Web site',"theme2035"),
			'id'		=> $prefix . 'project_web_site',
			'desc'		=> __('Enter your project web site',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),			
		array(
			'name'	=> __('Portfolio Gallery','2035Themes-fm'),
			'desc'	=> __('Max Photo Limit is <b>25</b>','2035Themes-fm'),
			'id'	=> $prefix . 'blogslides',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 25,
		)		
	)
);


$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'portfolio-video',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Video', 'theme2035-fm' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array('portfolio' ),


	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			'name'		=> __('Clients Name',"theme2035"),
			'id'		=> $prefix . 'clients_name_video',
			'desc'		=> __('Enter your clients name',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		array(
			'name'		=> __('Portfolio Description',"theme2035"),
			'id'		=> $prefix . 'portfolio_desc_video',
			'desc'		=> __('Enter portfolio Description','theme2035-fm'),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
		array(
			'name'		=> __('Project Web site',"theme2035"),
			'id'		=> $prefix . 'project_web_site_video',
			'desc'		=> __('Enter your project web site',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),		
		array(
			'name'		=> __('Video Embed Code',"theme2035"),
			'id'		=> $prefix . 'portfolio_embed_video',
			'desc'		=> __('Enter your embed code',"theme2035"),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),				
	)
);


/*-----------------------------------------------------------------------------------*/
/*  Post Types Metabox
/*-----------------------------------------------------------------------------------*/


//  Blog Post Slides Metabox

$meta_boxes[] = array(
	'id'		=> 'theme2035-blogmeta-gallery',
	'title'		=> __('Blog Post Image Slides',"theme2035"),
	'pages'		=> array( 'post', ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> __('Portfolio Gallery','2035Themes-fm'),
			'desc'	=> __('Max Photo Limit is <b>25</b>','2035Themes-fm'),
			'id'	=> $prefix . 'galleryslides',
			'type'	=> 'image_advanced',
			'max_file_uploads' => 25,
		)
		
	)
);

// Audio

$meta_boxes[] = array(
	'id' => 'theme2035-blogmeta-audio',
	'title' => __('Audio Settings',"theme2035"),
	'pages' => array( 'post'),
	'context' => 'normal',


	'fields' => array(	
		array(
			'name'		=> __('Audio Code',"theme2035"),
			'id'		=> $prefix . 'audio',
			'desc'		=> __('Enter your Audio URL(Oembed) or Embed Code.',"theme2035"),
			'clone'		=> false,
			'type'		=> 'textarea',
			'std'		=> ''
		),
			// FILE ADVANCED (WP 3.5+)
			array(
				'name' => __( 'or Upload Your Audio File', 'rwmb' ),
				'id'   => $prefix . 'file_advanced',
				'type' => 'file_advanced',
				'max_file_uploads' => 4,
				'mime_type' => 'application,audio,video', // Leave blank for all file types
			),
	)
);

// Video
$meta_boxes[] = array(
	'id'		=> 'theme2035-blogmeta-video',
	'title'		=> __('Blog Video Settings',"theme2035"),
	'pages'		=> array( 'post' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'	=> __('Embed Code',"theme2035"),
			'id'	=> $prefix . 'video_embed',
			'desc'	=> __('Insert paste embed code',"theme2035"),
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "38",
			'rows' 	=> "10"
		)
	)
);
$blog_type = $theme_prefix['blog-post-page-type'];

$meta_boxes[] = array(
	'id' => 'post-page-type',
	'title' => __( 'Post Page Options', 'theme2035' ),
	'pages' => array('post'),
	'fields' => array(				
		array(
			'name'     => __( 'Page Type', 'theme2035' ),
			'id'       => $prefix . 'pagetype',
			'type'     => 'select',
			'desc'     => __('Please select post page type','theme2035'),
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'modern' => __( 'Modern', 'theme2035' ),
				'classic' => __( 'Classic', 'theme2035' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'placeholder' => __( 'Select Post Page Type', 'theme2035' ),
			'std'		=> $blog_type
		)										
	),
);

$meta_boxes[] = array(
	'id' => 'post-video-cover',
	'title' => __( 'Video Cover', 'theme2035' ),
	'pages' => array('post'),
	'fields' => array(				
		array(
			'name'		=> __('Video Url',"theme2035"),
			'id'		=> $prefix . 'video_url',
			'desc'		=> __('Please upload your .mp4 videos .webm and .ogg versions to same folder with same name!',"theme2035"),
			'clone'		=> false,
			'type'		=> 'text',
		),	
		array(
			'name'	=> __('Video Section Image (For Mobile)','theme2035'),
			'desc'	=> __(' * If you are using .mp4','theme2035'),
			'id'	=> $prefix . 'video_mobile',
			'type'	=> 'thickbox_image',
			'max_file_uploads' => 1,
		)											
	),
);

if($blog_type == "classic"){
	$blog_post_sidebar = $theme_prefix['blog_sidebar'];
	$meta_boxes[] = array(
		'id' => 'sidebar',
		'title' => __( 'Sidebar', 'theme2035' ),
		'pages' => array( 'post' ),
		'context' => 'side',
		'priority' => 'high',
		'fields' => array(
			array(
				'name'     => __( 'Select Sidebar(Default sidebar selected. You can change it from theme options.)', 'theme2035' ),
				'id'       => "{$prefix}selectpostsidebar",
				'type'     => 'select',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => $sidebar_options,
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				'std'         => $blog_post_sidebar,
				'placeholder' => __( 'Select Sidebar', 'theme2035' ),
			),
	));
}

	return $meta_boxes;
}