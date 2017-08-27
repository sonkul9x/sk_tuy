<?php
ob_start();
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A Chau
 */

//$layout = achau_get_default_layout();
// Get Theme Options Values
$achau_options = get_option("achau_options");
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Page Loader Block -->
<?php if (isset($achau_options['theme_loading']) && $achau_options['theme_loading']) : ?>
<div id="pageloader">
	<div id="loader"></div>
	<div class="loader-section left"></div>
	<div class="loader-section right"></div>
</div>
<?php endif; ?>

<div id="wrapper">
	<header id="site-header">
		<div class="header">
			<div class="container">
				<div class="row">
					<div class="responsive-mobile visible-small">
						<span class="tools_button_icon">
							<i class="fa fa-bars"></i>
						</span>
						<nav class="mobile-navigation">
							<div class="close-menu-mobile">
								<span class="btn-close"><i class="zmdi zmdi-close"></i></span>
							</div>
							<div class="popup-bg menu-popup-bg"></div>
							<div class="menu-inside">
								<div class="nano">
									<div class="content">
										<?php
											$walker = new rc_scm_walker;
											wp_nav_menu(array(
												'theme_location'  => 'primary',
												'fallback_cb'     => false,
												'container' => 'div',
												'container_class'       => 'menu_overlay',
												'items_wrap'      => '<ul class="%1$s">%3$s</ul>',
												'walker' 		  => $walker
											));
										?>
									</div>
								</div>
							</div>
						</nav><!-- .mobile-navigation -->
					</div><!-- End responsive-navigation -->
					
					<div id="logo-wrapper" class="col-sm-3">
						<div class="logo-inside">
							<?php if(is_home() || is_front_page() || is_page('product-catalogue')) : ?>
								<?php achau_display_logo_footer(); // Call display top logo function; ?>
							<?php else : ?>
								<?php achau_display_top_logo(); // Call display top logo function; ?>
							<?php endif; ?>
						</div>
					</div><!-- End site-logo -->
					
					<div id="navigation" class="col-xs-12 col-lg-7">
						<div class="site-navigation visible-large">
							<nav class="main-navigation">
								<?php
									$walker = new rc_scm_walker;
									wp_nav_menu(array(
										'theme_location'  => 'primary',
										'fallback_cb'     => false,
										'container'       => false,
										'items_wrap'      => '<ul class="%1$s">%3$s</ul>',
										'walker' 		  => $walker
									));
								?>
							</nav><!-- .main-navigation -->
						</div><!-- End site-navigation -->
						
					</div><!-- End #navigation -->
				
					<div class="col-xs-12 col-sm-9 col-lg-2 top-feature">
						<div class="col-set top-lang">
							<?php if(is_active_sidebar('top-lang')) : ?>
								<?php dynamic_sidebar('top-lang'); ?>
							<?php endif;?>
						</div>
						
						<div class="col-set top-account">
							<a href="<?php echo $achau_options['ft_caption_text']; ?>"><span class="icon acc-icon"></span></a>
						</div>
						
						<?php if(is_active_sidebar('top-search')) : ?>
							<div class="col-set top-search">
								<span class="icon search-toggle"></span>
								<div class="search-inside hidden">
									<div class="search-popup-bg"></div>
									<?php dynamic_sidebar('top-search'); ?>
								</div>
							</div><!-- End Widget Top Search -->
						<?php endif;?>
						
						<div class="col-set top-care">
							<span class="icon care-icon"></span>
							<span class="counter">
								<i class="your-counter-selector">
								<?php 
									$wishlist_count = 0;
									if(class_exists('YITH_WCWL')){
										$wishlist_count = YITH_WCWL()->count_products();
									}
									echo $wishlist_count; 
								?>
								</i>
							</span>
						</div>
						
						<div class="responsive-navigation visible-medium">
							<span class="tools_button_icon">
								<i class="fa fa-bars"></i>
							</span>
							
							<nav class="mobile-navigation">
								<div class="close-menu-tablet">
									<span class="btn-close"><i class="zmdi zmdi-close"></i></span>
								</div>
								<div class="popup-bg menu-popup-bg"></div>
								<div class="menu-inside">
									<div class="nano">
										<div class="content">
											<?php
												$walker = new rc_scm_walker;
												wp_nav_menu(array(
													'theme_location'  => 'primary',
													'fallback_cb'     => false,
													'container' => 'div',
													'container_class'       => 'menu_overlay',
													'items_wrap'      => '<ul class="%1$s">%3$s</ul>',
													'walker' 		  => $walker
												));
											?>
										</div>
									</div>
								</div>
							</nav><!-- .mobile-navigation -->
						</div><!-- End responsive-navigation -->
					</div>
				</div>
			</div>
		</div><!-- End Header Container -->
		
		<div class="site-navbar">
			<div class="container">
				<div class="row">
					
				</div>
			</div>
		</div><!-- End .site-navbar -->
	</header>