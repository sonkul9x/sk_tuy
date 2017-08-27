<div id="popup" class="active">
	<div class="popup-bg popup-like"></div>
	<div class="popup-content">
		<span class="hidden-popp"><i class="zmdi zmdi-close"></i></span>
		<div class="nano">
			<div class="content">
				<h2><?php _e('SEEK PRODUCT INFORMATION','achau'); ?></h2>
				<div class="row" data-equal="section">
					<section class="col-xs-12 col-lg-6 col-info">
						<div class="inner">
							<h3><?php _e('Give us your information','achau'); ?></h3>
							<p><?php _e('Please fill in the form and we&#39ll get back to you soon','achau'); ?></p>
							<div class="form-send">
								<?php echo do_shortcode('[contact-form-7 id="812" title="Seek Products"]'); ?>
							</div>
						</div>
					</section>
					
					<section class="col-xs-12 col-lg-6 col-products">
						<div class="inner">
							<h3><?php _e('Your product wishlist','achau'); ?></h3>
							<div class="list-product">
								<?php echo do_shortcode('[yith_wcwl_wishlist]'); ?>
							</div>
						</div>
						<div class="buttons-field">
							<a href="<?php echo get_permalink(wc_get_page_id ('shop')); ?>" class="continue"><?php _e('Continue','achau'); ?></a>
						</div>
					</section>
				</div>
				<?php 
				
				// CONTACT FORM VẪN ĐANG BỊ KHÔNG VALIDATE NAY SỬA THẾ NÀO MÀY SỬA LẠI ĐI 
				// KIỂM TRA KHI FORM SUBMIT THÀNH CÔNG THÌ CHẠY ĐOẠN NÀY LÀ XÓA HẾT (Nhớ là thành công nhé còn  submit vẫn bị validate thì không cho chạy.
				// Gợi ý là kiểm tra cái dòng thông báo đã gửi mail thành công ý) - CONTACT FORM CỨ bị REDIRECT NÊN ĐÉO LÀM NỮA :val
				// ĐOẠN DƯỚI XÓA HẾT KHI LOGIN VS KHI KHÔNG LOGIN RỒI NHÉ. T THÊM 1 CẶP THẺ VÀO HEADER VÀ FOOTER ob_start và ob_end_flush
				 global $yith_wcwl;$wpdb; 				  
				$yith_wcwl = YITH_WCWL(); 
				if(is_user_logged_in()) :
				$user_id = get_current_user_id();
				$sql = "SELECT * FROM {$wpdb->yith_wcwl_items} WHERE user_id = %d";
                $sql_args = array(
                    $user_id
                );
				$result = $wpdb->get_results( $wpdb->prepare( $sql, $sql_args ) );
					foreach ($result as $item):		
						$yith_wcwl->details['remove_from_wishlist'] = $item->prod_id;
						$yith_wcwl->details['wishlist_id'] = $item->wishlist_id;
						$yith_wcwl->remove();
					endforeach;
				else:
				$wishlist = yith_getcookie( 'yith_wcwl_products' );				
					foreach( $wishlist as $key => $item ){        							
							$yith_wcwl->details['remove_from_wishlist'] = $item['prod_id'];
							$yith_wcwl->details['wishlist_id'] = $item['wishlist_id'];
							$yith_wcwl->remove();					  
						};
				endif;					 
				?>
				
			</div>
		</div>
	</div>
</div>
<script>	
	
	jQuery(document).ready(function($) {
		//VALIDATE FORM CONTACT
		$(".form-send .wpcf7-form").validate({
			rules: {
				wcwl_name:{
					required: true,
				},
				wcwl_phone:{
					required: function(element) {
						if ($("#wcwl_email").val().length > 0) {
							return false;
						}
						else {
							return true;
						}
					},
					number : true,
				},
				wcwl_email:{
					required: function(element) {
						if ($("#wcwl_phone").val().length > 0) {
							return false;
						}
						else {
							return true;
						}
					},
					email: true,
				},
			},
			messages:{
				wcwl_name: "<?php echo __('Please enter your name.','achau'); ?>",
				wcwl_phone:{
					required: "<?php echo __('Please enter your phone.','achau'); ?>",
					number: "<?php echo __('Please enter your number.','achau'); ?>",
				},
				wcwl_email: "<?php echo __('Please enter a valid email address.','achau'); ?>",
			},
			//errorLabelContainer: $("#form-send .error")
		});		
		var list = $('#product-hidden').html();
		var abc = $('#wcwl_product');
		$(abc).append(abc.html() + list);
		$(abc).val($(abc).html());
		
		//$(".form-send .wpcf7-form").submit(function (e) {
		//	e.preventDefault();
			
	//	});
	});
</script>