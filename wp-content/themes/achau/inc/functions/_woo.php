<?php
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_cart_collaterals', 'woocommerce_cart_totals'); 

//Breadcrumb WooCommerce
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_site_breadcrumb', 'woocommerce_breadcrumb', 10);
function achau_woocommerce_breadcrumbs() {
    return array(
		'delimiter'   => '<li class="separator"> <i class="fa fa-angle-right" aria-hidden="true"></i> </li>',
		'wrap_before' => '<ul id="breadcrumbs" class="breadcrumbs">',
		'wrap_after'  => '</ul>',
		'before'      => '<li class="item">',
		'after'       => '</li>',
		'home'        => _x('Home', 'breadcrumb', 'achau'),
	);
}
add_filter('woocommerce_breadcrumb_defaults', 'achau_woocommerce_breadcrumbs', 20, 0);
/**
* For Archive Product Page
*/
remove_action('woocommerce_before_shop_loop', 'wc_print_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Change products per page
function achau_woo_change_per_page() 
{
	$achau_options 	= get_option("achau_options");
	$products_per_page 	= isset($achau_options['products_per_page']) ?  $achau_options['products_per_page'] : 9; 
	
	return $products_per_page;
}
add_filter('loop_shop_per_page', 'achau_woo_change_per_page', 20);

// Change number or products per row to 4
function achau_loop_columns() 
{
	$achau_options 		= get_option("achau_options");
	$products_per_column = isset($achau_options['products_per_column']) ? $achau_options['products_per_column'] : 3;
	
	return $products_per_column;
}
add_filter('loop_shop_columns', 'achau_loop_columns', 999);

/**
* For Single Product Page
*/
add_action('woocommerce_show_message', 'wc_print_notices', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Change SKU
function achau_product_sku(){
	global $product;
	?>
	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'achau' ); ?></span></span>

	<?php endif; ?>
	<?php
}
add_action('woocommerce_single_product_summary', 'achau_product_sku', 5);

//TITLE
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 10);

// Product Document
function achau_product_document(){
	global $product;
	$file = get_field('tai_tai_lieu');
	$filename_only = basename( get_attached_file( $file['id'] ) ); // Just the file name
	?>
	<div class="product-document">
		<a href="" class="btn-print" onclick="window.print();"><?php _e('Print', 'achau'); ?></a>
		<?php if (isset($file) && $file['url'] != '') : ?>
		<a href="<?php echo $file['url'];?>" target="_blank" class="btn-download" ><?php _e('Download', 'achau'); ?></a>
		<?php endif; ?>
	</div>
	<?php
}
add_action('woocommerce_before_single_product_document', 'achau_product_document', 5);

// Subheading
function achau_product_sub_heading(){
	global $product;
	?>
	<div class="wow fadeInUp sub_heading" data-wow-duration="0.5s" data-wow-delay="0.1s">
	<?php echo get_field('tieu_de_phu');?>
	</div>
	<?php
}
add_action('woocommerce_single_product_summary', 'achau_product_sub_heading', 15);
add_action('woocommerce_product_sub_heading', 'achau_product_sub_heading', 5);

function achau_product_attr(){
	global $product;
	$pa_objects = get_the_terms($product->get_id(), 'pa_object');
	?>
	<div class="wow fadeInUp product-objects" data-wow-duration="0.5s" data-wow-delay="0.2s">
	<?php
	foreach ( $pa_objects as $pa_object) {
		echo '<img src="'.get_template_directory_uri().'/assets/images/icon/icon-obj-'.$pa_object->slug.'.png"/>';
	}
	?>
	</div>
	<?php
}
add_action('woocommerce_single_product_summary', 'achau_product_attr', 15);
add_action('woocommerce_product_attr', 'achau_product_attr', 5);

// Product Meta
function achau_product_metas(){
	global $product;
	?>
	<div class="product-meta">
		<p class="wow fadeInUp meta" data-wow-duration="0.5s" data-wow-delay="0.3s">
			<span class="title"><?php _e('Quality Criteria', 'achau'); ?></span>
			<span class="text"><?php echo get_field('chi_tieu_chat_luong');?></span>
		</p>
		<p class="wow fadeInUp meta" data-wow-duration="0.5s" data-wow-delay="0.4s">
			<span class="title"><?php _e('Package', 'achau'); ?></span>
			<span class="text"><?php echo get_field('dong_goi');?></span>
		</p>
	</div>
	<?php
}
add_action('woocommerce_single_product_summary', 'achau_product_metas', 15);


// Product Meta
function achau_product_action_buttons(){
	global $product;
	?>
	<div class="action-buttons">
		<div class="row">
			<div class="wow fadeInUp product-button product-support" data-wow-duration="0.5s" data-wow-delay="0.5s">
				<a href="#"><span><?php _e('Consultancy quotes', 'achau'); ?></span></a>
				<div class="tooltip-note">
					<?php _e('Nếu quý khách hàng có câu hỏi hoặc muốn nhận báo giá về sản phẩm, xin điền thông tin liên hệ, chúng tôi sẽ liên hệ lại sớm nhất. Cám ơn quý khách!','achau'); ?>
				</div>
			</div>
			<?php if(class_exists('YITH_WCWL')) { ?> 
				<div class="wow fadeInUp product-button product-added" data-wow-duration="0.5s" data-wow-delay="0.6s">
					<?php echo preg_replace("/<img[^>]+\>/i", " ", do_shortcode('[yith_wcwl_add_to_wishlist]')); ?>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php
}
add_action('woocommerce_single_product_summary', 'achau_product_action_buttons', 20);


//TABS
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
function achau_product_tabs(){
?>
	<ul class="tabs">
		<li rel="cong_dung" class="active"><?php _e('Indications', 'achau'); ?></li>
		<li rel="thanh_phan_hoat_tinh"><?php _e('Active Ingredients', 'achau'); ?></li>
		<li rel="lieu_dung"><?php _e('Dosage', 'achau'); ?></li>
		<li rel="chu_y_su_dung"><?php _e('Precautions', 'achau'); ?></li>
		<li rel="bao_quan"><?php _e('Storage', 'achau'); ?></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div class="tab_content active" id="cong_dung">
			<h3 class="d_active tab_drawer_heading" rel="cong_dung"><?php echo __('Indications', 'achau'); ?></h3>
			<div class="inner active">
				<?php echo get_the_content(); ?> 
			</div>
		</div>
		<div class="tab_content" id="thanh_phan_hoat_tinh">
			<h3 class="tab_drawer_heading" rel="thanh_phan_hoat_tinh"><?php echo __('Active Ingredients', 'achau'); ?></h3>
			<div class="inner">
				<?php echo get_field('thanh_phan_hoat_tinh');?>
			</div>
		</div>
		 
		<div class="tab_content" id="lieu_dung">
			<h3 class="tab_drawer_heading" rel="lieu_dung"><?php echo __('Dosage', 'achau'); ?></h3>
			<div class="inner">
				<?php echo get_field('lieu_dung');?>
			</div>
		</div>
		<div class="tab_content" id="chu_y_su_dung">
			<h3 class="tab_drawer_heading" rel="chu_y_su_dung"><?php echo __('Precautions', 'achau'); ?></h3>
			<div class="inner">
				<?php echo get_field('chu_y_su_dung');?>
			</div>
		</div>
		<div class="tab_content" id="bao_quan">
			<h3 class="tab_drawer_heading" rel="bao_quan"><?php echo __('Storage', 'achau'); ?></h3>
			<div class="inner">
				<?php echo get_field('bao_quan');?>
			</div>
		</div>
	</div>
<?php
}
add_action('woocommerce_single_product_tabs', 'achau_product_tabs', 10);

//TABS PRODUCT CAROUSEL
function achau_product_carousel_tabs(){
?>
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#featured" aria-controls="featured" role="tab" data-toggle="tab"><?php _e('Featured Products', 'achau'); ?></a></li>
		<li role="presentation"><a href="#most_viewed" aria-controls="most_viewed" role="tab" data-toggle="tab"><?php _e('Most Viewed', 'achau'); ?></a></li>
		<li role="presentation"><a href="#recently_viewed" aria-controls="recently_viewed" role="tab" data-toggle="tab"><?php _e('Recently Viewed', 'achau'); ?></a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="featured">
			<div class="carousel-panel featured">
				<?php
				echo do_shortcode('[featured_products per_page="10" orderby="date" order="desc"]');
				?>
				
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="most_viewed">
			<div class="carousel-panel most_viewed">
				<?php
				if(is_active_sidebar('most-viewed-product')) :
					dynamic_sidebar('most-viewed-product');
				endif;
				?>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="recently_viewed">
			<div class="carousel-panel recently_viewed">
				<?php
				if(is_active_sidebar('recently-viewed-product')) :
					dynamic_sidebar('recently-viewed-product');
				endif;
				?>
			</div>
		</div>
	</div>
<?php
}
add_action('woocommerce_single_product_carousel_tabs', 'achau_product_carousel_tabs', 10);


//Column Related Products
function achau_get_carousel_tabs(){
	global $achau_options;
	
	$inlineJS = "
		jQuery(document).ready(function($) {
			$('.featured .shop-products, .most_viewed .shop-products, .recently_viewed .shop-products').addClass('owl-carousel owl-theme')
			$('.featured .shop-products, .most_viewed .shop-products, .recently_viewed .shop-products').owlCarousel({
				loop:true,
				responsiveClass: true,
				autoplay : true,
				autoplayTimeout : 3000,
				autoplayHoverPause : true,
				smartSpeed : 400,
				responsive:{
					0:{
						items:1
					},
					360:{
						items:1.5
					},
					480:{
						items:1.8
					},
					600:{
						items:2
					},
					768:{
						items:2.5
					},
					800:{
						items:2.8
					},
					980:{
						items:3
					},
					1200:{
						items:3.5
					},
					1600:{
						items:4
					}
				}
			});
		});
	";
	wp_add_inline_script('achau-js', $inlineJS);
}
add_action('wp_head', 'achau_get_carousel_tabs');


/*
* CUSTOM WIDGET WOOCOMMERCE
*/
include get_template_directory() . '/woocommerce/widget-recently-viewed.php';
include get_template_directory() . '/woocommerce/widget-most-viewed-products.php';
 
add_action("widgets_init", "load_custom_widgets");
function load_custom_widgets() {
	unregister_widget("WC_Widget_Recently_Viewed");
	register_widget("Widget_Recently_Viewed");
	
	unregister_widget("WCMVP_Widget_Most_Viewed");
	register_widget("Widget_Most_Viewed");
}

//COUNT WISHLIST
if( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ){
	function yith_wcwl_ajax_update_count(){
		wp_send_json( array(
			'count' => yith_wcwl_count_all_products()
		));
	}
	add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
	add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
}