<form method="get" action="<?php bloginfo('url'); ?>">
					<input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/spacer.gif" id="searchsubmit" alt="Search" value="" />
					<input name="s" type="text" class="searchtext" id="s" value="<?php the_search_query(); ?>" />
					
				</form>