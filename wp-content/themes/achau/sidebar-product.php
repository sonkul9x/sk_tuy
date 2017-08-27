<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A Chau
 */
?>
<div id="sidebar-product" class="col-xs-12 col-lg-3 widget-area" role="complementary">
	<div class="button-moblie btn-search"><span><?php _e('Search', 'achau'); ?></span></div>
	<div class="widget widget_search_product_key">
		<div class="widget-title"><h3><?php _e('Search Product', 'achau'); ?></h3></div>
		<form role="search" method="get" class="woocommerce-product-search" action="<?php echo get_permalink(wc_get_page_id ('shop')); ?>">
			<input type="search" class="search-field" placeholder="<?php _e('Product name...', 'achau'); ?>" value="<?php echo get_search_query(); ?>" id="s" name="s" title="<?php _e('Product name...', 'achau'); ?>" />
			<button class="button" type="submit"><i class="zmdi zmdi-search"></i></button>
			<input type="hidden" name="post_type" value="product" />
		</form>
	</div>
	
	<div class="button-moblie btn-filter"><span><?php _e('Filter Advanced', 'achau'); ?></span></div>
	<div class="widget widget_filter_custom">
		<div class="popup-bg popup-filter"></div>
		<div class="inner-widget">
			<div class="nano">
				<div class="content">
					<span class="closet-filter"><i class="zmdi zmdi-close"></i></span>
					<div class="widget-title"><h3><?php _e('Advanced Search', 'achau'); ?></h3></div>
					<span class="loaded-spin"><i class="zmdi zmdi-refresh-alt"></i></span>
					<div class="filter-wrap">
						<form method="get" id="filter_product" class="filter_form" action="<?php bloginfo('url');?>">
						<div class="form-group">
							<h4><?php _e('By species of animal', 'achau'); ?></h4>
							<?php 
							$cat1 = lang_object_ids(86 ,'product_cat');
							$product_cat_1s = get_term_children( $cat1, 'product_cat' );
							?>
							<?php foreach ($product_cat_1s as $product_cat) : ?>
							<?php $term = get_term_by( 'id', $product_cat, 'product_cat' ); ?>
							<div class="field-input">
								<div class="input">
									<input type="checkbox" value="" id="<?php echo $term->slug; ?>" name="<?php echo $term->slug; ?>" />
									<label for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
								</div>
								<span class="name"><?php echo $term->name; ?></span>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="form-group">
							<h4><?php _e('By product categories', 'achau'); ?></h4>
							<?php 
							$cat2 = lang_object_ids(89 ,'product_cat');
							$product_cat_2s = get_term_children( $cat2, 'product_cat' );
							?>
							<?php foreach ($product_cat_2s as $product_cat2) : ?>
							<?php $term2 = get_term_by( 'id', $product_cat2, 'product_cat' ); ?>
							<div class="field-input">
								<div class="input">
									<input type="checkbox" value="" id="<?php echo $term2->slug; ?>" name="<?php echo $term2->slug; ?>" />
									<label for="<?php echo $term2->slug; ?>"><?php echo $term2->name; ?></label>
								</div>
								<span class="name"><?php echo $term2->name; ?></span>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="form-group">
							<h4><?php _e('By product tags', 'achau'); ?></h4>
							<?php $product_tags = get_terms('product_tag', 'orderby=name'); ?>
							<?php foreach ($product_tags AS $term) : ?>
							<div class="field-input">
								<div class="input">
									<input type="checkbox" value="" id="<?php echo $term->slug; ?>" name="<?php echo $term->slug; ?>" />
									<label for="<?php echo $term->slug; ?>"><?php echo $term->name; ?></label>
								</div>
								<span class="name"><?php echo $term->name; ?></span>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div><!-- #sidebar -->