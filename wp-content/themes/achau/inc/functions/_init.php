<?php
/******************************************************************************/
/************************* Register widget area *******************************/
/******************************************************************************/
if(! function_exists('achau_widgets_init'))
{
	function achau_widgets_init()
	{
		register_sidebar(array(
			'name'          => esc_html__('Sidebar', 'achau'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Widget on Blog Page', 'achau'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title' 	=> '<div class="widget-title"><h3>',
			'after_title' 	=> '</h3></div>',
		));
		
		register_sidebar(array(
			'name'          => esc_html__('Footer Column 02', 'achau'),
			'id'            => 'footer-2',
			'description'   => esc_html__('Widget on Footer Column 02', 'achau'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title' 	=> '<div class="widget-title"><h3>',
			'after_title' 	=> '</h3></div>',
		));
		
		register_sidebar(array(
			'name'          => esc_html__('Footer Column 04', 'achau'),
			'id'            => 'footer-4',
			'description'   => esc_html__('Widget on Footer Column 04', 'achau'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title' 	=> '<div class="widget-title"><h3>',
			'after_title' 	=> '</h3></div>',
		));
		
		
		register_sidebar(array(
			'name'          => esc_html__('Most Viewed Products', 'achau'),
			'id'            => 'most-viewed-product',
			'description'   => esc_html__('Widget on Recently Viewed Products Tab', 'achau'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title' 	=> '<div class="widget-title"><h3>',
			'after_title' 	=> '</h3></div>',
		));
		
		register_sidebar(array(
			'name'          => esc_html__('Recently Viewed Product', 'achau'),
			'id'            => 'recently-viewed-product',
			'description'   => esc_html__('Widget on Recently Viewed Products Tab', 'achau'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title' 	=> '<div class="widget-title"><h3>',
			'after_title' 	=> '</h3></div>',
		));
		
		register_sidebar(array(
			'name' 			=> esc_html__('Top Languages', 'achau'),
			'id' 			=> 'top-lang',
			'class' 		=> 'top-lang',
			'description' 	=> esc_html__('Widget Languages Switches', 'achau'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<div class="widget-title"><h3>',
			'after_title' 	=> '</h3></div>',
		));
		register_sidebar(array(
			'name' 			=> esc_html__('Top Account', 'achau'),
			'id' 			=> 'top-account',
			'class' 		=> 'top-account',
			'description' 	=> esc_html__('Widget My Account', 'achau'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<div class="widget-title"><h3>',
			'after_title' 	=> '</h3></div>',
		));
		register_sidebar(array(
			'name' 			=> esc_html__('Top Search', 'achau'),
			'id' 			=> 'top-search',
			'class' 		=> 'top-search',
			'description' 	=> esc_html__('Widget Search', 'achau'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<div class="widget-title"><h3>',
			'after_title' 	=> '</h3></div>',
		));
	}
}
add_action('widgets_init', 'achau_widgets_init');