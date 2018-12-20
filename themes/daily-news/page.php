<?php 
/**
* Default page template
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
					get_template_part( 'partials/post-templates/content', 'page' );
				endwhile; endif; ?>
				<?php wp_enqueue_script( "comment-reply" ) ?>
				<?php if(comments_open() || get_comments_number()) {
					comments_template();
				} ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>



<?php get_footer(); ?>