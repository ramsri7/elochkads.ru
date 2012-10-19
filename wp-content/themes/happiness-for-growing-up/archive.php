<?php get_header(); ?>
<!-- container start -->
	<div id="container" class="clearfix">
		<?php get_sidebars(); ?>
<!-- content start -->
		<div id="content" class="clearfix">
		<?php if(have_posts()) : ?>
                <div class="post_path">Вы находитесь здесь: <a href="<?php bloginfo('url'); ?>">Главная</a> &gt;<?php
		// If this is a category archive
		if (is_category()) {
			printf( __('Архивы рубрики &#8216;<span>%1$s</span>&#8217; ', 'ezwpthemes'), single_cat_title('', false) );
		// If this is a tag archive
		} elseif (is_tag()) {
			printf( __('Записи с меткой &#8216;<span>%1$s</span>&#8217;', 'ezwpthemes'), single_tag_title('', false) );
		// If this is a daily archive
		} elseif (is_day()) {
			printf( __('Архивы за день <span>%1$s</span>', 'ezwpthemes'), get_the_time(__('F jS, Y', 'ezwpthemes')) );
		// If this is a monthly archive
		} elseif (is_month()) {
			printf( __('Архивы за месяц <span>%1$s</span>', 'ezwpthemes'), get_the_time(__('F, Y', 'ezwpthemes')) );
		// If this is a yearly archive
		} elseif (is_year()) {
			printf( __('Архивы за год <span>%1$s</span>', 'ezwpthemes'), get_the_time(__('Y', 'ezwpthemes')) );
		// If this is an author archive
		} elseif (is_author()) {
			_e('Архивы автора', 'ezwpthemes');
		// If this is a paged archive
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
			_e('Архивы блога', 'ezwpthemes');
		}
		?></div>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
<div class="post_top">
<div class="post_bottom">
				<div class="post_icon"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/post_icon.png" alt="Post Icon" /></div>
				<div class="post_header_bg"><h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2></div>
                <div class="postmetadata">Опубликовано в рубрике <?php the_category(', ') ?></div>
<div class="post_date"><?php the_time('M, jS, Y') ?></div>
                <div class="entry"><?php the_excerpt(); ?></div>
				<div class="endline"></div>
				<?php the_tags('<p class="tags"><strong>Теги:</strong> ', ', ', '</p>'); ?>
				<div class="bookmark"><?php include(TEMPLATEPATH . '/bookmark.php'); ?></div>
<div class="read_comments">Комментарии<a href="<?php comments_link(); ?>"><span><?php comments_number('0','1','%'); ?></span></a></div>
                <?php if ( $user_ID ) : ?>
					<div class="edit_post"><?php edit_post_link(__('Редактировать')); ?> (Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>)</div>
				<?php endif; ?>
			</div>
			</div>
			</div>
			<?php endwhile; ?>
			<!-- sidebar sub start -->
		<div id="sidebar_sub" class="clearfix">
			<div class="sub_icon"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sub_icon.png" alt="Sub Icon" /></div>
            <ul>
				<li class="recent_comments">
					<?php get_recent_comments(array('number' => 5)); ?>
				</li>
				<li class="recent_posts">
					<h2>Недавние комментарии</h2>
					<ul>
						<?php get_archives('postbypost', 5); ?>
					</ul>
				</li>
             </ul>
		</div>
		<!-- sidebar sub end -->
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