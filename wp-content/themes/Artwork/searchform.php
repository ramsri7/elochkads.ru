				<form method="get" action="<?php bloginfo('url'); ?>" >
					<input name="s" type="text" class="searchtext" id="s" value="<?php the_search_query(); ?>" />
					<input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/spacer.gif" id="searchsubmit" alt="Search" value=""  />
				</form>