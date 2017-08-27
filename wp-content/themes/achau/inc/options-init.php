<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if(! class_exists('Redux')) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "achau_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => $opt_name,
        'display_name' => $theme->get('Name'),
        'display_version' => 'v.' . $theme->get('Version'),
        'page_slug' => 'achau',
        'page_title' => $theme->get('Name'),
        'update_notice' => FALSE,
        'intro_text' => '',
        'footer_text' => esc_html__('Copyright &copy; 2017 ', 'achau') . $theme->get('Name') . esc_html__('. All Rights Reserved.', 'achau'),
        'admin_bar' => TRUE,
        'menu_type' => 'menu',
        'menu_title' => __('Theme Options', 'achau'),
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'page_priority' => '3',
        'customizer' => FALSE,
        'default_mark' => '*',
		'global_variable' => 'achau_options',
        'hints' => array(
            'icon' => 'el el-adjust-alt',
            'icon_position' => 'right',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
			),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
			),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
				),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
				),
			),
		),
        'output' => TRUE,
        'output_tag' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
		'show_options_object' => false,
        'database' => '',
        'transient_time' => '3600',
        'network_sites' => TRUE,
		'dev_mode' => false,
		'forced_dev_mode_off' => TRUE,
		'disable_tracking' => TRUE,
	);

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/vinawebsolutions/',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
	);
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/vnwebsolutions',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
	);
	
	if(! isset($args['global_variable']) || $args['global_variable'] !== false) {
        if(! empty($args['global_variable'])) {
            $v = $args['global_variable'];
        } 
		else {
            $v = str_replace('-', '_', $args['opt_name']);
        }
    }
	
    Redux::setArgs($opt_name, $args);

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__('Theme Information 1', 'achau'),
            'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'achau')
		),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__('Theme Information 2', 'achau'),
            'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'achau')
		)
	);
    Redux::setHelpTab($opt_name, $tabs);

    // Set the help sidebar
    $content = __('<p>This is the sidebar content, HTML is allowed.</p>', 'achau');
    Redux::setHelpSidebar($opt_name, $content);


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */
	
	Redux::setSection($opt_name, array(
        'icon'   => 'el-icon-cog',
        'title'  => esc_html__('General', 'achau'),
        'fields' => array(
			
			array(
                'title' => esc_html__('Logo', 'achau'),
                'subtitle' => __('<em>Upload your logo image.</em>', 'achau'),
                'id' => 'site_logo',
                'type' => 'media',
                'default' => array(
                    'url' => '',
				),
			),
			array(
                'title' => esc_html__('Logo Width', 'achau'),
                'subtitle' => __('<em>Drag the slider to set the logo container min width.</em>', 'achau'),
                'id' => 'logo_min_height',
                'type' => 'slider',
                "default" => 230,
                "min" => 0,
                "step" => 1,
                "max" => 600,
                'display_value' => 'text',
			),
            
            array(
                'title' => esc_html__('Logo Height', 'achau'),
                'subtitle' => __('<em>Drag the slider to set the logo height <br/>(ignored if there\'s no uploaded logo).</em>', 'achau'),
                'id' => 'logo_height',
                'type' => 'slider',
                "default" => 62,
                "min" => 0,
                "step" => 1,
                "max" => 300,
                'display_value' => 'text',
			),
			
            array(
				'id'        => 'theme_loading',
				'type'      => 'switch',
				'title'     => esc_html__('Show Loading Page', 'achau'),
				'default'   => false,
			),
      ),        
  ));
	
	
    Redux::setSection($opt_name, array(
        'icon'   => 'el el-arrow-up',
        'title'  => esc_html__('Header', 'achau'),
        'fields' => array(
			array(
                'title' => esc_html__('Sticky Menu', 'achau'),
                'subtitle' => __('<em>Enable / Disable the Sticky Menu Bar.</em>', 'achau'),
                'id' => 'sticky_menu',
                'on' => esc_html__('Enabled', 'achau'),
                'off' => esc_html__('Disabled', 'achau'),
                'type' => 'switch',
                'default' => 1,
			),
			array(
                'title' => esc_html__('Link Account', 'achau'),
                'subtitle' => __('<em>Type link.</em>', 'achau'),
                'id' => 'ft_link_account',
                'type' => 'text',
                'default' => '',
			),
			array(
                'title' => esc_html__('Link Account VI', 'achau'),
                'subtitle' => __('<em>Type link.</em>', 'achau'),
                'id' => 'ft_link_account_vi',
                'type' => 'text',
                'default' => '',
			),
		),
	));
	
    Redux::setSection($opt_name, array(
        'icon'    => 'el el-arrow-down',
        'title'   => esc_html__('Footer', 'achau'),
        'fields'  => array(
			array(
                'title' => esc_html__('Logo Footer', 'achau'),
                'subtitle' => __('<em>Upload your logo image.</em>', 'achau'),
                'id' => 'logo_footer',
                'type' => 'media',
                'default' => array(
                    'url' => '',
				),
			),
			array(
                'title' => esc_html__('Caption Text', 'achau'),
                'subtitle' => __('<em>Type something text.</em>', 'achau'),
                'id' => 'ft_caption_text',
                'type' => 'text',
                'default' => '#',
			),
			array(
                'title' => esc_html__('Caption Text VI', 'achau'),
                'subtitle' => __('<em>Type something text.</em>', 'achau'),
                'id' => 'ft_caption_text_vi',
                'type' => 'text',
                'default' => '#',
			),
			array(
                'title' => esc_html__('Copyright Text', 'achau'),
                'subtitle' => __('<em>Type something text.</em>', 'achau'),
                'id' => 'copyright_text',
                'type' => 'editor',
                'default' => '',
			),
		),
	));
	
	Redux::setSection($opt_name, array(
        'icon'    => 'el el-ok',
        'title'   => esc_html__('Contact Information', 'achau'),
		'subsection' => true,
        'fields'  => array(
			array(
                'title' => esc_html__('Address', 'achau'),
                'subtitle' => __('<em>Type something text.</em>', 'achau'),
                'id' => 'ft_address',
                'type' => 'text',
                'default' => '',
			),
			array(
                'title' => esc_html__('Address VI', 'achau'),
                'subtitle' => __('<em>Type something text.</em>', 'achau'),
                'id' => 'ft_address_vi',
                'type' => 'text',
                'default' => '',
			),
			array(
                'title' => esc_html__('Email', 'achau'),
                'subtitle' => __('<em>Type something text.</em>', 'achau'),
                'id' => 'ft_email',
                'type' => 'text',
                'default' => 'thuyachauct@gmail.com',
			),
			array(
                'title' => esc_html__('Phone Number', 'achau'),
                'subtitle' => __('<em>Type something text.</em>', 'achau'),
                'id' => 'ft_phone_1',
                'type' => 'text',
                'default' => '(0710)3 913.347',
			),
			array(
                'title' => esc_html__('Phone Number 2', 'achau'),
                'subtitle' => __('<em>Type something text.</em>', 'achau'),
                'id' => 'ft_phone_2',
                'type' => 'text',
                'default' => '(0710)3 913.348',
			),
		),
	));

	Redux::setSection($opt_name, array(
        'icon'    => 'el el-arrow-down',
        'title'   => esc_html__('News', 'achau'),
        'fields'  => array(
			array(
				'id'          => 'choose_cat_1',
				'type'        => 'select',
				'title'       => esc_html__('Choose Category', 'achau'),
				'subtitle' => __('<em>Choose category in section product news.</em>', 'achau'),
				'data' 		=> 'category',
			),
			
			array(
				'id'          => 'choose_cat_2',
				'type'        => 'select',
				'title'       => esc_html__('Choose Category', 'achau'),
				'subtitle' => __('<em>Choose category in section events.</em>', 'achau'),
				'data' 		=> 'category',
			),
			
			array(
				'id'          => 'choose_cat_3',
				'type'        => 'select',
				'title'       => esc_html__('Choose Category', 'achau'),
				'subtitle' => __('<em>Choose category in section internal news.</em>', 'achau'),
				'data' 		=> 'category',
			),
			array(
				'id'          => 'choose_cat_4',
				'type'        => 'select',
				'title'       => esc_html__('Choose Category', 'achau'),
				'subtitle' => __('<em>Choose category in section career.</em>', 'achau'),
				'data' 		=> 'category',
			),
			array(
				'id'          => 'all_book',
				'type'        => 'slides',
				'title'       => esc_html__('Books Manager', 'achau'),				
				'placeholder' => array(
					'title'           => esc_html__('This is a title', 'achau'),
					'description'     => esc_html__('Description Here', 'achau'),
					'url'             => esc_html__('Give us a link!', 'achau'),
				),
			),
		),
	));
	
    Redux::setSection($opt_name, array(
        'icon'   => 'el-icon-shopping-cart',
        'title'  => esc_html__('Product', 'achau'),
        'fields' => array(
            
            array(
                'title' => esc_html__('Number of Products per Column', 'achau'),
                'subtitle' => __('<em>Drag the slider to set the number of products per column <br />to be listed on the shop page and catalog pages.</em>', 'achau'),
                'id' => 'products_per_column',
                'min' => '3',
                'step' => '1',
                'max' => '4',
                'type' => 'slider',
                'default' => '3',
			),
            
            array(
                'title' => esc_html__('Number of Products per Page', 'achau'),
                'subtitle' => __('<em>Drag the slider to set the number of products per page <br />to be listed on the shop page and catalog pages.</em>', 'achau'),
                'id' => 'products_per_page',
                'min' => '1',
                'step' => '1',
                'max' => '48',
                'type' => 'slider',
                'edit' => '1',
                'default' => '9',
			),
		)
        
	));

	Redux::setSection($opt_name, array(
        'icon'   => 'el-icon-random',
        'title'  => esc_html__('Brand Logos', 'achau'),
        'fields' => array(
		
			array(
				'id'          => 'brand_logos',
				'type'        => 'slides',
				'title'       => esc_html__('Brand Logos Manager', 'achau'),				
				'placeholder' => array(
					'title'           => esc_html__('This is a title', 'achau'),
					'description'     => esc_html__('Description Here', 'achau'),
					'url'             => esc_html__('Give us a link!', 'achau'),
				),
			),
			
		)
	));
	
	Redux::setSection($opt_name, array(
        'icon'    => 'el el-arrow-down',
        'title'   => esc_html__('Banners', 'achau'),
        'fields'  => array(
			array(
				'id'          => 'bn_shop',
				'type'        => 'slides',
				'title'       => esc_html__('Banner Shop Manager', 'achau'),				
				'placeholder' => array(
					'title'           => esc_html__('This is a title', 'achau'),
					'description'     => esc_html__('Description Here', 'achau'),
					'url'             => esc_html__('Give us a link!', 'achau'),
				),
			),
			array(
				'id'          => 'link_connect',
				'type'        => 'slides',
				'title'       => esc_html__('Link Connect Manager', 'achau'),				
				'placeholder' => array(
					'title'           => esc_html__('This is a title', 'achau'),
					'description'     => esc_html__('Description Here', 'achau'),
					'url'             => esc_html__('Give us a link!', 'achau'),
				),
			),
			array(
				'id'          => 'bn_events',
				'type'        => 'slides',
				'title'       => esc_html__('Banner Event Manager', 'achau'),				
				'placeholder' => array(
					'title'           => esc_html__('This is a title', 'achau'),
					'description'     => esc_html__('Description Here', 'achau'),
					'url'             => esc_html__('Give us a link!', 'achau'),
				),
			),
		),
	));
	Redux::setSection($opt_name, array(
        'icon'    => 'el el-arrow-down',
        'title'   => esc_html__('Image 360', 'achau'),
        'fields'  => array(
			array(
				'id'          => 'image_360',
				'type'        => 'slides',
				'title'       => esc_html__('Image 360 Manager', 'achau'),				
				'placeholder' => array(
					'title'           => esc_html__('This is a title', 'achau'),
					'description'     => esc_html__('Description Here', 'achau'),
					'url'             => esc_html__('Give us a link!', 'achau'),
				),
			),
		),
	));
    Redux::setSection($opt_name, array(
        'icon'   => 'el el-pencil',
        'title'  => esc_html__('Styling', 'achau'),
        'fields' => array(
			array(
				'id'        => 'enable_less',
				'type'      => 'switch',
				'title'     => esc_html__('Enable Less Compiler', 'wt-cover'),
				'default'   => true,
			),
            array(
                'title' => esc_html__('Body Texts Color', 'achau'),
                'subtitle' => __('<em>Body Texts Color of the site.</em>', 'achau'),
                'id' => 'text_color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#444444',
			),
			
            array(
                'title' => esc_html__('Main Color', 'achau'),
                'subtitle' => __('<em>The main color of the site.</em>', 'achau'),
                'id' => 'main_color',
                'type' => 'color',
                'transparent' => false,
                'default' => '#02bc4e',
			),
			
			array(
                'title' => esc_html__('Main Color 2', 'achau'),
                'subtitle' => __('<em>The main color 2 of the site.</em>', 'achau'),
                'id' => 'main_color_2',
                'type' => 'color',
                'transparent' => false,
                'default' => '#e11c23',
			),
		)
        
	));

    Redux::setSection($opt_name, array(
        'icon'   => 'el el-network',
        'title'  => esc_html__('Social Media', 'achau'),
        'fields' => array(
            
            array(
                'title' => __('<i class="fa fa-facebook"></i> Facebook', 'achau'),
                'subtitle' => __('<em>Type your Facebook profile URL here.</em>', 'achau'),
                'id' => 'facebook_link',
                'type' => 'text',
                'default' => 'https://www.facebook.com/',
			),
            
            array(
                'title' => __('<i class="fa fa-twitter"></i> Twitter', 'achau'),
                'subtitle' => __('<em>Type your Twitter profile URL here.</em>', 'achau'),
                'id' => 'twitter_link',
                'type' => 'text',
                'default' => '',
			),
            
            array(
                'title' => __('<i class="fa fa-google-plus"></i> Google+', 'achau'),
                'subtitle' => __('<em>Type your Google+ profile URL here.</em>', 'achau'),
                'id' => 'googleplus_link',
                'type' => 'text',
				'default' => '',
			),
            
            array(
                'title' => __('<i class="fa fa-instagram"></i> Instagram', 'achau'),
                'subtitle' => __('<em>Type your Instagram profile URL here.</em>', 'achau'),
                'id' => 'instagram_link',
                'type' => 'text',
                'default' => '',
				'default' => '',
			),
            
            array(
                'title' => __('<i class="fa fa-youtube-play"></i> Youtube', 'achau'),
                'subtitle' => __('<em>Type your Youtube profile URL here.</em>', 'achau'),
                'id' => 'youtube_link',
                'type' => 'text',
                'default' => 'https://www.youtube.com/',
			),
            array(
                'title' => __('<i class="fa fa-skype"></i> Skype', 'achau'),
                'subtitle' => __('<em>Type your Skype profile URL here.</em>', 'achau'),
                'id' => 'skype_link',
                'type' => 'text',
				'default' => '#',
			),
            
		)
        
	));
	
	Redux::setSection($opt_name, array(
        'icon'   => 'el el-adjust-alt',
        'title'  => esc_html__('Owl Carousel', 'achau'),
        'fields' => array(
            array(
				'id' 		=> 'slide_speed',
                'title' 	=> esc_html__('Slide Speed(ms)', 'achau'),
                'desc' 		=> __('<em>Slide speed in milliseconds. Only use numeric. Default: 200.</em>', 'achau'),
                'type' 		=> 'text',
                'default' 	=> '200',                
			),
			array(
				'id' 		=> 'pagination_speed',
                'title' 	=> esc_html__('Pagination Speed(ms)', 'achau'),
                'desc' 		=> __('<em>Pagination speed in milliseconds. Only use numeric. Default: 800.</em>', 'achau'),
                'type' 		=> 'text',
                'default' 	=> '800',                
			),
			array(
                'title' 	=> esc_html__('Rewind Speed(ms)', 'achau'),
                'desc' 		=> __('<em>Rewind speed in milliseconds. Only use numeric. Default: 1000.</em>', 'achau'),
                'id' 		=> 'rewind_speed',
                'type' 		=> 'text',
                'default' 	=> '1000',                
			),
			array(
                'title' 	=> esc_html__('Autoplay', 'achau'),
				'desc' 		=>__('<em>Enable/disable autoplay for all carousel.</em>', 'achau'),
                'id' 		=> 'auto_play',
                'on' 		=> esc_html__('Enabled', 'achau'),
                'off' 		=> esc_html__('Disabled', 'achau'),
                'type' 		=> 'switch',
                'default' 	=> 0,
			),
			array(
                'title' 	=> esc_html__('Autoplay Speed(ms)', 'achau'),
                'desc' 		=> __('<em>Autoplay speed in milliseconds. Only use numeric. Default: 5000.</em>', 'achau'),
                'id' 		=> 'autoplay_speed',
                'type' 		=> 'text',
                'default' 	=> '5000', 
				'required'	=> array('auto_play', '=', array('1')),
			),
			array(
                'title' 	=> esc_html__('Stop on Hover', 'achau'),
				'desc' 		=>__('<em>Enable/disable stop carousel when mouse hover function.</em>', 'achau'),
                'id' 		=> 'stop_hover',
                'on' 		=> esc_html__('Enabled', 'achau'),
                'off' 		=> esc_html__('Disabled', 'achau'),
                'type' 		=> 'switch',
                'default' 	=> 0,
			),
			array(
                'title' 	=> esc_html__('Rewind Nav', 'achau'),
				'desc' 		=>__('<em>Slide to first item. Use rewindSpeed to change animation speed.</em>', 'achau'),
                'id' 		=> 'rewind_nav',
                'on' 		=> esc_html__('Enabled', 'achau'),
                'off' 		=> esc_html__('Disabled', 'achau'),
                'type' 		=> 'switch',
                'default' 	=> 1,
			),
			array(
                'title' 	=> esc_html__('Scroll per Page', 'achau'),
				'desc' 		=>__('<em>Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.</em>', 'achau'),
                'id' 		=> 'scroll_page',
                'on' 		=> esc_html__('Enabled', 'achau'),
                'off' 		=> esc_html__('Disabled', 'achau'),
                'type' 		=> 'switch',
                'default' 	=> 0,
			),
			array(
                'title' 	=> esc_html__('Mouse Drag', 'achau'),
				'desc' 		=>__('<em>Enable/disable mouse drag function.</em>', 'achau'),
                'id' 		=> 'mouse_drag',
                'on' 		=> esc_html__('Enabled', 'achau'),
                'off' 		=> esc_html__('Disabled', 'achau'),
                'type' 		=> 'switch',
                'default' 	=> 1,
			),
			array(
                'title' 	=> esc_html__('Touch Drag', 'achau'),
				'desc' 		=>__('<em>Enable/disable touch drag function.</em>', 'achau'),
                'id' 		=> 'touch_drag',
                'on' 		=> esc_html__('Enabled', 'achau'),
                'off' 		=> esc_html__('Disabled', 'achau'),
                'type' 		=> 'switch',
                'default' 	=> 1,
			),
		)
        
	));
	
    Redux::setSection($opt_name, array(
        'icon'   => 'el el-scissors',
        'title'  => esc_html__('Custom Code', 'achau'),
        'fields' => array(
            array(
                'title' => esc_html__('Header JavaScript Code', 'achau'),
                'subtitle' => __('<em>Paste your custom JS code here. The code will be added to the header of your site.</em>', 'achau'),
                'id' => 'header_js',
                'type' => 'ace_editor',
                'mode' => 'javascript',
			),
            
            array(
                'title' => esc_html__('Footer JavaScript Code', 'achau'),
                'subtitle' => __('<em>Here is the place to paste your Google Analytics code or any other JS code you might want to add to be loaded in the footer of your website.</em>', 'achau'),
                'id' => 'footer_js',
                'type' => 'ace_editor',
                'mode' => 'javascript',
			),
            
		)
        
	));

    /*
     * <--- END SECTIONS
     */
