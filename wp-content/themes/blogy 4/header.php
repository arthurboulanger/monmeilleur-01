<!DOCTYPE html>
<!--[if IE 6]><html class="ie ie6" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9]><html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html <?php language_attributes(); ?>><!--<![endif]-->
<head>
<?php global $theme_prefix; ?>
	
	<!-- *********	PAGE TITLE	*********  -->
	<title> <?php wp_title('|', true, 'right'); ?> </title>


	<!-- *********	PAGE TOOLS	*********  -->

	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="author" content="">

	<!-- *********	MOBILE TOOLS	*********  -->

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- *********	WORDPRESS TOOLS	*********  -->
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<!-- *********	FAVICON TOOLS	*********  -->
	
	<?php 

    if(empty($theme_prefix['favicon']['url'])){
	$theme_prefix['favicon']['url'] = "";
	}

	if(empty($theme_prefix['ipad_retina_icon']['url'])){
	$theme_prefix['ipad_retina_icon']['url'] = "";
	}

	if(empty($theme_prefix['iphone_icon_retina']['url'])){
	$theme_prefix['iphone_icon_retina']['url'] = "";
	}	

	if(empty($theme_prefix['ipad_icon']['url'])){
	$theme_prefix['ipad_icon']['url'] = "";
	}		

	if(empty($theme_prefix['iphone_icon']['url'])){
	$theme_prefix['iphone_icon']['url'] = "";
	}			

	if($theme_prefix['favicon']['url'] != "") { ?> <link rel="shortcut icon" href="<?php echo $theme_prefix['favicon']['url']; ?>" /><?php } 
			else { ?> <link rel="shortcut icon" href="<?php echo THEMEROOT."/images/favicon.ico"; ?>" /> <?php } ?>
	
	<?php if($theme_prefix['ipad_retina_icon']['url'] != "")  { ?> <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $theme_prefix['ipad_retina_icon']['url']; ?>" /> <?php } ?>
	
	<?php if($theme_prefix['iphone_icon_retina']['url'] != "")  { ?> <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $theme_prefix['iphone_icon_retina']['url']; ?>" /> <?php } ?>
	
	<?php if($theme_prefix['ipad_icon']['url'] != "")  { ?> <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $theme_prefix['ipad_icon']['url']; ?>" /> <?php } ?>
	
	<?php if($theme_prefix['iphone_icon']['url'] != "")  { ?> <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo $theme_prefix['iphone_icon']['url']; ?>" /> <?php } ?>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
    if(is_single()){
        $blog_type = $theme_prefix['blog-post-page-type'];
        $temp_blog_type = get_post_meta( get_the_ID(), 'theme2035_pagetype', true );
        if($temp_blog_type == ""){$temp_blog_type = $blog_type;}
        if($blog_type != $temp_blog_type){
            $blog_type = $temp_blog_type;
        }
    }elseif(is_author()){
    	$blog_type = "modern";
    }else{
        $blog_type = $theme_prefix['home-page-type'];
    }
?>
<div id="sb-site" class="<?php echo $blog_type; ?> fitvids">
<?php if($theme_prefix['loading-area'] == 1 ){  ?>
    <div id="loading-area">
        <div class="loading"></div>
    </div>
<?php } ?>