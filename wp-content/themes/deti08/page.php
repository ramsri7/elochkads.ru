<?php get_header(); ?>
<div id="wrapper">
    <div id="content">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post" id="post-<?php the_ID(); ?>">
            <h2><?php the_title(); ?></h2>
            <div class="entry">
                <?php the_content('<p class="serif">Читать далее &raquo;</p>'); ?>

                <?php link_pages('<p><strong>Страница:</strong> ', '</p>', 'номер'); ?>
            </div>
            <?php edit_post_link('Редактировать запись.', '<p>', '</p>'); ?>
        </div>
        <?php endwhile; endif; ?>
    </div>

<?php get_sidebar(); ?>
    <div class="clear"></div>
</div>
<?php get_footer(); ?>