<?php

//regster multiple sidebar
if (function_exists('register_sidebar'))
{
	register_sidebar(
		array(
			'name'          => 'Left Sidebar',
	        'before_widget' => '<li>',
    	    'after_widget'  => '</li>',
        	'before_title'  => '<h3>',
        	'after_title'   => '</h3>'
		)
	);
}

//remove html tag when saving comments
function preprocess_comment_striptags($commentdata) {
    $commentdata['comment_content'] = strip_tags($commentdata['comment_content']);
    return $commentdata;
}
add_filter('preprocess_comment', 'preprocess_comment_striptags');

// remove html tag when showing comments
function comment_text_striptags($string) {
    return strip_tags($string);
}
add_filter('comment_text', 'comment_text_striptags');

// recent comments
function get_recent_comments($args) {
	global $wpdb, $comments, $comment;
	extract($args, EXTR_SKIP);

	$themePath = get_bloginfo('template_url');
	$imageLink = '<div class="sidebar_li_pre"></div><h3>Recent Comments</h3>';

	$options = get_option('widget_recent_comments');
	$title = empty($options['title']) ? __($imageLink) : apply_filters('widget_title', $options['title']);
	if ( !$number = (int) $options['number'] )
		$number = 7;
	else if ( $number < 1 )
		$number = 1;
	else if ( $number > 15 )
		$number = 15;

	if ( !$comments = wp_cache_get( 'recent_comments', 'widget' ) ) {
		$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $number");
		wp_cache_add( 'recent_comments', $comments, 'widget' );
	}

		 echo $before_widget;
			echo $before_title . $title . $after_title;
			echo '<ul id="recentcomments">';
			if ( $comments ) : foreach ( (array) $comments as $comment) :
			echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_author_link(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
			endforeach; endif;
		echo '</ul>';
		echo $after_widget; 

}

// links list
function get_friend_links($args) {
	extract($args, EXTR_SKIP);

	$themePath = get_bloginfo('template_url');
	$imageLink = '<div class="sidebar_li_pre"></div><h3>Links<span style="display:none">';

	$before_widget = preg_replace('/id="[^"]*"/','id="%id"', $before_widget);
	wp_list_bookmarks(apply_filters('widget_links_args', array(
		'title_before' => $imageLink, 'title_after' => '</span></h3>',
		'category_before' => $before_widget, 'category_after' => $after_widget,
		'show_images' => true, 'class' => 'linkcat widget'
	)));
}

### Function: Page Navigation Options
function pagenavi_init() {
	$pagenavi_options = array();
	$pagenavi_options['pages_text'] = __('Page %CURRENT_PAGE% of %TOTAL_PAGES%','wp-pagenavi');
	$pagenavi_options['current_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['page_text'] = '%PAGE_NUMBER%';
	$pagenavi_options['first_text'] = __('&laquo; First','wp-pagenavi');
	$pagenavi_options['last_text'] = __('Last &raquo;','wp-pagenavi');
	$pagenavi_options['next_text'] = __('&raquo;','wp-pagenavi');
	$pagenavi_options['prev_text'] = __('&laquo;','wp-pagenavi');
	$pagenavi_options['dotright_text'] = __('...','wp-pagenavi');
	$pagenavi_options['dotleft_text'] = __('...','wp-pagenavi');
	$pagenavi_options['style'] = 1;
	$pagenavi_options['num_pages'] = 5;
	$pagenavi_options['always_show'] = 0;
	return $pagenavi_options;
}

### Function: Page Navigation: Boxed Style Paging
function wp_pagenavi($before = '', $after = '') {
	global $wpdb, $wp_query; 
	$pagenavi_options = array();
	$pagenavi_options = pagenavi_init();

	if (!is_single()) {
		$request = $wp_query->request;
		$posts_per_page = intval(get_query_var('posts_per_page'));
		$paged = intval(get_query_var('paged'));
		$numposts = $wp_query->found_posts;
		$max_page = $wp_query->max_num_pages;
		
		/*
		$numposts = 0;
		if(strpos(get_query_var('tag'), " ")) {
		    preg_match('#^(.*)\sLIMIT#siU', $request, $matches);
		    $fromwhere = $matches[1];			
		    $results = $wpdb->get_results($fromwhere);
		    $numposts = count($results);
		} else {
			preg_match('#FROM\s*+(.+?)\s+(GROUP BY|ORDER BY)#si', $request, $matches);
			$fromwhere = $matches[1];
			$numposts = $wpdb->get_var("SELECT COUNT(DISTINCT ID) FROM $fromwhere");
		}
		$max_page = ceil($numposts/$posts_per_page);
		*/
		if(empty($paged) || $paged == 0) {
			$paged = 1;
		}
		$pages_to_show = intval($pagenavi_options['num_pages']);
		$pages_to_show_minus_1 = $pages_to_show-1;
		$half_page_start = floor($pages_to_show_minus_1/2);
		$half_page_end = ceil($pages_to_show_minus_1/2);
		$start_page = $paged - $half_page_start;
		if($start_page <= 0) {
			$start_page = 1;
		}
		$end_page = $paged + $half_page_end;
		if(($end_page - $start_page) != $pages_to_show_minus_1) {
			$end_page = $start_page + $pages_to_show_minus_1;
		}
		if($end_page > $max_page) {
			$start_page = $max_page - $pages_to_show_minus_1;
			$end_page = $max_page;
		}
		if($start_page <= 0) {
			$start_page = 1;
		}
		if($max_page > 1 || intval($pagenavi_options['always_show']) == 1) {
			$pages_text = str_replace("%CURRENT_PAGE%", number_format_i18n($paged), $pagenavi_options['pages_text']);
			$pages_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pages_text);
			echo $before.'<div class="wp-pagenavi">'."\n";
			switch(intval($pagenavi_options['style'])) {
				case 1:
				
					if(!empty($pages_text)) {
						echo '<span class="pages">&#8201;'.$pages_text.'&#8201;</span>';
					}					
					if ($start_page >= 2 && $pages_to_show < $max_page) {
						$first_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['first_text']);
						echo '<a href="'.clean_url(get_pagenum_link()).'" title="'.$first_page_text.'">&#8201;'.$first_page_text.'&#8201;</a>';
						if(!empty($pagenavi_options['dotleft_text'])) {
							echo '<span class="extend">&#8201;'.$pagenavi_options['dotleft_text'].'&#8201;</span>';
						}
					}
					previous_posts_link($pagenavi_options['prev_text']);
					for($i = $start_page; $i  <= $end_page; $i++) {						
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<span class="current">&#8201;'.$current_page_text.'&#8201;</span>';
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<a href="'.clean_url(get_pagenum_link($i)).'" title="'.$page_text.'">&#8201;'.$page_text.'&#8201;</a>';
						}
					}
					next_posts_link($pagenavi_options['next_text'], $max_page);
					if ($end_page < $max_page) {
						if(!empty($pagenavi_options['dotright_text'])) {
							echo '<span class="extend">&#8201;'.$pagenavi_options['dotright_text'].'&#8201;</span>';
						}
						$last_page_text = str_replace("%TOTAL_PAGES%", number_format_i18n($max_page), $pagenavi_options['last_text']);
						echo '<a href="'.clean_url(get_pagenum_link($max_page)).'" title="'.$last_page_text.'">&#8201;'.$last_page_text.'&#8201;</a>';
					}
					break;
				case 2;
					echo '<form action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="get">'."\n";
					echo '<select size="1" onchange="document.location.href = this.options[this.selectedIndex].value;">'."\n";
					for($i = 1; $i  <= $max_page; $i++) {
						$page_num = $i;
						if($page_num == 1) {
							$page_num = 0;
						}
						if($i == $paged) {
							$current_page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['current_text']);
							echo '<option value="'.clean_url(get_pagenum_link($page_num)).'" selected="selected" class="current">'.$current_page_text."</option>\n";
						} else {
							$page_text = str_replace("%PAGE_NUMBER%", number_format_i18n($i), $pagenavi_options['page_text']);
							echo '<option value="'.clean_url(get_pagenum_link($page_num)).'">'.$page_text."</option>\n";
						}
					}
					echo "</select>\n";
					echo "</form>\n";
					break;
			}
			echo '</div>'.$after."\n";
		}
	}
}

?>