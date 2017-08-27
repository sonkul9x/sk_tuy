<?php
/**
 * The template part for displaying content
 *
 * @package A Chau
 */
if(! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}
$achau_options = get_option("achau_options");
global $post, $loop;
$hasThumb = 'has-thumb';
if(has_post_thumbnail() && get_the_post_thumbnail() == NULL){
	$hasThumb = 'no-thumb';
}
$post_created	= get_the_date();
$post_created_D	= get_the_date('d');
$post_created_M	= get_the_date('m');
$post_created_Y	= get_the_date('Y');
?>
<div class="ex-item">
	<div class="ex-item-i">
		<div class="ex-inner">
			<div class="sub-label">
				<?php echo get_field('sub_label'); ?>
			</div>
			<?php the_title(sprintf('<h4 class="ex-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
			<div class="leader-team">
				<?php echo get_field('leader_team'); ?>
			</div>
		</div>
	</div><!-- .post-wrapper -->
</div><!-- #post-## -->
