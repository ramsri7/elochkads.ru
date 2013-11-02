<?php
	if( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget'=> '<div class="lftcrn" style="margin-top:12px;"></div><div class="widget_style">',
		'after_widget'=> '</div><div class="lftcrn2"></div>',
		'before_title'=> '<h2>',
		'after_title'=> '</h2>',
	) );

function widget_business_search() {
?>
	<div style="margin:0px; float:left; margin-top:0px; width:220px;" class="widget_style">
	 <h2><?php _e('Search','ente446'); ?></h2>
	 <div>
    <?php// include (TEMPLATEPATH . "/searchform.php"); ?>
    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>" style="padding:0; margin:0;">
    <input type="text" value=" " name="s" id="s" style="margin:15px 0px 0px 30px;" />
	<input  type="submit" src="<?php bloginfo('stylesheet_directory'); ?>" value="submit" style="margin:15px 0px 0px 30px;" />
	</form>
  </div>
</div>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_business_search');
   
function tm_date($d='', $before='', $after='', $echo = true) {
	global $id, $post, $day, $previousday, $newday;
	$the_date = '';
	$the_date .= $before;
	if ( $d=='' )
		$the_date .= mysql2date(get_option('date_format'), $post->post_date);
	else
		$the_date .= mysql2date($d, $post->post_date);
	$the_date .= $after;
	$previousday = $day;
	$the_date = apply_filters('the_date', $the_date, $d, $before, $after);
	if ( $echo )
		echo $the_date;
	else
		return $the_date;
}
?>
