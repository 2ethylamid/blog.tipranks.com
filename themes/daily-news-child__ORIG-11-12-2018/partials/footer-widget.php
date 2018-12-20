<div class="footer-top">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<?php if ( is_active_sidebar( 'footer-sidebar-left') ) : ?>
					<?php dynamic_sidebar( 'footer-sidebar-left'); ?>
				<?php endif; ?>
			</div>
			<div class="col-md-8 col-sm-6">
				<?php if ( is_active_sidebar( 'footer-sidebar-center') ) : ?>
					<?php dynamic_sidebar( 'footer-sidebar-center'); ?>
				<?php endif; ?>
			</div>
			<!--div class="col-md-4 col-sm-6">
				<?php //if ( is_active_sidebar( 'footer-sidebar-right') ) : ?>
					<?php //dynamic_sidebar( 'footer-sidebar-right'); ?>
				<?php //endif; ?>
			</div -->
		</div>
	</div>
</div>