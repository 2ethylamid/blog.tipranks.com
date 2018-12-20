<?php 
/**
* Header template
*
* @package Daily News
* @since Daily News 1.0
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<?php
$site_layout = get_theme_mod('site_layout', 'boxed');
$pw_class = '';
if ($site_layout == 'full') {
	$pw_class = ' full-width';
}
$navbar_type = get_theme_mod('navbar_type', 'normal');
$n_class = '';
if ($navbar_type == 'fixed') {
	$n_class = ' navbar-fixed-top';
}
$header_bg_image= '';
if (has_header_image()) {
	$header_bg_image= 'background-image:url(' . get_header_image(). ');';
}
?>
<body <?php body_class(); ?>>
<div>
	
	<nav class="navbar navbar-default<?php echo esc_attr($n_class); ?>" id="main-navbar" 
>
			<div class="container">

<a href="https://www.tipranks.com/">
<img class="dver" src="http://tipranksblog.staging.wpengine.com/wp-content/uploads/2016/07/BlogHeaderImage_05.jpg"/>
<img class="mver" src="http://tipranksblog.staging.wpengine.com/wp-content/uploads/2016/07/mobile_BlogHeaderImage_02.jpg"/>
</a>

				<div class="navbar-header" style="display:none;">
										
					
						<?php if (true == get_theme_mod('show_search', true)) : ?>
						<a href="#" id="search-open"><i class="fa fa-search"></i></a>
						<div id="search-wrap">
							<?php get_search_form(); ?>
						</div>
					<?php endif ?>


				</div>
			</div>
		</nav>
</div>

	<div class="page-wrap<?php echo esc_attr($pw_class); ?>">
	<!-- start header -->
	<header class="main-header">
		
		<div class="header-content-section" <?php if (has_header_image()) echo 'style="' . esc_attr($header_bg_image) . ';"' ?>>
			<div class="container header-content-wrap align-center">
					<?php $header_layout = get_theme_mod('header_layout', 'layout1'); ?>
					<?php if ($header_layout == 'layout1') : ?>
						<!-- start logo -->
						<?php if (get_theme_mod( 'site_logo')) : ?>
							<a class="logo image-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>"></a>
						<?php else : ?>
							<a class="logo text-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
						<?php endif; ?>
						<?php if (get_theme_mod( 'site_tagline')) : ?>
							<div class="subtitle"><?php bloginfo('description'); ?></div>
						<?php endif ?>
						<!-- end logo -->
					<?php elseif ($header_layout == 'layout2') : ?>
						<div class="cell-left">
							<!-- start logo -->
							<?php if (get_theme_mod( 'site_logo')) : ?>
								<a class="logo image-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>"></a>
							<?php else : ?>
								<a class="logo text-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
							<?php endif; ?>
							<?php if (get_theme_mod( 'site_tagline')) : ?>
								<div class="subtitle"><?php bloginfo('description'); ?></div>
							<?php endif ?>
							<!-- end logo -->
						</div>					
						<?php get_template_part('partials/ad-templates/ad', 'header'); ?>
					<?php endif; ?>
			</div>
		</div>
		<?php if (true == get_theme_mod( 'tiker_bar', true )) : ?>
			<?php get_template_part('partials/tiker-bar'); ?>
		<?php endif ?>
	</header>
	<!-- end header -->
