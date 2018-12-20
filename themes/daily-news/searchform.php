<?php
/**
 * Search form template.
 *
 * @package Daily News
 * @since Daily News 1.0
 */

?>
<form action="<?php echo esc_url(home_url( '/' )); ?>" method="get" class="search-form">
	<div class="form-group clearfix">
		<label for="search">Search</label>
		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" class="pull-left search-input" placeholder="<?php esc_html_e('Enter keyword...', 'daily-news') ?>">
		<button class="btn btn-default search-submit pull-right" type="submit"><i class="fa fa-search"></i></button>		
	</div>
</form>