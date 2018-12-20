<?php 
/**
* Template Name: Full width page
* full width page template without sidebar.
*
* @package Daily News
* @since Daily News 1.0
*/

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
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
	</div>
</div>
<?php get_footer(); ?>