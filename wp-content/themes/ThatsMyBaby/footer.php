<div class="footer">
    <div class="footer-inner">
        <a href="<?php bloginfo('rss2_url'); ?>" class="rss-tag-icon" title="RSS"></a>
        <div class="footer-text">
<p>
<?php
 global $default_footer_content;
 $footer_content = stripslashes(get_option('art_footer_content')); 
 if ($footer_content === false) $footer_content = $default_footer_content;
 echo $footer_content;
?>
</p>
</div>
    </div>
    <div class="footer-background">
    </div>
</div>

		<div class="cleared"></div>
    </div>
</div>
<div class="cleared"></div>


</div>

<!-- <?php printf(__('%d queries. %s seconds.', 'kubrick'), get_num_queries(), timer_stop(0, 3)); ?> -->
<?php ob_start(); wp_footer(); $content = ob_get_clean(); if (strlen($content)) echo '<div>' . $content . '</div>'; ?>
</body>
</html>
