<?php get_header(); ?>
<!-- container start -->
	<div id="container">
		<?php include(TEMPLATEPATH . '/sidebar_left.php'); ?>
<!-- content start -->
		<div id="content">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content(); ?>
					<div class="endline"></div>
					<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				</div>
				<div class="bookmark"><?php include(TEMPLATEPATH . '/bookmark.php'); ?></div>
				<div class="comments"><a href="<?php comments_link(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/read_comments.gif" width="179" height="15" alt="Read Comments" /></a></div>
			</div>
			<?php endwhile; ?>
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