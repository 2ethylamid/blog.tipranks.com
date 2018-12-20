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
	<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
	<meta http-equiv="Pragma" content="no-cache" />
	<meta http-equiv="Expires" content="0" />
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri() ?>/tipranks.com.styles.css?ver=0.2' type='text/css' media='all' />
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

<?php get_template_part('template', 'header') ?>

	<div class="page-wrap<?php echo esc_attr($pw_class); ?>" style="margin-top: 63px;">

	<!-- start header -->
	<header class="main-header">
		<nav class="navbar navbar-default<?php echo esc_attr($n_class); ?>" id="main-navbar" style="display: none;">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only"><?php esc_html__('Toggle navigation', 'daily-news') ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<?php if (true == get_theme_mod('show_search', true)) : ?>
						<a href="#" id="search-open"><i class="fa fa-search"></i></a>
						<div id="search-wrap">
							<?php get_search_form(); ?>
						</div>
					<?php endif ?>
				</div>
			</div>
		</nav>
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
		
	</header>
	<!-- end header -->
