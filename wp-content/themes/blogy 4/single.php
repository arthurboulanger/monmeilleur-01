<?php get_header(); ?>
    <?php get_template_part('menu'); ?>
<?php
$blog_type = $theme_prefix['blog-post-page-type'];
$temp_post = get_post_meta( get_the_ID(), 'theme2035_selectpostsidebar', true );
$temp_blog_type = get_post_meta( get_the_ID(), 'theme2035_pagetype', true );
if($temp_blog_type == ""){$temp_blog_type = $blog_type;}
if($blog_type != $temp_blog_type){
    $blog_type = $temp_blog_type;
}
if($temp_post == ""){
    $temp_post = $theme_prefix['blog_sidebar'];
}
$temp_default = $theme_prefix['blog_sidebar'];
if($temp_post == $temp_default){
    $blog_post_sidebar = $temp_default;
}else{
    $blog_post_sidebar = $temp_post;
}
if($blog_type == "classic"){
?>
    <div id="blog" class="inner-post-page margint140">
        <div class="container fitvids pos-relative">
            <?php if($theme_prefix['post-increase-decrease'] == 1){ ?>
            <!-- Text Sizer -->
            <div class="sizer-wrapper">
                <div id="text-exp">
                    <div><a href="#" id="bgFont" class="bigText">T</a></div>
                    <div class="margint20"><a href="#" id="smlFont" class="smallText">T</a></div>
                    <div class="margint20"><a href="?random=1" class="randomPost"><i class="fa fa-random"></i></a></div>
                </div>
            </div>
            <?php } ?>

            <!-- Text Sizer -->
            <div class="row">
                <?php if($theme_prefix['sidebar-type'] == "left" ){ ?> 

                <aside class="col-lg-4 sidebar">
                <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($blog_post_sidebar)) :  ?>
                    <a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm") ?></a>
                <?php endif; ?>

                </aside><?php } ?>
                <?php if($theme_prefix['sidebar-type'] == "none" ){ ?><div class="col-lg-12 col-sm-12 blog-content"><?php } else { ?> <div class="col-lg-8 blog-content"> <?php } ?>
                    <?php if($theme_prefix['progress-bar'] == 1){ ?>
                        <div class="progress-container">
                            <div class="reading-progress-bar"></div>
                        </div>
                    <?php } ?>
                    <?php if (have_posts()) : while(have_posts()) :  the_post(); ?>
                    <?php get_template_part('inc/post-types/content',get_post_format()); ?>
                    <?php endwhile; else : ?>
                    <h1><?php echo __('Your search returned no results. Please try a different keyword!','2035Themes-fm') ?></h1>
                    <?php endif; ?>  
                    <?php Theme2035_pagination(); ?>
                </div>
                <?php if($theme_prefix['sidebar-type'] == "right" ){ ?> <aside class="col-lg-4 sidebar">

                <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($blog_post_sidebar)) :  ?>
                    <a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm") ?></a>
                <?php endif; ?>

                </aside><?php } ?>
            </div>
        </div>
        <?php if($theme_prefix['prev-next'] == 1){ ?>
        <div class="prev-next">
            <?php
            $next_post = get_next_post();
            if (!empty( $next_post )): 
                $next_title = strlen($next_post->post_title);
            ?>
            <a class="prev" href="<?php echo get_permalink( $next_post->ID ); ?>">
                <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
                <div>
                    <h3><?php if($next_title <=23){echo $next_post->post_title;}else{echo mb_substr($next_post->post_title,0,20,'UTF-8')."..";} ?></h3>
                    <?php echo get_the_post_thumbnail($next_post->ID, 'nextprev' ); ?>
                </div>
            </a>
            <?php endif; ?> 

            <?php
            $prev_post = get_previous_post();
            if (!empty( $prev_post )): 
                $prev_title = strlen($prev_post->post_title);
            ?>
            <a class="next" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
                <div>
                    <h3><?php if($prev_title <=23){echo $prev_post->post_title;}else{echo mb_substr($prev_post->post_title,0,20,'UTF-8')."..";} ?></h3>
                    <?php echo get_the_post_thumbnail($prev_post->ID, 'nextprev' ); ?>
                </div>
            </a>
            <?php endif; ?> 
        </div>
        <?php } ?>

    </div>
<?php
    }else{
?>
    <div id="modern-search-wrapper">
        <form action="<?php echo home_url(); ?>" id="searchform" method="get">
            <input type="search" id="s" name="s" placeholder="<?php echo __("Enter keywords","2035Themes-fm"); ?>" required />
        </form>
        <a id="search-close" href="#"><i class="fa fa-times"></i></a>
    </div>
<?php if (have_posts()) : while(have_posts()) :  the_post(); ?>
    <?php if($theme_prefix['modern-effect'] == 1){ ?>
    <div id="modern-post-effect" class="intro-effect-push">
    <?php } ?>
        <div class="modern-post-header back-check-img-wrap">
            <?php
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "single-full-screen" );
                $image = $image[0];
            ?>
            <div class="modern-post-bg-img back-check-img">
            <?php
                $videourl = get_post_meta(get_the_ID(), "theme2035_video_url", true);

                if($videourl == ""){
            ?>
                <img src="<?php echo $image; ?>">
            <?php
                }else{
            ?>
                <div class="video_sections"><?php
                    $files = get_post_meta( get_the_ID(), 'theme2035_video_mobile', false );
                    foreach ( $files as $att )
                    { $src = wp_get_attachment_image_src( $att, 'full' );$videoimg = $src[0]; } 
                    $youtube = "youtube";
                    $vimeo = "vimeo";
                    if (strlen(strstr($videourl,$youtube))>0) {
                      $videotype = "youtube";
                      parse_str( parse_url( $videourl, PHP_URL_QUERY ), $videoid );
                      $videopath = $videoid['v'];  
                    }elseif(strlen(strstr($videourl,$vimeo))>0){
                      $videotype = "vimeo";
                      sscanf(parse_url($videourl, PHP_URL_PATH), '/%d', $videoid);
                      $videopath = $videoid;
                    }else{
                      $videotype = "mp4";
                      $videopath = $videourl;
                    }
                    if($videotype == "youtube"){
                    $randomKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
                    ?>
                    <div class="video-area">
                      <div class="video-section">
                        <div class="video-wrapper">
                          <div id="youtube-bg<?php echo $randomKey; ?>" class="youtube-bg" data-video-url="<?php echo $videopath; ?>" data-video-uid="<?php echo $randomKey; ?>"></div>
                        </div>
                        <div class="video-content"><div class="video-child"></div></div>
                      </div>
                    </div>
                    <?php
                    }
                    elseif($videotype == "vimeo"){
                    $randomKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
                    ?>
                    <div class="video-area">
                      <div class="video-section">
                        <div class="video-wrapper">
                          <iframe id="player<?php echo $randomKey; ?>" class="vimeo-bg" src="http://player.vimeo.com/video/<?php echo $videopath; ?>?portrait=0&byline=0&player_id=player<?php echo $randomKey; ?>&title=0&badge=0&loop=1&autopause=0&api=1&rel=0&autoplay=1" frameborder="0"></iframe>
                        </div>
                        <div class="video-content"><div class="video-child"></div></div>
                      </div>
                    </div>
                    <?php
                    }
                    else{
                    $videoPathHtml = substr($videopath, 0, -4);
                    ?>
                    <div class="video-area">
                      <div class="video-section">
                        <div class="video-wrapper">
                          <video class="mediaElement" preload="false" loop="true" autoPlay="true" muted>
                            <source type="video/mp4" src="<?php echo $videoPathHtml; ?>.mp4">
                            <source type="video/webm" src="<?php echo $videoPathHtml; ?>.webm">
                            <source type="video/ogg" src="<?php echo $videoPathHtml; ?>.ogg">
                          </video>
                          <div class="video-cover"><img src="<?php echo $videoimg; ?>" /></div>
                        </div>
                        <div class="video-content"><div class="video-child"></div></div>
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <?php } ?>
            </div>
            <div class="container modern-title">
                <div class="row">
                    <?php $avatar_url = Theme2035_get_avatar_url ( get_the_author_meta('ID'), $size = '45' ); ?>
                    <div class="col-lg-12"><h1><?php the_title(); ?></h1></div>
                    <div class="col-lg-12 pos-center margint40">
                        <div class="modern-post-author clearfix ">
                            <img class="pull-left img-circle modern-avatar" src="<?php echo $avatar_url; ?>" /> 
                            <h3 class="pull-left margint10 author-name-chck">by <?php the_author_posts_link(); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modern-read-down">
                <a href="#blogtext" class="smooth">
                    <h4><?php echo __("READ MORE","2035Themes-fm") ?></h4>
                    <i class="fa fa-angle-down"></i>
                </a>
            </div>
        </div>
        <div id="blog" class="inner-post-page modern-inner-post-page pos-relative <?php if($theme_prefix['modern-effect'] == 0){ echo "modern-post-effect-off"; }?>">
            <div class="container fitvids pos-relative">
                <?php if($theme_prefix['post-increase-decrease'] == 1){ ?>
                <!-- Text Sizer -->
                <div class="sizer-wrapper">
                    <div id="text-exp">
                        <div><a href="#" id="bgFont" class="bigText">T</a></div>
                        <div class="margint20"><a href="#" id="smlFont" class="smallText">T</a></div>
                        <div class="margint20"><a href="?random=1" class="randomPost"><i class="fa fa-random"></i></a></div>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10 <?php if($theme_prefix['modern-effect'] == 1){ echo "modern-scroll-effect"; } ?>">
                        <?php if($theme_prefix['progress-bar'] == 1){ ?>
                        <div class="progress-container">
                            <div class="reading-progress-bar"></div>
                        </div>
                        <?php } ?>
                        <article <?php post_class('modern-single-post clearfix'); ?> id="post-<?php the_ID(); ?>">
                            <div class="blog-post-single clearfix">
                                <div class="title"><h1><?php the_title(); ?></h1></div>
                                <div class="post-materials clearfix">
                                    <ul class="clearfix">
                                        <li><i class="fa fa-user"></i> <span class="material-font"> by</span> <span class="author-name"><?php the_author_posts_link(); ?></span></span>
                                        <li><i class="fa fa-clock-o"></i><a title="<?php echo $post_date = the_time('F j, Y g:i'); ?>" href="<?php the_permalink(); ?>"><time datetime="<?php the_time('c'); ?>"><?php the_time('F j'); ?></time><time class="updated-time" datetime="<?php the_modified_date('c'); ?>"><?php the_modified_date('F j'); ?></time></a></li>
                                            <?php if(comments_open() && !post_password_required()){
                                                ?> <li class="blog-post-comments"><i class="fa fa-comments"></i> <?php
                                                comments_popup_link( __('No comments yet','2035Themes-fm'), __('1 Comment','2035Themes-fm'), __('% Comments','2035Themes-fm'), 'comments-link', __('Comments are off for this post','2035Themes-fm'));
                                                ?></li>  <?php
                                                } 
                                             ?>
                                        <li class="post-cat"><i class="fa fa-tags"></i><?php the_category(', '); ?></li>
                                        <?php if($theme_prefix['post-ratings'] == 1 ){ ?><li class="star"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></li><?php } ?>
                                    </ul>
                                </div>
                                <div class="modern-excerpt">
                                    <?php the_excerpt();  ?>
                                </div>
                                <hr class="post-line">
                                <div id="blogtext" class="single-modern-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="post-tools modern-post-share clearfix">
                            <div class="col-lg-6">
                                <div class="pull-left">
                                    <div class="blog-post-tag clearfix">
                                        <?php
                                        if( has_tag() ) {  
                                        echo '<span><i class="fa fa-tags"></i></span><span class="tag-title-post">TAGS : </span>'; 
                                        the_tags('  ',' ','  ');
                                        echo '<div class="clear"></div>';
                                        }else{
                                        echo '<span><i class="fa fa-tags"></i></span><span class="tag-title-post"> POST HASN\'T TAG. </span>';   
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 share-mobile-check">
                                <div class="pull-right">
                                    <div class="blog-post-share clearfix">
                                        <div class="pull-left"><i class="fa fa-share-alt"></i><span class="tag-title-post"><?php echo __("SHARE","2035Themes-fm"); ?> : </span></div>
                                        <div  class="share-tools pull-left">
                                            <ul>
                                                <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="http://pinterest.com/pin/create/button/?source_url=<?php the_permalink();?>&media=<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' ); echo $src[0]; ?>&description=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                                <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if($theme_prefix['author-visibility'] == 1 ){ ?>
                        <?php if($theme_prefix['sidebar-type'] == "none" ){ $authorimagecolumns = 2; $authortitlecolumns = 10; } else { $authorimagecolumns = 3; $authortitlecolumns = 9; } ?>
                        <div class="author-post clearfix">
                            <div class="col-lg-<?php echo $authorimagecolumns; ?> col-sm-<?php echo $authorimagecolumns; ?> col-xs-12">
                                <div class="author-img">
                                    <?php $avatar_url = Theme2035_get_avatar_url ( get_the_author_meta('ID'), $size = '100' );  ?>
                                    <a href=""><img class="img-circle" src="<?php echo $avatar_url; ?>"></a>
                                </div>
                            </div>
                            <div class="col-lg-<?php echo $authortitlecolumns; ?> col-sm-<?php echo $authortitlecolumns; ?> col-xs-12 author-title">
                                <h2><?php the_author_posts_link(); ?></h2>
                                <span class="author-position"><?php the_author_meta('job_title'); ?></span>
                                <p class="author-desc"><?php the_author_meta('description'); ?></p>
                                <div class="author-social-media">
                                    <ul>
                                        <?php if (get_the_author_meta('url') != '') { ?><li class="home"><a target="_blank" href="<?php the_author_meta('url'); ?>"><i class="fa fa-home"></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('behance') != "") { ?><li class="behance"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Behance","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('behance'); ?>"><i class="fa fa-behance "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('codepen') != "") { ?><li class="codepen"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Codepen","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('codepen'); ?>"><i class="fa fa-codepen "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('deviantart') != "") { ?><li class="deviantart"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Deviantart","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('deviantart'); ?>"><i class="fa fa-deviantart "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('dribbble') != "") { ?><li class="dribbble"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Dribbble","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('dribbble'); ?>"><i class="fa fa-dribbble "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('facebook') != "") { ?><li class="facebook"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Facebook","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('facebook'); ?>"><i class="fa fa-facebook "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('flickr') != "") { ?><li class="flickr"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Flickr","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('flickr'); ?>"><i class="fa fa-flickr "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('foursquare') != "") { ?><li class="foursquare"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Foursquare","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('foursquare'); ?>"><i class="fa fa-foursquare "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('github') != "") { ?><li class="github"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Github","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('github'); ?>"><i class="fa fa-github "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('google-plus') != "") { ?><li class="google-plus"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Google +","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('google-plus'); ?>"><i class="fa fa-google-plus "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('instagram') != "") { ?><li class="instagram"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Instagram","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('instagram'); ?>"><i class="fa fa-instagram "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('linkedin') != "") { ?><li class="linkedin"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Linkedin","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('linkedin'); ?>"><i class="fa fa-linkedin "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('pinterest') != "") { ?><li class="pinterest"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Pinterest","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('pinterest'); ?>"><i class="fa fa-pinterest "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('soundcloud') != "") { ?><li class="soundcloud"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Soundcloud","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('soundcloud'); ?>"><i class="fa fa-soundcloud "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('tumblr') != "") { ?><li class="tumblr"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Tumblr","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('tumblr'); ?>"><i class="fa fa-tumblr "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('twitter') != "") { ?><li class="twitter"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Twitter","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('twitter'); ?>"><i class="fa fa-twitter "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('vimeo') != "") { ?><li class="vimeo"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Vimeo","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('vimeo'); ?>"><i class="fa fa-vimeo-square"></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('vine') != "") { ?><li class="vine"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Vine","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('vine'); ?>"><i class="fa fa-vine "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('youtube') != "") { ?><li class="youtube"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Youtube","2035Themes-fm"); ?>" target="_blank" href="<?php the_author_meta('youtube'); ?>"><i class="fa fa-youtube "></i></a></li><?php } ?>
                                        <?php if (get_the_author_meta('user_email') != "") { ?><li class="user_email"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Send E-mail","2035Themes-fm"); ?>" href="mailto:<?php the_author_meta('user_email'); ?>"><i class="fa fa-envelope "></i></a></li><?php } ?>
                                        <li class="rss"><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Rss Feed","2035Themes-fm"); ?>" target="_blank" href="<?php echo get_author_feed_link(get_the_author_meta('ID')); ?>"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php }  if($theme_prefix['related-post-visibility'] == 1 ){ ?>
                        <div class="related-title "><h3> <?php echo __( 'RELATED POSTS', '2035Themes-fm' ); ?></h3></div>
                        <div class="row related-post-container">       
                            <?php if($theme_prefix['sidebar-type'] == "none" ){ $number = 4; $image_columns = 3; } else{ $number = 2; $image_columns = 6; }  
                                $orig_post = $post;  
                                global $post;  
                                $tags = wp_get_post_tags($post->ID);
                                if ($tags) {  
                                $tag_ids = array();  
                                foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
                                $args=array(  
                                'tag__in' => $tag_ids,  
                                'post__not_in' => array($post->ID),  
                                'posts_per_page'=>$number, // Number of related posts to display.  
                                'ignore_sticky_posts'=>1  
                                );
                                $my_query = new wp_query( $args );
                                $totalrelated = $my_query->found_posts;
                                if($totalrelated > 0){
                                while( $my_query->have_posts() ) {
                                $my_query->the_post();  
                            ?>
                            <?php if (has_post_thumbnail( $post->ID ) ){?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'related-post' );
                                $image = $image[0]; ?>
                            <?php } else $image = ""; ?>
                            <div class="col-lg-<?php echo $image_columns; ?> col-sm-6">  
                                <div class="related-posts">
                                    <div class="background-related back-check-img-wrap back-check-img <?php if($image == 0){ echo "noimage-ralated"; } ?> ">
                                        <img src="<?php echo $image; ?>">
                                        <div class="cats clearfix"> <?php the_category(); ?></div>
                                        <div class="cats-line"></div>  
                                        <div class="title clearfix"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></div>  
                                    </div>
                                </div>
                            </div>
                            <?php } }else{?>
                            <div class="col-lg-12"><p><?php echo __("No related post","2035Themes-fm") ?></p></div>
                            <?php } }else{ ?>
                            <div class="col-lg-12"><p><?php echo __("No related post","2035Themes-fm") ?></p></div>
                            <?php }
                            $post = $orig_post;  
                            wp_reset_query();  
                            ?>
                        </div>
                        <?php  } ?>
                        <?php comments_template();  ?>

                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
            <?php if($theme_prefix['prev-next'] == 1){ ?>
            <div class="prev-next">
                <?php
                $next_post = get_next_post();
                if (!empty( $next_post )): 
                    $next_title = strlen($next_post->post_title);
                ?>
                <a class="prev" href="<?php echo get_permalink( $next_post->ID ); ?>">
                    <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
                    <div>
                        <h3><?php if($next_title <=23){echo $next_post->post_title;}else{echo mb_substr($next_post->post_title,0,20,'UTF-8')."..";} ?></h3>
                        <?php echo get_the_post_thumbnail($next_post->ID, 'nextprev' ); ?>
                    </div>
                </a>
                <?php endif; ?> 

                <?php
                $prev_post = get_previous_post();
                if (!empty( $prev_post )): 
                    $prev_title = strlen($prev_post->post_title);
                ?>
                <a class="next" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                    <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
                    <div>
                        <h3><?php if($prev_title <=23){echo $prev_post->post_title;}else{echo mb_substr($prev_post->post_title,0,20,'UTF-8')."..";} ?></h3>
                        <?php echo get_the_post_thumbnail($prev_post->ID, 'nextprev' ); ?>
                    </div>
                </a>
                <?php endif; ?> 
            </div>
            <?php } ?>
        </div>
    <?php if($theme_prefix['modern-effect'] == 1){ ?>
    </div>
    <?php } ?>
<?php endwhile; endif; ?>

<?php } ?>

<?php get_footer(); ?>