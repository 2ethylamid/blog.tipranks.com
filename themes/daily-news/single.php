<?php 
/**
* Template for single post
*
* @package Daily News
* @since Daily News 1.0
*/

get_header(); ?>

<div class="container">
	<div class="row">
		<?php $sidebar_position = get_theme_mod('sidebar_position', 'right' ); ?>
		<div class="col-md-8<?php if ($sidebar_position == 'left') echo ' col-md-push-4'; ?>">
			<div class="row default-layout">
				<?php if (have_posts()) : while (have_posts()) : the_post();
					get_template_part( 'partials/post-templates/content', get_post_format() );
				endwhile; endif; ?>
				<?php if (has_tag()) : ?>
				<div class="tag-wrap col-md-12">
					<div class="tag-wrap-inner">
						
						<?php the_tags(esc_html__('Tags: ', 'daily-news'), ', ' ); ?>
					</div>
				</div>
				<?php endif; ?>
				<?php if (true == get_theme_mod( 'share_links', true )) {
					get_template_part('partials/social-share' );
				} ?>
				<?php if (true == get_theme_mod( 'author_box', true )) {
					get_template_part('partials/about-author' );
				} ?>
				<?php if (true == get_theme_mod( 'prev_next_post', true )) {
					get_template_part('partials/prev-next' );
				} ?>
				<?php wp_enqueue_script( "comment-reply" ) ?>
				<?php if(comments_open() || get_comments_number()) {
					comments_template();
				} ?>
			</div>
			<?php get_template_part('partials/pagination'); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>



<?php get_footer(); ?>