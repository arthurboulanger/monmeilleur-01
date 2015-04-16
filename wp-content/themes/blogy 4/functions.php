<?php

/**************************************************************************************************/
/* Define Constants */
/**************************************************************************************************/

define('THEMEROOT', get_template_directory_uri());
define('REDUX', get_template_directory());
define('IMAGES', THEMEROOT . '/images');

/**************************************************************************************************/
/* Admin Framework  */
/**************************************************************************************************/

if ( !class_exists( 'ReduxFramework' ) && file_exists( REDUX . '/admin/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( REDUX . '/admin/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( REDUX . '/admin/ReduxFramework/blog/blog-config.php' ) ) {
    require_once( REDUX . '/admin/ReduxFramework/blog/blog-config.php' );
}


/**************************************************************************************************/
/* Theme Setup  */
/**************************************************************************************************/

add_action( 'after_setup_theme', 'Theme2035_setup' );

function Theme2035_setup(){

global $content_width;
global $theme_prefix;
if ( ! isset( $content_width ) ) $content_width = 1200;
$blog_type = $theme_prefix['home-page-type'];
if($blog_type == "classic"){

    add_theme_support( 'post-formats', array(
        'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
    ) ); 
}

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 848, 400, true);
}

load_theme_textdomain( '2035Themes-fm', get_template_directory().'/inc/lang' );

add_theme_support( 'automatic-feed-links' );

add_action('init', 'Theme2035_register_menus');

}

/**************************************************************************************************/
/* Register Css */
/**************************************************************************************************/

function Theme2035_register_styles() { 
    global $theme_prefix;


    if($theme_prefix['minify-css-js'] == "0" ){

    // Register
    wp_register_style('main', get_template_directory_uri() . '/style.css','','1'); 
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css','','1'); 
    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css','','1');
    wp_register_style('slidebars', get_template_directory_uri() . '/css/slidebars.css','','1');
    wp_register_style('slicknav', get_template_directory_uri() . '/css/slicknav.css','','1');
    wp_register_style('flexslider', get_template_directory_uri() . '/css/flexslider.css','','1');
    wp_register_style('responsive', get_template_directory_uri() . '/css/responsive.css','','1');
    // Enqueue
    wp_enqueue_style('bootstrap'); 
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('flexslider');     
    wp_enqueue_style('slidebars');     
    wp_enqueue_style('slicknav'); 
    wp_enqueue_style('main');    
    wp_enqueue_style('responsive');
    }else{
    wp_register_style('site-min', get_template_directory_uri() . '/css/site.min.css','','1'); 
    wp_enqueue_style('site-min');
    }
}

add_action('wp_enqueue_scripts', 'Theme2035_register_styles');

/**************************************************************************************************/
/* Register Js */
/**************************************************************************************************/

function Theme2035_register_js() {
    global $theme_prefix;
    // Register
    wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr-2.6.2-respond-1.1.0.min.js', '3.5.1');         
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider.min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('slidebars', get_template_directory_uri() . '/js/slidebars.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('superfish-helper', get_template_directory_uri() . '/js/helperPlugins.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('superfish', get_template_directory_uri() . '/js/superfish.1.4.1.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('supposition', get_template_directory_uri() . '/js/supposition.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('scrolltofixed', get_template_directory_uri() . '/js/jquery-scrolltofixed-min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('classie', get_template_directory_uri() . '/js/classie.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('retina', get_template_directory_uri() . '/js/retina-1.1.0.min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('headroom', get_template_directory_uri() . '/js/headroom.min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('jquery-headroom', get_template_directory_uri() . '/js/jQuery.headroom.min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('background-check', get_template_directory_uri() . '/js/background-check.min.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('youtube', 'http://www.youtube.com/player_api', 'jquery', '3.5.1', TRUE);    
    wp_register_script('vimeocdn', 'http://a.vimeocdn.com/js/froogaloop2.min.js', 'jquery', '3.5.1', TRUE);      
    wp_register_script('videobg', get_template_directory_uri() . '/js/videobg.js', 'jquery', '3.5.1', TRUE);
    wp_register_script('infinite', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', 'jquery', '3.5.1', TRUE);


    // Enqueue
    wp_enqueue_script('modernizr');        
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('flexslider');
    wp_enqueue_script('mousewheel');
    wp_enqueue_script('slidebars');
    wp_enqueue_script('fitvids');
    wp_enqueue_script('superfish-helper');
    wp_enqueue_script('superfish');
    wp_enqueue_script('supposition');
    wp_enqueue_script('jplayer');
    wp_enqueue_script('parallax');
    wp_enqueue_script('scrolltofixed');
    wp_enqueue_script('classie');
    wp_enqueue_script('slicknav');
    wp_enqueue_script('retina');
    wp_enqueue_script('headroom');
    wp_enqueue_script('jquery-headroom');
    wp_enqueue_script('background-check');
    wp_enqueue_script('youtube');
    wp_enqueue_script('vimeocdn');
    wp_enqueue_script('videobg');
    wp_enqueue_script('infinite');
        
    if($theme_prefix['minify-css-js'] == "0" ){
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', 'jquery', '3.5.1', TRUE);
    wp_enqueue_script('main');
    }else{
    wp_register_script('main', get_template_directory_uri() . '/js/main.min.js', 'jquery', '3.5.1', TRUE);
    wp_enqueue_script('main');
    }
    
    $themepathjs = array( 'template_url' => get_template_directory_uri() );
    wp_localize_script( 'main', 'themepathjs', $themepathjs );
} 

add_action('wp_enqueue_scripts', 'Theme2035_register_js');

if (is_admin() ){
    function Theme2035_custom_post_select(){    
        wp_register_script('init', get_template_directory_uri() . '/js/admin/init.js', 'jquery', '3.5.1');  
        wp_enqueue_script('init');
    }
}

add_action('admin_enqueue_scripts', 'Theme2035_custom_post_select');

// add admin scripts
add_action('admin_enqueue_scripts', 'Theme2035_ctup_wdscript');
function Theme2035_ctup_wdscript() {
    wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/js/admin/upload-media.js', false, '1.0', true);
}

/**************************************************************************************************/
/* TGM plugin activation */
/**************************************************************************************************/

include( get_template_directory() . '/inc/tgm_plugin_activation/class-tgm-plugin-activation.php' );
include( get_template_directory() . '/inc/tgm_plugin_activation/example.php' );


/**************************************************************************************************/
/* Shortcodes */
/**************************************************************************************************/

include( get_template_directory() . '/admin/zilla-shortcodes/zilla-shortcodes.php' );
include( get_template_directory() . '/inc/shortcodes.php' );


/**************************************************************************************************/
/* Excerpt */
/**************************************************************************************************/

//excerpt length
function Theme2035_excerpt_length( $length ) {
    global $theme_prefix;
    $blog_type = $theme_prefix['home-page-type'];
    if(is_single()){
        $blog_type = get_post_meta( get_the_ID(), 'theme2035_pagetype', true );
    }
    if($blog_type == "classic"){ $excerpt_l= $theme_prefix['classic-excerpt'];} else{ $excerpt_l=$theme_prefix['modern-excerpt']; }
    return $excerpt_l;
}

add_filter( 'excerpt_length', 'Theme2035_excerpt_length', 999 );

 



//custom excerpt ending
function Theme2035_excerpt_more( $more ) {

global $theme_prefix;
if($theme_prefix['classic-excerpt'] > 0){  return '...'; }else {  return ''; }

}
add_filter('excerpt_more', 'Theme2035_excerpt_more');



function Theme2035_get_avatar_url($author_id, $size){
    $get_avatar = get_avatar( $author_id, $size );
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return ( $matches[1] );
}

add_action('init','Theme2035_random_add_rewrite');

function Theme2035_random_add_rewrite() {
   global $wp;
   $wp->add_query_var('random');
   add_rewrite_rule('random/?$', 'index.php?random=1', 'top');   
}

add_action('template_redirect','Theme2035_random_template');

function Theme2035_random_template() {
   if (get_query_var('random') == 1) {
       $posts = get_posts('post_type=post&orderby=rand&numberposts=1&post_author = $userid');
       foreach($posts as $post) {
            $link = get_permalink($post);    
       }
       wp_redirect($link,307);
       exit; 
   }
}


/**************************************************************************************************/
/* Custom Styles */
/**************************************************************************************************/

include_once 'inc/customjs.php';
include_once 'inc/customcss.php';


function Theme2035_mom_user_contactmethods( $contactmethods ) {
        $contactmethods['author_image'] = __( "Author Page Image Url", 'theme2035' );
        $contactmethods['job_title'] = __( "Job Title", 'theme2035' );
        $contactmethods['behance'] = __( "Behance URL", 'theme2035' );
        $contactmethods['codepen'] = __( "Codepen URL", 'theme2035' );
        $contactmethods['deviantart'] = __( "Deviantart URL", 'theme2035' );
        $contactmethods['dribbble'] = __( "Dribbble URL", 'theme2035' );
        $contactmethods['facebook'] = __( 'Facebook URL', 'theme2035' );
        $contactmethods['flickr'] = __( 'Flickr URL', 'theme2035' );
        $contactmethods['foursquare'] = __( 'Foursquare URL', 'theme2035' );
        $contactmethods['github'] = __( 'Github URL', 'theme2035' );
        $contactmethods['google-plus'] = __( 'Google + URL', 'theme2035' );
        $contactmethods['instagram'] = __( 'Instagram URL', 'theme2035' );
        $contactmethods['linkedin'] = __( 'Linkedin URL', 'theme2035' );
        $contactmethods['pinterest'] = __( 'Pinterest URL', 'theme2035' );
        $contactmethods['soundcloud'] = __( 'Soundcloud URL', 'theme2035' );
        $contactmethods['tumblr'] = __( 'Tumblr URL', 'theme2035' );
        $contactmethods['twitter'] = __( 'Twitter URL', 'theme2035' );
        $contactmethods['vimeo'] = __( 'Vimeo URL', 'theme2035' );
        $contactmethods['vine'] = __( 'Vine URL', 'theme2035' );
        $contactmethods['vk'] = __( 'Vk URL', 'theme2035' );
        $contactmethods['youtube'] = __( 'Youtube URL', 'theme2035' );

        return $contactmethods;
    }
add_filter( 'user_contactmethods', 'Theme2035_mom_user_contactmethods', 10, 1 );

/* WIDGETS, SIDEBARS and FRAMEWORK FILES */

/**************************************************************************************************/
/* Custom Widgets */
/**************************************************************************************************/

$widgets = array(
    '/inc/custom-widgets/recent-posts.php',
    '/inc/custom-widgets/recent-comments.php',
    '/inc/custom-widgets/social-links.php',
    '/inc/custom-widgets/audio-player.php',
    '/inc/custom-widgets/author.php',
    '/inc/custom-widgets/twitter.php',
    '/inc/custom-widgets/dribbble.php',
    '/inc/custom-widgets/most-popular.php',
    '/inc/custom-widgets/tabs.php',
    '/inc/custom-widgets/flickr.php',
    '/inc/custom-widgets/instagram.php',
    '/inc/custom-widgets/google-plus-badge-widget.php',
);
$widgets = apply_filters( 'Theme2035-widgets', $widgets );
foreach ( $widgets as $widget ) {
    locate_template( $widget, true );
}

if (!function_exists('Theme2035_register_sidebars')) {
    function Theme2035_register_sidebars() {
        if (function_exists('register_sidebar')) {
            register_sidebar(
                array(
                'name' => __( 'Main Sidebar', '2035Themes-fm' ),
                'id' => 'sidebar-1',
                'description' => __( 'Main Sidebar', '2035Themes-fm' ),
                'before_widget' => '<div class="sidebar-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4><hr>',
            ));
            register_sidebar(
                array(
                'name' => __( 'Footer 1 Widget', '2035Themes-fm' ),
                'id' => 'footer-1',
                'description' => __( 'Footer 1 Widget', '2035Themes-fm' ),
                'before_widget' => '<div class="footer-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4><hr class="footer">',
            ));
            register_sidebar(
                array(
                'name' => __( 'Footer 2 Widget', '2035Themes-fm' ),
                'id' => 'footer-2',
                'description' => __( 'Footer 2 Widget', '2035Themes-fm' ),
                'before_widget' => '<div class="footer-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4><hr class="footer">',
            ));
            register_sidebar(
                array(
                'name' => __( 'Footer 3 Widget', '2035Themes-fm' ),
                'id' => 'footer-3',
                'description' => __( 'Footer 3 Widget', '2035Themes-fm' ),
                'before_widget' => '<div class="footer-widget">',
                'after_widget' => '</div>',
                'before_title' => '<h4>',
                'after_title' => '</h4><hr class="footer">',
            ));
            register_sidebar(
                array(
                    'id' => 'push-panel', 
                    'name' => 'Push Panel', 
                    'before_widget' => '<div class="footer-widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4>',
                    'after_title' => '</h4><hr class="footer">',
            ));       
        }
    }
    add_action( 'widgets_init', 'Theme2035_register_sidebars');
}

require_once('inc/custom-sidebars/customsidebars.php');
include_once('inc/pagination.php');
/* WIDGETS, SIDEBARS and FRAMEWORK FILES */

/**************************************************************************************************/
/* Custom Image Size */
/**************************************************************************************************/

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'thumbnail', 50, 50, true );                              
    add_image_size( 'nextprev', 200, 112, true );                              
    add_image_size( 'full-screen', 1140, 650, true );                  
    add_image_size( 'full', 750, 360, true );                  
    add_image_size( 'full-slider', 1920, 1280, true );                  
    add_image_size( 'related-post', 400, 275, true );                  
    add_image_size( 'modern-grid', 470, 370, true );                
}

/**************************************************************************************************/
/* Include Meta Box  */
/**************************************************************************************************/

define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/inc/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/inc/meta-box' ) );
require_once RWMB_DIR . 'meta-box.php';
include_once 'inc/metabox.php';


/**************************************************************************************************/
/* Default Post Image */
/**************************************************************************************************/

function Theme2035_wpse55748_filter_post_thumbnail_html( $html ) {
    // If there is no post thumbnail,
    // Return a default image
    if ( '' == $html ) {
        return '
        <div class="default-post"> <i class="fa fa-file-text-o"></i> </div>
        ';
    }
    // Else, return the post thumbnail
    return $html;
}
add_filter( 'post_thumbnail_html', 'Theme2035_wpse55748_filter_post_thumbnail_html' );

/**************************************************************************************************/
/* Search Form */
/**************************************************************************************************/

function Theme2035_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __( 'Search for:', '2035Themes-fm' ) . '</label>
    <input type="text" placeholder="Search Keywords..." value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search','theme2035' ) .'" />
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'Theme2035_my_search_form' );

/**************************************************************************************************/
/* Custom Comments */
/**************************************************************************************************/

function Theme2035_comment( $comment, $args, $depth ) {
       $GLOBALS['comment'] = $comment; ?>
                                  
       <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
       <div id="comment-<?php comment_ID(); ?>" class="clearfix"> 
            <div class="user-comment-box clearfix">
                <div class="col-lg-2 col-sm-2 col-xs-2">
                <?php echo get_avatar($comment, $size = '130'); ?>
                </div>
                <div class="col-lg-10 col-sm-10 col-xs-10 comment-content">
                     
                     <div class="author">
                        <h4><?php printf( __( '%s', '2035Themes-fm'), get_comment_author_link() ) ?></h4>
                        <div class="comment-time"><p><?php echo $post_date = the_time('F j');  ?></p></div>
                     </div>
                     
                     <p><?php comment_text() ?></p>
                     <div class="comment-tools">
                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>  
                        
                        <?php edit_comment_link( __( '(Edit)', '2035Themes-fm'),'  ','' ) ?>
                     </div>
                     
                     <?php if ( $comment->comment_approved == '0' ) : ?>
                     <em><?php __( 'Your comment is awaiting moderation.', '2035Themes-fm' ) ?></em>
                    <?php endif; ?>
                    
                </div>
            </div>
       </div>
       </li>

<?php }

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );

/**************************************************************************************************/
/* Register Menu */
/**************************************************************************************************/

function Theme2035_register_menus() {
    register_nav_menus( array( 'top-menu' => __('Top Menu',"2035Themes-fm")) );
}

function Theme2035_ajax_pagination($pages = '', $range = 2){  
    $showitems = ($range * 2)+1;
    if(get_query_var('page')){
      $paged = get_query_var('page');
    }else if(get_query_var('paged')){
      $paged = get_query_var('paged');
    }else{
      $paged = 1;
    }
    if(empty($paged)) $paged = 1;

    if($pages == ''){
       global $wp_query;
       $pages = $wp_query->max_num_pages;
       if(!$pages){
           $pages = 1;
       }
    }   

    if(1 != $pages){

       for ($i=1; $i <= $pages; $i++){
           if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
               echo ($paged == $i)? "<div class=\"load-more-modern pos-center margint80\"><h3><a href='".get_pagenum_link($i+1)."'>".__("LOAD MORE","2035Themes-fm")."</a></h3></div>":"";
           }
       }
    }else{
          echo "<div class=\"load-more-button pos-center\" style=\"display:none;\"></div>";
         }
}

/* Title Filter */
function Theme2035_blog_title( $title, $seperator ) {
    global $page, $paged;
    if ( is_feed() ) {
        return $title;
    }
    $title .= get_bloginfo( 'name' );

    $description = get_bloginfo( 'description', 'display' );
    if( $description && ( is_home() || is_front_page() ) ) {
        $title .= " $seperator $description";
    }

    if ( $paged >= 2 || $page >= 2 ) {
        $title .= " $seperator " . sprintf( __( 'Page %s', '2035Themes-fm' ), max( $paged, $page ) );
    }
    return $title;
}
add_filter( 'wp_title', 'Theme2035_blog_title', 10, 2 );
/* Title Filter */

