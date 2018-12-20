<!-- start pagination -->
<?php if ($wp_query->max_num_pages > 0): ?>
<div class="pagination-wrap">
	<div class="pagination clearfix" role="navigation">
		<?php previous_posts_link('<span>' . esc_html__('SEE PREVIOUS ARTICLES', 'daily-news') . '</span>') ?>
		<?php next_posts_link( '<span>' . esc_html__('SEE MORE ARTICLES', 'daily-news') . '</span> ') ?>
	</div>
</div>
<?php endif; ?>
<!-- end pagination -->