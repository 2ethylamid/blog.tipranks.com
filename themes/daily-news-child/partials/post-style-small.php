<article class="col-sm-6 post-wrap small-entry clearfix<?php if (!has_post_thumbnail()) echo ' no-image' ?>">
	<?php if (has_post_thumbnail()): ?>
		<div class="featured-media">
			<?php
				$attachment_id = intval(get_post_thumbnail_id($post->ID));
				$bg_image_small_src = wp_get_attachment_image_src( $attachment_id, 'daily_news_small_tile');
				$bg_image_small = 'style="background-image: url(' . esc_url($bg_image_small_src[0]) . ');"' ;
			?>
			<a href="<?php the_permalink(); ?>">
				<div class="image-container" <?php echo $bg_image_small; ?>></div>
			</a>
		</div>
	<?php endif; ?>
	<div class="post-details">
		<div class="category-list">
			<?php the_category(); ?>
		</div>
		<h2 class="title h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="post-meta">
	        <span class="date">
	            <i class="fa fa-calendar-o"></i>
	            <a href="<?php the_permalink(); ?>"><?php the_time( get_option('date_format')); ?></a>
	        </span>
	        <?php if(comments_open() && !post_password_required()) : ?>
	        <span class="comment">
	            <i class="fa fa-comment-o"></i>
	            <?php comments_popup_link( esc_html__('0 Comments', 'daily-news'), esc_html__('1 Comment', 'daily-news'), esc_html__('% Comments', 'daily-news')); ?>
	        </span>
	        <?php endif; ?>
		</div>
	</div>
</article>