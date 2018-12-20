<?php
$front_page_ad_type = get_theme_mod('front_page_ad_type', 'banner');
$front_page_ad_image = get_theme_mod('front_page_ad_image', 'http://');
$front_page_ad_link = get_theme_mod('front_page_ad_link', 'http://');
$front_page_ad_code = get_theme_mod('front_page_ad_code', '');

if ($front_page_ad_type == 'banner' && $front_page_ad_image != '' && $front_page_ad_image != 'http://' && $front_page_ad_link != '' && $front_page_ad_link != 'http://') : ?>
	<div class="frontpage-bottom-ad align-center ad-wrap">
		<a href="<?php echo esc_url($front_page_ad_link); ?>" target="_blank">
			<img src="<?php echo esc_url($front_page_ad_image); ?>" alt="header ad banner">
		</a>
	</div>
<?php elseif ($front_page_ad_type == 'code' && $front_page_ad_code != '') : ?>
	<div class="frontpage-bottom-ad align-center ad-wrap">
		<?php echo $front_page_ad_code; ?>
	</div>
<?php endif; ?>