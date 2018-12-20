<div class="secondary-bar-wrap"><div class="secondary-bar">
	<div class="latest-slider-wrap clearfix">
		<div class="slider-title">
			<?php echo get_theme_mod( 'tiker_title', esc_html__('latest', 'daily-news')); ?>
		</div>
		<div class="slider-nav">
			<a class="latest-prev" href=""><i class="fa fa-angle-left"></i></a>
			<a class="latest-next" href=""><i class="fa fa-angle-right"></i></a>
		</div>
		<!-- Start latest slider -->
		<div class="owl-carousel owl-theme item-wrap" id="title-slider">
			<?php
			$tiker_posts;
			$tiker_post_count = intval(get_theme_mod( 'tiker_post_count', 5 ));
			$tiker_post_cat = get_theme_mod( 'tiker_post_category' );

			if('latest' == get_theme_mod( 'tiker_post_type', 'latest')) {
				$tiker_posts = new WP_Query(array(
					'showposts' => $tiker_post_count,
					'ignore_sticky_posts' => true
					)
				);
			} else {
				$tiker_posts = new WP_Query(array(
					'showposts' => $tiker_post_count,
					"post__not_in" => get_option("sticky_posts"),
					'category_name' => $tiker_post_cat
					)
				);
			}
			if ($tiker_posts -> have_posts()) : while ($tiker_posts -> have_posts()) : $tiker_posts -> the_post(); ?>
			
			<div class="item">
				<div class="category"><?php the_category(); ?></div>
				<a href="<?php the_permalink() ?>" class="heading" title="<?php the_title_attribute() ?>"><?php the_title(); ?></a>
			</div>

			<?php endwhile; endif; ?>
		</div>
		<!-- end latest slider -->
	</div>
	<?php if (true == get_theme_mod( 'social_icon', true )) : ?>
		<?php get_template_part('partials/social-links'); ?>
	<?php endif ?>
</div>
</div>