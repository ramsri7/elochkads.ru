<?php get_header(); ?>

	<div class="center2">
		<div class="cpbg">
				<?php include (TEMPLATEPATH . "/sidebar.php"); ?>
				<div class="inner">
				<div class="cptop"></div>
				<div class="cpcrn"></div>
				<div class="inbg">
				
					
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="cp_bg">
					<div id="title">
						<p style="float:left; width:362px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
						<span class="author">Posted By: <?php the_author() ?></span></p>
						
						<span class="date"><?php the_time('j/m'); ?></span>
					</div>
					<div id="content_text">
						<?php the_content('Read the rest of this entry &raquo;'); ?>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php the_tags('<p>Tags: ', ', ', '</p>'); ?>
						
						<div class="cp_comments">
							<?php edit_post_link('Edit this entry.','',''); ?>&nbsp;&nbsp;
							<a href="<?php comments_link(); ?>" >read comments</a> (<?php comments_number('0', '1', '%', 'number'); ?>)
						</div>	
					</div>
					<?php endwhile; else: ?>
					<div class="no_post"><?php _e('Sorry,you are looking for something that isint here'); ?></div>
					<?php endif; ?>
					<?php 	comments_template(); // Get wp-comments.php template ?>
				</div>
					
					</div>
					<div class="cpcrn2"></div>
					
					
					
					</div>
					<?php include (TEMPLATEPATH . "/sidebar1.php"); ?>
				
				
			
			
			
		</div>
<?php get_footer(); ?>
