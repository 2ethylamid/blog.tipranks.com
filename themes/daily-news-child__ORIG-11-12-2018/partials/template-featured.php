<?php
$featured_posts = null;
$featured_post_count = intval(get_theme_mod('featured_post_count', 5 ));
$featured_section_layout = get_theme_mod('featured_section_layout', 'layout1' );
$featured_post_type = get_theme_mod( 'featured_post_type', 'featured' );
$featured_post_cat = get_theme_mod( 'featured_post_category', '' );
if ( $featured_post_type == 'featured') {
	$featured_posts = new WP_Query(array(
		'showposts' => $featured_post_count,
		'meta_key' => 'daily_news_featured',
        'meta_value' => 1,
        'ignore_sticky_posts' => true
		)
	);
	
} elseif ( $featured_post_type == 'category' && ( $featured_post_cat != '' || $featured_post_cat != ' ')) {
	
	$featured_posts = new WP_Query(array(
		'showposts' => $featured_post_count,
		'category_name' => $featured_post_cat,
		'ignore_sticky_posts' => true
		)
	);
}
?>
<?php if ($featured_posts -> have_posts()) : while ($featured_posts -> have_posts()) : $featured_posts -> the_post(); ?>
	<?php if ($featured_section_layout == 'layout1') : ?>
	<!-- layout 1 -->
		<div class="<?php echo($featured_posts->current_post == 0 ?  'col-sm-6' : 'col-md-3 col-sm-6'); ?>">
			<div class="<?php echo($featured_posts->current_post == 0 ?  'post-wrap first-post' : 'post-wrap '); ?> <?php echo daily_news_post_class(); ?>">
				<div class="featured-media">
					<?php if (has_post_thumbnail()): 
						$attachment_id = intval(get_post_thumbnail_id($post->ID));
						$bg_image_src = wp_get_attachment_image_src( $attachment_id, 'post-thumbnail');
						$bg_image = 'background-image: url(' . esc_url($bg_image_src[0]) . ');' ;
					endif; ?>
	    			<a href="<?php the_permalink(); ?>">
						<div class="image-container" <?php if (has_post_thumbnail()) : ?> style="<?php echo esc_attr($bg_image); ?>" <?php endif; ?>>
						</div>
					</a>
					<div class="category-list">
						<?php if (true == get_theme_mod( 'exclude_featured_category', false )){
							daily_news_excluded_category(array($featured_post_cat));
						} else {
							the_category();
						} ?>
					</div>
					<div class="title-wrap">
						<a href="<?php the_permalink(); ?>">
							<h2 class="<?php echo($featured_posts->current_post == 0 ?  'h4' : 'h5'); ?> title"><?php the_title(); ?></h2>
						</a>
					</div>
					<?php if (is_sticky()): ?>
	                <div class="featured"><i class="fa fa-star"></i><?php esc_html_e('Sticky', 'daily-news' ); ?></div>
	                <?php endif; ?>
				</div>
			</div>
		</div>
	<?php elseif ($featured_section_layout == 'layout2') : ?>
	<!-- layout 2 -->
		<div class="<?php echo($featured_posts->current_post <= 1 ?  'col-sm-6' : 'col-md-3 col-sm-6'); ?>">
			<div class="<?php echo($featured_posts->current_post <= 1 ?  'post-wrap first-post' : 'post-wrap'); ?><?php echo daily_news_post_class(); ?>">
				<div class="featured-media">
					<?php if (has_post_thumbnail()): 
						$attachment_id = intval(get_post_thumbnail_id($post->ID));
						$bg_image_src = wp_get_attachment_image_src( $attachment_id, 'post-thumbnail');
						$bg_image = 'background-image: url(' . esc_url($bg_image_src[0]) . ');' ;
					endif; ?>
	    			<a href="<?php the_permalink(); ?>">
						<div class="image-container" <?php if (has_post_thumbnail()) : ?> style="<?php echo esc_attr($bg_image); ?>" <?php endif; ?>>
						</div>
					</a>
					<div class="category-list">
						<?php if (true == get_theme_mod( 'exclude_featured_category', false )){
							daily_news_excluded_category(array($featured_post_cat));
						} else {
							the_category();
						} ?>
					</div>
					<div class="title-wrap">
						<a href="<?php the_permalink(); ?>">
							<h2 class="<?php echo($featured_posts->current_post <= 1 ?  'h4' : 'h5'); ?> title"><?php the_title(); ?></h2>
						</a>
					</div>
					<?php if (is_sticky()): ?>
	                <div class="featured"><i class="fa fa-star"></i><?php esc_html_e('Sticky', 'daily-news' ); ?></div>
	                <?php endif; ?>
				</div>
			</div>
		</div>
	<?php elseif ($featured_section_layout == 'layout3') : ?>
		<!-- layout 3 -->
		<div class="col-md-3 col-sm-6">
			<div class="post-wrap <?php echo daily_news_post_class(); ?>">
				<div class="featured-media">
					<?php if (has_post_thumbnail()): 
						$attachment_id = intval(get_post_thumbnail_id($post->ID));
						$bg_image_src = wp_get_attachment_image_src( $attachment_id, 'post-thumbnail');
						$bg_image = 'background-image: url(' . esc_url($bg_image_src[0]) . ');' ;
					endif; ?>
	    			<a href="<?php the_permalink(); ?>">
						<div class="image-container" <?php if (has_post_thumbnail()) : ?> style="<?php echo esc_attr($bg_image); ?>" <?php endif; ?>>
						</div>
					</a>
					<div class="category-list">
						<?php if (true == get_theme_mod( 'exclude_featured_category', false )){
							daily_news_excluded_category(array($featured_post_cat));
						} else {
							the_category();
						} ?>
					</div>
					<div class="title-wrap">
						<a href="<?php the_permalink(); ?>">
							<h2 class="h5 title"><?php the_title(); ?></h2>
						</a>
					</div>
					<?php if (is_sticky()): ?>
	                <div class="featured"><i class="fa fa-star"></i><?php esc_html_e('Sticky', 'daily-news' ); ?></div>
	                <?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
<?php endwhile; wp_reset_postdata(); endif; ?>
