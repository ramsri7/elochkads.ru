<?php 
get_header(); 

 if (have_posts()) 
 {
		art_page_navi(__('Результаты поиска', THEME_NS));
        while (have_posts())  
        {
            art_post();
        }
        art_page_navi();
 } else {  
	    art_not_found_msg(__('Результаты поиска', THEME_NS),
            '<p class="center">' .  __('Записей не найдено. Попробуйте изменить параметры поиска.', THEME_NS) . '</p>'
            .  "\r\n" . art_get_search());
 }
 
get_footer(); 