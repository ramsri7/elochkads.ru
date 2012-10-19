	<div id="right_column">
	<div class="lftcrn"></div>
		<div class="widget_style">
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>						
		</div> 
		<div class="lftcrn2"></div>
		      
		<div class="lftcrn" style="margin-top:12px;"></div>
		<div class="widget_style">
			<h2><b></b><?php _e('Blogroll'); ?></h2>
			<ul>
				<?php wp_list_bookmarks('categorize=0&title_li='); ?>

			  </ul>						
		</div>
        <div class="lftcrn2"></div>
		
		<div class="lftcrn" style="margin-top:12px;"></div>
		<div class="widget_style">
			<h2><p></p><?php _e('Archieves'); ?> </h2>
			<ul><?php wp_get_archives('type=monthly&limit=12'); ?> 
			</ul>						
		</div> 
		<div class="lftcrn2"></div>
		
		<div class="lftcrn" style="margin-top:12px;"></div>
		<div class="widget_style">
			<h2><?php _e('Meta'); ?></h2>
			<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>			
		</div>
		<div class="lftcrn2"></div>
 </div>
 
