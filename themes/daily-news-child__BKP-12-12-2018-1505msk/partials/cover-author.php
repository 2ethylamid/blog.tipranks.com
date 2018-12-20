<div class="cover-wrap">
	<div class="container">
		<div class="author-cover">
			<div class="overlay">
				<div class="avatar-wrap">
					<?php // if (function_exists('get_avatar')) : 
					// var_dump(get_the_author_meta('email'));
					echo get_avatar( get_the_author_meta('user_email'), $size = '160');  ?>
					<?php // endif; ?>
				</div>
				<h3 class="author-name">
					<?php the_author(); ?>
				</h3>
				<div class="meta-info">
					<span class="post-count"><i class="fa fa-pencil-square-o fa-fw"></i>
						<?php 
							$total_posts = $wp_query->found_posts;
							printf (esc_html__('%d Posts', 'daily-news'), $total_posts);
						?>
					</span>
					<?php if (get_the_author_meta('user_url') != NULL) : ?>
					<span class="website"><i class="fa fa-globe fa-fw"></i><a href="<?php esc_url(the_author_meta('user_url')) ?>" targer="_BLANK"><?php esc_html_e('Website', 'daily-news') ?></a></span>
					<?php endif; ?>
				</div>
				<?php $authordesc = get_the_author_meta( 'description' );
				if (! empty($authordesc)) : ?>
					<div class="bio">
						<?php echo the_author_meta('description') ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>