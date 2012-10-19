<?php get_header(); ?>
<!-- container start -->
	<div id="container" class="clearfix">
<!-- content start -->
		<div id="content" class="clearfix">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
				<div class="post_header_top"></div>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <div class="post_header_bottom"></div>
                <div class="postmetadata">Posted in <?php the_category(', ') ?> | <?php the_time('F jS, Y') ?></div>
                <div class="entry"><?php the_excerpt(); ?></div>
				<div class="bookmark"><?php include(TEMPLATEPATH . '/bookmark.php'); ?></div>
			</div>
			<?php endwhile; ?>
			<?php wp_pagenavi(); ?>
		<?php else : ?>
		<div class="notfound"><p>Content Not Found!</p><p>Please try again.</p></div>
		<?php endif; ?>
		</div>
<!-- content end -->
		<?php get_sidebar(); ?>
	</div>
    <div class="end_line"></div>
<!-- container end -->
<?php get_footer(); ?>