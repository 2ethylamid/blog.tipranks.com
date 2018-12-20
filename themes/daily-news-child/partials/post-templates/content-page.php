<!-- start post -->
<article class="post-wrap col-sm-12 full-post <?php echo daily_news_post_class(); ?>">
	<?php if (has_post_thumbnail()):
		$attachment_id = intval(get_post_thumbnail_id($post->ID));
		$bg_image_src = wp_get_attachment_image_src( $attachment_id, 'post-thumbnail');
		$bg_image = 'background-image: url(' . esc_url($bg_image_src[0]) . ');' ;
		?>
		<div class="featured-media">
			<div class="image-container">
				<?php the_post_thumbnail('post-thumbnail'); ?>
			</div>
		</div>
	<?php endif ?>
	<h1 class="title <?php echo(!has_post_thumbnail())? 'has-no-image' : ''; ?>"><?php the_title(); ?></h1>
	<div class="post-entry">
		<?php
		the_content();
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