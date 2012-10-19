<?php 
get_header(); 
if (have_posts()) 
{
	$post = $posts[0];
	$title = '';
	if (is_category()){
		$title .= single_cat_title('', false);
	} elseif( is_tag() ) {
		$title .= sprintf(__('Записи с меткой &#8216;%s&#8217;', THEME_NS), single_tag_title('', false) );
	} elseif( is_day() ) {
		$title .= sprintf(_c('Архивы за день %s', THEME_NS), get_the_date());
	} elseif( is_month() ) {
		$title .= sprintf(_c('Архивы за месяц %s', THEME_NS), get_the_date('F Y'));
	} elseif( is_year() ) {
		$title .= sprintf(_c('Архивы за год %s', THEME_NS), get_the_date('Y'));
	} elseif( is_author() ) {
		$title .= __('Архивы автора', THEME_NS);
	} elseif( isset($_GET['paged']) && !empty($_GET['paged']) ) {
		$title .= __('Архивы блога', THEME_NS);
	}
	art_page_navi($title);
    while (have_posts())  
    {
        art_post();
    }
    art_page_navi();
} else {    
	$title = '';
	if ( is_category() ) {
		$title .= sprintf(__("Извините, но в рубрике %s еще нет записей.", THEME_NS), single_cat_title('',false));
	} else if ( is_date() ) { 
		$title .= __("Извините, но записей с этой датой не существует.", THEME_NS);
	} else if ( is_author() ) { 
		$userdata = get_userdatabylogin(get_query_var('author_name'));
		$title .= sprintf(__("Извините, но пользователь %s еще не опубликовал записей.", THEME_NS), $userdata->display_name);
	} else {
		$title .= __('Записей не найдено.', THEME_NS);
	}
    art_not_found_msg($title);
}
get_footer(); 
