<?php 
/**
* Template Name: Frontpage
*
* @package Daily News
* @since Daily News 1.0
*/

get_header(); ?>
<div class="container">
	<?php if (true == get_theme_mod( 'featured_section', true )) : ?>
		<div class="row big-margin">
		<?php get_template_part( 'partials/template', 'featured' ); ?>
		</div>
	<?php endif; ?>
	<div class="row">
		<?php get_template_part( 'partials/template', 'category-sections' ); ?>
		<?php if (true == get_theme_mod('show_home_sidebar', true)) :
			get_sidebar('home');
		endif; ?>
	</div>
</div>
<?php get_footer(); ?>