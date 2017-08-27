<?php
/*
Plugin Name: QSoft Helper
Plugin URI: http://acp.com/
Description: This is requires plugin for all A Chau Themes.
Author: QSoft
Version: 1.0
Author URI: http://acp.com/
*/

// don't load directly
if(!defined('ABSPATH')) die('-1');

function vg_helper_register_shortcode()
{
	if(class_exists('Vina_BrandCarousel_Widget')) {
		add_shortcode('vgw_brand_carousel', array('Vina_BrandCarousel_Widget', 'shortcode'));
	}
}
