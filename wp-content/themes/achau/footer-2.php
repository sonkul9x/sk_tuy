<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A Chau
 */
$achau_options = get_option("achau_options");
?>	
		<div class="clear clearfix"></div>
		<script>
			wow = new WOW(
			  {
				animateClass: 'animated',
				offset:       100,
				callback:     function(box) {
				  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
				}
			  }
			);
			wow.init();
		</script>
		<?php get_template_part('inc/woocommerce/popup', 'wishlist'); ?>
		<?php wp_footer(); ?>	
	<?php ob_end_flush(); ?>		
	</body>
</html>
