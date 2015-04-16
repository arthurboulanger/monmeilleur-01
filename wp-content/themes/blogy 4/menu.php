    <?php global $theme_prefix;
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
        <div id="nav-menu" class="nav-top headroom <?php if(is_single()){echo "panel-closed-push";} ?> <?php if($blog_type != "modern") { echo "menu-container"; } else { echo "menu-container-top"; } ?>  ">  
            <div class="clearfix">
                <div class="logo pull-left <?php if($blog_type != "classic"){if(is_single()){ echo "back-check-img-wrap"; }elseif(is_search()){}elseif(is_page()){}elseif(is_author()){}else{ echo "back-check"; }} ?>">
                    <?php
                    if(empty($theme_prefix['logo']['url'])){
                        $theme_prefix['logo']['url'] = "";
                    }
                    if($theme_prefix['logo']['url'] != "" ){ ?>
                    <a href="<?php echo home_url(); ?>"><img alt="logo" src="<?php echo $theme_prefix['logo']['url']; ?>"></a>
                    <?php } else { ?>
                    <?php if($blog_type != "classic"){ $modern = "modern_logo"; } else { $modern = ""; }  ?> <div class="<?php echo $modern; ?> text-for-logo"><a href="<?php echo home_url(); ?>"><h3><?php bloginfo(); ?></h3></a>
                    <p class="blog-desc-title"><?php echo get_bloginfo ( 'description' ); ?></p>

                    </div>
                    <?php } ?>
                </div>
                <div class="<?php if($blog_type == "modern") { echo "menu-right"; } else { echo "menu-classic"; } ?>">
                <div class="search-panel pull-right">
                    <?php if($theme_prefix['header-search'] == 1){ ?>
                    <a id="search-button" href="#"><i class="fa fa-search open-search"></i><i class="fa fa-times close-search"></i></a>
                    <?php if($blog_type == "classic"){ ?>
                        <div id="classic-search-wrapper">
                            <form action="<?php echo home_url(); ?>" id="searchform" method="get">
                                <input type="search" id="s" name="s" class="s-input" placeholder="Enter keywords" required />
                                <input type="submit" class="s-submit" value="<?php echo __("Search","2035Themes-fm") ?>" />
                            </form>
                        </div>
                    <?php }} ?>
                    <?php if($theme_prefix['push-sidebar-icon'] == 1){ ?>
                    <a id="panel" href="#"><i class="fa fa-bars"></i></a>
                    <a href="#" class="slidebar-close"><i class="fa fa-times"></i></a>
                    <?php } ?>
                </div>
                <div id="navigation-menu" class="menu pull-right">
                    <nav id="menu">
                        <?php 
                        if (has_nav_menu('top-menu')) {
                                 wp_nav_menu(array('theme_location' => 'top-menu', 'container' => '','menu_class' => 'sf-menu', 'menu_id' => 'nav'));
                        }
                        else {
                        ?><div class="empty-menu"><?php echo __("Please Add Menu from Appearance > <a href='".home_url()."/wp-admin/nav-menus.php'>Menus</a>","2035Themes-fm"); ?></div><?php
                        }
                        ?>
                    </nav>
                </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>