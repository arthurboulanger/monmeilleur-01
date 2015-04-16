<?php get_header(); ?>
<?php get_template_part("menu"); 

$blog_post_sidebar = $theme_prefix['blog_sidebar'];

?>
  <div id="modern-search-wrapper">
        <form action="<?php echo home_url(); ?>" id="searchform" method="get">
            <input type="search" id="s" name="s" placeholder="<?php echo __("Enter keywords","2035Themes-fm"); ?>" required />
        </form>
        <a id="search-close" href="#"><i class="fa fa-times"></i></a>
    </div>



<div class="page <?php if($blog_type == "modern"){echo "margint120";}else{echo "margint140";} ?> classic-blog-wrap">
  <div class="container">
  <div class="row">

    <?php if($theme_prefix['page-sidebar-type'] == "left" ){ ?> 

    <aside class="col-lg-4 sidebar">
    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($blog_post_sidebar)) :  ?>
    <a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm") ?></a>
    <?php endif; ?>

    </aside>

    <?php } ?>


<?php if($theme_prefix['page-sidebar-type'] == "none" ){ ?><div class="col-lg-12 col-sm-12"><?php } else { ?> <div class="col-lg-8 blog-content"> <?php } ?>

<?php if (have_posts()) :  
while ( have_posts() ) : the_post();
	$name_of_post = get_post_meta( get_the_ID(), 'theme2035_section_name', true );
	$post_section_name = get_post_meta( get_the_ID(), 'theme2035_section_name', true );
  $post_id = get_the_ID();
  global $theme_prefix;
  $blog_type = $theme_prefix['home-page-type'];
  ?>

  <?php  $show_title = get_post_meta( get_the_ID(), 'theme2035_show_title', true ); if(empty($show_title)){ $show_title = "1"; }

    if( $show_title != 0 ){
  ?>
        <div class="title-area">
        <?php if(get_post_meta($post_id, 'theme2035_background_type', true) != "dark") { ?> <div class="title-light"><h2><?php echo the_title();  ?></h2></div> <?php } else { ?> <div class="title-dark"><h2><?php echo the_title();  ?></h2></div><?php } ?>                          
        </div>
        <?php } ?>
        <div class="margint30 clearfix"><?php the_content(); ?></div>
        <div class="margint60 clearfix">
          <?php comments_template();  ?>
        </div>

<?php  endwhile; endif;?>


</div>




                <?php if($theme_prefix['page-sidebar-type'] == "right" ){ ?> <aside class="col-lg-4 sidebar">

                <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar($blog_post_sidebar)) :  ?>
                    <a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm") ?></a>
                <?php endif; ?>

                </aside><?php } ?>


    </div>
  </div>
</div>



<?php get_footer(); ?>

