<?php
if(! function_exists('achau_setup'))
{
	function achau_setup()
	{		
				
		// Make theme available for translation.
		load_theme_textdomain('achau', get_template_directory() . '/languages');
		
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// Let WordPress manage the document title.
		add_theme_support('title-tag');

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');
		
		// Enable support for WooCommerce
		add_theme_support('woocommerce');
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' 				=> esc_html__('Primary Menu', 'achau'),
		));

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));
		
		// Enable support for Post Formats.
		add_theme_support('post-formats', array(
			'video',
		));
		
		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('achau_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
		
		add_theme_support( "custom-header", array(
			'default-color' => '',
		));
		
		// Post Thumbnails Size
		set_post_thumbnail_size(1170, 9999); // Unlimited height, soft crop
		add_image_size('post_featured', 620, 387, true); //(cropped)
		add_image_size('post_sticky', 490, 260, true); //(cropped)
		add_image_size('post_category', 360, 191, true); //(cropped)
		add_image_size('post_thumb_1', 100, 100, true); //(cropped)
		add_image_size('post_thumb_2', 65, 65, true); //(cropped)
		add_image_size('post_carousel_1', 360, 200, true); //(cropped)
		add_image_size('post_carousel_2', 490, 310, true); //(cropped)
		add_image_size('post_category_3', 360, 226, true); //(cropped)
		add_image_size('post_category_4', 620, 387, true); //(cropped)
		add_image_size('post_video_thumb', 226, 127, true); //(cropped)
		add_image_size('gallery_image_list', 490, 330, true); //(cropped)
		add_image_size('gallery_image', 900, 550, true); //(cropped)
		add_image_size('gallery_image_thumb', 120, 120, true); //(cropped)
	}
}
add_action('after_setup_theme', 'achau_setup');

/******************************************************************************/
/******************** Set the content width in pixels *************************/
/******************************************************************************/

if(! function_exists('achau_content_width'))
{
	function achau_content_width() {
		$GLOBALS['content_width'] = apply_filters('achau_content_width', 640);
	}
}
add_action('after_setup_theme', 'achau_content_width', 0);


/****** Return Global Variables ******/
if(! function_exists('achau_global_variable'))
{
	function achau_global_variable($variable) {
		global $variable;
		return $variable;
	}
}

// get all files from a folder
if(! function_exists('achau_get_all_files'))
{
	function achau_get_all_files($dir)
	{
		global $wp_filesystem;
		
		if(empty($wp_filesystem)) {
			require_once (ABSPATH . '/wp-admin/includes/file.php');
			WP_Filesystem();
		}
		
		$result = array();
		$cdir  	= $wp_filesystem->dirlist($dir);
		
		foreach($cdir as $key => $value)
		{
			if(!in_array($key, array(".", "..")))
			{
				if(is_file($dir . DIRECTORY_SEPARATOR . $key))
				{
					$result[] = $key;
				}			
			}
		}
		
		return $result;
	}
}

//Add less compiler
function compileLessFile($input, $output, $params) {
    // include lessc.inc
    require_once( get_template_directory() .'/inc/less/lessc.inc.php' );
	
	$less = new lessc;
	$less->setVariables($params);
	
    // input and output location
    $inputFile = get_template_directory() .'/assets/less/'.$input;
    $outputFile = get_template_directory() .'/assets/css/'.$output;

    $less->compileFile($inputFile, $outputFile);
}
