<!-- sidebar left start -->
		<div id="sidebar_left">
			<div id="searchform">
				<?php include(TEMPLATEPATH . '/searchform.php'); ?>
			</div>
			<div id="rss"><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/spacer.gif" width="44" height="42" alt="rss" /></a></div>
			<div id="about_us">
				<div class="about_us_top"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_about.jpg" width="200" height="53" alt="about us" /></div>
				<div class="about_us_body"><?php include(TEMPLATEPATH . '/about-us.php'); ?></div>
			</div>
			<ul>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>
				<li>
					<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_post.jpg" width="200" height="77" alt="recent posts" /></h3>
					<ul>
						<?php get_archives('postbypost', 5); ?>
					</ul>
				</li>
				<li>
					<?php get_recent_comments(array('number' => 5)); ?>
				</li>
			<?php endif; ?>
			</ul>
		</div>
<!-- sidebar left end -->