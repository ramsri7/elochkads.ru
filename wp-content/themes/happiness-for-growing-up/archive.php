<?php
function get_category_title($node) {
	global $wpdb;
	$test = $wpdb->get_var("SELECT name FROM $wpdb->terms WHERE term_id=$node");
	return $test;
}

function get_category_child() {
	global $wp_query;
	return $wp_query->query_vars['cat_child'];
}

function is_parent() {
	global $wp_query;
	if ((get_category_parent($wp_query->query_vars['cat']) == 0) && (empty($wp_query->query_vars['cat_child']))) {
		return true;
	} else {
		return false;
	}
}

function get_category_parent($node) {
	$path = get_category_path($node);

	if (empty($path)) {
		return 0;
	} else {
		return $path[0];
	}
}

function get_category_path($node) {
	global $wpdb;

	$parent = $wpdb->get_var("SELECT parent FROM $wpdb->term_taxonomy WHERE term_id=$node");
	$path = array();

	if ($parent != 0) {
		$path[] = $parent;

		$path = array_merge(get_category_path($parent), $path);
	} 

	return $path;

}

?>


<?php get_header(); ?>
<!-- container start -->
	<div id="container" class="clearfix">
		<?php get_sidebars(); ?>


<!-- content start -->
		<div id="content" class="clearfix">

		<?php if(have_posts()) : ?>


<?php
$parentId = get_category_parent($_GET['cat']);
$cat = $parentId ? $parentId : $_GET['cat'];
if (get_categories(array('child_of' => $cat))): ?>
<div id ='sublinks'>
<ul>
<ul>
<?php wp_list_cats(array('child_of' => $cat)); ?>
</ul>
</ul>
</div>
<?php endif;?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
<div class="post_top">
<div class="post_bottom">
				<div class="post_icon"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/post_icon.png" alt="Post Icon" /></div>
				<div class="post_header_bg"><h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2></div>
<div class="post_date"><?php the_time('j F Y') ?></div>
                <div class="entry"><?php the_content('[...]'); ?></div>
				<div class="endline"></div>

				<?php the_tags('<p class="tags"><strong>Теги:</strong> ', ', ', '</p>'); ?>


                <?php if ( $user_ID ) : ?>
					<div class="edit_post"><?php edit_post_link(__('Редактировать')); ?> (Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>)</div>
				<?php endif; ?>
			</div>
			</div>
			</div>
			<?php endwhile; ?>
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
					<div class="wp-pagenavi">
					<div class="alignleft"><?php next_posts_link('&laquo; Предыдущие записи') ?></div>
					<div class="alignright"><?php previous_posts_link('Следующие записи &raquo;') ?></div>
					</div>
					<?php } ?>
		<?php else : ?>
		<div class="notfound"><p>Запись не найдена!</p><p>Пожалуйста, попробуйте еще раз.</p></div>
		<?php endif; ?>
		</div>
<!-- content end -->
	</div>
<!-- container end -->
<?php get_footer(); ?>

