<?php
global $post;
$thumb		= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'post_thumb_2');
$thumb_url 	= $thumb['0'];

$post_created_D	= date_i18n("d", strtotime($post->post_date));
$post_created_M	= date_i18n("m", strtotime($post->post_date));
$post_created_Y	= date_i18n("Y", strtotime($post->post_date));
?>
<div class="post-item"  data-id="<?php echo get_the_ID(); ?>">
	<div class="post-item-i thumb thumb-2">
		<div class="post-image">
			<a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
				<img alt="<?php echo esc_attr(get_the_title()); ?>" src="<?php echo esc_url($thumb_url); ?>"/>
			</a>
		</div>
		<div class="post-info">
			<h4 class="post-name"><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h4>
		</div>
	</div>
</div>