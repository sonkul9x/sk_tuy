<?php
/**
 * Template Name: SECTION BOOKS
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
global $post;
?>
<div class="st-title-book">
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		<?php 
		$id= 407 ;
		if ((ICL_LANGUAGE_CODE=="vi")) : 
			$id= 700 ;
		else :
			$id= 407 ;
		endif;		
		$post = get_post($id); 
		$content = apply_filters('the_content', $post->post_content); 
		echo $content;  
		?>
	<?php endwhile; ?>
<?php endif; ?>
</div>