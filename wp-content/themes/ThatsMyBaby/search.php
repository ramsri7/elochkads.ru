<?php get_header(); ?>
<div class="content-layout">
    <div class="content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="layout-cell content">


	<?php if (have_posts()) : ?>

<div class="post">
		    <div class="post-body">
		<div class="post-inner article">
		
<div class="postcontent">
            <!-- article-content -->
        
        
		<h2><?php _e('Результаты поиска', 'kubrick'); ?></h2>

		<?php
		$prev_link = get_previous_posts_link(__('Следующие записи &raquo;', 'kubrick'));
		$next_link = get_next_posts_link(__('&laquo; Предыдущие записи', 'kubrick'));
		?>

		<?php if ($prev_link || $next_link): ?>
<div class="navigation">
 <?php if(function_exists('pagination')) {  pagination(); } ?>
</div>
		<?php endif; ?>


		    <!-- /article-content -->
		</div>
		<div class="cleared"></div>
		

		</div>
		
				<div class="cleared"></div>
		    </div>
		</div>
		


		<?php while (have_posts()) : the_post(); ?>
<div class="post">
			    <div class="post-body">
			<div class="post-inner article">
			<h2 class="postheader">
			  <img src="<?php bloginfo('template_url'); ?>/images/postheadericon.png" width="25" height="32" alt="postheadericon" />
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Постоянная ссылка на %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
			<?php the_title(); ?>
			</a>
			</h2>
			<?php $icons = array(); ?>
			<?php if (!is_page()): ?><?php ob_start(); ?><img class="metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postdateicon.png" width="16" height="16" alt="" />
			<?php the_time(__('F jS, Y', 'kubrick')) ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page()): ?><?php ob_start(); ?><img class="metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postauthoricon.png" width="18" height="18" alt="" />
			<?php _e('Автор', 'kubrick'); ?>: <?php the_author_posts_link() ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (current_user_can('edit_post', $post->ID)): ?><?php ob_start(); ?><img class="metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postediticon.png" width="15" height="18" alt="" />
			<?php edit_post_link(__('Править', 'kubrick'), ''); ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (0 != count($icons)): ?>
			<div class="postheadericons metadata-icons">
			<?php echo implode(' | ', $icons); ?>
			
			</div>
			<?php endif; ?>
			<div class="postcontent">
			    <!-- article-content -->
			
			          <?php if (is_search()) the_excerpt(); else the_content(__('Читать далее &raquo;', 'kubrick')); ?>
			          <?php if (is_page() or is_single()) wp_link_pages(array('before' => '<p><strong>Страницы:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			        
			    <!-- /article-content -->
			</div>
			<div class="cleared"></div>
			<?php ob_start(); ?>
			<?php $icons = array(); ?>
			<?php if (!is_page()): ?><?php ob_start(); ?><img class="metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postcategoryicon.png" width="18" height="18" alt="" />
			<?php printf(__('Опубликовано в рубрике %s', 'kubrick'), get_the_category_list(', ')); ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page() && get_the_tags()): ?><?php ob_start(); ?><img class="metadata-icon" src="<?php bloginfo('template_url'); ?>/images/posttagicon.png" width="18" height="18" alt="" />
			<?php the_tags(__('Теги:', 'kubrick') . ' ', ', ', ' '); ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page() && !is_single()): ?><?php ob_start(); ?><img class="metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postcommentsicon.png" width="18" height="18" alt="" />
			<?php comments_popup_link(__('Комментариев нет &#187;', 'kubrick'), __('1 комментарий &#187;', 'kubrick'), __('% комментариев &#187;', 'kubrick'), '', __('Комментарии закрыты') ); ?>
			<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (0 != count($icons)): ?>
			<div class="postfootericons metadata-icons">
			<?php echo implode(' | ', $icons); ?>
			
			</div>
			<?php endif; ?>
			<?php $metadataContent = ob_get_clean(); ?>
			<?php if (trim($metadataContent) != ''): ?>
			<div class="postmetadatafooter">
			<?php echo $metadataContent; ?>
			
			</div>
			<?php endif; ?>
			
			</div>
			
					<div class="cleared"></div>
			    </div>
			</div>
			
		<?php endwhile; ?>

		<?php if ($prev_link || $next_link): ?>
		
<div class="post">
		    <div class="post-body">
		<div class="post-inner article">
		
<div class="postcontent">
            <!-- article-content -->
        
        
<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>
		

		    <!-- /article-content -->
		</div>
		<div class="cleared"></div>
		

		</div>
		
				<div class="cleared"></div>
		    </div>
		</div>
		
		
		<?php endif; ?>

	<?php else : ?>
<div class="post">
		    <div class="post-body">
		<div class="post-inner article">
		
<div class="postcontent">
            <!-- article-content -->
        
        
        <h2><?php _e('Результаты поиска', 'kubrick'); ?></h2>
		<h2 class="center"><?php _e('Записей не найдено. Попробуйте изменить параметры поиска.', 'kubrick'); ?></h2>
		<?php if(function_exists('get_search_form')) get_search_form(); ?>
		

		    <!-- /article-content -->
		</div>
		<div class="cleared"></div>
		

		</div>
		
				<div class="cleared"></div>
		    </div>
		</div>
		

	<?php endif; ?>

</div>
<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>
