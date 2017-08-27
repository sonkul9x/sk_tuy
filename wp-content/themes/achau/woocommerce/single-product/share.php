<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product;
$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
?>

<?php //do_action( 'woocommerce_share' ); // Sharing plugins can hook into here

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

?>

<div class="wow fadeInUp product-share" data-wow-duration="0.5s" data-wow-delay="0.7s">
	<span class="title"><?php _e('Share', 'achau'); ?></span>
	<a target="_blank" href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=<?php echo $product->get_title(); ?>&amp;p%5Burl%5D=<?php echo urlencode(get_permalink($product->get_id())); ?>" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	
	<a target="_blank" href="https://twitter.com/share?url=<?php echo urlencode(get_permalink($product->get_id())); ?>&amp;text=<?php echo $product->get_title(); ?>" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	
	<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink($product->get_id())); ?>&amp;title=<?php echo $product->get_title(); ?>" class="gplus" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'><i class="fa fa-google-plus" aria-hidden="true"></i></a>
	
	<a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($product->get_id())); ?>&amp;description=<?php echo $product->get_title(); ?>&amp;media=<?php echo $full_size_image[0] ?>" class="pinterest" onclick="window.open(this.href); return false;"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
</div>
