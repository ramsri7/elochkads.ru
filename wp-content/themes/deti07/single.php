<?php get_header(); ?>
<!-- container start -->
	<div id="container">
<?php get_sidebar(); ?>
<!-- content start -->
		<div id="content">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
				<h2><?php the_title(); ?></h2>
				<div class="postmetadata">Posted in <?php the_category(', ') ?></div>
				<div class="post_date"><?php the_time('d') ?>/<?php the_time('m') ?>/<?php the_time('y') ?></div>
				<div class="entry"><?php the_content(); ?></div>
				<div class="endline"></div>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags('<p class="tags">Tags: ', ', ', '</p>'); ?>
				<div class="bookmark"><?php include(TEMPLATEPATH . '/bookmark.php'); ?></div>
				<?php 
					if (function_exists('wp_list_comments')) {
						comments_template('/comments.php', true);
					}
					else {
						comments_template('/comments-old.php');
					}
				?>
				<div class="endline"></div>
			</div>
			<?php include(TEMPLATEPATH . '/adsense2.php'); ?>
			<?php endwhile; ?>
			<?php wp_pagenavi(); ?>
		<?php else : ?>
		<div class="notfound"><p>Content Not Found!</p><p>Please try again.</p></div>
		<?php endif; ?>
		</div>
<!-- content end -->
		<div class="endline"></div>
	</div>
<!-- container end -->
<?php get_footer(); ?>