	<div id="sidebar">
        <ul>
            <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>
            <li><h2>Поиск</h2>
            <?php include (TEMPLATEPATH . '/searchform.php'); ?>
            </li>

            <?php wp_list_pages('title_li=<h2>Страницы</h2>' ); ?>

            <li><h2>Архив</h2>
                <ul>
                    <?php wp_get_archives('type=monthly'); ?>
                </ul>
            </li>

            <li><h2>Категории</h2>
                <ul>
                    <?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
                </ul>
            </li>

            <?php get_links_list(); ?>

            <li><h2>Служебное</h2>
                <ul>
                <?php wp_register(); ?>
                    <li><?php wp_loginout(); ?></li>
                    <?php wp_meta(); ?>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
	</div>