<?php
/**
 * Template Name: Gallery 360
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header();
?>

<script>
(function($) {
	"use strict"; 
	jQuery(document).ready(function($) {
		//CHANGE 360
		$('#list-360 .item-image img').click(function() {
			$('#list-360 .item-image img').removeClass('active');
			$(this).addClass('active');
			var img_src = $(this).attr('src');
			$('#index-360 iframe').attr('src', '<?php echo plugins_url(); ?>/wp-vr-view/asset/index.html?image=' + img_src + '&is_stereo=false');
		});
	});
})(jQuery);
</script>
<div id="site-content" class="main-container page-360">
	
	<div id="index-360">
	<?php echo do_shortcode('[vrview img="'.$achau_options["image_360"]["0"]["image"].'" width="1200" height="600" ]'); ?>
	</div>
	<div id="list-360" class="visible-nav">
		<div id="inner" class="owl-carousel owl-theme">
			<?php
			$i = 0;
			foreach($achau_options['image_360'] as $img) {
				$i++;
				$image = $img['image'];
				$title = $img['title'];
				?>
				<div class="item-image">
					<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"/>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div><!-- #site-content -->
<?php get_footer('2'); ?>