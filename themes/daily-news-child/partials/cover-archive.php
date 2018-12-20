<div class="cover-wrap">
	<div class="container">
		<div class="tag-cover">
			<div class="overlay">
				<h2 class="tag-title h3">
					<?php
						if ( is_day() ) :
						printf(esc_html__('Date: %s', 'daily-news'), get_the_date());
						elseif (is_month()) :
						printf(esc_html__('Month: %s', 'daily-news'), get_the_date( esc_html_x( 'F Y', 'Date for monthly archive', 'daily-news')));
						elseif (is_year()) :
						printf(esc_html__('Year: %s', 'daily-news'), get_the_date( esc_html_x( 'Y', 'Date for yearly archive', 'daily-news' )));
						elseif ( is_tag() ) :
						printf(esc_html__('Tag: %s', 'daily-news'), single_tag_title('', false ));
						elseif (is_category()) :
						printf(esc_html__('Category: %s', 'daily-news'), single_cat_title('', false ));
						else :
						esc_html_e('Archive', 'daily-news');
						endif;
		            ?>
				</h2>
				<div class="meta-info">
					<span><i class="fa fa-signal fa-fw"></i>
						<?php 
							$total_posts = $wp_query->found_posts;
							printf (esc_html__('Total %d Posts', 'daily-news'), $total_posts);
						?>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>