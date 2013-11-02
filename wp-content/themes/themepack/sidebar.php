<div id="left_column">
        <div class="lftcrn" style="margin-top:12px;"></div>
		<div class="widget_style">
			  <h2><?php _e('Categories'); ?></h2>
			  <ul>
					<?php wp_list_cats('hide_empty'); ?>
			  </ul>
		</div>
		<div class="lftcrn2"></div>
		
		<div class="lftcrn" style="margin-top:12px;"></div>
		<div class="widget_style">
			<h2><?php _e('Blogroll'); ?></h2>
			<ul>
			 	<?php wp_list_bookmarks('categorize=0&title_li='); ?>
			</ul>						
		</div>
        <div class="lftcrn2"></div>
		
		
		
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
	<?php endif; ?>
	<div class="lftcrn2"></div>
	<div class="lp_add">
		<span class="lp_who"></span>
		<span class="lp_guest">There currently are</span>
		<span class="lp_gues2"><a href="#" style="color:#FF1E00; text-decoration:none;"><b>3 guests</b></a> online</span>
		</div>
     </div>
			
 </div>
