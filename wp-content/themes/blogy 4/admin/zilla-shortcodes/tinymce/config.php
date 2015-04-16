<?php 




/*-----------------------------------------------------------------------------------*/
/*	Skills Bar
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['Theme2035_skill_bar'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'textdomain'),
			'desc' => __(' Title', 'textdomain')
		),	
		'percent' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Percent', 'textdomain'),
			'desc' => __(' Percent (Example : 50 etc...)(Without %)', 'textdomain')
		),																				
	), 
	'shortcode' => '[skill_bar title="{{title}}" percent="{{percent}}" ][/skill_bar]',
	'popup_title' => __('Add Skills Bar Item', 'textdomain')
);



/*-----------------------------------------------------------------------------------*/
/*	Button
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['Theme2035_button'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Title', 'textdomain'),
			'desc' => __('Title', 'textdomain'),
		),			
		'link' => array(
			'std' => 'http://',
			'type' => 'text',
			'label' => __('Button Link', 'textdomain'),
			'desc' => __('Button Link', 'textdomain'),
		),										
	), 
	'shortcode' => '[button title="{{title}}" link="{{link}}"  ][/button]',
	'popup_title' => __('Add Button', 'textdomain')
);



/*-----------------------------------------------------------------------------------*/
/*	Background Color
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['Theme2035_b_color'] = array(
	'no_preview' => true,
	'params' => array(
		'background' => array(
			'std' => '#f5f5f5',
			'type' => 'text',
			'label' => __('Background Color', 'textdomain'),
			'desc' => __('Background Color(RGB)', 'textdomain'),
		),												
	), 
	'shortcode' => '[b_color background="{{background}}"][/b_color]',
	'popup_title' => __('Background Color', 'textdomain')
);



/*-----------------------------------------------------------------------------------*/
/*	Margin & Padding & Spaces
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['Theme2035_space'] = array(
	'no_preview' => true,
	'params' => array(		
		'space_type' => array(
			'type' => 'select',
			'label' => __('Space Type', 'textdomain'),
			'desc' => __('Space Type', 'textdomain'),
			'options' => array(
				'margin' => 'Margin',
				'Padding' => 'Padding',
			)
		),	
		'top' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Top Space px or %', 'textdomain'),
			'desc' => __('Example : 20px, 10%', 'textdomain'),
		),	
		'right' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Right Space px or %', 'textdomain'),
			'desc' => __('Example : 20px, 10%', 'textdomain'),
		),	
		'bottom' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Bottom Space px or %', 'textdomain'),
			'desc' => __('Example : 20px, 10%', 'textdomain'),
		),	
		'left' => array(
			'std' => '0',
			'type' => 'text',
			'label' => __('Left Space px or %', 'textdomain'),
			'desc' => __('Example : 20px, 10%', 'textdomain'),
		),															
	), 
	'shortcode' => '[space space_type="{{space_type}}" top="{{top}}" right="{{right}}" bottom="{{bottom}}" left="{{left}}"] [/space]',
	'popup_title' => __('Add Margin & Padding & Spaces', 'textdomain')
	
);


/*-----------------------------------------------------------------------------------*/
/*	Spoiler Alert
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['Theme2035_spoiler'] = array(
	'no_preview' => true,
	'params' => array(
		'spoiler-text' => array(
			'type' => 'textarea',
			'label' => __('Spoiler Text', 'textdomain'),
			'desc' => __('Please Paste your Spoiler Text', 'textdomain'),
		),
			), 															 
	'shortcode' => '[spoiler]{{spoiler-text}}[/spoiler]',
	'popup_title' => __('Spoiler', 'textdomain')
	
);

/*-----------------------------------------------------------------------------------*/
/*	Accordion Item
/*-----------------------------------------------------------------------------------*/


$zilla_shortcodes['Theme2035_accordion_item'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('title', 'textdomain'),
			'desc' => __('title', 'textdomain'),
		),	
		'active' => array(
			'type' => 'select',
			'label' => __('Active / Passive', 'textdomain'),
			'desc' => __('Active Tab select', 'textdomain'),
			'options' => array(
				'yes' => 'Active',
				'' => 'Passive',
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('content', 'textdomain'),
			'desc' => __('content', 'textdomain'),
		),										
	), 
	'shortcode' => '[accordion_item title="{{title}}" active="{{active}}" ] {{content}} [/accordion_item]',
	'popup_title' => __('Insert Box', 'textdomain')
);


/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['Theme2035_tab_item'] = array(
	'no_preview' => true,
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('title', 'textdomain'),
			'desc' => __('title', 'textdomain'),
		),			
		'active' => array(
			'type' => 'select',
			'label' => __('Active / Passive', 'textdomain'),
			'desc' => __('Active Tab select', 'textdomain'),
			'options' => array(
				'active' => 'Active',
				'' => 'Passive',
			)
		),
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('content', 'textdomain'),
			'desc' => __('content', 'textdomain'),
		),										
	), 
	'shortcode' => '[tab_item title="{{title}}" active="{{active}}"] {{content}} [/tab_item]',
	'popup_title' => __('Add Tabs', 'textdomain')
);

/*-----------------------------------------------------------------------------------*/
/*	Parallax
/*-----------------------------------------------------------------------------------*/

$zilla_shortcodes['Theme2035_parallax'] = array(
	'no_preview' => true,
	'params' => array(
		'imgurl' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Parallax Img URL', 'textdomain'),
			'desc' => __(' Write image url', 'textdomain')
		),	
		'height' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Height', 'textdomain'),
			'desc' => __('Write parallax area height(Without px)', 'textdomain')
		),																				
	), 
	'shortcode' => '[parallax imgurl="{{imgurl}}" height="{{height}}" ][/parallax]',
	'popup_title' => __('Add Parallax Area', 'textdomain')
);




?>