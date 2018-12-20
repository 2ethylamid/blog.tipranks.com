<!-- start about the author -->
<div class="about-author col-sm-12 clearfix">
	<?php if (function_exists('get_avatar')) : ?>
		<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php  echo get_avatar( get_the_author_meta('email'), $size = '160');  ?></a>
	<?php endif; ?>
	<div class="details">
		<div class="author">
			<span class="h4"><?php  the_author_posts_link(); ?></span>
		</div>
		<?php $authordesc = get_the_author_meta( 'description' );
		if (! empty($authordesc)) : ?>
			<div class="bio">
				<?php echo the_author_meta('description') ?>
			</div>
		<?php endif; ?>
		<?php if (get_the_author_meta('user_url') != NULL) : ?>
			<div class="meta-info">
				<span class="website"><a href="<?php esc_url(the_author_meta('user_url')) ?>" targer="_BLANK"><i class="fa fa-link fa-fw"></i><?php esc_html_e('Website', 'daily-news') ?></a></span>
			</div>
		<?php endif; ?>
	</div>
</div>
<!-- end about the author -->