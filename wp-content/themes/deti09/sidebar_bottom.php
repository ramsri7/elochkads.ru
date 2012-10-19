<!-- sidebar bottom start -->
			<div id="sidebar_bottom">
				<ul>
                    <li class="recent_posts">
						<h3><span>Recent Posts</span></h3>
						<ul>
							<?php wp_get_archives('type=postbypost&limit=5&format=html'); ?>
						</ul>
					</li>
                    <li class="recent_comments">
						<?php get_recent_comments(array('number' => 5)); ?>
					</li>
				</ul>
			</div>
<!-- sidebar end -->