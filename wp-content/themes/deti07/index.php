<?php get_header(); ?>
<!-- container start -->
	<div id="container">
<?php get_sidebar(); ?>
<!-- content start -->
		<div id="content">
		<?php $postcnt = 1; ?>
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="postmetadata">Рубрика <?php the_category(', ') ?></div>
				<div class="post_date"><a href="http://filosofika.ru"><?php the_time('d') ?>/<?php the_time('m') ?>/<?php the_time('y') ?></a></div>
				<div class="entry"><?php the_content('[...]'); ?></div>
				<div class="endline"></div>
				<div class="bookmark"><?php include(TEMPLATEPATH . '/bookmark.php'); ?></div>
				<div class="read_comments"><a href="<?php comments_link(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/read_comments.jpg" width="187" height="23" alt="read comments" /></a></div>
				<div class="endline"></div>
			</div>
		<?php if ($postcnt == 1) : ?> 
			<?php include(TEMPLATEPATH . '/adsense2.php'); ?>
		<?php endif; $postcnt++; ?>
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