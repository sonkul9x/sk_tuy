<?php
/**
 * Template Name: SECTION TITLE EXPERT
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
global $post;
?>
<div class="st-title-expert">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<?php 
			$id= 413 ; 
			$post = get_post($id); 
			$content = apply_filters('the_content', $post->post_content); 
			echo $content;  
			?>
		<?php endwhile; ?>
	<?php endif; ?>
</div><!-- st-books -->