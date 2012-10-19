<!-- sidebar start -->
		<div id="sidebar">
        	<div id="searchform"><?php include(TEMPLATEPATH . '/searchform.php'); ?></div>
        	<div id="sidebar_top">
            <ul>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>
                <li>
                    <h3>Рубрики</h3>
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
                        <li><a href="http://www.temku.ru">Wordpress</a></li>
                        <?php wp_meta(); ?>
                    </ul>
                </li>
             <?php endif; ?>
             </ul>
             </div>

		</div>
<!-- sidebar end -->