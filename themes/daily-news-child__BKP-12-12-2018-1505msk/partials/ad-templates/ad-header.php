<?php
$header_ad_type = get_theme_mod('header_ad_type', 'banner');
$header_ad_image = get_theme_mod('header_ad_image', 'http://');
$header_ad_link = get_theme_mod('header_ad_link', 'http://');
$header_ad_code = get_theme_mod('header_ad_code', '');
?>
<div class="cell-right">
<?php if ($header_ad_type == 'banner' && $header_ad_image != '' && $header_ad_image != 'http://' && $header_ad_link != '' && $header_ad_link != 'http://') : ?>
	<div class="header-ad ad-wrap">
		<a href="<?php echo esc_url($header_ad_link); ?>" target="_blank">
			<img src="<?php echo esc_url($header_ad_image); ?>" alt="header ad banner">
		</a>
	</div>
<?php elseif ($header_ad_type == 'code' && $header_ad_code != '') : ?>
	<div class="header-ad ad-wrap">
		<?php echo $header_ad_code; ?>
	</div>
<?php endif; ?>
</div>