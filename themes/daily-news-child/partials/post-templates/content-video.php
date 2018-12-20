<!-- start post -->
<article class="post-wrap <?php echo($wp_query->current_post == 0 ?  'col-sm-12 first-post' : 'col-sm-6'); ?> <?php echo(is_single() ? 'full-post' : ''); ?><?php echo daily_news_post_class(); ?><?php echo daily_news_post_class(); ?>">
	<div class="featured-media cat-pos-rel<?php if (!has_post_thumbnail()) echo ' no-image' ?>">
		<?php
		$video_host_type = rwmb_meta( 'daily_news_video_host_type', $args = array('type' => 'radio'), $post->ID );
		$video_self_hosted = rwmb_meta( 'daily_news_shvideo', $args = array('type' => 'file_advanced'), $post->ID );
		if (has_post_thumbnail()): 
			$attachment_id = intval(get_post_thumbnail_id($post->ID));
			$bg_image_src = wp_get_attachment_image_src( $attachment_id, 'post-thumbnail');
			$bg_image = 'background-image: url(' . esc_url($bg_image_src[0]) . ');' ;
		endif; ?>
		<?php if (is_single() && $video_host_type =='embeded'): ?>
				<?php echo rwmb_meta( 'daily_news_video_embed_code', $args = array('type' => 'textarea'), $post->ID ); ?>
		<?php elseif(is_single() && $video_host_type =='selfhosted' && $video_self_hosted != NULL): ?>
			<?php foreach ($video_self_hosted as $video): ?>
				<?php echo do_shortcode( '[video src="'. $video['url'] .'"][/video]' ); ?>
			<?php endforeach ?>
		<?php else: ?>
			<?php if (has_post_thumbnail()): ?>
				<a href="<?php the_permalink(); ?>">
					<div class="image-container" <?php if (has_post_thumbnail()) echo 'style="' . esc_attr($bg_image) . '"' ?>>
					</div>
				</a>
			<?php endif; ?>
		<?php endif; ?>		
		<div class="category-list">
			<?php the_category(); ?>
		</div>
		<?php if (is_sticky()): ?>
        <div class="featured"><i class="fa fa-star"></i><?php esc_html_e('Sticky', 'daily-news' ); ?></div>
        <?php endif; ?>
	</div>
	<?php if (is_single()): ?>
		<h1 class="title"><?php the_title(); ?></h1>
	<?php else: ?>
		<h2 class="title h3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php endif; ?>
	<div class="post-meta">
		<span class="author">
            <i class="fa fa-user"></i>
            <?php the_author_posts_link(); ?>
        </span>
        <span class="date">
            <i class="fa fa-calendar-o"></i>
            <?php if (is_single()): ?>
				<?php the_time( get_option('date_format')); ?>
			<?php else: ?>
				<a href="<?php the_permalink(); ?>"><?php the_time( get_option('date_format')); ?></a>
			<?php endif; ?>
        </span>
        <?php if(comments_open() && !post_password_required()) : ?>
            <span class="comment">
                <i class="fa fa-comment-o"></i>
                <?php comments_popup_link( esc_html__('0 Comments', 'daily-news'), esc_html__('1 Comment', 'daily-news'), esc_html__('% Comments', 'daily-news')); ?>
            </span>
    	<?php endif; ?>
	</div>
	<div class="post-entry">
		<?php
		is_single() ? the_content() : the_excerpt();
		 wp_link_pages( array(
			'before'           => '<nav class="single-post-pagination align-center">',
			'after'            => '</nav>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'page',
			'nextpagelink'     => '<span class="btn btn-default"><i class="fa fa-long-arrow-right"></i></span>',
			'previouspagelink' => '<span class="btn btn-default"><i class="fa fa-long-arrow-left"></i></span>',
		) ); ?>
	</div>
</article>
<!-- end post -->
<?php if ($wp_query->current_post > 1 && $wp_query->current_post % 2 == 0): ?>
	<div class="clearfix"></div>
<?php endif; ?>