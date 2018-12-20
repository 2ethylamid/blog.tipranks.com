<?php 
/**
* Main template file
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
				<?php
		    		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					query_posts(['category__not_in' => [1,11], 'posts_per_page' => 10, 'paged' => $paged]);
					//$args = ['category__not_in' => [1,11], 'posts_per_page' => 10];
					//$query = new WP_Query($args);
				?>
				<?php if (have_posts()) : while (have_posts()) : the_post();
					get_template_part( 'partials/post-templates/content', get_post_format() );
				endwhile; endif; ?>
				<?php
					wp_reset_query();
				?>
			</div>
			<?php get_template_part('partials/pagination'); ?>
			<div class="widget">
			<a href="http://blog.tipranks.com/media-buzz-page/"><h3 class="title h5"><span>TipRanks in the media</span></h3></a></div>
			<div id="category-posts-2" class="widget cat-post-widget"><h2 class="widgettitle">Video</h2>

			<ul id="category-posts--1">
<li class="cat-post-item"><a class="post-title cat-post-title" href="http://blog.tipranks.com/media-buzz-page/" rel="bookmark">TipRanks: Analyzing the analysts, CNBC Interview</a> <a class="cat-post-thumbnail  cat-post-none" href="http://blog.tipranks.com/media-buzz-page/" title="Uri Gruenbaum, TipRanks CEO and Eliot Spitzer, former New York Governer and the Sheriff of Wall Street Discussing the technology powering TipRanks"><img width="301" height="200" src="http://blog.tipranks.com/wp-content/uploads/2016/05/Uri-on-CNBC.png" class="attachment-350x200 size-350x200 wp-post-image"  sizes="(max-width: 301px) 100vw, 301px"></a><p>TipRanks CEO Uri Gruenbaum and Wall Street Sheriff and former NY governer Eliot Spitzer discussing the technology driving TipRanks. <a class="cat-post-excerpt-more" href="http://blog.tipranks.com/media-buzz-page/">Read More..</a></p>
</li></ul>
</div>
<div>
</div>

<br/><br/>
	</div>

		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>