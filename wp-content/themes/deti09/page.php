<?php get_header(); ?>
<!-- container start -->
	<div id="container" class="clearfix">
<!-- content start -->
		<div id="content" class="clearfix">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
			<div class="post">
				<div class="post_header_top"></div>
<?php $id = $post->post_parent?>
<h2>
<ul>
<?php if (!$id): ?> 
    <li class='current_page_item'><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php endif;?>


<?php if ($id = $post->post_parent) {
$parent_title = get_the_title($id);
$parent_link = get_permalink($id); 
echo '<li><a href="'.$parent_link.'">'.$parent_title.'</a></li>';
} ?>


 
<?php 
wp_list_pages( array(
    'child_of' => $id ? $id : $_GET['page_id'],
    'title_li' => '',
    
));


?>  
</ul>




 </h2>
                <div class="post_header_bottom"></div>
                <div class="entry"><?php the_content(); ?></div>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
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