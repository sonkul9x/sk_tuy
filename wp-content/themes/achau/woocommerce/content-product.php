<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$achau_options = get_option("achau_options");
global $product, $woocommerce_loop, $post;

// Store loop count we're currently on
if(empty($woocommerce_loop['loop'])) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if(empty($woocommerce_loop['columns'])) {
	$woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 4);
}

// Ensure visibility
if(empty($product) || ! $product->is_visible()) {
	return;
}

// Extra post classes
if(0 == ($woocommerce_loop['loop']) % $woocommerce_loop['columns'] || 0 == $woocommerce_loop['columns']) {
 $classes[] = 'first';
}
if(0 == ($woocommerce_loop['loop'] + 1) % $woocommerce_loop['columns']) {
 $classes[] = 'last';
}

if($woocommerce_loop['columns'] == 3) {
	$colwidth = 4;
}else{
	$colwidth = 3;
}

$classes[] = 'wow fadeInUp product-item col-lg-'. esc_attr($colwidth) .' col-xs-6';

?> 
<div <?php post_class($classes); ?> data-wow-duration="0.5s" data-wow-delay="<?php echo ($woocommerce_loop['loop']/10); ?>s">
<?php //var_dump(); die(); ?>
	<div class="product-item-i" >
		<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );

		?>
		<div class="product-image">
			<a href="<?php echo esc_url(get_permalink($product->get_id())); ?>" title="<?php echo esc_attr($product->get_title()); ?>">
				<?php echo ($product->get_image('shop_catalog', array('class'=>'one_image'))); ?>
			</a>
		</div>
		
		<div class="product-content">
			<?php do_action('woocommerce_product_sub_heading'); ?>
			<h3 class="product-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			<?php do_action('woocommerce_product_attr'); ?>
			
			<div class="product-desc">
				<?php 
				 $trimexcerpt = get_the_excerpt();
				 $words_short_des = 10;
				 $shortexcerpt = wp_trim_words($trimexcerpt, $num_words = $words_short_des, $more = '...'); 
				 echo ($shortexcerpt);
				?>
			</div>
			
			<?php if(class_exists('YITH_WCWL')){ ?>
				<?php echo '<div class="product-added">'.preg_replace("/<img[^>]+\>/i", " ", do_shortcode('[yith_wcwl_add_to_wishlist]')).'</div>'; ?>
			<?php } ?>
		</div>
		<?php
		/**
		 * woocommerce_after_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
		?>
	</div>
</div>
