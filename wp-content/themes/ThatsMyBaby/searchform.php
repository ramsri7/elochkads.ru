<form method="get" name="searchform" action="<?php bloginfo('url'); ?>/">
<div><input type="text" value="<?php the_search_query(); ?>" name="s" style="width: 95%;" />
	<span class="button-wrapper">
		<span class="l"> </span>
		<span class="r"> </span>
		<input class="button" type="submit" name="search" value="<?php _e('Поиск', 'kubrick'); ?>" />
	</span>
</div>
</form>

