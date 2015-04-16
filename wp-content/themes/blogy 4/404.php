<?php get_header(); ?>
    <?php get_template_part('menu'); 
    global $theme_prefix;
    $blog_type = $theme_prefix['home-page-type'];
    ?>
    <div id="error-page" class="margint140">
        <div class="container fitvids clearfix">
            <div class="row clearfix">
                <div class="col-lg-6 pos-center pull-left left-side">
                    <div class="error-image">
                        <img class="img-responsive" src="<?php echo THEMEROOT; ?>/images/404.png">
                    </div>
                    <div class="error-text">
                        <h1><?php echo __("PAGE NOT FOUND!","2035Themes-fm") ?></h1>
                    </div>
                </div>
                <div class="col-lg-6 pos-center pull-left right-side">
                    <div class="right-content">
                        <div class="go-to-homepage">
                            <h5>Go to Homepage</h5>
                            <p>Morbi leo risus, porta ac co. Fusce dapibus, tellus ac cursus commodo, tentum massa justo sit amet risus.</p>
                            <div class="button-style"><a href="<?php echo home_url(); ?>">HOMEPAGE</a></div>
                        </div>
                        <div class="search-box">
                            <h5>search</h5>
                            <?php get_search_form(); ?>                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>

