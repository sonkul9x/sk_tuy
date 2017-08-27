<?php
/******************************************************************************/
/***************************** Display Top Logo *******************************/
/******************************************************************************/

if(! function_exists('achau_display_top_logo'))
{
	function achau_display_top_logo()
	{
		$achau_options = get_option("achau_options");
		$site_name = get_bloginfo('name');
		
		$logo_html_code	= '<a href="'. esc_url(home_url('/')) .'" rel="home">';
		
		if((isset($achau_options['site_logo']['url'])) &&(trim($achau_options['site_logo']['url']) != "")) 
		{
			// Website Logo
			$site_logo 		 = $achau_options['site_logo']['url'];
			$logo_html_code	.= '<img class="site-logo" src="'. esc_url($site_logo) .'" alt="'. esc_attr($site_name) .'" />';
		}else{
			$logo_html_code	.= '<span class="logo-background">'. esc_html($site_name) .'</span>';
		}
		
		$logo_html_code .= '</a>';
		
		echo ($logo_html_code);
	}
}

/******************************************************************************/
/***************************** Display Logo Footer *******************************/
/******************************************************************************/

if(! function_exists('achau_display_logo_footer'))
{
	function achau_display_logo_footer()
	{
		$achau_options = get_option("achau_options");
		$site_name = get_bloginfo('name');
		
		$logo_html_code	= '<a href="'. esc_url(home_url('/')) .'" rel="home">';
		
		if((isset($achau_options['logo_footer']['url'])) &&(trim($achau_options['logo_footer']['url']) != "")) 
		{
			// Website Logo
			$logo_footer 		 = $achau_options['logo_footer']['url'];
			$logo_html_code	.= '<img class="site-logo" src="'. esc_url($logo_footer) .'" alt="'. esc_attr($site_name) .'" />';
		}
		else 
		{
			$logo_html_code	.= '<span class="logo-background">'. esc_html($site_name) .'</span>';
		}
		
		$logo_html_code .= '</a>';
		
		echo ($logo_html_code);
	}
}

/******************************************************************************/
/******************************* Sticky Menu **********************************/
/******************************************************************************/
function achau_sticky_header () {
	$achau_options = get_option("achau_options");
	
	$stickyJS = (isset($achau_options['sticky_menu']) && $achau_options['sticky_menu']) ? "sticky_menu = true;" : "sticky_menu = false;";
	
	wp_add_inline_script('achau-js', $stickyJS);
}
add_action('wp_head', 'achau_sticky_header');


if(! function_exists('achau_display_logo_sticky'))
{
	function achau_display_logo_sticky()
	{
		$achau_options = get_option("achau_options");
		$site_name = get_bloginfo('name');
		
		if((isset($achau_options['sticky_header_logo']['url'])) &&(trim($achau_options['sticky_header_logo']['url']) != "")) 
		{
			// Website Logo
			$site_logo 		 = $achau_options['sticky_header_logo']['url'];
			$logo_html_code	.= '<img class="site-logo" src="'. esc_url($site_logo) .'" alt="'. esc_attr($site_name) .'" />';
		}
		else 
		{
			$logo_html_code	= '<div class="sticky_logo"><a href="'. esc_url(home_url('/')) .'" rel="home">';
		
		}
		
		$logo_html_code .= '</a></div>';
		
		echo ($logo_html_code);
	}
}

//REDUX FRAMEWORK
/****** Remove Redux Demo Link ******/
function achau_removeDemoModeLink()
{
    if(class_exists('ReduxFrameworkPlugin')) {
        remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2);
    }
    if(class_exists('ReduxFrameworkPlugin')) {
        remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));    
    }
}
add_action('init', 'achau_removeDemoModeLink');

// Load the theme/plugin options
if(file_exists(get_template_directory() . '/inc/options-init.php')) {
	require_once(get_template_directory() . '/inc/options-init.php');
}

//
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});


function lang_object_ids($object_id, $type) {
	$current_language = ICL_LANGUAGE_CODE;
	if( is_array( $object_id ) ){
		$translated_object_ids = array();
		foreach ( $object_id as $id ) {
			$translated_object_ids[] = apply_filters( 'wpml_object_id', $id, $type, true, $current_language );
		}
		return $translated_object_ids;
	} else {
			return apply_filters( 'wpml_object_id', $object_id, $type, true, $current_language );
	}
}
