<?php get_header(); ?>
    <?php get_template_part('menu'); ?>
<?php
$blog_type = $theme_prefix['home-page-type'];
$default_sidebar = $theme_prefix['blog_sidebar'];
if($blog_type == "classic"){
?>
    <div id="blog">
        <div class="container fitvids margint140">
            <div class="row">
                <?php if($theme_prefix['sidebar-type'] == "left" ){ ?> <aside class="col-lg-4 col-sm-4 sidebar">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($default_sidebar)) :  ?>
                        <a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm") ?></a>
                    <?php endif; ?>
                </aside>
                <?php } ?>
                <?php if($theme_prefix['sidebar-type'] == "none" ){ ?><div class="col-lg-12 col-sm-12 blog-content"><?php } else { ?> <div class="col-lg-8 col-sm-8 blog-content"> <?php } ?>
                    <?php if (have_posts()) : while(have_posts()) :  the_post(); ?>
                    <?php get_template_part('inc/post-types/content',get_post_format()); ?>
                    <?php endwhile; else : ?>
                    <h1><?php echo __('Your search returned no results. Please try a different keyword!','2035Themes-fm') ?></h1>
                    <?php endif; ?>  
                    <?php Theme2035_pagination(); ?>
                </div>
                <?php if($theme_prefix['sidebar-type'] == "right" ){ ?> <aside class="col-lg-4 col-sm-4 sidebar">
                <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($default_sidebar)) :  ?>
                        <a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm"); ?></a>
                    <?php endif; ?>
                </aside><?php } ?>
            </div>
        </div>
    </div>
<?php }else{
$count_pub_posts = wp_count_posts();
$published_posts = $count_pub_posts->publish;
$read_post_page = get_option('posts_per_page');

$total_slider_page = $theme_prefix['grid-page-count'];
$grid_layout = $theme_prefix['blog-grid'];
$offset_start = 0;
$offset_for_grids = $total_slider_page * $grid_layout;

?>
    <div id="modern-search-wrapper">
        <form action="<?php echo home_url(); ?>" id="searchform" method="get">
            <input type="search" id="s" name="s" placeholder="<?php echo __("Enter keywords","2035Themes-fm"); ?>" required />
        </form>
        <a id="search-close" href="#"><i class="fa fa-times"></i></a>
    </div>

    <div class="content search-page" style="background: url(' <?php $grid_back = $theme_prefix['blog-grid-background']['url']; if($grid_back != ""){ echo $grid_back; } else{ echo "http://www.2035themes.com/blogy/modern/wp-content/uploads/2014/10/cover.jpg"; } ?>') top center no-repeat #f5f5f5;">
        <div class="container">
            <div class="pos-center padt60 grid-title"><h1><?php echo __('SEARCH RESULTS','2035Themes-fm'); ?></h1><hr></div>
            <div class="row post-box">
                <?php if (have_posts()) : while(have_posts()) :  the_post(); ?>
                    <div class="col-lg-4 blog-post-item">
                        <div class="modern-grid-box">    
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <div class="modern-content-thumbnail">
                                    <?php if($theme_prefix['sidebar-type'] == "none" ){ $image_size = "full-screen"; } else { $image_size="full"; } ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "modern-grid" );
                                     $image = $image[0]; ?> 
                                    <img src="<?php echo $image; ?>">  
                            <div class="modern-grid-cat"> <?php the_category(); ?></div>          
                            </div>
                            <?php endif; ?>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <span class="recent-post-materials clearfix">
                                <ul>
                                    <li class="author">by <a href="<?php the_permalink(); ?>"><?php the_author(); ?></a></li>
                                    <li><a href="<?php the_permalink(); ?>"><?php echo $post_date = the_time('F j'); ?></a></li>
                                </ul>
                            </span>
                            <div class="grid-post-excerpt clearfix">
                                <?php 
                                    the_excerpt();
                                ?>
                                <a class="blog-read-more" href="<?php the_permalink(); ?>"><?php echo __('READ MORE', '2035Themes-fm'); ?> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; else : ?>
                <h1><?php echo __('Your search returned no results. Please try a different keyword!','2035Themes-fm') ?></h1>
                <?php endif; ?>  
            </div>
        </div>
        <?php Theme2035_pagination(); ?>
    </div>
    <?php if($theme_prefix['modern-social-area'] == 1 ){  ?>
    <div class="social-area clearfix">
        <div class="pull-left social-newsletter">
            <div class="newsletter-box pull-right">
                <div class="newsletter-wrapper">
                    <div class="nwslttr-title pos-center margint40 marginb70">
                        <h3>NEWSLETTER</h3>
                        <hr />
                    </div>
                    <?php echo do_shortcode($theme_prefix['newsletter-area']); ?>
                </div>
            </div>
        </div>
        <div class="pull-left social-side">
            <div class="social-box pull-left">
                <div class="social-title pos-center margint40 marginb70">
                    <h3>SOCIAL LINKS</h3>
                    <hr />
                    <ul class="social-links-footer margint50">
                        <?php if($theme_prefix['social-facebook'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Facebook","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-facebook']; ?>"><i class="fa fa-facebook"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-twitter'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Twitter","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-twitter']; ?>"><i class="fa fa-twitter"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-googleplus'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Google Plus","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-googleplus']; ?>"><i class="fa fa-google-plus"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-linkedin'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Linkedin","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-linkedin']; ?>"><i class="fa fa-linkedin"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-codepen'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Codepen","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-codepen']; ?>"><i class="fa fa-codepen"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-behance'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Behance","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-behance']; ?>"><i class="fa fa-behance"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-deviantart'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Deviantart","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-deviantart']; ?>"><i class="fa fa-deviantart"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-dribbble'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Dribbble","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-dribbble']; ?>"><i class="fa fa-dribbble"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-foursquare'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Foursquare","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-foursquare']; ?>"><i class="fa fa-foursquare"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-flickr'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Flickr","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-flickr']; ?>"><i class="fa fa-flickr"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-github'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("GitHub","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-github']; ?>"><i class="fa fa-github"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-instagram'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Instagram","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-instagram']; ?>"><i class="fa fa-instagram"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-pinterest'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Pinterest","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-pinterest']; ?>"><i class="fa fa-pinterest"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-soundcloud'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("SoundCloud","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-soundcloud']; ?>"><i class="fa fa-soundcloud"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-tumblr'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Tumblr","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-tumblr']; ?>"><i class="fa fa-tumblr"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-vimeo'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Vimeo","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-vimeo']; ?>"><i class="fa fa-vimeo-square"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-vine'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Vine","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-vine']; ?>"><i class="fa fa-vine"></i></a></li><?php } ?>
                        <?php if($theme_prefix['social-youtube'] != ""){?><li><a class="has-tooltip" data-toggle="tooltip" data-placement="top" title="<?php echo __("Youtube","theme2035"); ?>" target="_blank" href="<?php echo $theme_prefix['social-youtube']; ?>"><i class="fa fa-youtube"></i></a></li><?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php }} ?>
<?php get_footer(); ?>