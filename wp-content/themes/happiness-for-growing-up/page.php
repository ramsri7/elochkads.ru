<?php get_header(); ?>
<!-- container start -->
	<div id="container" class="clearfix">
		<?php get_sidebars(); ?>
<!-- content start -->
		<div id="content" class="clearfix">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
<div class="post_top">
<div class="post_bottom">
				<div class="post_icon"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/post_icon.png" alt="Post Icon" /></div>
				<div class="post_header_bg"><h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1></div>
                <div class="entry"><?php the_content(); ?></div>
				<div class="endline"></div>
				<?php wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                <?php if ( $user_ID ) : ?>
					<div class="edit_post"><?php edit_post_link(__('Редактировать')); ?> (Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>)</div>
				<?php endif; ?>
				<div class="bookmark"><?php include(TEMPLATEPATH . '/bookmark.php'); ?></div>
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
		<div class="notfound"><p>Записей не найдено!</p><p>Пожалуйста, попробуйте еще раз.</p></div>
		<?php endif; ?>
		</div>
<!-- content end -->
	</div>
    <div class="end_line"></div>
<!-- container end -->
<?php get_footer(); ?>