<?php 
/**
* The template for the main sidebar widget area
*
* @package Daily News
* @since Daily News 1.0
*/
?>

<?php if ( is_active_sidebar( 'main-sidebar') ) : 
	$sidebar_position = get_theme_mod('sidebar_position', 'right' ); ?>
	<aside class="col-md-4 <?php if ($sidebar_position == 'left') echo ' col-md-pull-8'; ?>">
		<div class="sidebar">
		<?php dynamic_sidebar( 'main-sidebar'); ?>
		</div>
	</aside>
<?php endif; ?>