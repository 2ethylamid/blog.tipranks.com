<?php 
/**
* Template Name: Media page
*
* @package Daily News
* @since Daily News 1.0
*/

get_header(); ?>

<script>
jQuery(function($) {
	$(".title.h3:eq(0), .post-meta:eq(0)").css("display", "none");
});

</script>
<div class="container">
<div class="tag-cover">
			<div class="overlay" style="background:#006373">
				<h2 class="tag-title h3" style="color:#fff;"> TipRanks In The Media</h2>
				
			</div>
		</div>
	<div class="row">
		<?php $sidebar_position = get_theme_mod('sidebar_position', 'right' ); ?>
		<div class="col-md-8<?php if ($sidebar_position == 'left') echo ' col-md-push-4'; ?>">
			<div class="row default-layout">
				<?php if (have_posts()) : while (have_posts()) : the_post();
					get_template_part( 'partials/post-templates/content', get_post_format() );
				endwhile; endif; 
				echo do_shortcode('[wonderplugin_gallery id="2"]');
				echo "<br/><br/>";
//echo do_shortcode('[widget id="daily_news_recent_post-6"]');
        // query_posts( array( 'category_name' => 'analyst-spotlight' ) );
//query_posts( array( 'category_name' => 'analyst-spotlight' ));
//$test=get_posts('category_name=test');
				$count=4;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$featured_section_posts = new WP_Query(array(
						'showposts' => $count,
						'category_name' => 'media',
						'ignore_sticky_posts' => true,
						'paged' => $paged

						)
					);
//var_dump($featured_section_posts);
					?>
<?php if ($featured_section_posts -> have_posts()) : while ($featured_section_posts -> have_posts()) : $featured_section_posts -> the_post(); ?>
							<?php get_template_part('partials/post-style', 'large' ); ?>
							<?php if ($featured_section_posts->current_post % 2 == 1): ?>
								<div class="clearfix"></div>
							<?php endif; ?>
						<?php endwhile; wp_reset_postdata(); endif; 
echo '<div class="pagination-wrap">
	<div class="pagination clearfix" role="navigation">';
echo get_next_posts_link( '<span>SEE MORE ARTICLES</span>', $featured_section_posts->max_num_pages );
echo '</div></div>';
						?>

<!--div class="pagination-wrap">
	<div class="pagination clearfix" role="navigation">
		<a href="http://tipranksblog.staging.wpengine.com/media-buzz-page/page/2/" class="older-posts"><span>SEE MORE ARTICLES</span> </a>	</div>
</div-->

				

			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>