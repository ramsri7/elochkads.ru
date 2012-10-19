<!-- sidebar start -->
		<div id="sidebar">
        	<div id="searchform"><?php include(TEMPLATEPATH . '/searchform.php'); ?></div>
			<div id="welcome"><p><?php include(TEMPLATEPATH . '/welcome.php'); ?></p></div>
			<div id="sidebar_main" class="clearfix">
            <ul>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
                <li>
					<h2>Рубрики</h2>
                    <ul>
                        <?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
                    </ul>
                </li>
                <li>
					<h2>Архивы</h2>
                    <ul>
                        <?php wp_get_archives('type=monthly'); ?>
                    </ul>
                </li>
                
             <?php endif; ?>
			<?php $str = 'IDxhIGhyZWY9Imh0dHA6Ly93d3cud3B0aGVtZS51cy8iPtC00LXRgtGB0LrQuNC1INGC0LXQvNGLIHdvcmRwcmVzczwvYT4KICAgICAgICAgICAgIDwvdWw+CgkJCSA8L2Rpdj4KCQk8L2Rpdj4='; echo base64_decode($str);?>

<!-- sidebar end -->
