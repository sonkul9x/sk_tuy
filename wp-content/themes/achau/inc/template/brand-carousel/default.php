<?php
/*
 * This is Brand Logos Carousel theme.
 */


// get carousel setting from Widget/shortcode
$unique_id 		= !empty($instance['unique_id']) ? $instance['unique_id'] : "vgw-product-carousel";
$class_suffix 	= !empty($instance['class_suffix']) ? $instance['class_suffix'] : "";
$items_visible  = !empty($instance['items_visible']) ? intval($instance['items_visible']) : 4;
$navigation		= !empty($instance['next_preview']) ? intval($instance['next_preview']) : 0;
$pagination		= !empty($instance['pagination']) ? intval($instance['pagination']) : 0;

$responsive			= !empty($instance['responsive']) ? intval($instance['responsive']) : 0;
$itemsDesktop		= !empty($instance['items_desktop']) ? $instance['items_desktop'] : "[1199,4]";
$itemsDesktop		= str_replace(array('`{`', '`}`'), array('[', ']'), $itemsDesktop);
$itemsDesktopSmall	= !empty($instance['items_sdesktop']) ? $instance['items_sdesktop'] : "[979,3]";
$itemsDesktopSmall	= str_replace(array('`{`', '`}`'), array('[', ']'), $itemsDesktopSmall);
$itemsTablet		= !empty($instance['items_tablet']) ? $instance['items_tablet'] : "[768,2]";
$itemsTablet		= str_replace(array('`{`', '`}`'), array('[', ']'), $itemsTablet);
$itemsTabletSmall	= !empty($instance['items_stablet']) ? $instance['items_stablet'] : "false";
$itemsTabletSmall	= str_replace(array('`{`', '`}`'), array('[', ']'), $itemsTabletSmall);
$itemsMobile		= !empty($instance['items_mobile']) ? $instance['items_mobile'] : "[479,1]";
$itemsMobile		= str_replace(array('`{`', '`}`'), array('[', ']'), $itemsMobile);
$itemsCustom		= !empty($instance['items_custom']) ? $instance['items_custom'] : "false";
$itemsCustom		= str_replace(array('`{`', '`}`'), array('[', ']'), $itemsCustom);

// get carousel setting from Theme Options	
$slideSpeed			= $achau_options['slide_speed'];
$paginationSpeed	= $achau_options['pagination_speed'];
$rewindSpeed		= $achau_options['rewind_speed'];
$autoPlay			= $achau_options['auto_play'];
$autoPlaySpeed		= $achau_options['autoplay_speed'];
$stopOnHover		= $achau_options['stop_hover'];
$rewindNav			= $achau_options['rewind_nav'];
$scrollPerPage		= $achau_options['scroll_page'];
$mouseDrag			= $achau_options['mouse_drag'];
$touchDrag			= $achau_options['touch_drag'];

$return_content = ""; // reset return content;

$return_content .= '<div id="'. esc_attr($unique_id) .'" class="brand-carousel owl-carousel owl-theme '. esc_attr($class_suffix) .'">';
	
	for($i = 0; $i < $total_loop; $i ++)
	{
		$return_content .= '<div class="items">';
			
		for($m = 0; $m < $row_carousel; $m ++) 
		{
			
			if(!isset($brand_logos[$key_loop])) continue;
			$title = $brand_logos[$key_loop]['title'];
			$desc  = $brand_logos[$key_loop]['description'];
			$url   = $brand_logos[$key_loop]['url'];
			$image = $brand_logos[$key_loop]['image'];
			$key_loop ++;
		
			$return_content .= '<div class="item-i">';
			
			if(!empty($image)) {
				$return_content .= '<div class="brand-image">';
					$return_content .= '<a href="'. esc_url($url) .'" title="'. esc_attr($url) .'">';
						$return_content .= '<img alt="'. esc_attr($title) .'" src="'. esc_url($image) .'" class="primary_image"/>';
					$return_content .= '</a>';
				$return_content .= '</div>';
			}
			
			if(!empty($title) || !empty($desc)) {
				$return_content .= '<div class="brand-content">';
				if(!empty($title)) {
					$return_content .= '<h3 class="brand-title">';
						$return_content .= '<a href="'. esc_url($url) .'" title="'. esc_attr($url) .'">';
							$return_content .= ($title);
						$return_content .= '</a>';
					$return_content .= '</h3>';
				}
				
				if(!empty($desc)) {
					$return_content .= '<div class="brand-description">';
						$return_content .= ($desc);
					$return_content .= '</div>';
				}
				$return_content .= '</div>';
			}
			
			$return_content .= '</div>';
		}
		
		$return_content .= '</div>';
	}
	
$return_content .= '</div>';


// load Javascript for Brand Logos Carousel.
$script = '
	jQuery(window).load(function() {
		jQuery("#'. $unique_id .'").owlCarousel({
			items : 3,
			nav: false,
			dots : false,
			smartSpeed : '. $slideSpeed .',
			autoPlay: true,
			autoplayHoverPause : true,
			mouseDrag: true,
			touchDrag: true,
			responsive: {
				360:{
					items: 2,
				},
				480:{
					items: 2,
				},
				768:{
					items: 3,
				},
				992:{
					items: 3,
				},
				1024:{
					items: 3,
				},
				1200:{
					items: 3,
				},
			}
		});
	});
';
wp_add_inline_script('achau-js', $script);
