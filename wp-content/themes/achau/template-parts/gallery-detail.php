<?php global $post; ?>

<div id="main-body">
	<div class="container">
		<div id="content" class="page-gallery-detail">
			<div class="row">
				<div class="wrap-gallery-detail">
					<div class="col-md-12">
						<div id="sync1" class="owl-carousel owl-theme">
							<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'single-post-thumbnail');?>
							<div class="item" data-src="<?php echo $image[0]; ?>" data-sub-html="<h4><?php the_title() ?></h4><p><?php echo get_the_content() ?></p>">
								<img src="<?php echo $image[0]; ?>" alt="">
								<!-- <i class="icon-zoom"></i> -->
							</div>
							<?php
								if( have_rows('add_image') ):
									while ( have_rows('add_image') ) : the_row();
									$attachment_id = get_sub_field('image_item');
									$size = "full"; 
									$image = wp_get_attachment_image_src( $attachment_id, $size );
							?>
								<div class="item" data-src="<?php echo $image[0]; ?>" data-sub-html="<h4><?php the_title() ?></h4><p><?php echo get_the_content() ?></p>">
									<img src="<?php echo $image[0]; ?>" alt="">
								</div>
							<?php
									endwhile;
								endif;
							?>
						</div>
						<div class="gallery-info">
							<h4><?php the_title(); ?></h4>
							<div class="gallery-des"><?php echo get_the_content() ?></div>
						</div>
						<div class="padding">
							<div id="sync2" class="owl-carousel owl-theme">
								<?php $image_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'gallery_image_thumb');?>
								<div class="item" data-des="<?php echo get_the_content() ?>">
									<img src="<?php echo $image_thumb[0]; ?>" alt="">
								</div>
								<?php
									if( have_rows('add_image') ):
										while ( have_rows('add_image') ) : the_row();
										$attachment_id = get_sub_field('image_item');
										$attachment = get_post($attachment_id);
										$des = @$attachment->post_content;
										$size = "gallery_image_thumb"; 
										$image_thumb = wp_get_attachment_image_src( $attachment_id, $size );
								?>
									<div class="item" data-des="<?php echo $des; ?>">
										<img src="<?php echo $image_thumb[0]; ?>" alt="">
									</div>
								<?php
										endwhile;
									endif;
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>