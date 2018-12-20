<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'daily_news_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function daily_news_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'daily_news_';

	// metabox for link post format
	$meta_boxes[] = array(
		'id'			=> 'featuredmetabox',
		'title'			=> esc_html__('Featured Post', 'daily-news'),
		'post_types'	=> array('post'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(
			// Featured check box
			array(
				'name'	=> esc_html__('Feature this post', 'daily-news'),
				'id'	=> "{$prefix}featured",
				'desc'	=> esc_html__('Check this to feature this post.', 'daily-news'),
				'type'	=> 'checkbox',

			)
		)
	);

	// metabox for link post format
	$meta_boxes[] = array(
		'id'			=> 'linkmetabox',
		'title'			=> esc_html__('Link Format Post Options', 'daily-news'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(
			// Link text box
			array(
				'name'	=> esc_html__('URL', 'daily-news'),
				'id'	=> "{$prefix}url",
				'desc'	=> esc_html__('Paste the URL here', 'daily-news'),
				'type'	=> 'text',

			)
		)
	);

	// metabox for audio post format
	$meta_boxes[] = array(
		'id'			=> 'audiometabox',
		'title'			=> esc_html__('Audio Format Post Options', 'daily-news'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> esc_html__( 'Audio Host Type', 'daily-news' ),
				'id'	=> "{$prefix}audio_host_type",
				'type'	=> 'radio',
				'options' => array(
					'embeded' => esc_html__( 'Embed Code', 'daily-news' ),
					'selfhosted' => esc_html__( 'Self Hosted', 'daily-news' ),
				),
				'std'	=> 'embeded',
			),
			array(
				'name'	=> esc_html__('Audio Embed Code', 'daily-news'),
				'id'	=> "{$prefix}audio_embed_code",
				'desc'	=> esc_html__('Paste the embed code here. If you want to use self hosted, you may leave it blank and choose self hosted option above.', 'daily-news'),
				'type'	=> 'textarea',
				'class' => 'field-embed'

			),
			array(
				'name'	=> esc_html__( 'Upload Audio File', 'daily-news' ),
				'id'	=> "{$prefix}shaudio",
				'type'	=> 'file_advanced',
				'class' => 'field-sh',
				'desc'	=> esc_html__( 'Upload or select your self hosted audio. If you want to use embed code. you may leave it blank and choose embed code option above.', 'daily-news' ),
				'mime_type'	 => 'audio', // Leave blank for all file types
			),
			

		)
	);

	// metabox for video post format
	$meta_boxes[] = array(
		'id'			=> 'videometabox',
		'title'			=> esc_html__('Video Format Post Options', 'daily-news'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> esc_html__( 'Video Host Type', 'daily-news' ),
				'id'	=> "{$prefix}video_host_type",
				'type'	=> 'radio',
				'options' => array(
					'embeded' => esc_html__( 'Embed Code', 'daily-news' ),
					'selfhosted' => esc_html__( 'Self Hosted', 'daily-news' ),
				),
				'std'	=> 'embeded',
			),
			array(
				'name'	=> esc_html__('Video Embed Code', 'daily-news'),
				'id'	=> "{$prefix}video_embed_code",
				'desc'	=> esc_html__('Paste the embed code here. If you want to use self hosted, you may leave it blank and choose self hosted option above.', 'daily-news'),
				'type'	=> 'textarea',
				'class' => 'field-embed'
			),
			array(
				'name'	=> esc_html__( 'Upload Video File', 'daily-news' ),
				'id'	=> "{$prefix}shvideo",
				'type'	=> 'file_advanced',
				'class' => 'field-sh',
				'desc'	=> esc_html__( 'Upload or select your self hosted Video. If you want to use embed code. you may leave it blank and choose embed code option above.', 'daily-news' ),
				'max_file_uploads' => 1,
				'mime_type'	 => 'video', // Leave blank for all file types
			)
		)
	);

// metabox for quote post format
	$meta_boxes[] = array(
		'id'			=> 'quotemetabox',
		'title'			=> esc_html__('Quote Format Post Options', 'daily-news'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> esc_html__( 'Quote Content', 'daily-news' ),
				'id'	=> "{$prefix}quote_content",
				'type'	=> 'textarea',
				'desc'	=> esc_html__('Please type the text of your quote here.', 'daily-news'),
			),
			array(
				'name'	=> esc_html__( 'Quote Source Name', 'daily-news' ),
				'id'	=> "{$prefix}quote_source_name",
				'type'	=> 'text',
				'desc'	=> esc_html__('Type the author name / name of the quote source.', 'daily-news'),
			),
			array(
				'name'	=> esc_html__('Quote Source Link (URL)', 'daily-news'),
				'id'	=> "{$prefix}quote_source_link",
				'type'	=> 'text',
				'desc'	=> esc_html__('Paste the link of the quote source. The author name will be linked to this link.', 'daily-news')
			),
		)
	);

	// metabox for status post format
	$meta_boxes[] = array(
		'id'			=> 'statusmetabox',
		'title'			=> esc_html__('Status Format Post Options', 'daily-news'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> esc_html__( 'Status Type', 'daily-news' ),
				'id'	=> "{$prefix}status_type",
				'type'	=> 'radio',
				'options' => array(
					'twitter' => esc_html__( 'Twitter Status', 'daily-news' ),
					'facebook' => esc_html__( 'Facebook Status', 'daily-news' ),
				),
				'std'	=> 'twitter',
				'desc'	=> esc_html__('Choose the status type you wnt to post', 'daily-news')
			),
			array(
				'name'	=> esc_html__('Status link (URL)', 'daily-news'),
				'id'	=> "{$prefix}status_link",
				'desc'	=> esc_html__('Paste the Link of the status', 'daily-news'),
				'type'	=> 'text',
			),
		)
	);
	// metabox for gallery post format
	$meta_boxes[] = array(
		'id'			=> 'gallerymetabox',
		'title'			=> esc_html__('Gallery Format Post Options', 'daily-news'),
		'post_types'	=> array('post', 'page'),
		'context'		=> 'normal',
		'priority'		=> 'high',
		'autosave'		=> true,
		'fields' 		=> array(

			array(
				'name'	=> esc_html__( 'Gallery Type', 'daily-news' ),
				'id'	=> "{$prefix}gallery_type",
				'type'	=> 'radio',
				'options' => array(
					'slider' => esc_html__( 'Slider Gallery', 'daily-news' ),
					'tiled' => esc_html__( 'Tiled Gallery', 'daily-news' ),
				),
				'std'	=> 'slider',
				'desc'	=> esc_html__('Choose the Gallery type you wnt to display', 'daily-news')
			),
			array(
				'name'	=> esc_html__('Upload or Choose Images', 'daily-news'),
				'id'	=> "{$prefix}gallery_images",
				'desc'	=> esc_html__('Choose or upload images for this gallery', 'daily-news'),
				'type'	=> 'file_advanced',
				'mime_type'	 => 'image'
			),
		)
	);
	return $meta_boxes;
}