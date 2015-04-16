<?php  global $theme_prefix;  ?>                   


<!--**************************************************************************************************/
/* Gallery Post Format 
************************************************************************************************** -->

    <article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">
    <?php if(!is_single()){ ?><div class="blog-post clearfix"><?php }else { ?><div class="blog-post-single blog-post-single-style clearfix"><?php } ?>
            <div class="post-title-container">          
                <h1><a href="<?php the_permalink(); ?>"> <?php $title = get_the_title(); if($title != "" ) { echo $title; }  else { echo $post_date = the_time('F j'); }  ?></a></h1>
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
            </div>
            <div class="post-type-icon">
                <i title="<?php echo __("Gallery Post Format","2035Themes-fm"); ?>" class="fa fa-image"></i>
            </div>
            <?php if (is_sticky()) { ?> <span class="sticky-post"><i class="fa fa-bookmark"></i></span> <?php } ?>
            <div class="post-gallery">
  
                <?php   

                global $wpdb;
                $images = get_post_meta( get_the_ID(), 'theme2035_galleryslides', false );
                $images = implode( ',' , $images );
                // Re-arrange images with 'menu_order'
                $images = $wpdb->get_col("
                    SELECT ID FROM {$wpdb->posts}
                    WHERE post_type = 'attachment'
                    AND ID in ({$images})
                    ORDER BY menu_order ASC
                " );
?>
              
                        <div class="flexslider no-arrow">
                            <ul class="slides">
                            <?php if($theme_prefix['sidebar-type'] == "none" ){ $image_size = "full-screen"; }else { $image_size="full"; } ?>
                            <?php if($theme_prefix['featured-image-crop'] != "1") { $image_size =""; }  ?>
                                <?php
                                foreach ( $images as $att ){
                                        // Get image's source based on size, can be 'thumbnail', 'medium', 'large', 'full' or registed post thumbnails sizes
                                        $src = wp_get_attachment_image_src( $att, $image_size );
                                        $src = $src[0];
                                        // Show image
                                        echo "<li><img src='{$src}' /></li>";
                                    }
                                ?>
                            </ul>
                        </div>
            </div>
            <div class="post-content clearfix">
                <div class="post-content-blog">
                    <?php  if(is_single()){ ?>
                        <div class="excerpt">
                            <?php the_content(); wp_link_pages('before=<div class="margint10 post-paginate">&after=</div>'); ?>
                        </div>
                    <?php } else {  if($theme_prefix['classic-excerpt'] > 0 ){ the_excerpt();  } else{ the_content(); }  } ?>

                </div>

                <?php 
                    if(!is_single()){
                    if($theme_prefix['classic-excerpt'] > 0 ){ ?>
                    <div class="continue-reading pull-left">
                        <a href="<?php the_permalink(); ?>"><?php echo __("READ MORE","2035Themes-fm"); ?></a>
                    </div>
                    <?php } else { $marginb20 = "marginb20"; } ?>
                    <div class="blog-classic-share <?php echo $marginb20; ?> pull-right clearfix">
                        <div class="pull-left"><a class="open-share" href="<?php the_permalink(); ?>"><i class="fa fa-share-alt"></i></a></div>
                            <div class="pull-left share-wrapper">
                                <span class="tag-title-post pull-left cshare-text"><?php echo __("SHARE","2035Themes-fm"); ?> : </span>
                                <div class="share-tools pull-left">
                                    <ul>
                                        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="https://twitter.com/share?url=<?php the_permalink();?>&text=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="http://pinterest.com/pin/create/button/?source_url=<?php the_permalink();?>&media=<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300,300 ), false, '' ); echo $src[0]; ?>&description=<?php the_title(); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Pinterest"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a href="https://plus.google.com/share?url=<?php the_permalink();?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false;" target="_blank" title="Share on Google Plus"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                    <?php
                    }else {  ?>
                    <div class="post-tools clearfix">

                        <div class="col-lg-6">
                            <div class="pull-left">
                                <div class="blog-post-tag clearfix">
                                <?php
                                    if( has_tag() ) {  
                                    echo '<span><i class="fa fa-tags"></i></span><span class="tag-title-post">TAGS : </span>'; 
                                    the_tags('  ',' | ','  ');
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
                    <?php } ?>
        </div>
        </div>
        </article>

    <?php  if(is_single()){ ?>
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
                    <h2><?php the_author_link(); ?></h2>
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
            <div class="related-title"><h3> <?php echo __( 'RELATED POSTS', '2035Themes-fm' ); ?></h3></div>
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
            $my_query->the_post();  ?>
            <?php if (has_post_thumbnail( $post->ID ) ){ ?>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'related-post' );
            $image = $image[0]; ?>
            <?php }else{
                $image = IMAGES."/no-image-grid.jpg";
            }
            ?>
            <div class="col-lg-<?php echo $image_columns; ?> col-sm-6">  
                <div class="related-posts">
                    <div class="background-related back-check-img-wrap back-check-img">
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
            <?php  }} ?>
            <?php comments_template();  ?>