<?php get_header(); ?>
<div id="wrapper">
    <div id="content">

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <?php include (TEMPLATEPATH . '/loop.php'); ?>

        <?php endwhile; ?>

        <div id="nav-below" class="navigation">
            <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&laquo;</span> Старые записи')) ?></div>
            <div class="nav-next"><?php previous_posts_link(__('Новые записи <span class="meta-nav">&raquo;</span>')) ?></div>
        </div>

        <?php else : ?>

        <h2 class="center">Не найдено</h2>
        <p class="center">То что Вы искали не найдено.</p>
        <?php include (TEMPLATEPATH . "/searchform.php"); ?>

    <?php endif; ?>

    </div>

    <?php get_sidebar(); ?>
    <div class="clear"></div>
</div>
<?php get_footer(); ?>
