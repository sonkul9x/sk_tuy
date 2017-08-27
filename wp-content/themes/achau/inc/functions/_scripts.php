<?php

/******************************************************************************/
/**************************** Enqueue styles **********************************/
/******************************************************************************/

// Fontend
if(! function_exists('achau_styles'))
{
	function achau_styles() 
	{
		$achau_options = get_option("achau_options");
		
		if($achau_options['enable_less']){
			$theme_variables = array(
				'text_color'=> $achau_options['text_color'],
				'main_color' => $achau_options['main_color'],
				'main_color_2' => $achau_options['main_color_2'],
			);
			if( function_exists('compileLessFile') ){
				compileLessFile('theme.less', 'theme.css', $theme_variables);
			}
		}
		// Load common css files
		wp_enqueue_style('jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), '1.12.1', 'all');
		wp_enqueue_style('materialize', get_template_directory_uri() . '/assets/css/materialize.css', array(), '0.98.1', 'all');
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.6.3', 'all');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.7', 'all');
		wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/assets/css/bootstrap-theme.min.css', array(), '3.3.7', 'all');
		wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', array(), '2.2.1', 'all');
		wp_enqueue_style('owl-theme-default', get_template_directory_uri() . '/assets/css/owl.theme.default.css', array(), '2.2.1', 'all');
		wp_enqueue_style('material-design-iconic-font', get_template_directory_uri() . '/assets/css/material-design-iconic-font.min.css', array(), '2.2.0', 'all');
		wp_enqueue_style('sumoselect', get_template_directory_uri() . '/assets/css/sumoselect.css', array(), '1.0.0', 'all');
		wp_enqueue_style('nanoscroller', get_template_directory_uri() . '/assets/css/nanoscroller.css', array(), '1.0.0', 'all');
		
		wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '1.0', 'all');
		wp_enqueue_style('achau-common', get_template_directory_uri() . '/assets/css/common.css', array(), '1.0', 'all');
		wp_enqueue_style('achau-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), '1.0', 'all');
		wp_enqueue_style('achau-style', get_stylesheet_uri() , array(), '1.0', 'all');
	}
}
add_action('wp_enqueue_scripts', 'achau_styles', 99);


/******************************************************************************/
/*************************** Enqueue scripts **********************************/
/******************************************************************************/

// frontend
if(! function_exists('achau_scripts'))
{
	function achau_scripts() 
	{		
		$achau_options = get_option("achau_options");
	
		wp_enqueue_script('jquery-custom', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), '2.1.1', FALSE);
		wp_enqueue_script('jquery-ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.12.1', FALSE);
		wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'), '1.0.0', FALSE);
		wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/assets/js/jquery.validate.js', array('jquery'), '1.17.0', FALSE);
		wp_enqueue_script('achau-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array('jquery'), '1.0.0', FALSE);
		/** In Footer **/
		wp_enqueue_script('materialize', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js', array('jquery'), '0.98.1', FALSE);
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', TRUE);
		wp_enqueue_script('touchswipe', get_template_directory_uri() . '/assets/js/jquery.touchSwipe.min.js', array('jquery'), '1.6.5', TRUE);
		wp_enqueue_script('nanoscroller', get_template_directory_uri() . '/assets/js/jquery.nanoscroller.min.js', array('jquery'), '0.7.6', TRUE);
		wp_enqueue_script('jquery-nicescroll', get_template_directory_uri() . '/assets/js/jquery.nicescroll.min.js', array('jquery'), '3.7.6', TRUE);
		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array('jquery'), '2.2.1', TRUE);
		
		if(is_page('company') || is_page('cong-ty')){
			wp_enqueue_script('jquery-onepage-scroll', get_template_directory_uri() . '/assets/js/jquery.onepage-scroll.js', array('jquery'), '1.3.1', TRUE);
		}
		
		// Add Fancybox
		wp_enqueue_script('jquery-fancybox', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true);
		wp_enqueue_style('jquery-fancybox', get_template_directory_uri() . '/assets/js/fancybox/jquery.fancybox.css', array(), '2.1.5');
		wp_enqueue_script('jquery-fancybox-buttons', get_template_directory_uri() . '/assets/js/fancybox/helpers/jquery.fancybox-buttons.js', array('jquery'), '1.0.5', true);
		wp_enqueue_style('jquery-fancybox-buttons', get_template_directory_uri() . '/assets/js/fancybox/helpers/jquery.fancybox-buttons.css', array(), '1.0.5');
		
		wp_enqueue_script('achau-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '1.0', TRUE);
		
		if(is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
		
		/** In Header **/		
		wp_add_inline_script('achau-js', 'var achau_ajaxurl = "'. esc_url(admin_url('admin-ajax.php', 'relative')) .'";');
	}
}
add_action('wp_enqueue_scripts', 'achau_scripts', 99);