<?php get_header(); ?>
<div class="content-layout">
    <div class="content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="layout-cell content">


<?php is_tag(); ?>
<?php if (have_posts()) : ?>

<div class="post">
    <div class="post-body">
<div class="post-inner article">

<div class="postcontent">
    <!-- article-content -->


<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h2 class="pagetitle"><?php printf(__('Архивы рубрики &#8216;%s&#8217; ', 'kubrick'), single_cat_title('', false)); ?></h2>
<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
<h2 class="pagetitle"><?php printf(__('Записи с меткой &#8216;%s&#8217;', 'kubrick'), single_tag_title('', false) ); ?></h2>
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2 class="pagetitle"><?php printf(_c('Архивы за %s', 'kubrick'), get_the_time(__('F jS, Y', 'kubrick'))); ?></h2>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2 class="pagetitle"><?php printf(_c('Архивы за %s', 'kubrick'), get_the_time(__('F, Y', 'kubrick'))); ?></h2>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2 class="pagetitle"><?php printf(_c('Архивы за %s', 'kubrick'), get_the_time(__('Y', 'kubrick'))); ?></h2>
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2 class="pagetitle"><?php _e('Архивы автора', 'kubrick'); ?></h2>
<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2 class="pagetitle"><?php _e('Архивы блога', 'kubrick'); ?></h2>
<?php } ?>

<?php
$prev_link = get_previous_posts_link(__('Следующие записи &raquo;', 'kubrick'));
$next_link = get_next_posts_link(__('&laquo; Предыдущие записи', 'kubrick'));
?>

<?php if ($prev_link || $next_link): ?>
<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
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
<?php comments_popup_link(__('Комментариев нет &#187;', 'kubrick'), __('1 комментарий &#187;', 'kubrick'), __('% комментариев &#187;', 'kubrick'), '', __('Комментарии закрыты', 'kubrick') ); ?>
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
 <?php if(function_exists('pagination')) {  pagination(); } ?>
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

<?php
	if ( is_category() ) { // If this is a category archive
		printf("<h2 class='center'>".__("Извините, но в рубрике %s еще нет записей.", "kubrick").'</h2>', single_cat_title('',false));
	} else if ( is_date() ) { // If this is a date archive
		echo('<h2>'.__("Извините, но записей с этой датой еще нет.", "kubrick").'</h2>');
	} else if ( is_author() ) { // If this is a category archive
		$userdata = get_userdatabylogin(get_query_var('author_name'));
		printf("<h2 class='center'>".__("Извините, но записей от пользователя %s еще нет.", "kubrick")."</h2>", $userdata->display_name);
	} else {
		echo("<h2 class='center'>".__('Записей не найдено.', 'kubrick').'</h2>');
	}
	if(function_exists('get_search_form')) get_search_form();
?>

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
