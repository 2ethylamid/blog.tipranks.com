<?php 
$show_home_sidebar = get_theme_mod('show_home_sidebar', true);
$sidebar_position = get_theme_mod('sidebar_position', 'right' ); ?>
<div class="<?php echo (true == $show_home_sidebar ? 'col-md-8' : 'col-md-12 no-sidebar') ?><?php if ($show_home_sidebar == true && $sidebar_position == 'left') echo ' col-md-push-4'; ?>">
	<div  id ="category-container">
		<?php $category_settings = get_theme_mod( 'category_area', array(
			array(
				'category_section_title' => '',
				'category_section_category'  => '',
				'category_section_layout' => 'layout1',
				'category_section_post_count' => 4,
			),
			array(
				'category_section_title' => '',
				'category_section_category'  => '',
				'category_section_layout' => 'layout2',
				'category_section_post_count' => 5,
			),
		)); ?>

		<?php foreach ($category_settings as $row) :
		$title = $row['category_section_title'];
		$category = $row['category_section_category'];
		$layout = $row['category_section_layout'];
		$count = intval($row['category_section_post_count']);
		?>

		<div class="category-wrap">
			<?php  if ( isset( $title ) && ! empty( $title ) ) : ?>
				<h2 class="h4 category-name"><span><?php echo esc_html( $title ); ?></span></h2>
			<?php endif; ?>
			<?php if ( isset( $category ) && ! empty( $category ) ) : ?>
				<?php
					$featured_section_posts = new WP_Query(array(
						'showposts' => $count,
						'category_name' => $category,
						'ignore_sticky_posts' => true
						)
					);
				?>							
				<div class="row default-layout">
					<?php if ($layout == 'layout1') : ?>
						<?php if ($featured_section_posts -> have_posts()) : while ($featured_section_posts -> have_posts()) : $featured_section_posts -> the_post(); ?>
							<?php get_template_part('partials/post-style', 'large' ); ?>
							<?php if ($featured_section_posts->current_post % 2 == 1): ?>
								<div class="clearfix"></div>
							<?php endif; ?>
						<?php endwhile; wp_reset_postdata(); endif; ?>
					<?php elseif (($layout == 'layout2')) : ?>
						<?php if ($featured_section_posts -> have_posts()) : while ($featured_section_posts -> have_posts()) : $featured_section_posts -> the_post(); ?>
							<?php if($featured_section_posts->current_post == 0 ) {
								get_template_part('partials/post-style', 'large' ); 
							} else {
								get_template_part('partials/post-style', 'small' );
							} ?>
						<?php endwhile; wp_reset_postdata(); endif; ?>
					<?php elseif (($layout == 'layout3')) : ?>
						<?php if ($featured_section_posts -> have_posts()) : while ($featured_section_posts -> have_posts()) : $featured_section_posts -> the_post(); ?>
							<?php if($featured_section_posts->current_post <= 1 ) {
								get_template_part('partials/post-style', 'large' ); 
								if($featured_section_posts->current_post == 1) : ?>
									<div class="clearfix"></div>
								<?php endif; 
							} else {
								get_template_part('partials/post-style', 'small' ); ?>
								<?php if($featured_section_posts->current_post == 1 || $featured_section_posts->current_post %2 == 1) : ?>
									<?php if ($featured_section_posts->current_post +1 != $featured_section_posts->post_count) : ?>
										<div class="clearfix"></div>
									<?php endif; ?>
								<?php endif; ?>
							<?php } ?>
						<?php endwhile; wp_reset_postdata(); endif; ?>
					<?php elseif (($layout == 'layout4')) : ?>
						<?php if ($featured_section_posts -> have_posts()) : while ($featured_section_posts -> have_posts()) : $featured_section_posts -> the_post(); ?>
							<?php get_template_part('partials/post-style', 'small' ); ?>
							<?php if($featured_section_posts->current_post == 1 || $featured_section_posts->current_post %2 == 1) : ?>
								<?php if ($featured_section_posts->current_post +1 != $featured_section_posts->post_count) : ?>
									<div class="clearfix"></div>
								<?php endif; ?>
							<?php endif; ?>
						<?php endwhile; wp_reset_postdata(); endif; ?>
					<?php endif ?>
				</div>
			<?php endif; ?>			
		</div>
		<?php endforeach; ?>
	</div>
	<?php get_template_part('partials/ad-templates/ad', 'frontpage'); ?>
</div>