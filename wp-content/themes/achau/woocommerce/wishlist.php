<?php
/**
 * Wishlist page template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.12
 */

if ( ! defined( 'YITH_WCWL' ) ) {
	exit;
} // Exit if accessed directly
?>

<?php do_action( 'yith_wcwl_before_wishlist_form', $wishlist_meta ); ?>

<form id="yith-wcwl-form" action="<?php echo $form_action ?>" method="post" class="woocommerce">
	<div id="product-hidden" class="hidden"><?php
        if( count( $wishlist_items ) > 0 ) :
	        $added_items = array();
            foreach( $wishlist_items as $item ) :
                global $product;

	            $item['prod_id'] = yit_wpml_object_id ( $item['prod_id'], 'product', true );

	            if( in_array( $item['prod_id'], $added_items ) ){
		            continue;
	            }

	            $added_items[] = $item['prod_id'];
	            $product = wc_get_product( $item['prod_id'] );
	            $availability = $product->get_availability();
	            $stock_status = $availability['class'];					
                if( $product && $product->exists() ) :
					echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product );
				endif;
			endforeach;
		endif;
		?>
	</div>
    <?php wp_nonce_field( 'yith-wcwl-form', 'yith_wcwl_form_nonce' ) ?>

    <!-- TITLE -->
    <?php
     do_action( 'yith_wcwl_before_wishlist' ); ?>

    <!-- WISHLIST TABLE -->
	<ul class="shop_table cart wishlist_table" data-pagination="<?php echo esc_attr( $pagination )?>" data-per-page="<?php echo esc_attr( $per_page )?>" data-page="<?php echo esc_attr( $current_page )?>" data-id="<?php echo $wishlist_id ?>" data-token="<?php echo $wishlist_token ?>">
		
	    <?php $column_count = 2; ?>
        <?php
        if( count( $wishlist_items ) > 0 ) :
	        $added_items = array();
            foreach( $wishlist_items as $item ) :
                global $product;

	            $item['prod_id'] = yit_wpml_object_id ( $item['prod_id'], 'product', true );

	            if( in_array( $item['prod_id'], $added_items ) ){
		            continue;
	            }

	            $added_items[] = $item['prod_id'];
	            $product = wc_get_product( $item['prod_id'] );
	            $availability = $product->get_availability();
	            $stock_status = $availability['class'];

                if( $product && $product->exists() ) :
	                ?>
                    <li id="yith-wcwl-row-<?php echo $item['prod_id'] ?>" data-row-id="<?php echo $item['prod_id'] ?>">
	                   
                        <span class="image">
                            <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>">
                                <?php echo $product->get_image() ?>
                            </a>
                        </span>

                        <span class="info">
							<span class="sku">
								<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
									<?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'achau' ); ?>
								<?php endif; ?>
							</span>
							<span class="name"><a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ?></a>
								<?php do_action( 'yith_wcwl_table_after_product_name', $item ); ?></span>
							<span class="sub_name"><?php echo get_field('tieu_de_phu', $item['prod_id']);?></span>
                        </span>
						
						
                        <?php if( $is_user_owner ): ?>
                        <a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item['prod_id'] ) ) ?>" class="remove remove_from_wishlist" title="<?php _e( 'Remove this product', 'yith-woocommerce-wishlist' ) ?>"><i class="zmdi zmdi-close"></i></a>
                        <?php endif; ?>

                    </li>
                <?php
                endif;
            endforeach;
        else: ?>
            <li>
                <p class="wishlist-empty"><?php echo apply_filters( 'yith_wcwl_no_product_to_remove_message', __( 'No products were added to the wishlist', 'yith-woocommerce-wishlist' ) ) ?></p>
            </li>
        <?php
        endif;
		?>
    </ul>

    <?php wp_nonce_field( 'yith_wcwl_edit_wishlist_action', 'yith_wcwl_edit_wishlist' ); ?>

    <?php if( ! $is_default ): ?>
        <input type="hidden" value="<?php echo $wishlist_token ?>" name="wishlist_id" id="wishlist_id">
    <?php endif; ?>

    <?php do_action( 'yith_wcwl_after_wishlist' ); ?>

</form>

<?php do_action( 'yith_wcwl_after_wishlist_form', $wishlist_meta ); ?>