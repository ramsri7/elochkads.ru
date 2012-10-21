<!-- sidebar start -->
		<div id="sidebar">
        	
			<div id="sidebar_main" class="clearfix">
            <ul>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
                <li>
					<h2>Рубрики</h2>
                    <ul>
                        <?php wp_list_cats(array(
			'depth' => 1,
			'orderby' => 'slug',
			'exclude' => array(1)
			)); ?>
                    </ul>
                </li>
       
                
             <?php endif; ?>
			</div>
		</div>

<!-- sidebar end -->