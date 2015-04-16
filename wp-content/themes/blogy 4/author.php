<?php get_header(); ?>
<?php $avatar_url = Theme2035_get_avatar_url ( get_the_author_meta('ID'), $size = '130' );  ?>
    <div id="modern-search-wrapper">
        <form action="<?php echo home_url(); ?>" id="searchform" method="get">
            <input type="search" id="s" name="s" placeholder="<?php echo __("Enter keywords","2035Themes-fm"); ?>" required />
        </form>
        <a id="search-close" href="#"><i class="fa fa-times"></i></a>
    </div>
    <div class="author-page">
        <div class="author-cover">
            <div class="author-back-check" style="background: url('<?php the_author_meta('author_image'); ?>');">
                <div class="background-opacity">
                    <?php get_template_part('menu'); ?>
                    
                    <div class="container pos-center">
                        <div class="author-page-box">
                            
                            <img class="img-circle" src="<?php echo $avatar_url; ?>">
                            <h1><?php the_author_meta('display_name'); ?></h1>
                            <span class="author-position"><?php the_author_meta('job_title'); ?></span>
                            <p class="author-desc"><?php the_author_meta('description'); ?></p>
                            <div class="author-social-media">
                                <ul>
                                            <?php if (get_the_author_meta('url') != '') { ?><li class="home"><a target="_blank" href="<?php the_author_meta('url'); ?>"><i class=" momizat-icon-home "></i></a></li><?php } ?>
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
                                <div class="author-pages">
                                    <div class="pull-left pages-nav">
                                        <ul>
                                            <li class="active"><a href="#"><?php echo __("ALL POSTS","2035Themes-fm"); ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="pull-right user-random-posts">
                                        <a href="index.php?random=1" class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Random Post","2035Themes-fm"); ?>"><i class="fa fa-random"></i></a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
     <div class="container margint60">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <?php if (have_posts()) : while(have_posts()) :  the_post(); ?>
                <?php get_template_part('inc/post-types/content',get_post_format()); ?>
                <?php endwhile; else : ?>
                <h1><?php echo __('Your search returned no results. Please try a different keyword!','2035Themes-fm') ?></h1>
                <?php endif; ?>
            </div>
            <div class="col-lg-2"></div>
        </div>
     </div>



<?php get_footer(); ?>