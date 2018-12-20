<!-- social icons -->
<ul class="social-links">
	<?php
		if (get_theme_mod('facebook_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('facebook_url')) . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
		}
		if (get_theme_mod('twitter_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('twitter_url')) . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
		}
		if (get_theme_mod('google_plus_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('google_plus_url')) . '"><i class="fa fa-google-plus"></i></a></li>';
		}
		if (get_theme_mod('linkedin_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('linkedin_url')) . '" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
		}
		if (get_theme_mod('skype_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('skype_url')) . '"><i class="fa fa-skype"></i></a></li>';
		}
		if (get_theme_mod('pinterest_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('pinterest_url')) . '"><i class="fa fa-pinterest"></i></a></li>';
		}
		if (get_theme_mod('youtube_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('youtube_url')) . '"><i class="fa fa-youtube"></i></a></li>';
		}
		if (get_theme_mod('vimeo_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('vimeo_url')) . '"><i class="fa fa-vimeo-square"></i></a></li>';
		}
		if (get_theme_mod('dribbble_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('dribbble_url')) . '"><i class="fa fa-dribbble"></i></a></li>';
		}
		if (get_theme_mod('flickr_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('flickr_url')) . '"><i class="fa fa-flickr"></i></a></li>';
		}
		if (get_theme_mod('tumblr_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('tumblr_url')) . '"><i class="fa fa-tumblr"></i></a></li>';
		}
		if (get_theme_mod('github_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('github_url')) . '"><i class="fa fa-github"></i></a></li>';
		}
		if (get_theme_mod('instagram_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('instagram_url')) . '"><i class="fa fa-instagram"></i></a></li>';
		}
		if (get_theme_mod('stack_overflow_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('stack_overflow_url')) . '"><i class="fa fa-stack-overflow"></i></a></li>';
		}
		if (get_theme_mod('stack_exchange_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('stack_exchange_url')) . '"><i class="fa fa-stack-exchange"></i></a></li>';
		}
		if (get_theme_mod('xing_url')) {
			echo '<li><a href="' . esc_url(get_theme_mod('xing_url')) . '"><i class="fa fa-xing"></i></a></li>';
		}
		if (get_theme_mod('rss_url')) {
			echo '<li><a href="'. esc_url(home_url('/')) . esc_url(get_theme_mod('rss_url')) . '"><i class="fa fa-rss"></i></a></li>';
		}
		?>
</ul>