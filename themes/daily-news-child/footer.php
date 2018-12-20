<?php 
/**
* Footer template
*
* @package Daily News
* @since Daily News 1.0
*/
?>
</div>

	<footer class="main-footer">
		<?php if (true == get_theme_mod( 'footer_widget_area', true )) {
			get_template_part('partials/footer-widget');
		} ?>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 copyright">
						<?php if (false != get_theme_mod('custom_copyright')) : ?>
							<?php echo get_theme_mod('custom_copyright_textbox'); ?>
						<?php else: ?>
							<?php
								$default_copy =  '&copy; ' . date('Y') .'&nbsp;' . ' <a href="' . esc_url(home_url('/')) . '">'. esc_attr(get_bloginfo('name', 'display')) . '</a>.&nbsp;' .  esc_html('All rights Reserved', 'daily-news');
								$allowed_html = array(
							    	'a' => array(
								        'href' => array(),
								        'title' => array()
								    )
								);
								echo wp_kses($default_copy, $allowed_html);
							?>
						<?php endif; ?>
					</div>
					<?php if (true == get_theme_mod( 'feed_link', true )) : ?>
					<div class="col-sm-2">
						<div class="feed-link-wrap">
							<a href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss-square"></i> <?php /*esc_html_e('Subscribe', 'daily-news')*/ ?></a>
						</div>
					</div>
					<?php endif ?>
				</div>
			</div>
		</div> 
<div class="inner_footer">
  <div class="first_footer_block">
       <?php //echo do_shortcode('[widget id="black-studio-tinymce-2"]'); ?>
       <?php //echo do_shortcode('[widget id="black-studio-tinymce-3"]'); ?>
       <?php //echo do_shortcode('[widget id="black-studio-tinymce-4"]'); ?>
  </div>
</div>



	</footer>
<a href="#" id="back-to-top"><i class="fa fa-angle-up"></i></a>


	<?php wp_footer(); ?>
	</body>
</html>