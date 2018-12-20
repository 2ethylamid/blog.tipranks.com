<?php 
/**
* Daily News functions and definations
*
* @package Daily News
* @since Daily News 1.0
*/

/*====================================================
	Define constant
====================================================*/
define('DAILY_NEWS_THEMEROOT', get_template_directory_uri());

/*====================================================
	Theme Setup functin
====================================================*/
if (! function_exists('daily_news_theme_setup')) {
	function daily_news_theme_setup() {
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ));
		add_theme_support('post-thumbnails');

		/* image size required for this theme */
		set_post_thumbnail_size( 750, 406, true);
		add_image_size( 'daily_news_small_tile', 105, 77, true );
		add_image_size( 'daily_news_gallery_thumbnail', 188, 188, true );

		add_theme_support('custom-header', array(
			'width'			=> '1920',
			'height'		=> '186',
			'flex-height'	=> true,
			'flex-width'	=> true,
			));
		add_theme_support('custom-background');
		add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

		// load theme text domain
		load_theme_textdomain( 'daily-news', get_template_directory() . '/languages' );

		/* register menu */
		register_nav_menus(array(
			'main-menu' => esc_html__('Main Menu', 'daily-news')
		));
	}
	add_action('after_setup_theme', 'daily_news_theme_setup' );
}

// content width in this design
if (! isset( $content_width) ) {
	$content_width = 800;
}

/*====================================================
	style and scripts
====================================================*/
/* generating fonts url correct way */

function daily_news_fonts_url() {
	$fonts_url = '';
	/* Translators: If there are characters in your language that are not
	* supported by Arimo, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$arimo = _x( 'on', 'Open Sans font: on or off', 'daily-news' );
	if ( 'off' !== $arimo ) {
		$font_families = array();	 
		if ( 'off' !== $arimo ) {
			$font_families[] = 'Open Sans:400,700,400italic,700italic';
		}	 
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin' ),
		);	 
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}	 
	return esc_url_raw( $fonts_url );
}

if (! function_exists('daily_news_styles_scripts')) {
	function daily_news_styles_scripts() {
		// stylesheets

		$protocol = is_ssl() ? 'https' : 'http';
    	wp_enqueue_style( 'daily-news-fonts', daily_news_fonts_url(), array(), null );

		wp_enqueue_style('bootstrap', DAILY_NEWS_THEMEROOT.'/css/bootstrap.min.css', array(), null );
		wp_enqueue_style('font-awesome', DAILY_NEWS_THEMEROOT.'/css/font-awesome.min.css', array(), null );
		wp_enqueue_style('daily-news-theme-style', get_stylesheet_uri(), array(), null);
		wp_enqueue_style('flexslider', DAILY_NEWS_THEMEROOT.'/css/flexslider.css', array(), null);
		wp_enqueue_style('magnific_popup_style', DAILY_NEWS_THEMEROOT.'/css/magnific-popup.css', array(), null);
		wp_enqueue_style('owl-carousel', DAILY_NEWS_THEMEROOT.'/css/owl.carousel.css', array(), null);
		wp_enqueue_style('owl-transitions', DAILY_NEWS_THEMEROOT.'/css/owl.transitions.css', array(), null);
		wp_enqueue_style('highlightjs', DAILY_NEWS_THEMEROOT.'/css/hl-styles/monokai_sublime.css', array(), null);
		wp_enqueue_style('daily-news-main-style', DAILY_NEWS_THEMEROOT.'/css/screen.css', array('bootstrap', 'font-awesome'), null);
		// scripts
		wp_enqueue_script('fitvid', DAILY_NEWS_THEMEROOT.'/js/jquery.fitvids.js', array('jquery'), '', true );
		wp_enqueue_script('bootstrap', DAILY_NEWS_THEMEROOT.'/js/bootstrap.min.js', array('jquery'), '', true );
		wp_enqueue_script('flexslider', DAILY_NEWS_THEMEROOT.'/js/jquery.flexslider-min.js', array(), '', true );
		wp_enqueue_script('magnific_popup_script', DAILY_NEWS_THEMEROOT.'/js/jquery.magnific-popup.min.js', array('jquery'), '', true );
		wp_enqueue_script('highlightjs', DAILY_NEWS_THEMEROOT.'/js/highlight.pack.js', '', true );
		wp_enqueue_script('owl.carousel', DAILY_NEWS_THEMEROOT.'/js/owl.carousel.min.js', '', true );
		wp_enqueue_script('twitter-wjs', '//platform.twitter.com/widgets.js', array(), '', true );
	    wp_enqueue_script('daily-news-main-js', DAILY_NEWS_THEMEROOT.'/js/main.js', array('jquery'), '', true );
	}

	add_action('wp_enqueue_scripts', 'daily_news_styles_scripts' );
}
/*====================================================
	Admin scrpts
====================================================*/
if (! function_exists('daily_news_admin_scripts')) {
	function daily_news_admin_scripts() {
		wp_enqueue_script('daily-news-admin-script', DAILY_NEWS_THEMEROOT. '/js/admin-script.js', array('jquery'), '', true );
	}

	add_action('admin_enqueue_scripts', 'daily_news_admin_scripts');
}
/*====================================================
	Editor style
====================================================*/
function daily_news_editor_style() {
	add_editor_style(array('css/editor-style.css', daily_news_fonts_url()));
}
add_action('init', 'daily_news_editor_style');
/*====================================================
	register sidebar
====================================================*/
function daily_news_widgets_init(){
	if ( function_exists('register_sidebar') ) {
	    register_sidebar(array(
			'name'          => esc_html__( 'Main Sidebar', 'daily-news' ),
			'id'            => 'main-sidebar',
			'description'   => esc_html__('Add widget here to show in main sidebar', 'daily-news'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title h5"><span>',
			'after_title'   => '</span></h3>'
	    ));
	    register_sidebar(array(
			'name'          => esc_html__( 'Home Page Sidebar', 'daily-news' ),
			'id'            => 'home-sidebar',
			'description'   => esc_html__('Add widget here to show in Home front page template sidebar', 'daily-news'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title h5"><span>',
			'after_title'   => '</span></h3>'
	    ));

	    register_sidebar(array(
			'name'          => esc_html__( 'Footer Widget Area left', 'daily-news' ),
			'id'            => 'footer-sidebar-left',
			'description'   => esc_html__('Add widget here to show in footer left', 'daily-news'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title h5"><span>',
			'after_title'   => '</span></h3>'
	    ));
	    register_sidebar(array(
			'name'          => esc_html__( 'Footer Widget Area Center', 'daily-news' ),
			'id'            => 'footer-sidebar-center',
			'description'   => esc_html__('Add widget here to show in footer center', 'daily-news'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title h5"><span>',
			'after_title'   => '</span></h3>'
	    ));
	    register_sidebar(array(
			'name'          => esc_html__( 'Footer Widget Area Right', 'daily-news' ),
			'id'            => 'footer-sidebar-right',
			'description'   => esc_html__('Add widget here to show in footer right', 'daily-news'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="title h5"><span>',
			'after_title'   => '</span></h3>'
	    ));
	}
}
add_action( 'widgets_init', 'daily_news_widgets_init' );
/*====================================================
	body class for fixed navbar
====================================================*/
function daily_news_body_classes($classes) {
	$navbar_type = get_theme_mod('navbar_type', 'normal');
	if ($navbar_type == 'fixed') {
		$classes[] = 'has-fixed-navbar';
	}
	return $classes;
}
add_filter('body_class', 'daily_news_body_classes');
/*====================================================
	Custom widgets
====================================================*/
require_once(get_template_directory(). '/inc/widgets.php');
/*====================================================
	Meta box
====================================================*/
include( get_template_directory() . '/inc/meta-box-setup.php' );
/*====================================================
	excerpt
====================================================*/
/* Custom excerpt length */
function daily_news_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'daily_news_excerpt_length');

/* Modifing the content more tag link */
function daily_news_modify_read_more_link() {
	return '<div><a class="permalink" href="'. get_permalink() . '">'. esc_html__('Read More...', 'daily-news'). '</a></div>';
}
add_filter( 'the_content_more_link', 'daily_news_modify_read_more_link' );

/* Add a link  to the end of our excerpt contained in a div for styling purposes and to break to a new line on the page.*/
function daily_news_excerpt_more($more) {
    global $post;
    return '<div><a class="permalink" href="'. get_permalink($post->ID) . '">'. esc_html__('Read More...', 'daily-news'). '</a></div>';
}
add_filter('excerpt_more', 'daily_news_excerpt_more');

/*====================================================
	adding class to pagination
====================================================*/
function daily_news_newer_posts_link_attributes() {
    return 'class="newer-posts"';
}
add_filter('previous_posts_link_attributes', 'daily_news_newer_posts_link_attributes');
function daily_news_older_posts_link_attributes() {
    return 'class="older-posts"';
}
add_filter('next_posts_link_attributes', 'daily_news_older_posts_link_attributes');
/*====================================================
	comment call back
====================================================*/
function daily_news_comments ($comment, $args, $depth) {
	$GLOBAL['comment'] = $comment;

	 ?>
		<li id="comment-<?php comment_ID(); ?>" >
			<article <?php comment_class(); ?>>
				<header>
					<a href="<?php comment_author_url(); ?>" class="author-avater-link"><?php echo get_avatar( $comment, 50); ?></a> 
					<div class="comment-details clearfix">
						<div class="commenter-name h5"><?php comment_author_link(); ?></div>
						<span class="commenter-meta"><?php comment_date();?>&nbsp;-&nbsp;<?php comment_time(); ?></span><?php edit_comment_link('<span class="edit-link">' . esc_html__('Edit', 'daily-news' ) . '</span>') ?>
					</div>
				</header>
				<div class="comment-body">
					<?php comment_text() ?>
				</div>
				<?php comment_reply_link( array_merge(array('reply_text' => esc_html__('Reply', 'daily-news')), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</article>
		</li>
	<?php 
}
function daily_news_change_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-default btn-sm", $class);
    return $class;
}
add_filter('comment_reply_link', 'daily_news_change_reply_link_class');
function daily_news_posts_link_attributes() {
    $class = 'class=" btn btn-default btn-sm"';
    return $class;
}
add_filter('next_comments_link_attributes', 'daily_news_posts_link_attributes');
add_filter('previous_comments_link_attributes', 'daily_news_posts_link_attributes');

/*====================================================
	modification category widget post count		
====================================================*/
function daily_news_categories_postcount ($var) {
	$new_string = str_replace('</a> (', '<span class="post-count">', $var);
	$new_string = str_replace(')', '</span></a>', $new_string);
	return $new_string;
}
add_filter('wp_list_categories','daily_news_categories_postcount');

function daily_news_archive_postcount($var) {
	$new_string = str_replace('</a>&nbsp;(', '<span class="post-count">', $var);
	$new_string = str_replace(')', '</span></a>', $new_string);
	return $new_string;
}
add_filter('get_archives_link', 'daily_news_archive_postcount');

/*====================================================
	Open graph meta tag in head	
====================================================*/
if( !function_exists( 'daily_news_open_graph_meta_tags' ) ){
	function daily_news_open_graph_meta_tags() {
		global $post;
		if( is_singular() ){
			$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			$img = $img[0];
			echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	        echo '<meta property="og:type" content="article"/>';
	        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
			echo '<meta property="og:image" content="' . esc_url($img) .'" />';
		}
	}
}
add_action( 'wp_head', 'daily_news_open_graph_meta_tags' );
/*====================================================
	post classs	
====================================================*/
function daily_news_post_class() {
	$classes = get_post_class();
	$string = '';
	foreach ($classes as $class) {
		$string .= ' ' . $class;
	}
	return $string;
}
/*====================================================
	daily news customizer
====================================================*/
/**
* Include Kirki as a library for this theme 
*/
include_once( get_template_directory() . '/inc/kirki/kirki.php' );

if ( ! function_exists( 'daily_news_kirki_update_url' ) ) {
    function daily_news_kirki_update_url( $config ) {
        $config['url_path'] = DAILY_NEWS_THEMEROOT . '/inc/kirki/';
        return $config;
    }
}
add_filter( 'kirki/config', 'daily_news_kirki_update_url' );


include_once( get_template_directory() . '/inc/daily-news-customizer.php');

function daily_news_excluded_category( $ex_cat_names = array(), $separetor = '') {
	$categories = get_the_category();
	$count = 0;
	$category_string = '<ul>';
	$allowed_html = array(
    	'a' => array(
	        'href' => array(),
	        'title' => array()
	    )
	);

	foreach($categories as $category) {
		$count++;
		if ( !in_array($category->slug, $ex_cat_names) ) {
			$category_string .= '<li><a href="' . get_category_link( $category->term_id ) . '" rel="category">' . $category->name.'</a></li>';

			if( $count != count($categories)-1 ){
				$category_string .= $separetor;
			}

		}
	}
	echo wp_kses($category_string, $allowed_html)  . '</ul>';
}

/*====================================================
	custome css code from customizer option
====================================================*/
function daily_news_include_custom_css_code() {
	$css_code = get_theme_mod('custom_css');
	if (!empty($css_code)) {
		echo '<style type="text/css">' . $css_code . '</style>';
	}
}
add_action('wp_head', 'daily_news_include_custom_css_code' );

/*====================================================
	TGM Plugin Activation
====================================================*/
require_once(get_template_directory(). '/inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'daily_news_register_required_plugins' );

function daily_news_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
            'name'               => 'Meta Box',
            'slug'               => 'meta-box',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),
		array(
            'name'               => 'Contact Form 7',
            'slug'               => 'contact-form-7',
            'required'           => false,
        ),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'daily-news' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'daily-news' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'daily-news' ), // %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'daily-news' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'daily-news'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'daily-news'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'daily-news'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'daily-news'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'daily-news'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'daily-news'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'daily-news'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'daily-news'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'daily-news'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'daily-news'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'daily-news'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'daily-news' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'daily-news' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'daily-news' ), // %s = dashboard link.
			'nag_type'                        => 'error', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
	);

	tgmpa( $plugins, $config );
}

function daily_news_js_options() {
	$slide_style = get_theme_mod( 'tiker_slide_style', 'goDown' );
	if ($slide_style != 'false') {
		echo '<script> var $slidestyle ="' . $slide_style . '";</script>';
	} else {
		echo '<script> var $slidestyle =' . $slide_style . ';</script>';
	}
}
add_action('wp_head', 'daily_news_js_options');