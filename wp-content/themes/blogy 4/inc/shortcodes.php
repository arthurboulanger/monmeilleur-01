<?php

/*-----------------------------------------------------------------------------------*/
/*	Clearfix
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_clearfix')) {
	function Theme2035_clearfix( $atts, $content = null ) {	
	   return '<div class="clearfix"></div>';
	}
	add_shortcode('clearfix', 'Theme2035_clearfix');
}


/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_container')) {
	function Theme2035_container( $atts, $content = null ) {	
	   return '<div class="container"><div class="row">' . do_shortcode($content) . '</div></div>';
	}
	add_shortcode('container', 'Theme2035_container');
}



if (!function_exists('Theme2035_one_half')) {
	function Theme2035_one_half( $atts, $content = null ) {		
	   return '<div class="col-lg-6 col-sm-6">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_half', 'Theme2035_one_half');
}


if (!function_exists('Theme2035_one_third')) {
	function Theme2035_one_third( $atts, $content = null ) {		
	   return '<div class="col-lg-4 col-sm-4">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_third', 'Theme2035_one_third');
}

if (!function_exists('Theme2035_two_third')) {
	function Theme2035_two_third( $atts, $content = null ) {		
	   return '<div class="col-lg-8 col-sm-8">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('two_third', 'Theme2035_two_third');
}


if (!function_exists('Theme2035_one_fourth')) {
	function Theme2035_one_fourth( $atts, $content = null ) {		
	   return '<div class="col-lg-3 col-sm-6 col-xs-6">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_fourth', 'Theme2035_one_fourth');
}


if (!function_exists('Theme2035_three_fourths')) {
	function Theme2035_three_fourths( $atts, $content = null ) {		
	   return '<div class="col-lg-9 col-sm-9">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('three_fourths', 'Theme2035_three_fourths');
}


if (!function_exists('Theme2035_one_sixth')) {
	function Theme2035_one_sixth( $atts, $content = null ) {		
	   return '<div class="col-lg-2 col-sm-4">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_sixth', 'Theme2035_one_sixth');
}

if (!function_exists('Theme2035_five_sixths')) {
	function Theme2035_five_sixths( $atts, $content = null ) {		
	   return '<div class="col-lg-10 col-sm-10">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('five_sixths', 'Theme2035_five_sixths');
}

if (!function_exists('Theme2035_one_whole')) {
	function Theme2035_one_whole( $atts, $content = null ) {		
	   return '<div class="col-lg-12 col-sm-12">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('one_whole', 'Theme2035_one_whole');
}

if (!function_exists('Theme2035_wrapper_div')) {
	function Theme2035_wrapper_div( $atts, $content = null ) {		
	   return '<div class="wrapper-div">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('wrapper_div', 'Theme2035_wrapper_div');
}

if (!function_exists('Theme2035_fullwidth_div')) {
	function Theme2035_fullwidth_div( $atts, $content = null ) {		
	   return '<div class="col-lg-12 col-sm-12 full-width">' . do_shortcode($content) . '</div>';
	}
	add_shortcode('fullwidth_div', 'Theme2035_fullwidth_div');
}



/*-----------------------------------------------------------------------------------*/
/*	Button
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_button')) {
	function Theme2035_button( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title' => '',
			'url' => '#more'
	    ), $atts));	


		$output  =  '<div class="button-style"><a href="'. $url .'">'. $title .'</a></div>';



		return $output;
	}
	add_shortcode('button', 'Theme2035_button');
}


/*-----------------------------------------------------------------------------------*/
/*	Sources
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_sources')) {
	function Theme2035_sources( $atts, $content = null ) {

		$output  =  '<div class="sources">'. do_shortcode( $content ) .'</div>';



		return $output;
	}
	add_shortcode('sources', 'Theme2035_sources');
}

/*-----------------------------------------------------------------------------------*/
/*	Space
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_space')) {
	function Theme2035_space( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'space' => '',
	    ), $atts));	

	   return  '<div style="padding-top:'.$space.'%;" class="mobile-hide"></div>';
	}
	add_shortcode('space', 'Theme2035_space');
}


/*-----------------------------------------------------------------------------------*/
/*	Skills Bar
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_skill_bar')) {
	$a=1;
	function Theme2035_skill_bar( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'title' => '',
			'percent' => '50',
	    ), $atts));	

		global $a;

		$output = '';
		$output .= '<div class="bar-box">';
		$output .= '<p>'.$title.'</p>';
		$output .= '<div class="progress margint5 ">';
		$output .= '<div class="progress-bar color'.$a.' animated-skills" style="width:'.$percent.'%;"></div>';
		$output .= '</div>';
		$output .= '</div>';

		$a++;

		return $output;

	}
	add_shortcode('skill_bar', 'Theme2035_skill_bar');
}

/*-----------------------------------------------------------------------------------*/
/*	Parallax
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_parallax')) {
	function Theme2035_parallax( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'imgurl' => '',
			'height' => '',
	    ), $atts));	

		$output = '';
		$output .= '<div id="parallax'.substr(uniqid('', true), -5).'" class="parallax pos-center" style="background-image: url(\''. $imgurl .'\');height:'. $height .'px;">';
		$output .= '</div>';

		return $output;

	}
	add_shortcode('parallax', 'Theme2035_parallax');
}
    

/*-----------------------------------------------------------------------------------*/
/*	Slider Container
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_slider')) {
	function Theme2035_slider( $atts, $content = null ) {

		$output = '';
		$output .= '<div class="">';
		$output .= '<div class="flexslider">';
		$output .= '<ul class="slides">';
		$output .= do_shortcode( $content );
		$output .= '</ul>';
		$output .= '</div>';
		$output .= '</div>';

		return $output;
	}
	add_shortcode('slider', 'Theme2035_slider');
}


/*-----------------------------------------------------------------------------------*/
/*	Slider Item
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_slider_item')) {
	function Theme2035_slider_item( $atts, $content = null ) {

		$output = '';
		$output .= '<li>'.do_shortcode( $content).'</li>';


		return $output;
	}
	add_shortcode('slider_item', 'Theme2035_slider_item');
}
    



/*-----------------------------------------------------------------------------------*/
/*	Spoiler Alert
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_spoiler')) {
	function Theme2035_spoiler( $atts, $content = null ) {

		$output = '';
		$output .= '<div class="spoiler on">'.do_shortcode( $content).'</div>';


		return $output;
	}
	add_shortcode('spoiler', 'Theme2035_spoiler');
}
    

/*-----------------------------------------------------------------------------------*/
/*	Spoiler Alert
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_center')) {
	function Theme2035_center( $atts, $content = null ) {

		$output = '';
		$output .= '<div class="pos-center">'.do_shortcode( $content).'</div>';


		return $output;
	}
	add_shortcode('center', 'Theme2035_center');
}
    

/*-----------------------------------------------------------------------------------*/
/*	Background Color
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_b_color')) {
	$a=1;
	function Theme2035_b_color( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'background' => '',
	    ), $atts));	



		$output = '';
		$output .= '<div class="b_color" style="background: '. $background .';">';
		$output .= do_shortcode( $content );
		$output .= '</div>';



		return $output;

	}
	add_shortcode('b_color', 'Theme2035_b_color');
}
       

/*-----------------------------------------------------------------------------------*/
/*	Dropcap
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_dropcap')) {
	function Theme2035_dropcap( $atts, $content = null ) {

		$output  = '';

		$output  .= '<div class="dropcap"><p>'. do_shortcode( $content ) .'</p></div>';
		
		return $output;
	}
	add_shortcode('dropcap', 'Theme2035_dropcap');
}

/*-----------------------------------------------------------------------------------*/
/*	Accordions
/*-----------------------------------------------------------------------------------*/

if (!function_exists('Theme2035_accordion')) {
	function Theme2035_accordion( $atts, $content = null ) {
		
		$output = '';
		$output .= '<div class="about-tabs">';
		$output .= '<div id="accordion">';
		$output .= do_shortcode($content);
		$output .= '</div>';
		$output .= '</div>';

		return $output;

	}
	add_shortcode('accordion', 'Theme2035_accordion');
}

/* Accordions Item */

if (!function_exists('Theme2035_accordion_item')) {
	$colid = 1;
	$panid = 1;
	function Theme2035_accordion_item( $atts, $content = null ) {
		extract(shortcode_atts(array(
		 'title' => '',
		 'active' => '',
		    ), $atts));	
		global $colid;
		global $panid;
		$output = '';

		$active = strtolower($active);
		if( $active == "yes" ){ $in="in cllpse-active"; $active = "cllpse-active";  } else { $in="collapse"; }


		$output .= '<div class="panel panel-blogy '.$active.'">';
		$output .= '<div class="panel-style1">';
		$output .= '<div class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$colid++.'">-<span style="padding-left:10px;">'.$title.'</span></a></div>';
		$output .= '</div>';
		$output .= '<div id="collapse'.$panid++.'" class="collapse-blogy '.$in.'">';
		$output .= '<div class="pad5 accordion-left-pad">';	
		$output .=  do_shortcode($content);
		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

		return $output;

	}
	add_shortcode('accordion_item', 'Theme2035_accordion_item');
}

/*-----------------------------------------------------------------------------------*/
/*	Features Tabs
/*-----------------------------------------------------------------------------------*/
 
	               
function Theme2035_tab($atts, $content = null) {
    $GLOBALS['tab_count'] = 0;
	do_shortcode( $content );
	$id=1;
	if( is_array( $GLOBALS['tabs'] ) ){

		foreach( $GLOBALS['tabs'] as $tab ){

			if ( $tab['active']=="active"){ $active="active"; } else{ $active=""; }
			$tabs[] = '<li class="'.$active.' ">
			<a href="#tab'.$id.'">'. $tab['title'] .'</a></li>';

			if ( $tab['active']=="active"){
			$panes[] = '<div class="tab-pane tab-info fade in active" id="tab'.$id.'">'. $tab['content'] . '</div>';
			}else {  $panes[] = '<div class="tab-pane fade" id="tab'.$id.'">'. $tab['content'] . '</div>'; }
			$id++;
		}

		$return = '<div class="tab-style clearfix"><ul class="tabbed-area tab-style-nav">'.implode( $tabs ).'</ul></div><div class="tab-content margint10 clearfix tab-style-content">'.implode($panes).'</div>';
	}
	return $return;
}

add_shortcode('tab', 'Theme2035_tab');


function Theme2035_tab_item( $atts, $content ){
	extract(shortcode_atts(array( 'title' => '%d', 'active' => '%d'), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array(
		'title' => sprintf( $title, $GLOBALS['tab_count'] ),
		'content' =>  do_shortcode($content),
		'active' =>  $active,
		 );
	
	$GLOBALS['tab_count']++;
}

add_shortcode( 'tab_item', 'Theme2035_tab_item' );
          
                

?>