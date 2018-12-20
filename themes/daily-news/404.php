<?php 
/**
* error page template.
*
* @package Daily News
* @since Daily News 1.0
*/

get_header('alternative'); ?>

<style>
#redirect-not-found-counter {
	font-size: 20px;
}
</style>
<section class="error-page-wrap">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- start logo -->
					<?php if (get_theme_mod( 'site_logo')) : ?>
						<a class="logo image-logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>"></a>
					<?php else : ?>
						<a class="logo text-logo h1" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
					<?php endif; ?>
					<?php if (get_theme_mod( 'site_tagline')) : ?>
						<div class="subtitle"><?php bloginfo('description'); ?></div>
					<?php endif ?>
					<!-- end logo -->
				</div>
			</div>
			<div class="row">
				<div class="content-wrap error-block">
					<div class="error-block-inner align-center">
						<h1 class="error-code"><?php esc_html_e('404', 'daily-news') ?></h1>
						<h4><?php esc_html_e('OOPS! The page not found.', 'daily-news') ?></h4>
						<p>Unfortunately the page you were looking for could not be found.</p>
						<a href="<?php echo site_url(); ?>" class="btn btn-primary home-link"><?php esc_html_e('Back to Homepage', 'daily-news') ?> <i class="fa fa-long-arrow-right fa-fw"></i></a>
					</div>
					<div id='redirect-not-found-counter'>5</div>
					<script>
						var el = jQuery("#redirect-not-found-counter");
						var ival = setInterval(function() { // ugly but easy
							el.text(Number(el.text()) - 1);
							if(Number(el.text()) === 0) {
								location.href = "/";
								clearInterval(ival);
							}
						}, 1000);
					</script>
				</div>
			</div>
		</div>
</section>	
<?php get_footer('alternative'); ?>