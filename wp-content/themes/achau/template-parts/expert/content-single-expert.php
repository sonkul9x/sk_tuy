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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="ex-wrapper">
		<div class="row">
			<div class="col-xs-12 col-lg-9">
				<div class="post-content">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->
					<div class="sub-label">
						<?php echo get_field('sub_label'); ?>
					</div>
					
					<?php if( have_rows('tac_gia_bai') ): ?>

					<div class="ex-author">
						<h3><?php _e('Author', 'achau'); ?></h3>
						<ul>

						<?php while( have_rows('tac_gia_bai') ): the_row(); 

							// vars
							$name = get_sub_field('author_name');

							?>

							<li>

								<?php echo $name; ?>

							</li>

						<?php endwhile; ?>

						</ul>
					</div>

					<?php endif; ?>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'achau'), 'after' => '</div>', 'pagelink' => '<span>%</span>')); ?>
					</div><!-- .entry-content -->
				</div><!-- .post-content -->
			</div>
			<div class="col-xs-12 col-lg-3">
				<div class="btn-meta">
					<?php
					$file = get_field('tai_xuong_expert');
					$filename_only = basename( get_attached_file( $file['id'] ) ); // Just the file name
					//download=$filename_only
					?>
					<a href="<?php echo $file['url'];?>" target="_blank" class="btn-download" ><?php _e('Download', 'achau'); ?></a>
					<a href="" class="btn-print" onclick="window.print();"><?php _e('Print', 'achau'); ?></a>
				</div>
				<div class="share-box"><?php achau_share_this_post(); ?></div>
			</div>
		</div>
	</div><!-- .expert-wrapper -->
</article><!-- #post-## -->
