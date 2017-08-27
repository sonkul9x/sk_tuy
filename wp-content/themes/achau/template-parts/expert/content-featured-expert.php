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
					
			<div class="ex-desc">
				<?php 
					$trimexcerpt = get_the_content();
					$words_short_des = 25;
					$shortexcerpt = wp_trim_words($trimexcerpt, $num_words = $words_short_des, $more = '...'); 
					echo($shortexcerpt);
				?>
			</div>
			<div class="btn-groups">
				<?php
				$file = get_field('tai_xuong_expert');
				$filename_only = basename( get_attached_file( $file['id'] ) ); // Just the file name
				//download=$filename_only
				?>
				<div class="btn-download">
					<a href="<?php echo $file['url'];?>" target="_blank"><?php _e('Download', 'achau'); ?></a>
				</div>
				<div class="view-more">
					<a href="<?php the_permalink(); ?>"><?php _e('Xem chi tiết', 'achau'); ?></a>
				</div>
			</div>
		</div>
	</div><!-- .post-wrapper -->
</div><!-- #post-## -->
