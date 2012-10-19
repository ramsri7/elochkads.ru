<?php get_header(); ?>
<!-- container start -->
	<div id="container">
		<?php include(TEMPLATEPATH . '/sidebar_left.php'); ?>
<!-- content start -->
		<div id="content">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?><?=bloqinfo($post->ID) ?>
			<div class="post">
				<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
				<div class="postmetadata">Рубрика: <?php the_category(', ') ?> | <?php the_time('F jS, Y') ?></div>
				<div class="entry">
					<?php the_content(); ?>
					<div class="endline"></div>
					<?php wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
				<?php the_tags('<p class="tags"><strong>Теги:</strong> ', ', ', '</p>'); ?>
				<div class="bookmark"><?php include(TEMPLATEPATH . '/bookmark.php'); ?></div>
				<div class="comments"><a href="<?php comments_link(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/read_comments.gif" width="179" height="15" alt="Read Comments" /></a></div>
				<?php 
					if (function_exists('wp_list_comments')) {
						comments_template('/comments.php', true);
					}
					else {
						comments_template('/comments-old.php');
					}
				?>
			</div>
			<?php endwhile; ?>
			<div class="quickjump">
				<?php $themePath = get_bloginfo('template_url'); ?>
				<?php $imagePrev = '<img src="' . $themePath . '/images/post-prev.gif" alt="" />'; ?>
				<?php $imageNext = '<img src="' . $themePath . '/images/post-next.gif" alt="" />'; ?>
				<div class="postjumper"><?php previous_post_link('%link', $link=$imagePrev) ?></div>
				<div class="postjumper"><?php next_post_link('%link', $link=$imageNext); ?></div>
				<div class="postjumper"><a href="#wrapper"><img src="<?php bloginfo('template_directory'); ?>/images/post-top.gif" alt="" /></a></div>
			</div>
			<?php wp_pagenavi(); ?>
			<?php else : ?>
				<div class="notfound"><p>Content Not Found!</p><p>Please try again.</p></div>
			<?php endif; ?>
		</div>
<!-- content end -->
<?php get_sidebars(); ?>
		<div class="endline"></div>
	</div>
<!-- container end -->
<?php get_footer(); ?>