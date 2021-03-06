<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

    if (!empty($post->post_password)) { // if there's a password
        if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
    ?>

    <p class="nocomments">Эта запись защищена паролем. Введите пароль для просмотра комментариев.<p>

    <?php
    return;
        }
    }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Написать ответ</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Вы должны <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">войти</a> для комментирования.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Вы <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Выйти &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Имя <?php if ($req) echo "(обязательно)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Е-майл (не публикуется) <?php if ($req) echo "(обязательно)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Сайт</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Добавить" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Нет ответов', '1 ответ', '% ответов' );?> к &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

        <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
            <div class="gravatar"><?php if(function_exists('get_avatar')){ echo get_avatar($comment, 75);} ?></div>
            <div class="author">Комментатор <cite class="author"><?php comment_author_link() ?></cite></div>
            <?php if ($comment->comment_approved == '0') : ?>
            <em>Ваш комментарий ожидает проверки.</em>
            <?php endif; ?>

            <small class="commentmetadata"><?php comment_date('F jS, Y') ?></small>

            <?php comment_text() ?>
            <div class="clear"></div>
        </li>

        <?php /* Changes every other comment to a different class */
        if ('alt' == $oddcomment) $oddcomment = '';
           else $oddcomment = 'alt';
        ?>

	<?php endforeach; /* end for each comment */ ?>

    </ol>

    <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Комментарии закрыты.</p>

	<?php endif; ?>
<?php endif; ?>

<?php endif; // if you delete this the sky will fall on your head ?>
