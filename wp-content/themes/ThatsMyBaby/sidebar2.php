<div class="layout-cell sidebar2">      <?php if (!art_sidebar(2)): ?><div class="block">    <div class="block-body"><div class="blockheader">    <div class="l"></div>    <div class="r"></div>     <div class="t"><?php _e('Поиск', 'kubrick'); ?></div></div><div class="blockcontent">    <div class="blockcontent-tl"></div>    <div class="blockcontent-tr"></div>    <div class="blockcontent-bl"></div>    <div class="blockcontent-br"></div>    <div class="blockcontent-tc"></div>    <div class="blockcontent-bc"></div>    <div class="blockcontent-cl"></div>    <div class="blockcontent-cr"></div>    <div class="blockcontent-cc"></div>    <div class="blockcontent-body"><!-- block-content --><form method="get" name="searchform" action="<?php bloginfo('url'); ?>/"><input type="text" value="<?php the_search_query(); ?>" name="s" style="width: 95%;" /><span class="button-wrapper">	<span class="l"> </span>	<span class="r"> </span>	<input class="button" type="submit" name="search" value="<?php _e('Поиск', 'kubrick'); ?>" /></span></form><!-- /block-content -->		<div class="cleared"></div>    </div></div>		<div class="cleared"></div>    </div></div><div class="block">    <div class="block-body"><div class="blockheader">    <div class="l"></div>    <div class="r"></div>     <div class="t"><?php _e('Архивы', 'kubrick'); ?></div></div><div class="blockcontent">    <div class="blockcontent-tl"></div>    <div class="blockcontent-tr"></div>    <div class="blockcontent-bl"></div>    <div class="blockcontent-br"></div>    <div class="blockcontent-tc"></div>    <div class="blockcontent-bc"></div>    <div class="blockcontent-cl"></div>    <div class="blockcontent-cr"></div>    <div class="blockcontent-cc"></div>    <div class="blockcontent-body"><!-- block-content -->     <?php if ( is_404() || is_category() || is_day() || is_month() ||            is_year() || is_search() || is_paged() ) {      ?>      <?php /* If this is a 404 page */ if (is_404()) { ?>     
  <?php /* If this is a category archive */ } elseif (is_category()) { ?>
      <p><?php printf(__('Вы просматриваете архивы рубрики %s.', 'kubrick'), single_cat_title('', false)); ?></p>

      <?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
      <p><?php printf(__('Вы просматриваете архивы блога <a href="%1$s/">%2$s</a> за день %3$s.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('l, F jS, Y', 'kubrick'))); ?></p>

      <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <p><?php printf(__('Вы просматриваете архивы блога <a href="%1$s/">%2$s</a> за месяц %3$s.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name'), get_the_time(__('F, Y', 'kubrick'))); ?></p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <p><?php printf(__('Вы просматриваете архивы блога <a href="%1$s/">%2$s</a> за год %3$s.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name'), get_the_time('Y')); ?></p>

      <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
      <p><?php printf(__('Вы искали в архивах блога <a href="%1$s/">%2$s</a> по запросу <strong>&#8216;%3$s&#8217;</strong>. Если Вы ничего не нашли по этому запросу, попробуйте использовать навигацию.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name'), wp_specialchars(get_search_query(), true)); ?></p>

      <?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <p><?php printf(__('Вы просматриваете архивы блога <a href="%1$s/">%2$s</a>.', 'kubrick'), get_bloginfo('url'), get_bloginfo('name')); ?></p>


      <?php } ?>

      <?php }?> 
 <ul>      <?php wp_get_archives('type=monthly&title_li='); ?>      </ul>    <!-- /block-content -->		<div class="cleared"></div>    </div></div>		<div class="cleared"></div>    </div></div><div class="vmenublock">    <div class="vmenublock-body"><div class="vmenublockcontent">    <div class="vmenublockcontent-body"><!-- block-content --><ul class="vmenu"><?php art_vmenu_items(); ?></ul><!-- /block-content -->		<div class="cleared"></div>    </div></div>		<div class="cleared"></div>    </div></div><?php endif ?></div>