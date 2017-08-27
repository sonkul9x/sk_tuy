<?php
global $post;

$post_created	= date_i18n("d M Y", strtotime($post->post_date));
$post_created_D	= date_i18n("d", strtotime($post->post_date));
$post_created_M	= date_i18n("m", strtotime($post->post_date));
$post_created_Y	= date_i18n("Y", strtotime($post->post_date));	
?>
<div class="post-item">
	<a href="javascript:void(0);" data-id="<?php echo $post->ID; ?>" class="click_video">
		<div class="post-item-i video">
			<div class="post-image">
				<img alt="<?php echo get_the_title(); ?>" src="http://img.youtube.com/vi/<?php echo get_field('youtube_id', $post->ID); ?>/mqdefault.jpg"/>
			</div>
			<div class="post-info">
				<h4 class="post-name"><?php echo get_the_title(); ?></h4>
				<div class="post-date">
				<?php 
				if ((ICL_LANGUAGE_CODE=="vi")) : 
					echo __('Day', 'achau').'<span>'.$post_created_D.'</span><i>,</i>'.__('Month', 'achau').'<span>'.$post_created_M.'</span><i>,</i>'.__('Year', 'achau').'<span>'.$post_created_Y.'</span>';
				else :
					echo $post_created;
				endif;
				?>
				</div>
			</div>
		</div>
	</a>
</div>