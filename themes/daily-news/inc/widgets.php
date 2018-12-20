<?php 


/*====================================================
	facebook widget
====================================================*/
class daily_news_recent_post_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'daily_news_recent_post', // base ID
			esc_html__( 'Daily News - Recent Post', 'daily-news' ), // Name
			array( 'description' => esc_html__( 'This widget shows the recent posts with thumbnail', 'daily-news' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
		$bg_image_small = '';
		$posts = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );
		// outputs the content of the widget
		if ($posts->have_posts()) :
			echo $args['before_widget'];
			if ( ! empty($instance['title']) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			} ?>
			<div class="content recent-post">
				<?php while ( $posts->have_posts() ) : $posts->the_post();
				$has_image = has_post_thumbnail();
				if ($has_image == true) {
					$attachment_id = intval(get_post_thumbnail_id($posts->ID));
					$bg_image_small_src = wp_get_attachment_image_src( $attachment_id, 'daily_news_small_tile');
					$bg_image_small = 'style="background-image: url(' . esc_url($bg_image_small_src[0]) . ');"' ;
				} ?>
					<div class="recent-single-post clearfix<?php if ($has_image == true) echo ' have-image' ?>">
						<a href="<?php the_permalink(); ?>" class="post-title">
							<div class="post-thumb pull-left" <?php if ($has_image == true) echo $bg_image_small ?>>
								<?php if ($has_image == false) : ?>
									<i class="fa fa-image"></i>
								<?php endif; ?>
							</div>
							<div class="post-info">
								<h4 class="h5"><?php the_title(); ?></h4>
								<?php if ( $show_date ) : ?>
									<div class="date"><i class="fa fa-calendar-o"></i><?php echo get_the_date(); ?></div>
								<?php endif ?>
							</div>
						</a>
					</div>
				<?php endwhile; ?>
			</div>
			<?php echo $args['after_widget'];
		endif;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : esc_html__( 'Recent Posts', 'daily-news' );
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'daily-news' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number') ?>"><?php esc_html_e( 'Number of posts to show:', 'daily-news' ); ?></label>
			<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3">
		</p>
		<p>
			<input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html_e( 'Display post date', 'daily-news' ); ?></label>
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : true;
		return $instance;
	}
}

/*====================================================
	Mailchimp widget
====================================================*/
class daily_news_mailchimp_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'daily_news_mailchimp_widget', // base ID
			esc_html__( 'Daily News - Mailchip Widget', 'daily-news' ), // Name
			array( 'description' => esc_html__( 'This widget shows the Mailchimp Subscription form', 'daily-news' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget
		echo $args['before_widget'];
		if ( ! empty($instance['title']) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		if (!empty($instance['mailchimp_form_url'])) { 
			echo '<script>var mailchimp_form_url = \'' . $instance['mailchimp_form_url'] . '\';</script>';?>
		<div class="content newsletter">
			<?php 
			if ( ! empty($instance['description']) ) {
				echo '<p>' . $instance['description'] . '</p>';
			} 
			?>
			<div id="mc_embed_signup">
				<form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
					<div class="input-group">
						<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter your email...">
					</div>
					<div class="input-group">
						<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default">
					</div>
				</form>
			</div>
			<div id="message"></div>
		</div>
		<?php
		} else {
			esc_html_e('Please add your mailchimp form URL in mailchimp widget from widget dashboard.', 'daily-news');
		}
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = ! empty($instance['title']) ? $instance['title'] : esc_html__( 'Newsletter', 'daily-news' );
		$mailchimp_form_url = !empty($instance['mailchimp_form_url']) ? $instance['mailchimp_form_url'] : '';
		$description = !empty($instance['description']) ? $instance['description'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'daily-news' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mailchimp_form_url') ?>"><?php esc_html_e( 'Mailchimp Form URL', 'daily-news' ) ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('mailchimp_form_url') ?>" name="<?php echo $this->get_field_name( 'mailchimp_form_url' ); ?>" type="url" value="<?php echo esc_attr( $mailchimp_form_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('mailchimp_form_url') ?>"><?php esc_html_e( 'Optional Text to show before form', 'daily-news' ) ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('description') ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo esc_attr( $description ); ?></textarea>
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ! empty($new_instance['title']) ? strip_tags( $new_instance['title'] ) : '';
		$instance['mailchimp_form_url'] = !empty($new_instance['mailchimp_form_url']) ? strip_tags($new_instance['mailchimp_form_url']) : '';
		$instance['description'] = !empty($new_instance['description']) ? strip_tags($new_instance['description']) : '';

		return $instance;
	}
}









// register Foo_Widget widget
function daily_news_register_custom_widgets() {
    register_widget( 'daily_news_recent_post_Widget' );
    register_widget( 'daily_news_mailchimp_widget' );
}
add_action( 'widgets_init', 'daily_news_register_custom_widgets' );
?>