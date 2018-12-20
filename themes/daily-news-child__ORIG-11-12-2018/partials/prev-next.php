<div class="col-sm-12">
	<div class="prev-next-wrap clearfix">
		<?php $prev_post = get_previous_post();
		if ($prev_post) :
			$prev_thumb_id = get_post_thumbnail_id($prev_post->ID);
			$no_img_class = '';
			if ($prev_thumb_id) {
				$prev_thumb = wp_get_attachment_image_src($prev_thumb_id, 'post-thumbnail');
				$prev_bg_string = 'background-image: url('. $prev_thumb[0].');';
			} else {
				 $no_img_class= ' no-image';
			}
		?>
		<a class="previous-post pull-left<?php echo esc_html($no_img_class); ?>" <?php if ($prev_thumb_id) echo 'style="' . esc_attr($prev_bg_string) . '"'?> href="<?php echo get_permalink( $prev_post->ID ); ?>">
			<div class="prev-next-inner">
				<span class="link-text"><?php esc_html_e('Previous Post', 'daily-news') ?></span>
				<h3 class="title h4"><?php echo esc_html($prev_post->post_title); ?></h3>
			</div>
		</a>
		<?php endif; ?>
	    <?php $next_post = get_next_post();
		if ($next_post) :
			$next_thumb_id = get_post_thumbnail_id($next_post->ID);
			if ($next_thumb_id) {
				$next_thumb = wp_get_attachment_image_src($next_thumb_id, 'post-thumbnail');
				$next_bg_string = 'background-image: url('. $next_thumb[0].');';
			} else {
				 $no_img_class= ' no-image';
			}
		?>
	    <a class="next-post pull-right<?php echo esc_html($no_img_class); ?>" <?php if ($next_thumb_id) echo 'style="' . esc_attr($next_bg_string) . '"'?> href="<?php echo get_permalink( $next_post->ID ); ?>">
			<div class="prev-next-inner">
				<span class="link-text"><?php esc_html_e('Next Post', 'daily-news') ?></span>
				<h3 class="title h4"><?php echo esc_html($next_post->post_title); ?></h3>
			</div>
		</a>
	    <?php endif; ?>
	</div>
</div>