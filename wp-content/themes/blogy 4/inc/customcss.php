<?php 
function Theme2035_custom_style_import() {
global $theme_prefix;
?>
<style type="text/css">


<?php if($theme_prefix['fontselect'] == "customfont") { ?>

<?php if($theme_prefix['custom-font-name'] != "") { ?>

@font-face {
    <?php if($theme_prefix['custom-font-name'] != "") { ?> font-family: '<?php echo $theme_prefix['custom-font-name']; ?>';<?php } ?> 
    <?php if($theme_prefix['eot'] != "") { ?> src: url('<?php echo $theme_prefix['eot']; ?>'); <?php } ?>
     <?php if($theme_prefix['woff'] != "") { ?>src: url('<?php echo $theme_prefix['woff']; ?>') format('woff'), <?php  } ?> 
     <?php if($theme_prefix['ttf'] != "") { ?>  url('<?php echo $theme_prefix['ttf']; ?>') format('truetype'); <?php } ?> 
    font-weight: normal;
    font-style: normal;
}

h1, h2, h3, h4 ,h5, h6, .pages-nav ul li a, .bar-box, .spoiler.on:before, .panel-title{
	font-family: <?php echo $theme_prefix['custom-font-name']; ?> !important;
}

<?php } }else { ?>


h1, h2, h3, h4 ,h5, h6, .pages-nav ul li a, .bar-box, .spoiler.on:before, .panel-title{
	font-family: <?php echo $theme_prefix['title-font']['font-family']; ?> !important;
}

<?php } ?>

<?php if($theme_prefix['fontselect-second'] == "customfont-second") { ?>

<?php if($theme_prefix['custom-font-name-second'] != "") { ?>

@font-face {
    <?php if($theme_prefix['custom-font-name'] != "") { ?> font-family: '<?php echo $theme_prefix['custom-font-name-second']; ?>';<?php } ?> 
    <?php if($theme_prefix['eot-second'] != "") { ?> src: url('<?php echo $theme_prefix['eot-second']; ?>'); <?php } ?>
         <?php if($theme_prefix['woff-second'] != "") { ?>src : url('<?php echo $theme_prefix['woff-second']; ?>') format('woff'), <?php  } ?> 
         <?php if($theme_prefix['ttf-second'] != "") { ?>  url('<?php echo $theme_prefix['ttf-second']; ?>') format('truetype'); <?php } ?>
    font-weight: normal;
    font-style: normal;
}

.post-slider-wrapper .blog-read-more, .sf-menu li a, .menu-container-top .sf-menu li a, #modern-search-wrapper input, #modern-search-wrapper input::-webkit-input-placeholder, .sidebar h4, .footer-widget h4 {
	font-family: <?php echo $theme_prefix['custom-font-name-second']; ?> !important;
}

<?php } }else { ?>


.post-slider-wrapper .blog-read-more, .sf-menu li a, .menu-container-top .sf-menu li a, #modern-search-wrapper input, #modern-search-wrapper input::-webkit-input-placeholder, .sidebar h4, .footer-widget h4 {
	font-family: <?php echo $theme_prefix['title-font-second']['font-family']; ?> !important;
}

<?php } ?>

body, body p{
	font-family: <?php echo $theme_prefix['site-font']['font-family']; ?> !important;
	font-weight: <?php echo $theme_prefix['site-font']['font-weight']; ?> !important;
	color: <?php echo $theme_prefix['site-font']['color']; ?> !important;
}





/* Background */

<?php if($theme_prefix['background-style'] == "image" ){ ?>

body{ background: url("<?php echo $theme_prefix['image']['url']; ?>") center top fixed !important; }

<?php } ?>

<?php if($theme_prefix['background-style'] == "background-color" ){ ?>

body{ background: <?php echo $theme_prefix['background-color']; ?> !important; }

<?php } ?>

.logo img{
	height: <?php echo $theme_prefix['logo-height']; ?>px !important;
}

.menu-container{
	height: <?php echo intval($theme_prefix['logo-height'])+49; ?>px !important;
}

.menu-container-top{	
	height: <?php echo intval($theme_prefix['logo-height'])+49; ?>px !important;
}
.menu, .logo h3, .menu-container-top{
	padding-top: <?php echo intval($theme_prefix['logo-height'])/2-7 ?>px !important;
}

.sf-menu .menu-item-has-children ul{
	padding-top: <?php echo intval($theme_prefix['logo-height'])/2+12; ?>px !important;
}

.classic .sf-menu .menu-item-has-children ul{
	padding-top: <?php echo intval($theme_prefix['logo-height'])/2+6; ?>px !important;
}

.search-panel{
	top: <?php echo intval($theme_prefix['logo-height'])/2-7 ?>px !important;
}

table a, #wp-calendar a, #wp-calendar caption, caption, cite, var, .active-color, a:hover, .author-name a, .sticky-post i, .blog-classic-share a, .blog-content ul li:before, .blog-post-quote cite a, .blog-post-quote cite p, .link-background:before, .sidebar-widget a:hover,
.default-post i, .sf-menu li a:hover, .sf-menu .menu-item-has-children:hover:before, .post-paginate p, .blog-post-tag a:hover, .comment-time p, .related-posts .cats ul li a:hover, .related-posts a:hover, .author-info a, .wpt_widget_content .selected a,
progress, .modern-blog-post-title-container ul li.author a, .recent-post-materials li.author a,.load-more-modern:hover a, .sources a:after, #panel i, .scrollup i, .cllpse-active a, .progress-container, .progress-bar, .modern-blog-post-title-container ul.post-categories li a:hover, .modern-blog-post-title-container h1.checked-title a:hover, .recent-post-materials ul.recent-met li a:hover, .modern-blog-post-title-container.back-check a.blog-read-more:hover, .modern-blog-post-title-container.back-check a.blog-read-more:hover i, .blog-post-tag i, i.fa-share-alt{ color: <?php echo $theme_prefix['main-color']; ?> !important; }

kbd, .searchform input[type="submit"], .post-password-form input[type="submit"], .pagination ul li.active a, input[type="submit"], .prev-next h3, #classic-search-wrapper input.s-submit, .load-more-modern
,.button-style a,.progress-bar, .spoiler.on:before, .flex-control-paging li a.flex-active, .tabbed-area .active, .widget_wysija_cont .updated, .formErrorContent, .social-side, .reading-progress-bar{ background: <?php echo $theme_prefix['main-color']; ?> !important; }

.continue-reading a, .loading:after { border-top-color: <?php echo $theme_prefix['main-color']; ?> !important; }


<?php if($theme_prefix['featured-image-zoom'] !="1" ){ ?>
.media-materials img{
    -webkit-transform-origin: 50% 50%;
    -moz-transform-origin: 50% 50%;
    -ms-transform-origin: 50% 50%;
    -o-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
    -webkit-transition-property: -webkit-transform;
    -webkit-transition-duration: 1s;
    -webkit-transition-delay: 0;
    -webkit-transition-timing-function: ease-out;
    -moz-transition-property: -moz-transform;
    -moz-transition-duration: 1s;
    -moz-transition-delay: 0;
    -moz-transition-timing-function: ease-out;
    -ms-transition-property: -ms-transform;
    -ms-transition-duration: 1s;
    -ms-transition-delay: 0;
    -ms-transition-timing-function: ease-out;
    -o-transition-property: -o-transform;
    -o-transition-duration: 1s;
    -o-transition-delay: 0;
    -o-transition-timing-function: ease-out;
    transition-property: transform;
    transition-duration: 1s;
    transition-delay: 0;
    transition-timing-function: ease-out;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility-origin: hidden;
    -ms-backface-visibility-origin: hidden;
    -o-backface-visibility-origin: hidden;
    backface-visibility: hidden;
    -webkit-transform-origin: 1000;
    -moz-transform-origin: 1000;
    -ms-transform-origin: 1000;
    -o-transform-origin: 1000;
    perspective: 1000;
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
}

.media-materials:hover img{

    -webkit-transform: scale(1) !important;
    -moz-transform: scale(1) !important;
    -o-transform: scale(1) !important;
    -ms-transform: scale(1) !important;
    transform: scale(1) !important;
}

	<?php 
	} ?>

















<?php if (!empty($theme_prefix['custom-css-area'])){ echo $theme_prefix['custom-css-area']; }?>
</style>















<?php 
}
add_action('wp_head', 'Theme2035_custom_style_import');
?>