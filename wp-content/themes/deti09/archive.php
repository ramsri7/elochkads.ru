<?php get_header(); ?>
<!-- container start -->
	<div id="container" class="clearfix">
<!-- content start -->
		<div id="content" class="clearfix">
		<?php if(have_posts()) : ?>
                <div class="post_path">You are here: <a href="<?php bloginfo('url'); ?>">Home</a> &gt;<?php
		// If this is a category archive
		if (is_category()) {
			printf( __('Archive for the &#8216;<span>%1$s</span>&#8217; Category', 'ezwpthemes'), single_cat_title('', false) );
		// If this is a tag archive
		} elseif (is_tag()) {
			printf( __('Posts Tagged &#8216;<span>%1$s</span>&#8217;', 'ezwpthemes'), single_tag_title('', false) );
		// If this is a daily archive
		} elseif (is_day()) {
			printf( __('Archive for <span>%1$s</span>', 'ezwpthemes'), get_the_time(__('F jS, Y', 'ezwpthemes')) );
		// If this is a monthly archive
		} elseif (is_month()) {
			printf( __('Archive for <span>%1$s</span>', 'ezwpthemes'), get_the_time(__('F, Y', 'ezwpthemes')) );
		// If this is a yearly archive
		} elseif (is_year()) {
			printf( __('Archive for <span>%1$s</span>', 'ezwpthemes'), get_the_time(__('Y', 'ezwpthemes')) );
		// If this is an author archive
		} elseif (is_author()) {
			_e('Author Archive', 'ezwpthemes');
		// If this is a paged archive
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
			_e('Blog Archives', 'ezwpthemes');
		}
		?></div>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
            	<div class="post_header_top"></div>
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <div class="post_header_bottom"></div>
                <div class="postmetadata">Posted in <?php the_category(', ') ?> | <?php the_time('F jS, Y') ?></div>
                <div class="entry"><?php the_excerpt(); ?></div>
				<?php the_tags('<p class="tags"><strong>Tags:</strong> ', ', ', '</p>'); ?>
				<div class="bookmark"><?php include(TEMPLATEPATH . '/bookmark.php'); ?></div>
                <div class="read_comments"><a href="<?php comments_link(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/read_comments.jpg" width="190" height="43" alt="Read Comments" /></a></div>
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