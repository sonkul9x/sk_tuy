<?php
global $post;

$post_created	= date_i18n("d M Y", strtotime($post->post_date));
$post_created_D	= date_i18n("d", strtotime($post->post_date));
$post_created_M	= date_i18n("m", strtotime($post->post_date));
$post_created_Y	= date_i18n("Y", strtotime($post->post_date));

$trimexcerpt = get_the_excerpt($post->ID);
$words_short_desc = 20;
$shortexcerpt = wp_trim_words($trimexcerpt, $num_words = $words_short_desc, $more = '...'); 
$excerpt = $shortexcerpt;	
?>
<div class="post-item">
	<div class="post-item-i large-video">
		<iframe width="100%" height="495" src="https://www.youtube.com/embed/<?php echo get_field('youtube_id', $post->ID); ?>" frameborder="0" allowfullscreen></iframe>
											
		<div class="post-info">
			<h2><a href=""><?php echo get_the_title(); ?></a></h2>
			
			<div class="post-date">
			<?php 
				if ((ICL_LANGUAGE_CODE=="vi")) : 
					echo __('Day', 'achau').'<span>'.$post_created_D.'</span><i>,</i>'.__('Month', 'achau').'<span>'.$post_created_M.'</span><i>,</i>'.__('Year', 'achau').'<span>'.$post_created_Y.'</span>';
				else :
					echo $post_created;
				endif;
			?>
			</div>
			<div class="post-desc">
				<?php echo $excerpt; ?>
			</div>
		</div>
	</div>
</div>