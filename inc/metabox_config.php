<?php
/**
 * Registering meta boxes
 */


if (!class_exists( 'evatheme_core' )) {
	return;
}


function evatheme_core_meta_array( $post = null ) {

	// Prefix
	$prefix = 'benedicta_';
	
	$theme_uri = get_template_directory_uri();

	// Define array
	$array = array();
	
	
	$visibility_options = array(
		'' => esc_html__( 'Default', 'benedicta' ),
		'show' => esc_html__( 'Shown', 'benedicta' ),
		'hide' => esc_html__( 'Hidden', 'benedicta' ),
	);

	
	if( get_page_template_slug() != "page-comingsoon.php" ) {
		
		// Main Tab
		$array['main'] = array(
			'title' => esc_html__( 'Main', 'benedicta' ),
			'post_type' => array( 'page' ),
			'settings' => array(
				'page_layout' =>array(
					'title' => esc_html__( 'Page Layout', 'benedicta' ),
					'type' => 'select',
					'id' => $prefix . 'page_layout',
					'description' => esc_html__( 'Select the layout for this page.', 'benedicta' ),
					'options' => array(
						'' => esc_html__( 'Default', 'benedicta' ),
						'full-width' => esc_html__( 'Full-Width', 'benedicta' ),
						'boxed' => esc_html__( 'Boxed', 'benedicta' ),
					),
				),
				'page_bg_color' => array(
					'title' 		=> esc_html__( 'Page Background Color', 'benedicta' ),
					'description' 	=> esc_html__( 'Select a color for page background.', 'benedicta' ),
					'id' 			=> $prefix .'page_bg_color',
					'type' 			=> 'color',
					'default' 		=> '',
				),
				'page_bg_image' => array(
					'title' => esc_html__( 'Page Background Image', 'benedicta'),
					'description' => esc_html__( 'Select a custom background image for your page.', 'benedicta' ),
					'id' => $prefix . 'page_bg_image',
					'type' => 'media',
				),
				'page_bg_repeat' => array(
					'title' 		=> esc_html__( 'Page Background Repeat', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'page_bg_repeat',
					'options' 		=> array(	
										''				=> esc_html__( 'Default', 'benedicta' ),
										'repeat'		=> esc_html__( 'Repeat', 'benedicta' ),
										'repeat-x'		=> esc_html__( 'Repeat-x', 'benedicta' ),
										'repeat-y'		=> esc_html__( 'Repeat-y', 'benedicta' ),
										'no-repeat' 	=> esc_html__( 'No Repeat',  'benedicta' )
									),
					'default' 		=> '',
				),
				'page_bg_attachment' => array(
					'title' 		=> esc_html__( 'Page Background Attachment', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'page_bg_attachment',
					'options' 		=> array(	
										''			=> esc_html__( 'Default', 'benedicta' ),
										'scroll'	=> esc_html__( 'Scroll', 'benedicta' ),
										'fixed'		=> esc_html__( 'Fixed', 'benedicta' )
									),
					'default' 		=> '',
				),
				'page_bg_position' => array(
					'title' 		=> esc_html__( 'Page Background Position', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'page_bg_position',
					'options' 		=> array(	
										'' 				=> esc_html__( 'Default', 'benedicta' ),
										'left top' 		=> esc_html__( 'Left Top', 'benedicta' ),
										'left center' 	=> esc_html__( 'Left Center', 'benedicta' ),
										'left bottom' 	=> esc_html__( 'Left Bottom', 'benedicta' ),
										'center top' 	=> esc_html__( 'Center Top', 'benedicta' ),
										'center center' => esc_html__( 'Center Center', 'benedicta' ),
										'center bottom' => esc_html__( 'Center Bottom', 'benedicta' ),
										'right top' 	=> esc_html__( 'Right Top', 'benedicta' ),
										'right center' 	=> esc_html__( 'Right Center', 'benedicta' ),
										'right bottom' 	=> esc_html__( 'Right Bottom', 'benedicta' )
									),
					'default' 		=> '',
				),
				'page_bg_full' => array(
					'title' 		=> esc_html__( 'Page Background Size', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'page_bg_full',
					'options' 		=> array(	
										'' 				=> esc_html__( 'Default', 'benedicta' ),
										'inherit' 		=> esc_html__( 'Inherit', 'benedicta' ),
										'cover' 		=> esc_html__( 'Cover', 'benedicta' )
									),
					'default' 		=> '',
				),
			),
		);

		// Header Tab
		$benedicta_header_layout = class_exists( 'ReduxFrameworkPlugin' ) ? benedicta_options('header-layout') : 'full_width';

		if ( $benedicta_header_layout != 'left_fixed' ) {

			$array['header'] = array(
				'title' => esc_html__( 'Header', 'benedicta' ),
				'post_type' => array( 'page' ),
				'settings' => array(
					'header_page_bg_style' => array(
						'title' => esc_html__( 'Header Background Style', 'benedicta' ),
						'id' => $prefix . 'header_page_bg_style',
						'type' => 'select',
						'description' => esc_html__( 'Select a background style for this header. settings of background color, transparency or settings of gradient will be taken from the Theme Options.', 'benedicta' ),
						'options' => array(
							'' => esc_html__( 'Default', 'benedicta' ),
							'gradient' => esc_html__( 'Gradient', 'benedicta' ),
							'bgcolor' => esc_html__( 'Background Color', 'benedicta' ),
							'bgline' => esc_html__( 'Bottom Line', 'benedicta' ),
						),
						'default' => '',
					),
				),
			);

		}

		// Title Tab
		$array['title'] = array(
			'title' => esc_html__( 'Title', 'benedicta' ),
			'post_type' => array( 'page' ),
			'settings' => array(
				'pagetitle' => array(
					'title' => esc_html__( 'Title', 'benedicta' ),
					'description' => esc_html__( 'Enable or disable title on this page or post.', 'benedicta' ),
					'id' => $prefix . 'pagetitle',
					'type' => 'select',
					'options' => $visibility_options,
					'default' => '',
				),
				'pagetitle_text' => array(
					'title' => esc_html__( 'Page Title', 'benedicta' ),
					'description' => esc_html__( 'Please enter the page title.', 'benedicta' ),
					'type' => 'text',
					'id' => $prefix . 'pagetitle_text',
				),
				'pagetitle_subtext' => array(
					'title' => esc_html__( 'Subheading', 'benedicta' ),
					'description' => esc_html__( 'Enter your page subheading.', 'benedicta' ),
					'type' => 'text',
					'id' => $prefix . 'pagetitle_subtext',
				),
				'pagetitle_style' => array(
					'title' => esc_html__( 'Title Style', 'benedicta' ),
					'description' => esc_html__( 'Select a custom title style for this page or post.', 'benedicta' ),
					'type' => 'select',
					'id' => $prefix . 'pagetitle_style',
					'options' => array(
						'' => esc_html__( 'Default', 'benedicta' ),
						'background-image' => esc_html__( 'Background Image', 'benedicta' ),
					),
				),
				'pagetitle_bg_color' => array(
					'title' 		=> esc_html__( 'Page Title Background Color', 'benedicta' ),
					'description' 	=> esc_html__( 'Select a color.', 'benedicta' ),
					'id' 			=> $prefix .'pagetitle_bg_color',
					'type' 			=> 'color',
					'default' 		=> '',
				),
				'pagetitle_bg_image' => array(
					'title' => esc_html__( 'Page Title Background Image', 'benedicta'),
					'description' => esc_html__( 'Select a custom header image for your main title.', 'benedicta' ),
					'id' => $prefix . 'pagetitle_bg_image',
					'type' => 'media',
				),
				'pagetitle_bg_repeat' => array(
					'title' 		=> esc_html__( 'Page Title Background Repeat', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'pagetitle_bg_repeat',
					'options' 		=> array(	
										''				=> esc_html__( 'Default', 'benedicta' ),
										'repeat'		=> esc_html__( 'Repeat', 'benedicta' ),
										'repeat-x'		=> esc_html__( 'Repeat-x', 'benedicta' ),
										'repeat-y'		=> esc_html__( 'Repeat-y', 'benedicta' ),
										'no-repeat' 	=> esc_html__( 'No Repeat',  'benedicta' )
									),
					'default' 		=> '',
				),
				'pagetitle_bg_attachment' => array(
					'title' 		=> esc_html__( 'Page Title Background Attachment', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'pagetitle_bg_attachment',
					'options' 		=> array(	
										''			=> esc_html__( 'Default', 'benedicta' ),
										'scroll'	=> esc_html__( 'Scroll', 'benedicta' ),
										'fixed'		=> esc_html__( 'Fixed', 'benedicta' )
									),
					'default' 		=> '',
				),
				'pagetitle_bg_position' => array(
					'title' 		=> esc_html__( 'Page Title Background Position', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'pagetitle_bg_position',
					'options' 		=> array(	
										''				=> esc_html__( 'Default', 'benedicta' ),
										'left top' 		=> esc_html__( 'Left Top', 'benedicta' ),
										'left center' 	=> esc_html__( 'Left Center', 'benedicta' ),
										'left bottom' 	=> esc_html__( 'Left Bottom', 'benedicta' ),
										'center top' 	=> esc_html__( 'Center Top', 'benedicta' ),
										'center center' => esc_html__( 'Center Center', 'benedicta' ),
										'center bottom' => esc_html__( 'Center Bottom', 'benedicta' ),
										'right top' 	=> esc_html__( 'Right Top', 'benedicta' ),
										'right center' 	=> esc_html__( 'Right Center', 'benedicta' ),
										'right bottom' 	=> esc_html__( 'Right Bottom', 'benedicta' )
									),
					'default' 		=> '',
				),
				'pagetitle_bg_full' => array(
					'title' 		=> esc_html__( 'Page Title Background Size', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'pagetitle_bg_full',
					'options' 		=> array(	
										''				=> esc_html__( 'Default', 'benedicta' ),
										'inherit' 		=> esc_html__( 'Inherit', 'benedicta' ),
										'cover' 		=> esc_html__( 'Cover', 'benedicta' )
									),
					'default' 		=> '',
				),
				'pagetitle_bg_image_parallax' => array(
					'title' 		=> esc_html__( 'Parallax Effect', 'benedicta' ),
					'description' 	=> esc_html__( 'Enable this to the parallax effect for background image.', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'pagetitle_bg_image_parallax',
					'options' 		=> array(	
										''		 		=> esc_html__( 'Default', 'benedicta' ),
										'disable' 		=> esc_html__( 'Disable', 'benedicta' ),
										'enable' 		=> esc_html__( 'Enable', 'benedicta' )
									),
					'default' 		=> '',
				),
				'pagetitle_text_color' => array(
					'title' 		=> esc_html__( 'Page Title Text Color', 'benedicta' ),
					'description' 	=> esc_html__( 'Select a text color.', 'benedicta' ),
					'id' 			=> $prefix .'pagetitle_text_color',
					'type' 			=> 'color',
					'default' 		=> '',
				),
				
				'breadcrumbs' => array(
					'title' => esc_html__( 'Breadcrumbs', 'benedicta' ),
					'description' => esc_html__( 'Enable or disable breadcrumbs on this page or post.', 'benedicta' ),
					'id' => $prefix . 'breadcrumbs',
					'type' => 'select',
					'options' => $visibility_options,
					'default' => '',
				),
			),
		);
		

		// Footer tab
		$array['footer'] = array(
			'title' => esc_html__( 'Footer', 'benedicta' ),
			'post_type' => array( 'page' ),
			'settings' => array(
				'enable_prefooter' => array(
					'title' => esc_html__( 'Prefooter Area', 'benedicta' ),
					'description' => esc_html__( 'Show or hide prefooter area.', 'benedicta' ),
					'id' => $prefix . 'enable_prefooter',
					'type' => 'select',
					'options' => $visibility_options,
					'default' => '',
				),
				'footer' => array(
					'title' => esc_html__( 'Footer Area', 'benedicta' ),
					'description' => esc_html__( 'Show or hide Footer Area.', 'benedicta' ),
					'id' => $prefix . 'footer',
					'type' => 'select',
					'options' => $visibility_options,
					'default' => '',
				),
				'footer_layout' => array(
					'title' => esc_html__( 'Footer Layout', 'benedicta' ),
					'id' => $prefix . 'footer_layout',
					'type' => 'select',
					'description' => esc_html__( 'You can choose between a full width style or a boxed style footer.', 'benedicta' ),
					'options' => array(
						'' => esc_html__( 'Default', 'benedicta' ),
						'full_width' => esc_html__( 'Full Width', 'benedicta' ),
						'boxed' => esc_html__( 'Boxed', 'benedicta' )
					),
					'default' => '',
				),
			),
		);
	}

	// Post tab
	$array['media'] = array(
		'title' => esc_html__( 'Post', 'benedicta' ),
		'post_type' => array( 'post' ),
		'settings' => array(
			'metro' => array(
				'title' => esc_html__( 'Masonry Item Sizing', 'benedicta' ),
				'description' => esc_html__( 'This will only be used if you choose to display your Blog Posts in the "Metro Style" in element settings', 'benedicta' ),
				'id' => $prefix . 'metro',
				'type' => 'select',
				'options' => array(
					'' => esc_html__( 'Default', 'benedicta' ),
					'width2' => esc_html__( 'Double Width', 'benedicta' ),
					'height2' => esc_html__( 'Double Height', 'benedicta' ),
					'wh2' => esc_html__( 'Double Width and Height', 'benedicta' ),
				),
				'default' => '',
			),
			'post_single_style' => array(
				'title' => esc_html__( 'Featured Image Style', 'benedicta' ),
				'description' => esc_html__( 'Select the style of a single post page. featured image in full screen or standard', 'benedicta' ),
				'id' => $prefix . 'post_single_style',
				'type' => 'select',
				'options' => array(
					'' => esc_html__( 'Default', 'benedicta' ),
					'fullscreen' => esc_html__( 'Full screen', 'benedicta' ),
					'featured_image_hide' => esc_html__( 'Hidden', 'benedicta' ),
				),
			),
			'post_quote_text' => array(
				'title' => esc_html__( 'Quote', 'benedicta' ),
				'description' => esc_html__( 'Write your quote in this field. Will show only for Quote Post Format.', 'benedicta' ),
				'id' => $prefix . 'post_quote_text',
				'type' => 'code',
				'rows' => '2',
			),
			'post_quote_author' => array(
				'title' => esc_html__( 'Quote Author', 'benedicta' ),
				'description' => esc_html__( 'Write your quote author in this field. Will show only for Quote Post Format.', 'benedicta' ),
				'id' => $prefix . 'post_quote_author',
				'type' => 'text',
			),
			'post_quote_author_position' => array(
				'title' => esc_html__( 'Quote Author Position', 'benedicta' ),
				'description' => esc_html__( 'Write your quote author position in this field. Will show only for Quote Post Format.', 'benedicta' ),
				'id' => $prefix . 'post_quote_author_position',
				'type' => 'text',
			),
			'post_link' => array(
				'title' => esc_html__( 'Link', 'benedicta' ),
				'description' => esc_html__( 'Write your link in this field. Will show only for Link Post Format.', 'benedicta' ),
				'id' => $prefix . 'post_link',
				'type' => 'text',
			),
			'post_gallery' => array(
				'title' => esc_html__( 'Gallery', 'benedicta' ),
				'description' => esc_html__( 'Select the images that should be upload to this gallery. Will show only for Gallery Post Format.', 'benedicta' ),
				'id' => 'gallery_image_ids',
				'type' => 'gallery',
			),
			'post_video_embed' => array(
				'title' => esc_html__( 'Video Embed Code', 'benedicta' ),
				'description' => esc_html__( 'Insert Youtube or Vimeo embed code. Videos will show only for Video Post Format.', 'benedicta' ),
				'id' => $prefix . 'post_video_embed',
				'type' => 'code',
				'rows' => '2',
			),
			'post_audio_embed' => array(
				'title' => esc_html__( 'Audio Embed Code', 'benedicta' ),
				'description' => esc_html__( 'Insert audio embed code. Audios will show only for Audio Post Format.', 'benedicta' ),
				'id' => $prefix . 'post_audio_embed',
				'type' => 'code',
				'rows' => '2',
			),
		),
	);


	// Portfolio Tab
	if ( class_exists( 'evatheme_core' ) ) {
		$array['portfolio'] = array(
			'title' => esc_html__( 'Portfolio', 'benedicta' ),
			'post_type' => array( 'portfolio' ),
			'settings' => array(
				'portfolio_single_layout' => array(
					'title' => esc_html__( 'Layout', 'benedicta' ),
					'description' => esc_html__( 'Select page layout for single portfolio', 'benedicta' ),
					'id' => $prefix . 'portfolio_single_layout',
					'type' => 'select',
					'options' => array(
						'full_width' => esc_html__( 'Full width (Description on top, images bottom)', 'benedicta' ),
						'half_width' => esc_html__( 'Half width (Description right, images left)', 'benedicta' ),
					),
				),
				'portfolio_single_description_box' => array(
					'title' => esc_html__( 'Description Box', 'benedicta' ),
					'description' => esc_html__( 'Show / Hide box with description', 'benedicta' ),
					'id' => $prefix . 'portfolio_single_description_box',
					'type' => 'select',
					'options' => $visibility_options,
				),
				'portfolio_single_client' => array(
					'title' => esc_html__( 'Client', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_client',
					'type' => 'text',
				),
				'portfolio_single_add_field_title' => array(
					'title' => esc_html__( 'Additional Field Title', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_add_field_title',
					'type' => 'text',
				),
				'portfolio_single_add_field' => array(
					'title' => esc_html__( 'Additional Field', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_add_field',
					'type' => 'text',
				),
				'portfolio_single_add_field_title2' => array(
					'title' => esc_html__( 'Additional Field Title 2', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_add_field_title2',
					'type' => 'text',
				),
				'portfolio_single_add_field2' => array(
					'title' => esc_html__( 'Additional Field 2', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_add_field2',
					'type' => 'text',
				),
				'portfolio_single_add_field_title3' => array(
					'title' => esc_html__( 'Additional Field Title 3', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_add_field_title3',
					'type' => 'text',
				),
				'portfolio_single_add_field3' => array(
					'title' => esc_html__( 'Additional Field 3', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_add_field3',
					'type' => 'text',
				),
				'portfolio_single_link' => array(
					'title' => esc_html__( 'Link', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_link',
					'type' => 'text',
				),
				'portfolio_single_link_name' => array(
					'title' => esc_html__( 'Link Name', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'portfolio_single_link_name',
					'type' => 'text',
				),
				'posrtfolio_single_iframe' => array(
					'title' => esc_html__( 'Embed Code', 'benedicta' ),
					'description' => esc_html__( 'Insert your embed/iframe code.', 'benedicta' ),
					'id' => $prefix . 'posrtfolio_single_iframe',
					'type' => 'code',
					'rows' => '2',
				),
				'portfolio_single_gallery' => array(
					'title' => esc_html__( 'Gallery', 'benedicta' ),
					'description' => esc_html__( 'Select the images that should be upload to this gallery. Will show only for Gallery Post Format.', 'benedicta' ),
					'id' => 'gallery_image_ids',
					'type' => 'gallery',
				),
				'portfolio_single_carousel_enable' => array(
					'title' => esc_html__( 'Gallery Carousel', 'benedicta' ),
					'description' => esc_html__( 'Enable this to show images in carousel.', 'benedicta' ),
					'id' => $prefix . 'portfolio_single_carousel_enable',
					'type' => 'select',
					'options' => array(
						'enable' => esc_html__( 'Enable', 'benedicta' ),
						'disable' => esc_html__( 'Disable', 'benedicta' ),
					),
				),
				'portfolio_single_carousel_layout' => array(
					'title' => esc_html__( 'Gallery Layout', 'benedicta' ),
					'description' => esc_html__( 'Enable this to show full width carousel. Only for "Full Width Layout"', 'benedicta' ),
					'id' => $prefix . 'portfolio_single_carousel_layout',
					'type' => 'select',
					'options' => array(
						'boxed' => esc_html__( 'Boxed', 'benedicta' ),
						'full_width' => esc_html__( 'Full_width', 'benedicta' ),
					),
				),
				'portfolio_single_grid_pullleft' => array(
					'title' => esc_html__( 'Images Position', 'benedicta' ),
					'description' => esc_html__( 'Enable the option to press all of the images to the left side of the monitor. Only for "Gallery Carousel -> Disable"', 'benedicta' ),
					'id' => $prefix . 'portfolio_single_grid_pullleft',
					'type' => 'select',
					'options' => array(
						'disable' => esc_html__( 'Disable', 'benedicta' ),
						'enable' => esc_html__( 'Enable', 'benedicta' ),
					),
				),
			),
		);
	}
	
	//	WooCommerce
	if ( class_exists( 'woocommerce' ) ) {
		$array['product'] = array(
			'title'    	=> esc_html__( 'Product Video', 'benedicta' ),
			'post_type' => array( 'product' ),
			'settings' 	=> array(
				'product_video_url' => array(
					'title' => esc_html__( 'Video URL', 'benedicta' ),
					'description' => esc_html__( 'Enter URL of Youtube or Vimeo or specific filetypes such as mp4, m4v, webm, ogv, wmv, flv.', 'benedicta' ),
					'id' => $prefix . 'product_video_url',
					'type' => 'text',
					'default' => false,
				),
				'product_video_thumbnail' => array(
					'title' => esc_html__( 'Video Thumbnail', 'benedicta' ),
					'description' => esc_html__( 'Add video thumbnail', 'benedicta' ),
					'id' => $prefix . 'product_video_thumbnail',
					'type' => 'media',
					'default' => false,
				),
			),
		);
	}
	
	if (get_page_template_slug() == "page-comingsoon.php") {
		
		//	Coming Soon Tab
		$benedicta_comings_soon_years = array('2016'=>'2016','2017'=>'2017','2018'=>'2018','2019'=>'2019','2020'=>'2020');
		$benedicta_comings_soon_months = array(
			'01'=>esc_html__('January','benedicta'),'02'=>esc_html__('February','benedicta'),'03'=>esc_html__('March','benedicta'),
			'04'=>esc_html__('April','benedicta'),'05'=>esc_html__('May','benedicta'),'06'=>esc_html__('June','benedicta'),
			'07'=>esc_html__('July','benedicta'),'08'=>esc_html__('August','benedicta'),'09'=>esc_html__('Septempber','benedicta'),
			'10'=>esc_html__('October','benedicta'),'11'=>esc_html__('November','benedicta'),'12'=>esc_html__('December','benedicta'));
		$benedicta_comings_soon_days = array(
			'01' => '1','02' => '2','03' => '3','04' => '4','05' => '5',
			'06' => '6','07' => '7','08' => '8','09' => '9','10' => '10',
			'11' => '11','12' => '12','13' => '13','14' => '14','15' => '15',
			'16' => '16','17' => '17','18' => '18','19' => '19','20' => '20',
			'21' => '21','22' => '22','23' => '23','24' => '24','25' => '25',
			'26' => '26','27' => '27','28' => '28','29' => '29','30' => '30','31' => '31',
		);
		
		$array['coming_soon'] = array(
			'title' => esc_html__( 'Coming Soon', 'benedicta' ),
			'post_type' => array( 'page' ),
			'settings' => array(
				'coming_soon_years' => array(
					'title' => esc_html__( 'Years', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'comings_soon_years',
					'type' => 'select',
					'options' => $benedicta_comings_soon_years,
					'default' => '2020',
				),
				'coming_soon_months' => array(
					'title' => esc_html__( 'Months', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'comings_soon_months',
					'type' => 'select',
					'options' => $benedicta_comings_soon_months,
					'default' => '01',
				),
				'coming_soon_days' => array(
					'title' => esc_html__( 'Days', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'comings_soon_days',
					'type' => 'select',
					'options' => $benedicta_comings_soon_days,
					'default' => '01',
				),
				'coming_soon_subtitle' => array(
					'title' => esc_html__( 'Subtitle', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'coming_soon_subtitle',
					'type' => 'text',
					'default' => 'The site is under construction',
				),
				'coming_soon_title' => array(
					'title' => esc_html__( 'Title', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'coming_soon_title',
					'type' => 'text',
					'default' => 'Coming Soon',
				),
				'coming_soon_descr' => array(
					'title' => esc_html__( 'Description', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'coming_soon_descr',
					'type' => 'text',
					'default' => 'If you have any questions please contact us by e-mail:',
				),
				'coming_soon_email' => array(
					'title' => esc_html__( 'E-mail', 'benedicta' ),
					'description' => '',
					'id' => $prefix . 'coming_soon_email',
					'type' => 'text',
					'default' => 'info@evatheme.com',
				),
				'coming_soon_bg_color' => array(
					'title' 		=> esc_html__( 'Background Color', 'benedicta' ),
					'description' 	=> '',
					'id' 			=> $prefix .'coming_soon_bg_color',
					'type' 			=> 'color',
					'default' 		=> '#4c4e50',
				),
				'coming_soon_bg_image' => array(
					'title' => esc_html__( 'Background Image', 'benedicta'),
					'description' => '',
					'id' => $prefix . 'coming_soon_bg_image',
					'type' => 'media',
				),
				'coming_soon_bg_repeat' => array(
					'title' 		=> esc_html__( 'Background Repeat', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'coming_soon_bg_repeat',
					'options' 		=> array(	
										'repeat'		=> esc_html__( 'Repeat', 'benedicta' ),
										'repeat-x'		=> esc_html__( 'Repeat-x', 'benedicta' ),
										'repeat-y'		=> esc_html__( 'Repeat-y', 'benedicta' ),
										'no-repeat' 	=> esc_html__( 'No Repeat',  'benedicta' )
									),
					'default' 		=> 'no-repeat',
				),
				'coming_soon_bg_attachment' => array(
					'title' 		=> esc_html__( 'Background Attachment', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'coming_soon_bg_attachment',
					'options' 		=> array(	
										'scroll'	=> esc_html__( 'Scroll', 'benedicta' ),
										'fixed'		=> esc_html__( 'Fixed', 'benedicta' )
									),
					'default' 		=> 'scroll',
				),
				'coming_soon_bg_position' => array(
					'title' 		=> esc_html__( 'Background Position', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'coming_soon_bg_position',
					'options' 		=> array(	
										'left top' 		=> esc_html__( 'Left Top', 'benedicta' ),
										'left center' 	=> esc_html__( 'Left Center', 'benedicta' ),
										'left bottom' 	=> esc_html__( 'Left Bottom', 'benedicta' ),
										'center top' 	=> esc_html__( 'Center Top', 'benedicta' ),
										'center center' => esc_html__( 'Center Center', 'benedicta' ),
										'center bottom' => esc_html__( 'Center Bottom', 'benedicta' ),
										'right top' 	=> esc_html__( 'Right Top', 'benedicta' ),
										'right center' 	=> esc_html__( 'Right Center', 'benedicta' ),
										'right bottom' 	=> esc_html__( 'Right Bottom', 'benedicta' )
									),
					'default' 		=> 'center center',
				),
				'coming_soon_bg_full' => array(
					'title' 		=> esc_html__( 'Background Size', 'benedicta' ),
					'type' 			=> 'select',
					'id' 			=> $prefix . 'coming_soon_bg_full',
					'options' 		=> array(	
										'inherit' 		=> esc_html__( 'Inherit', 'benedicta' ),
										'cover' 		=> esc_html__( 'Cover', 'benedicta' )
									),
					'default' 		=> 'cover',
				),
			),
		);
	}

	// Apply filter & return settings array
	return apply_filters( 'evatheme_core_metabox_array', $array, $post );

}