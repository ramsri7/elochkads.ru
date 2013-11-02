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
				
				<div class="post_header_bg">


<h1 class="post-title">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1></div>
                <div class="entry">

<div id='page_sub_menu'>
    <li class="page_item page-item-4">
        <?php echo '<a href="'.get_permalink($post->post_parent).'">'.get_the_title($post->post_parent).'</a>';?>
    </li>
    <?php wp_list_pages( array(
        'depth'    => 1,
        'child_of' => $post->post_parent ? $post->post_parent : $_GET['page_id'],
        'title_li' => ''
    )); ?> 
</div><br/>
<?php the_content(); ?></div>
				
                                <div class="endline"></div>
				<?php wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                <?php if ( $user_ID ) : ?>

                                <div class="edit_post"><?php edit_post_link(__('Редактировать')); ?> (Вы вошли как <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>)</div>
				<?php endif; ?>
				
			</div>
			</div>
			</div>
			<?php endwhile; ?>

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