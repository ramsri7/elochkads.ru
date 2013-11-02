<?php
/*
Template Name: Wordpress loop
*/
?>
        <div class="post-top"></div>
        <div class="post" id="post-<?php the_ID(); ?>">
        <div class="post-2">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Ссылка на <?php the_title(); ?>"><?php the_title(); ?></a></h2>

            <div class="entry">
            <?php if (is_home() || is_single()) {
                    the_content('Читать далее');
            } elseif (is_archive() || is_search()) {
                    the_excerpt();
            }
            ?>
            <?php link_pages('<div class="page-link clear">Страница: ', '</div>', 'номер'); ?>
            </div>

            <div class="postmetadata clear">
                <div class="posted"><a href="http://filosofika.ru"><?php the_time('F jS, Y') ?></a> <!-- by <?php the_author() ?> --></div>

                <div class="cats">Добавлено в <?php the_category(', ') ?></div>

                <div class="commentas"><?php if(!is_single()){comments_popup_link('Нет комментариев &#187;', '1 комментарий &#187;', '% комментариев &#187;');} else { ?>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="Ссылка на <?php the_title(); ?>"><?php comments_number('Нет ответов', '1 ответ', '% ответов' );?></a>
                <?php } ?></div>
            </div>
            <div class="clear"></div>
        </div>
        </div>
        <div class="post-bottom"></div>