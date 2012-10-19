<?php get_header(); ?>

	<div class="center2">
		<div class="cpbg">
				<?php include (TEMPLATEPATH . "/sidebar.php"); ?>
				<div class="inner">
				<div class="cptop"></div>
				<div class="cpcrn"></div>
				<div class="inbg">
				
				
				     
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					  
						<div id="title">
						<p style="float:left; width:362px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
						<span class="author">Posted By: <?php the_author() ?></span></p>
						
						<span class="date"><?php the_time('j/m'); ?></span>
					</div>
					
					<div id="content_text">	
					<?php the_content('Read the rest of this entry &raquo;'); ?><br />
						<?php if (has_tag()) : ?>
						Tags: <?php the_tags('') ?><br />
						<?php endif; ?>
						<div class="cp_comments">
							<a href="<?php comments_link(); ?>" >read romments</a> (<?php comments_number('0', '1', '%', 'number'); ?>)
					</div>	
					</div>
					<?php endwhile; else: ?>
					<div class="no_post"><?php _e('Sorry, no posts matched your criteria.'); ?></div>
					<?php endif; ?>
					<?php 	comments_template(); // Get wp-comments.php template ?>
					</div>
					<div class="cpcrn2"></div>
					</div>
					
					<?php include (TEMPLATEPATH . "/sidebar1.php"); ?>
					
					
					</div>
					
				
				
			
			
			
		</div>
<?php get_footer(); ?>
