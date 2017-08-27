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
	<div class="post-wrapper single">
		<div class="post-content <?php echo esc_attr($hasThumb); ?>">
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			
			<div class="entry-meta">
				<div class="entry-date">
					<?php 
					if ((ICL_LANGUAGE_CODE=="vi")) : 
						echo __('Day', 'achau').'<span>'.$post_created_D.'</span><i>,</i>'.__('Month', 'achau').'<span>'.$post_created_M.'</span><i>,</i>'.__('Year', 'achau').'<span>'.$post_created_Y.'</span>';
					else :
						echo $post_created;
					endif;
					?>
				</div>
				<div class="share-box"><?php achau_share_this_post(); ?></div>
			</div><!-- .entry-meta -->
			
			<?php achau_post_thumbnail(); ?>
		
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'achau'), 'after' => '</div>', 'pagelink' => '<span>%</span>')); ?>
			</div><!-- .entry-content -->
		</div><!-- .post-content -->
	</div><!-- .post-wrapper -->
</article><!-- #post-## -->
