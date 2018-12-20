<?php

if ( class_exists( 'Kirki' ) ) {
	/**
     * Add panel
     */
    Kirki::add_panel( 'header_settings', array(
	    'priority'    => 50,
	    'title'       => esc_html__( 'Header Settings', 'daily-news' ),
	    'description' => esc_html__( 'All header related settings', 'daily-news' ),
	) );
	Kirki::add_panel( 'home_settings', array(
	    'priority'    => 50,
	    'title'       => esc_html__( 'Home Page Settings', 'daily-news' ),
	    'description' => esc_html__( 'Homepage related settings', 'daily-news' ),
	) );
	Kirki::add_panel( 'ad_settings', array(
	    'priority'    => 60,
	    'title'       => esc_html__( 'Advertisement Settings', 'daily-news' ),
	    'description' => esc_html__( 'Manage all ads here', 'daily-news' ),
	) );
	/**
	 * Add sections
	 */
	Kirki::add_section( 'general_settings', array(
		'title'          => esc_attr__( 'General Settings', 'daily-news' ),
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'header_general_settings', array(
		'title'          => esc_attr__( 'Header General Settings', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'header_settings',
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'logo_settings', array(
		'title'          => esc_attr__( 'Logo Settings', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'header_settings',
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'tiker_settings', array(
		'title'          => esc_attr__( 'Tiker / Slider Bar', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'header_settings',
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'social_icon_settings', array(
		'title'          => esc_attr__( 'Social Icon Settings', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'header_settings',
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_section( 'featured_settings', array(
		'title'          => esc_attr__( 'Featured Area Options', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'home_settings',
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'category_settings', array(
		'title'          => esc_attr__( 'Category Area Options', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'home_settings',
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'home_sidebar_settings', array(
		'title'          => esc_attr__( 'Sidebar On Homepage', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'home_settings',
		'capability'     => 'edit_theme_options',
	) );

	Kirki::add_section( 'single_post', array(
		'title'          => esc_attr__( 'Single Post Settings', 'daily-news' ),
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'footer', array(
		'title'          => esc_attr__( 'Footer Settings', 'daily-news' ),
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
	) );
	/*
	* Advertisement sections
	*/
	Kirki::add_section( 'header_ad', array(
		'title'          => esc_attr__( 'Header Ad Settings', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'ad_settings',
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'front_page_ad', array(
		'title'          => esc_attr__( 'Front Page Bottom Ad Settings', 'daily-news' ),
		'priority'       => 10,
		'panel'       => 'ad_settings',
		'capability'     => 'edit_theme_options',
	) );
	Kirki::add_section( 'custom_code', array(
		'title'          => esc_attr__( 'Custom Code', 'daily-news' ),
		'priority'       => 200,
		'capability'     => 'edit_theme_options',
	) );

	/**
	 * Add the configuration.
	 * This way all the fields using the 'kirki_demo' ID
	 * will inherit these options
	 */
	Kirki::add_config( 'dn', array(
		'capability'    => 'edit_theme_options',
    	

	) );

	/**
	 * Add fields
	 */
	Kirki::add_field( 'dn', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'site_layout',
		'label'       => esc_attr__( 'Site Layout', 'daily-news' ),
		'description' => esc_attr__( 'Choose site width. boxed or full width.', 'daily-news' ),
		'section'     => 'general_settings',
		'default'     => 'boxed',
		'priority'    => 10,
		'choices'     => array(
			'boxed'   => esc_attr__( 'Boxed', 'daily-news' ),
			'full' => esc_attr__( 'Full Width', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_position',
		'label'       => esc_attr__( 'Sidebar Position', 'daily-news' ),
		'description' => esc_attr__( 'Choose sidebar to be shown on right or left.', 'daily-news' ),
		'section'     => 'general_settings',
		'default'     => 'right',
		'priority'    => 10,
		'choices'     => array(
			'left' => esc_attr__( 'Left', 'daily-news' ),
			'right'   => esc_attr__( 'Right', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'navbar_type',
		'label'       => esc_attr__( 'Navbar Type', 'daily-news' ),
		'description' => esc_attr__( 'Navbar fixed or normal.', 'daily-news' ),
		'section'     => 'header_general_settings',
		'default'     => 'normal',
		'priority'    => 10,
		'choices'     => array(
			'normal'   => esc_attr__( 'Normal', 'daily-news' ),
			'fixed' => esc_attr__( 'Fixed', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'select',
		'settings'    => 'header_layout',
		'label'       => esc_attr__( 'Header Layout', 'daily-news' ),
		'description' => esc_attr__( 'Choose a Header style.', 'daily-news' ),
		'section'     => 'header_general_settings',
		'default'     => 'layout1',
		'priority'    => 10,
		'choices'     => array(
			'layout1'   => esc_attr__( 'Header Layout One', 'daily-news' ),
			'layout2'	=> esc_attr__( 'Header Layout Two - with Ad', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'show_search',
		'label'       => esc_attr__( 'Show Navbar Search', 'daily-news' ),
		'description' => esc_attr__( 'Show / Hide search in the menu bar.', 'daily-news' ),
		'section'     => 'header_general_settings',
		'default'     => true,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'image',
		'settings'    => 'site_logo',
		'label'       => esc_attr__( 'Upload Logo', 'daily-news' ),
		'description' => esc_attr__( 'Upload your logo image here', 'daily-news' ),
		'section'     => 'logo_settings',
		'default'     => '',
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'site_tagline',
		'label'       => esc_attr__( 'Site tagline', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the site tagline below logo.', 'daily-news' ),
		'section'     => 'logo_settings',
		'default'     => false,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'tiker_bar',
		'label'       => esc_attr__( 'Slider / Tiker bar', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the latest article bar. Disabling this will hide the bar below the logo are also social icons will be hidden there.', 'daily-news' ),
		'section'     => 'tiker_settings',
		'default'     => true,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'tiker_title',
		'label'       => esc_attr__( 'Slider / Tiker Title text', 'daily-news' ),
		'description' => esc_attr__( 'Title of the latest article bar.', 'daily-news' ),
		'section'     => 'tiker_settings',
		'default'     => esc_html__('latest', 'daily-news' ),
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'number',
		'settings'    => 'tiker_post_count',
		'label'       => esc_attr__( 'Slider / Tiker post count', 'daily-news' ),
		'description' => esc_attr__( 'Number of post in the latest article bar.', 'daily-news' ),
		'section'     => 'tiker_settings',
		'default'     => 5,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'select',
		'settings'    => 'tiker_slide_style',
		'label'       => esc_attr__( 'Slide Style', 'daily-news' ),
		'description' => esc_attr__( 'Choose a slide animation style in latest article bar.', 'daily-news' ),
		'section'     => 'tiker_settings',
		'default'     => 'goDown',
		'priority'    => 10,
		'choices'     => array(
			'fade'   => 'fade',
			'backSlide' => 'backSlide',
			'goDown'   => 'goDown',
			'fadeUp'   => 'fadeUp',
			'false'	=> esc_attr__( 'No CSS Style', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'tiker_post_type',
		'label'       => esc_attr__( 'Post type in Slider', 'daily-news' ),
		'description' => esc_attr__( 'Choose type of post in latest article bar. By default the latest post to be shown. Or you can choose an specific category.', 'daily-news' ),
		'section'     => 'tiker_settings',
		'default'     => 'latest',
		'priority'    => 10,
		'choices'     => array(
			'latest'   => esc_attr__( 'Latest Posts', 'daily-news' ),
			'category' => esc_attr__( 'Post From a Category', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'select',
		'settings'    => 'tiker_post_category',
		'label'       => esc_attr__( 'Choose a category', 'daily-news' ),
		'description' => esc_attr__( 'Choose a category. The posts in that category will be shown.', 'daily-news' ),
		'help'        => esc_attr__( 'This is a tooltip', 'daily-news' ),
		'section'     => 'tiker_settings',
		'default'     => '',
		'priority'    => 10,
		'choices'     => get_categories_select(),
		'required'  => array(
			array(
				'setting'  => 'tiker_post_type',
				'operator' => '==',
				'value'    => 'category',
			),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'social_icon',
		'label'       => esc_attr__( 'Social Icons', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the Social icons ath the header. Use below fields to add links for the icons. Keep blank which icon you do not want to show. Only show few icons so that the layout do not break in smaller device.' , 'daily-news' ),
		'section'     => 'social_icon_settings',
		'default'     => true,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'facebook_url',
		'label'       => esc_attr__( 'Facebook URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'twitter_url',
		'label'       => esc_attr__( 'Twitter URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'google_plus_url',
		'label'       => esc_attr__( 'Google Plus URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'linkedin_url',
		'label'       => esc_attr__( 'Linkedin URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'skype_url',
		'label'       => esc_attr__( 'Skype URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'pinterest_url',
		'label'       => esc_attr__( 'Pinterest URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'youtube_url',
		'label'       => esc_attr__( 'Youtube URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'vimeo_url',
		'label'       => esc_attr__( 'Vimeo URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'dribbble_url',
		'label'       => esc_attr__( 'Dribbble URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'flickr_url',
		'label'       => esc_attr__( 'Flickr URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'tumblr_url',
		'label'       => esc_attr__( 'Tumblr URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'github_url',
		'label'       => esc_attr__( 'Github URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'instagram_url',
		'label'       => esc_attr__( 'Instagram URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'stack_overflow_url',
		'label'       => esc_attr__( 'Stack Overflow URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'stack_exchange_url',
		'label'       => esc_attr__( 'Stack Exchange URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'xing_url',
		'label'       => esc_attr__( 'Xing URL', 'daily-news' ),
		'section'     => 'social_icon_settings',
	) );

	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'featured_section',
		'label'       => esc_attr__( 'Featured Section', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the Featured section at the top of content area in homrpage.', 'daily-news' ),
		'section'     => 'featured_settings',
		'default'     => true,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'select',
		'settings'    => 'featured_section_layout',
		'label'       => esc_attr__( 'Featured Section Layout', 'daily-news' ),
		'description' => esc_attr__( 'Choose a Layout Style.', 'daily-news' ),
		'section'     => 'featured_settings',
		'default'     => 'layout1',
		'priority'    => 10,
		'choices'     => array(
			'layout1'   => esc_attr__( 'Layout One', 'daily-news' ),
			'layout2'	=> esc_attr__( 'Layout Two', 'daily-news' ),
			'layout3'   => esc_attr__( 'Layout Three', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'number',
		'settings'    => 'featured_post_count',
		'label'       => esc_attr__( 'Featured Post Count', 'daily-news' ),
		'description' => esc_attr__( 'Number of featured post to be show in featured area.', 'daily-news' ),
		'section'     => 'featured_settings',
		'default'     => 5,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'featured_post_type',
		'label'       => esc_attr__( 'Featured Section posts', 'daily-news' ),
		'description' => esc_attr__( 'Which posts to show in featured area. You have 2 option, either you show featured post ( you choose when you create a post ) or posts from a category.', 'daily-news' ),
		'section'     => 'featured_settings',
		'default'     => 'featured',
		'priority'    => 10,
		'choices'     => array(
			'featured'   => esc_attr__( 'Featured Posts', 'daily-news' ),
			'category' => esc_attr__( 'Post From a Category', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'select',
		'settings'    => 'featured_post_category',
		'label'       => esc_attr__( 'Featured Category', 'daily-news' ),
		'description' => esc_attr__( 'Choose a category. Post from chosen category will be displayed in featured area.', 'daily-news' ),
		'section'     => 'featured_settings',
		'default'     => '',
		'priority'    => 10,
		'choices'     => get_categories_select(),
		'required'  => array(
			array(
				'setting'  => 'featured_post_type',
				'operator' => '==',
				'value'    => 'category',
			),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'checkbox',
		'settings'    => 'exclude_featured_category',
		'label'       => esc_attr__( 'Hide The Category Name', 'daily-news' ),
		'description' => esc_attr__( 'Hide the name of featurd category in the featured posts.', 'daily-news' ),
		'section'     => 'featured_settings',
		'default'     => false,
		'priority'    => 10,
		'required'  => array(
			array(
				'setting'  => 'featured_post_type',
				'operator' => '==',
				'value'    => 'category',
			),
		),
	) );

	Kirki::add_field( 'dn', array(
		'type'        => 'repeater',
		'settings'    => 'category_area',
		'label'       => esc_attr__( 'Category Area', 'daily-news' ),
		'description' => esc_attr__( 'Category section settings. Add or remove as many section as you want.', 'daily-news' ),
		'section'     => 'category_settings',
		'priority'    => 10,
		'default'     => array(
			array(
				'category_section_title' => '',
				'category_section_category'  => '',
				'category_section_layout' => 'layout1',
				'category_section_post_count' => 4,
			),
			array(
				'category_section_title' => '',
				'category_section_category'  => '',
				'category_section_layout' => 'layout2',
				'category_section_post_count' => 5,
			),
		),
		'fields' => array(
			'category_section_title' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Category Section Title', 'daily-news' ),
				'description' => esc_attr__( 'This will be the Title of the section.', 'daily-news' ),
				'default'     => '',
			),
			'category_section_category' => array(
				'type'        => 'select',
				'label'       => esc_attr__( 'Post Category', 'daily-news' ),
				'description' => esc_attr__( 'Choose a category. The posts in that category will be shown in this section.', 'daily-news' ),
				'default'     => '',
				'choices'     => get_categories_select(),
			),
			'category_section_layout' => array(
				'type'        => 'select',
				'label'       => esc_attr__( 'Section layout', 'daily-news' ),
				'description' => esc_attr__( 'Choose a layout for this section.', 'daily-news' ),
				'choices'     => array(
					''  => esc_attr__( 'Choose a layout', 'daily-news' ),
					'layout1' => esc_attr__( 'Layout One', 'daily-news' ),
					'layout2' => esc_attr__( 'Layout Two', 'daily-news' ),
					'layout3' => esc_attr__( 'Layout Three', 'daily-news' ),
					'layout4' => esc_attr__( 'Layout Four', 'daily-news' ),
				),
			),
			'category_section_post_count' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Number of Post', 'daily-news' ),
				'description' => esc_attr__( 'Number of post to be shown in this section.', 'daily-news' ),
				'default'     => 4,
			),

		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'show_home_sidebar',
		'label'       => esc_attr__( 'Sidebar On Home Page', 'daily-news' ),
		'description' => esc_attr__( 'Show / Hide the sidebar on the home page template.', 'daily-news' ),
		'section'     => 'home_sidebar_settings',
		'default'     => true,
		'priority'    => 10,
	) );
	
	// single post settings
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'share_links',
		'label'       => esc_attr__( 'Share Links', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the share section in single post view.', 'daily-news' ),
		'section'     => 'single_post',
		'default'     => true,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'author_box',
		'label'       => esc_attr__( 'Author Info section', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the Author info section in single post view.', 'daily-news' ),
		'section'     => 'single_post',
		'default'     => true,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'prev_next_post',
		'label'       => esc_attr__( 'Previous Next Post section', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the Previous Next Post section in single post view.', 'daily-news' ),
		'section'     => 'single_post',
		'default'     => true,
		'priority'    => 10,
	) );

	// footer settings
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'footer_widget_area',
		'label'       => esc_attr__( 'Footer Widget Area', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the widgetized area in the footer. Add or change the widgets from widget settings.', 'daily-news' ),
		'section'     => 'footer',
		'default'     => true,
		'priority'    => 10,
	) );

	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'custom_copyright',
		'label'       => esc_attr__( 'Custom Copyright text', 'daily-news' ),
		'description' => esc_attr__( 'Enable / Disabme custom copyright text in the footer.', 'daily-news' ),
		'section'     => 'footer',
		'default'     => false,
		'priority'    => 10,
	) );

	Kirki::add_field( 'dn', array(
		'type'        => 'textarea',
		'settings'    => 'custom_copyright_textbox',
		'label'       => esc_attr__( 'Enter Custom copyright text', 'daily-news' ),
		'description' => esc_attr__( 'Add custom copyright text here.', 'daily-news' ),
		'section'     => 'footer',
		'default'     => '',
		'priority'    => 10,
		'sanitize_callback' => 'filter_copyright_text',
		'required'  => array(
			array(
				'setting'  => 'custom_copyright',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );
	function filter_copyright_text($val) {
		return wp_kses( $val, array( 
		    'a' => array(
		        'href' => array(),
		        'title' => array()
		    ),
		    'br' => array(),
		    'em' => array(),
		    'strong' => array(),
		) );
	}

	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'feed_link',
		'label'       => esc_attr__( 'Feed link', 'daily-news' ),
		'description' => esc_attr__( 'Show / hide the RSS fees link. Disabling this will hide the RSS feed link at the footer.', 'daily-news' ),
		'section'     => 'footer',
		'default'     => true,
		'priority'    => 10,
	) );
	/*
	* header ad
	*/
	Kirki::add_field( 'dn', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'header_ad_type',
		'label'       => esc_attr__( 'Header Ad Type', 'daily-news' ),
		'description' => esc_attr__( 'Choose whether you will show image ad or Google Adsence code.', 'daily-news' ),
		'section'     => 'header_ad',
		'default'     => 'banner',
		'priority'    => 10,
		'choices'     => array(
			'banner'   => esc_attr__( 'Image Banner', 'daily-news' ),
			'code' => esc_attr__( 'Google Adsense Code', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'header_ad_image',
		'label'       => esc_attr__( 'Image URL', 'daily-news' ),
		'description' => esc_attr__( 'Image URL for header ad.', 'daily-news' ),
		'section'     => 'header_ad',
		'default'     => 'http://',
		'priority'    => 10,
		'required'  => array(
			array(
				'setting'  => 'header_ad_type',
				'operator' => '==',
				'value'    => 'banner',
			),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'header_ad_link',
		'label'       => esc_attr__( 'Link URL', 'daily-news' ),
		'description' => esc_attr__( 'Link URL for header ad.', 'daily-news' ),
		'section'     => 'header_ad',
		'default'     => 'http://',
		'priority'    => 10,
		'required'  => array(
			array(
				'setting'  => 'header_ad_type',
				'operator' => '==',
				'value'    => 'banner',
			),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'code',
		'settings'    => 'header_ad_code',
		'label'       => esc_attr__( 'Google Adsense Code', 'daily-news' ),
		'description' => esc_attr__( 'Google adsense code for header ad.', 'daily-news' ),
		'section'     => 'header_ad',
		'default'     => '',
		'priority'    => 10,
		'choices'     => array(
			'language' => 'css',
			'theme'    => 'monokai',
			'height'   => 250,
		),
		'required'  => array(
			array(
				'setting'  => 'header_ad_type',
				'operator' => '==',
				'value'    => 'code',
			),
		),
	) );
	/*
	* header ad
	*/
	Kirki::add_field( 'dn', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'front_page_ad_type',
		'label'       => esc_attr__( 'Header Ad Type', 'daily-news' ),
		'description' => esc_attr__( 'Choose whether you will show image ad or Google Adsence code.', 'daily-news' ),
		'section'     => 'front_page_ad',
		'default'     => 'banner',
		'priority'    => 10,
		'choices'     => array(
			'banner'   => esc_attr__( 'Image Banner', 'daily-news' ),
			'code' => esc_attr__( 'Google Adsense Code', 'daily-news' ),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'front_page_ad_image',
		'label'       => esc_attr__( 'Image URL', 'daily-news' ),
		'description' => esc_attr__( 'Image URL for header ad.', 'daily-news' ),
		'section'     => 'front_page_ad',
		'default'     => 'http://',
		'priority'    => 10,
		'required'  => array(
			array(
				'setting'  => 'front_page_ad_type',
				'operator' => '==',
				'value'    => 'banner',
			),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'text',
		'settings'    => 'front_page_ad_link',
		'label'       => esc_attr__( 'Link URL', 'daily-news' ),
		'description' => esc_attr__( 'Link URL for header ad.', 'daily-news' ),
		'section'     => 'front_page_ad',
		'default'     => 'http://',
		'priority'    => 10,
		'required'  => array(
			array(
				'setting'  => 'front_page_ad_type',
				'operator' => '==',
				'value'    => 'banner',
			),
		),
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'code',
		'settings'    => 'front_page_ad_code',
		'label'       => esc_attr__( 'Google Adsense Code', 'daily-news' ),
		'description' => esc_attr__( 'Google adsense code for header ad.', 'daily-news' ),
		'section'     => 'front_page_ad',
		'default'     => '',
		'priority'    => 10,
		'choices'     => array(
			'language' => 'js',
			'theme'    => 'monokai',
			'height'   => 250,
		),
		'required'  => array(
			array(
				'setting'  => 'front_page_ad_type',
				'operator' => '==',
				'value'    => 'code',
			),
		),
	) );
	/*
	* custom code
	*/
	Kirki::add_field( 'dn', array(
		'type'        => 'code',
		'settings'    => 'custom_css',
		'label'       => esc_attr__( 'Custom CSS', 'daily-news' ),
		'description' => esc_attr__( 'Enter your custom CSS code. It will be included in the head section of the site.', 'daily-news' ),
		'section'     => 'custom_code',
		'default'     => '',
		'priority'    => 10,
		'choices'     => array(
			'language' => 'css',
			'theme'    => 'monokai',
			'height'   => 250,
		)
	) );
	/*
	* color settings
	*/
	Kirki::add_field( 'dn', array(
		'type'		=> 'color',
		'settings'	=> 'theme_color',
		'label'		=> esc_attr__( 'Theme Color', 'daily-news' ),
		'section'	=> 'colors',
		'default' 	=> '#FF4444',
		'priority'	=> 1,
		'transport'	=> 'postMessage',
		
	) );
}

function get_categories_select() {
  $teh_cats = get_categories();
  $results = array(' ' => esc_html('- choose a category', 'daily-news'));
  $count = count($teh_cats);
  for ($i=0; $i < $count; $i++) {
    if (isset($teh_cats[$i]))
      $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}

// Output the customized style at the head of the site
function custom_theme_color_output() {
	$chosen_theme_color = get_theme_mod('theme_color');
	if ($chosen_theme_color != null) {
		echo '<style type="text/css">';
		echo 'a, a:hover, a:focus {color: '.$chosen_theme_color.';}';
		echo '.btn-default:hover,input[type="submit"]:hover,.btn-default:focus,input[type="submit"]:focus,.btn-default:active,input[type="submit"]:active {background:'.$chosen_theme_color.';}';
		echo '.btn-primary {background:'.$chosen_theme_color.';}';
		echo 'input[type="text"]:focus,input[type="email"]:focus,input[type="search"]:focus,input[type="url"]:focus,input[type="password"]:focus,textarea:focus,.form-control:focus {border: 1px solid '.$chosen_theme_color.';}';
		echo '::-moz-selection{background: '.$chosen_theme_color.';}';
		echo '::selection{background: '.$chosen_theme_color.';}';
		echo '.mejs-controls .mejs-time-rail .mejs-time-current{background: '.$chosen_theme_color.' !important;}';
		echo '.navbar .container #search-wrap input[type=text]:focus{border: 1px solid '.$chosen_theme_color.';}';
		echo '.navbar-default .navbar-nav li.current-menu-item > a,.navbar-default .navbar-nav li.current-menu-parent > a,.navbar-default .navbar-nav li.current-menu-ancestor > a{background-color: '.$chosen_theme_color.';}';
		echo '.navbar-default .navbar-toggle:focus{background: '.$chosen_theme_color.';}';
		echo '.secondary-bar-wrap{background: '.$chosen_theme_color.';}';
		echo '.secondary-bar .social-links li a:hover i{background: '.$chosen_theme_color.';}';
		echo '.latest-slider-wrap .slider-title{background: '.$chosen_theme_color.';}';
		echo '.latest-slider-wrap .slider-nav a i{background: '.$chosen_theme_color.';}';
		echo '.latest-slider-wrap .item-wrap .item .category ul li a{background: '.$chosen_theme_color.';}';
		echo '.latest-slider-wrap .item-wrap .item .heading:hover{color: '.$chosen_theme_color.';}';
		echo '.post-wrap .category-list ul li a{background: '.$chosen_theme_color.';}';
		echo '.category-wrap .category-name span{background: '.$chosen_theme_color.';}';
		echo '.category-wrap .category-name span:before{border-top: 35px solid '.$chosen_theme_color.';}';
		echo '.default-layout .post-wrap .title a:hover{color: '.$chosen_theme_color.';}';
		echo '.default-layout .post-wrap .post-meta span a:hover{color: '.$chosen_theme_color.';}';
		echo '.default-layout .post-wrap .permalink:hover{color: '.$chosen_theme_color.';}';
		echo '.pagination-wrap .pagination .newer-posts span,.pagination-wrap .pagination .older-posts span{background: '.$chosen_theme_color.';}';
		echo '.tag-wrap a:hover,.tag-wrap a:focus {color: '.$chosen_theme_color.';}';
		echo '.share-wrap .share-wrap-inner {background: '.$chosen_theme_color.';}';
		echo '.about-author .avatar {background: '.$chosen_theme_color.';}';
		echo '.about-author .details .author a:hover {color: '.$chosen_theme_color.';}';
		echo '.meta-info span i {background: '.$chosen_theme_color.';}';
		echo '.meta-info span a:hover {color: '.$chosen_theme_color.';}';
		echo '.prev-next-wrap .previous-post,.prev-next-wrap .next-post {background-color: '.$chosen_theme_color.';}';
		echo '.comment-container > ol li header .comment-details .commenter-name a:hover {color: '.$chosen_theme_color.';}';
		echo '.comment-container > ol li .comment-edit-link:hover {color: '.$chosen_theme_color.';}';
		echo '.comment-container .comment-respond .required {color: '.$chosen_theme_color.';}';
		echo '.format-quote .image-container blockquote {background: '.$chosen_theme_color.';}';
		echo '.author-cover .avatar {background: '.$chosen_theme_color.';}';
		echo '.flex-direction-nav a {background: '.$chosen_theme_color.';}';
		echo '.widget .title span {background: '.$chosen_theme_color.';}';
		echo '.widget .title span:before {border-top: 35px solid '.$chosen_theme_color.';}';
		echo '.widget a:hover,.widget a:focus {color: '.$chosen_theme_color.';}';
		echo '.widget ul li a:hover .post-count {background: '.$chosen_theme_color.'; border: 1px solid '.$chosen_theme_color.';}';
		echo '.widget.widget_tag_cloud a {background: '.$chosen_theme_color.';}';
		echo '.widget.widget_recent_entries ul li a:hover,.widget.widget_recent_entries ul li a:focus {color: '.$chosen_theme_color.';}';
		echo '.widget.widget_calendar table tbody a:hover, .widget.widget_calendar table tbody a:focus {background: '.$chosen_theme_color.';}';
		echo '.widget.widget_calendar table tfoot td a:hover,.widget.widget_calendar table tfoot td a:focus {color: '.$chosen_theme_color.';}';
		echo '.widget.widget_recent_comments ul li a:hover,.widget.widget_recent_comments ul li a:focus {color: '.$chosen_theme_color.';}';
		echo '.recent-post .recent-single-post a:hover .post-info h4 {color: '.$chosen_theme_color.';}';
		echo '.recent-post .recent-single-post a:hover .post-info .date {color: '.$chosen_theme_color.';}';
		echo '.main-footer input[type="text"]:focus,.main-footer input[type="email"]:focus,.main-footer input[type="search"]:focus,.main-footer input[type="url"]:focus,.main-footer input[type="password"]:focus,.main-footer textarea:focus,.main-footer .form-control:focus {border: 1px solid '.$chosen_theme_color.';}';
		echo '.main-footer .widget a:hover,.main-footer .widget a:focus {color: '.$chosen_theme_color.';}';
		echo '.main-footer .widget ul li a:hover .post-count {border: 1px solid '.$chosen_theme_color.';}';
		echo '.main-footer .widget.widget_tag_cloud a:hover {background: '.$chosen_theme_color.';}';
		echo '.main-footer .widget.widget_recent_entries ul li a:hover,.main-footer .widget.widget_recent_entries ul li a:focus {color: '.$chosen_theme_color.';}';
		echo '.main-footer .widget.widget_calendar table tfoot td a:hover,.main-footer .widget.widget_calendar table tfoot td a:focus {color: '.$chosen_theme_color.';}';
		echo '.main-footer .recent-post .recent-single-post a:hover .post-info h4 {color: '.$chosen_theme_color.';}';
		echo '#back-to-top i {background: '.$chosen_theme_color.';}';			
		echo '@media screen and (min-width: 767px) {.full-width .social-links{background: '.$chosen_theme_color.';}}';
		echo '@media screen and (max-width: 767px) {.navbar-default .navbar-nav li .submenu-button:hover, .navbar-default .navbar-nav li .submenu-button:focus{background: '.$chosen_theme_color.';}}';
		echo '</style>';
	}
}
add_action('wp_head', 'custom_theme_color_output');
// header text color
function custom_header_text_color(){
	$header_text_color = get_header_textcolor();
	if (!empty($header_text_color)) {
		echo '<style type="text/css">';
		echo '.header-content-wrap .logo.text-logo, .header-content-wrap .logo.text-logo:hover, .header-content-wrap .logo.text-logo:focus, .header-content-wrap .subtitle {color: #'.$header_text_color.';}';
		echo '</style>';
	}
}
add_action('wp_head', 'custom_header_text_color');
// live preview the changes
function daily_news_customizer_live_preview() {
	wp_enqueue_script('customizer-js', DAILY_NEWS_THEMEROOT.'/js/daily-news-customizer.js', array('jquery', 'customize-preview'), '', true );
}
add_action( 'customize_preview_init', 'daily_news_customizer_live_preview' );

function daily_news_theme_customizer( $wp_customize ) {
	/*====================================================
    	twiking available sewttings
    ====================================================*/
	$wp_customize->get_section( 'header_image' )->panel = 'header_settings';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'daily_news_theme_customizer' );