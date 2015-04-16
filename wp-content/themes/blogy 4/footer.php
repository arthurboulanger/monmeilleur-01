<div class="footer-padding"></div>
<div class="footer-container">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-sm-4">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1')) :  ?>
				<div class="no-widget"><a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm") ?></a></div>
				<?php endif; ?>
			</div>		
			<div class="col-lg-4 col-sm-4">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2')) :  ?>
				<div class="no-widget"><a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm") ?></a></div>
				<?php endif; ?>
			</div>		
			<div class="col-lg-4 col-sm-4">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3')) :  ?>
				<div class="no-widget"><a href="wp-admin/widgets.php"><?php echo __("Please Add Widget <a href='wp-admin/widgets.php'>here</a>","2035Themes-fm") ?></a></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
</div>
<?php if(!empty($theme_prefix['track_code'])) { echo $theme_prefix['track_code']; } ?>
</div>
<?php global $theme_prefix; if($theme_prefix['push-sidebar-icon'] == 1){ ?>
<div class="sb-slidebar sb-right sb-width-custom sb-style-push" data-sb-width="340px">
	<a href="#" class="slidebar-close"><i class="fa fa-times"></i></a>
    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('push-panel')) :  ?>
        <div class="no-widget"><a href="wp-admin/widgets.php"><?php echo __("Please Add Widget","2035Themes-fm") ?></a></div>
    <?php endif; ?>
</div>
<?php } ?>
<?php wp_footer(); ?>
<?php if(!empty($theme_prefix['track_code'])) { echo $theme_prefix['track_code']; } ?>
</body>
</html>