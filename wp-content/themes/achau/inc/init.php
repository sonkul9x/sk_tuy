<?php 
/**
 * Include Functions
 */
require_once(get_template_directory() . '/inc/functions/_setup.php');
require_once(get_template_directory() . '/inc/functions/_init.php');
require_once(get_template_directory() . '/inc/functions/_scripts.php');
require_once(get_template_directory() . '/inc/functions/_extras.php');
require_once(get_template_directory() . '/inc/functions/_woo.php');


/**
 * Include Library
 * Load file in INC folder
 */
include_once(get_template_directory() . '/inc/template-tags.php');

include_once(get_template_directory() . '/inc/breadcrumb.php');

include_once(get_template_directory() . '/inc/custom-menu/custom-menu.php');

// Brand Logos Carousel Widget
include_once(get_template_directory() . '/inc/widgets/brand-carousel.php');

// Social Media Widget
include_once(get_template_directory() . '/inc/widgets/social-media.php');

// Register Post Type
include_once(get_template_directory() . '/inc/custom-post-type.php');

// Ajax
include_once(get_template_directory() . '/inc/ajax.php');

//Shortcode VC
include_once(get_template_directory() . '/inc/shortcode/vc_timer.php');
include_once(get_template_directory() . '/inc/shortcode/vc_person.php');
include_once(get_template_directory() . '/inc/shortcode/vc_profile.php');
include_once(get_template_directory() . '/inc/shortcode/vc_certify.php');