<div class="cover-wrap">
	<div class="container">
		<div class="tag-cover">
			<div class="overlay">
				<h2 class="tag-title h3">
					<?php esc_html_e('Search Results for', 'daily-news'); echo '&nbsp;"' . get_search_query() . '"'; ?>
				</h2>
				<div class="meta-info">
					<span><i class="fa fa-signal fa-fw"></i>
						<?php 
							$total_posts = $wp_query->found_posts;
							printf (esc_html__('Total %d Posts', 'daily-news'), $total_posts);
						?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>