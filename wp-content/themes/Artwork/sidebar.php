<!-- sidebar right start -->
		<div id="sidebar_right">
			<ul>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>
				<li class="sidebar_cat">
					<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_cat.gif" width="190" height="34" alt="categories" /></h3>
					<ul>
						<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
					</ul>
				</li>
				<li>
					<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_arc.jpg" width="195" height="79" alt="archives" /></h3>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>
				<li>
					<?php get_friend_links(array('title')); ?>
				</li>
				<li>
					<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sidebar_meta.jpg" width="195" height="55" alt="meta" /></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<li><a href="http://wordpresse.ru">Wordpress</a></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
			<?php endif; ?>
			</ul>
		</div>
<!-- sidebar end -->