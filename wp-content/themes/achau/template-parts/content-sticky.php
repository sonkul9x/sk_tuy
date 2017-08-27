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

$class[] = 'sticky-post';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($class); ?>>
	<div class="post-wrapper sticky-post">
		<?php achau_post_thumbnail_sticky(); ?>
		
		<div class="post-content <?php echo esc_attr($hasThumb); ?>">
			<div class="post-inner">
				<header class="entry-header">
					<?php if(is_single()) : ?>
							<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php else : ?>
						<?php the_title(sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
					<?php endif; ?>
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
					
				<?php if(is_single()) : ?>
				<div class="entry-meta">
					<div class="entry-date">
						<?php 
						echo __('Day', 'achau').'<span>'.$post_created_D.'</span><i>,</i>'.__('Month', 'achau').'<span>'.$post_created_M.'</span><i>,</i>'.__('Year', 'achau').'<span>'.$post_created_Y.'</span>';
						?>
					</div>
					<div class="share-this"></div>
				</div><!-- .entry-meta -->
				<?php endif; ?>
				
				<?php if(!is_single()) : ?>
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
				<?php else : ?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'achau'), 'after' => '</div>', 'pagelink' => '<span>%</span>')); ?>
					</div><!-- .entry-content -->
				<?php endif; ?>
			</div><!-- .post-inner -->
		</div><!-- .post-content -->
	</div><!-- .post-wrapper -->
</article><!-- #post-## -->
