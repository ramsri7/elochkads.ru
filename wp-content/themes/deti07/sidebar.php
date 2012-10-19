<!-- sidebar start -->
		<div id="sidebar">

			<!-- welcome start -->
			<div id="welcome"><div><span><?php include(TEMPLATEPATH . '/welcome.php'); ?></span></div></div>
			<!-- welcome end -->
			<ul>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>
				<li>
					<h3>Разделы</h3>
					<ul>
						<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
					</ul>
				</li>
				<li>
					<h3>Архив</h3>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>
				<li>
					<?php get_friend_links(array('title')); ?>
				</li>
				<li>
					<h3>Навигатор</h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<li><a href="http://temku.ru">Темы WordPress</a></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
			<?php endif; ?>
			</ul>
			<div id="sidebar_bottom_frame"></div>
		</div>
<!-- sidebar end -->