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
$post_created	= get_the_date('d M Y');
$post_created_D	= get_the_date('d');
$post_created_M	= get_the_date('m');
$post_created_Y	= get_the_date('Y');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<?php achau_post_thumbnail(); ?>
		
		<div class="post-content <?php echo esc_attr($hasThumb); ?>">
			<header class="entry-header">
				<?php the_title(sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
			</header><!-- .entry-header -->
			
			<div class="entry-date">
				<?php 
				if ((ICL_LANGUAGE_CODE=="vi")) : 
					echo __('Day', 'achau').'<span>'.$post_created_D.'</span><i>,</i>'.__('Month', 'achau').'<span>'.$post_created_M.'</span><i>,</i>'.__('Year', 'achau').'<span>'.$post_created_Y.'</span>';
				else :
					echo $post_created;
				endif;
				?>
			</div>
			
			<div class="entry-summary">
				<div class="entry-desc">
				<?php 
					$trimexcerpt = get_the_excerpt();
					$words_short_des = 20;
					$shortexcerpt = wp_trim_words($trimexcerpt, $num_words = $words_short_des, $more = '...'); 
					echo($shortexcerpt);
				?>
				</div>
				<div class="read-more">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo __('Read more', 'achau'); ?></a>
				</div>
			</div><!-- .entry-summary -->
		</div><!-- .post-content -->
	</div><!-- .post-wrapper -->
</article><!-- #post-## -->
