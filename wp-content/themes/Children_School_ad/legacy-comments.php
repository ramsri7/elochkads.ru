<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	exit('Please do not load this page directly.');

if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
	<p class="nocomments"><?php _e('Эта запись защищена паролем. Введите пароль, чтобы просмотреть комментарии..', THEME_NS); ?></p>
<?php else : ?>
<?php if ($comments) :?>
<?php ob_start(); ?>
<h3 id="comments"><?php comments_number(__('Комментариев нет', THEME_NS), __('1 комментарий', THEME_NS), __('% комментариев', THEME_NS));?> <?php printf(__('к записи &#8220;%s&#8221;', THEME_NS), the_title('', '', false)); ?></h3>
<?php art_post_box('', ob_get_clean()); ?>
<ul class="commentlist">
	<?php foreach ($comments as $comment) : ?>
		<li id="comment-<?php comment_ID() ?>">
      <?php ob_start(); ?>
      <?php echo get_avatar($comment, 32); ?>
			<cite><?php comment_author_link() ?></cite>:
      <?php if ($comment->comment_approved == '0') : ?>
			<em>
        <?php _e('Ваш комментарий ожидает модерации.', THEME_NS); ?>
      </em>
			<?php endif; ?>
			<br />
			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date(__('F jS, Y', THEME_NS)) ?> <?php comment_time() ?></a> <?php edit_comment_link(__('Редактировать', THEME_NS),'&nbsp;&nbsp;',''); ?></small>
      <?php comment_text() ?>
      <?php art_post_box('', ob_get_clean()); ?>
		</li>
	<?php endforeach; ?>
	</ul>
<?php else : ?>
<?php if ('open' != $post->comment_status) : ?>
<?php ob_start(); ?>
<p class="nocomments"><?php _e('Комментарии закрыты.', THEME_NS); ?></p>
<?php art_post_box('', ob_get_clean()); ?>
<?php endif; ?>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<?php ob_start(); ?>
<h3 id="respond"><?php _e('Оставить комментарий', THEME_NS); ?></h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('Вы должны быть <a href="%s">авторизованы</a>, чтобы разместить комментарий.', THEME_NS), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
<p><?php printf(__('Вы вошли как <a href="%1$s">%2$s</a>.', THEME_NS), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="
    <?php if (function_exists('wp_logout_url')) echo wp_logout_url(get_permalink()); else echo get_option('siteurl') . "/wp-login.php?action=logout"; ?>" title="<?php _e('Выйти из этого аккаунта', THEME_NS); ?>"><?php _e('Выйти &raquo;', THEME_NS); ?></a></p>
<?php else : ?>
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Имя', THEME_NS); ?> <?php if ($req) _e("(обязательно)", THEME_NS); ?></small></label></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('Mail (не будет опубликовано)', THEME_NS); ?> <?php if ($req) _e("(обязательно)", THEME_NS); ?></small></label></p>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Вебсайт', THEME_NS); ?></small></label></p>
<?php endif; ?>
<p><textarea name="comment" id="comment" cols="20" rows="10" tabindex="4"></textarea></p>
<p>
	<span class="art-button-wrapper"><span class="l"> </span><span class="r"> </span>
		<input class="art-button" type="submit" name="submit" tabindex="5" value="<?php _e('Отправить', THEME_NS); ?>" />
	</span>
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
<?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
<?php art_post_box('', ob_get_clean()); ?>
<?php endif; ?>
<?php endif; ?>