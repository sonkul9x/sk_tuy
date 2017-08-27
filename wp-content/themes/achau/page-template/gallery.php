<?php
/**
 * Template Name: Gallery
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header();
global $post
?>

<div id="site-content" class="main-container no-padding gallery">
	<div class="gallery-banner">
		<?php the_content(); ?>
	</div>

	<div class="container">
		<?php
			$categories = get_terms( array(
			    'taxonomy' => 'category-gallery',
			    'hide_empty' => false,
			    'orderby'        => 'ID',
				'order'          => 'DESC',
			    //'orderby' => 'count'
			));
		?>

		<?php if($categories): ?>
			<?php $i = 1; ?>
			<?php foreach($categories as $cate): ?>
			<div class="row time-line">
				<div class="col-md-5"><div class="border"></div></div>
				<div class="col-md-2 text-center"><span class="year"><?php echo $cate->name; ?></span></div>
				<div class="col-md-5">
					<div class="border last"></div>
					<div class="expand" data-year="<?php echo $cate->name; ?>">
						<?php if($i > 2): ?>
							<i class="fa fa-plus"></i>
						<?php else: ?>
							<i class="fa fa-minus"></i>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row <?php if($i > 2){echo "none";} ?>" id="<?php echo $cate->name; ?>">
				<?php 
					$args = array(
						'post_type'      => 'gallery',
						'posts_per_page' => 6,
						'post_status'    => 'publish',
						'orderby'        => 'ID',
						'order'          => 'DESC',
						'tax_query' => array(
							array(
						        'taxonomy' => 'category-gallery',
						        'terms' => $cate->slug,
						        'field' => 'slug',
						        'operator' => 'IN'
					        )
					     )
					);
					$the_query = new WP_Query( $args ); 
				?>
				<?php if ( $the_query->have_posts() ) : ?>
					<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'gallery_image_list');?>
					<div class="col-md-4">
						<div class="post-item">
							<div class="post-item-i">
								<div class="post-image">
									<a href="<?php echo get_the_permalink(); ?>">
										<img src="<?php echo $image[0]; ?>" alt="">
									</a>
									<div class="overlay">
										<a class="btn-readmore" href="<?php echo get_the_permalink(); ?>"><?php _e('View Album', 'achau'); ?></a>
									</div>
								</div>
								<div class="post-info">
									<div class="post-date">
										<?php 
											$post_created	= date_i18n("d M Y", strtotime($post->post_date));
											$post_created_D	= date_i18n("d", strtotime($post->post_date));
											$post_created_M	= date_i18n("m", strtotime($post->post_date));
											$post_created_Y	= date_i18n("Y", strtotime($post->post_date));
											
											if ((ICL_LANGUAGE_CODE=="vi")) : 
												echo __('Day', 'achau').'<span>'.$post_created_D.'</span><i>,</i>'.__('Month', 'achau').'<span>'.$post_created_M.'</span><i>,</i>'.__('Year', 'achau').'<span>'.$post_created_Y.'</span>';
											else :
												echo $post_created;
											endif;
											
										?>
									</div>
									<div class="post-name"><a href="<?php echo get_the_permalink(); ?>"><?php the_title() ?></a></div>
									<div class="post-desc"><?php the_content() ?></div>
								</div>
							</div>
						</div>
					</div>
					<?php wp_reset_postdata(); ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			<?php $i++; ?>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div><!-- #site-content -->

<?php get_footer(); ?>