<?php
/**
 * Template Name: News
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header();
?>
<div id="site-content" class="main-container template-news">
	<div class="st-news st-featured">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-9">
					<div class="item-featured">
						<?php echo do_shortcode('[achau_featured_posts number ="4" desc="15" style="style-3"]'); ?>
					</div>
				</div>
				<div class="col-xs-12 col-lg-3">
					<div class="list-items">
						<?php echo do_shortcode('[achau_featured_posts number ="4" style="thumb-2"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .st-featured -->
	
	<div class="st-news st-product-news">
		<div class="container">
			<?php achau_get_title_category($achau_options['choose_cat_1']) ?>
			
			<div class="row">
				<div class="post-carousel owl-carousel owl-theme carousel-4">
					<?php echo do_shortcode('[achau_posts cat="'.$achau_options['choose_cat_1'].'" number ="8"]'); ?>
				</div>
			</div>
		</div>
	</div><!-- .st-featured -->
	
	<div class="st-news st-events">
		<div class="container">
			<?php achau_get_title_category($achau_options['choose_cat_2']) ?>
			<div class="row">
				<div class="col-xs-12 col-md-6 bn-events">
					<div class="item-event">
						<img src="<?php echo $achau_options['bn_events']['0']['image']; ?>" alt="<?php echo $achau_options['bn_events']['0']['title']; ?>"/>
					</div>
					<div class="list-event visible-nav">
						<div class="row">
							<div class="inner owl-carousel owl-theme">
								<?php
								$i = 0;
								foreach($achau_options['bn_events'] as $banner) {
									$i++;
									$image = $banner['image'];
									$url = $banner['url'];
									$title = $banner['title'];
									?>
									<div class="event">
										<a href="" data-id="<?php echo $i; ?>" data-src="<?php echo $image; ?>" data-title="<?php echo $title; ?>">
											<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"/>
										</a>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="post-carousel column-2">
						<?php echo do_shortcode('[achau_posts cat="'.$achau_options['choose_cat_2'].'" number ="2"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .st-events -->
	
	<div class="st-news st-internal">
		<div class="container">
			<?php achau_get_title_category($achau_options['choose_cat_3']) ?>
			<div class="post-carousel">
				<div class="row">
					<div class="owl-carousel owl-theme carousel-3">
						<?php echo do_shortcode('[achau_posts cat="'.$achau_options['choose_cat_3'].'" number ="6" style="style-1"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .st-internal -->
	
	<div class="st-advantise">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-8 st-career">
					<?php achau_get_title_category($achau_options['choose_cat_4']) ?>
					<div class="no-carousel index">
						<?php echo do_shortcode('[achau_posts type="featured" cat="'.$achau_options['choose_cat_4'].'" number ="1" style="style-2"]'); ?>
					</div>
					<div class="post-thumbs">
						<div class="row">
							<div class="column-2">
								<?php echo do_shortcode('[achau_posts cat="'.$achau_options['choose_cat_4'].'" number ="2" style="thumb-1"]'); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-lg-4">
					
					<div class="st-title"><h2 class="no-arrow"><a href="#"><?php _e('Links', 'achau'); ?></a></h2></div>
					<?php
					foreach($achau_options['link_connect'] as $banner) {
						$image = $banner['image'];
						$url = $banner['url'];
						$title = $banner['title'];
						?>
						<div class="col-image">
							<div class="single-banner style-1">
								<a href="<?php echo $url; ?>">
									<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" />
								</a>
							</div><!-- / single-banner -->
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div><!-- .st-advantise -->
</div><!-- #site-content -->
<?php get_footer(); ?>