<?php
/**
 * Template Name: Knowledge
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header(); ?>
<div id="site-content" class="main-container no-padding template-knowledge">
	<div class="page-header">
		<div class="container">
			<h1 class="page-title"><?php _e('Video Tutorial', 'achau'); ?></h1>
		</div>
	</div><!-- .page-header -->
	
	<div id="content">
		<div class="st-video">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-7 col-lg-8 large-video">
						<div class="box-video">
							<div class="index">
								<?php
								$cat_name = '';
								if ((ICL_LANGUAGE_CODE == "vi")) : 
									$cat_name = 'videos-vi' ;
								else :
									$cat_name = 'videos' ;
								endif;
								$args=array(
									'posts_per_page' 	=> 1,
									'post_status'    	=> 'publish',
									'post_type'      	=> 'post',
									'category_name '	=> $cat_name,
									'orderby'        	=> 'date',
									'order'          	=> 'DESC',
								);
								$videos = new wp_query($args);
								if( $videos->have_posts() ):
									while ($videos->have_posts()): $videos->the_post();
										get_template_part('template-parts/post', 'video-large');
									endwhile;
									echo '</ul>';
								endif;
								wp_reset_query();
								?>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-md-5 col-lg-4 small-video">
						<h3><?php _e('Danh sách video','achau');  ?></h3>
						<div class="latest-videos">
							<div class="inner">
								<?php
								$args=array(
									'posts_per_page' 	=> 6,
									'post_status'    	=> 'publish',
									'post_type'      	=> 'post',
									'category_name '	=> $cat_name,
									'orderby'        	=> 'date',
									'order'          	=> 'DESC',
								);
								$videos = new wp_query($args);
								if( $videos->have_posts() ):
									while ($videos->have_posts()): $videos->the_post();
										get_template_part('template-parts/post', 'video');
									endwhile;
									echo '</ul>';
								endif;
								wp_reset_query();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .st-video -->
		
		<div class="st-books">
			<div class="container">
				<?php get_template_part('page-template/section','books'); ?>
				<div class="all-book owl-carousel owl-theme">
					<?php
					foreach($achau_options['all_book'] as $book) {
						$image = $book['image'];
						$url = $book['url'];
						$title = $book['title'];
						?>
						<div class="item-book">
							<a href="<?php echo $url; ?>">
								<ul class="box-books">
									<li class="cover"><img src="<?php echo $image; ?>" alt="<?php echo $title; ?>" /></li>
									<li class="page page1"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/trang-12.png" alt="<?php echo $title; ?>" /></li>
									<li class="page page2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/trang-12.png" alt="<?php echo $title; ?>" /></li>
									<li class="page page3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/trang-12.png" alt="<?php echo $title; ?>" /></li>
								</ul>
							</a>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		
		<div class="st-featured-expert">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-6 column-1">
						<?php get_template_part('page-template/section','title-expert'); ?>
					</div><!-- .st-title-expert -->
					
					<div class="col-xs-12 col-lg-6 column-2">
						<div class="st-featured">
							<?php
							$meta_key = 'ex_featured';
							if ((ICL_LANGUAGE_CODE=="vi")) : 
								$meta_key = 'ex_featured_vi';
							else :
								$meta_key = 'ex_featured';;
							endif;
							//$meta = get_field('ex_featured', 405);
							//var_dump($meta); die();
							$args = array(
								'post_type' => 'expert',
								'posts_per_page' => 1,
								'meta_key'		=> $meta_key,
								'meta_value'	=> true
							);
							$featured = new wp_query($args);
							if( $featured->have_posts() ):
								while ($featured->have_posts()): $featured->the_post();
									get_template_part('template-parts/expert/content', 'featured-expert');
								endwhile;
								echo '</ul>';
							endif;
							wp_reset_query();
							?>
						</div><!-- .st-featured -->
					</div>
				</div>
			</div>
		</div><!-- .st-featured-expert -->
		
		<div class="st-expert-tabs">
			<div class="container">
				<div class="tab_heading">
					<ul class="nav nav-tabs" role="tablist">
					<?php 
					$taxonomies = get_categories('taxonomy=ex-year&type=expert'); 
					if  ($taxonomies) {
					  foreach ($taxonomies  as $taxonomy ) {
						echo '<li role="presentation"><a href="#'.$taxonomy->term_id.'" aria-controls="'.$taxonomy->term_id.'" role="tab" data-toggle="tab">'. $taxonomy->name .'</a></li>';
					  }
					}  
					?>
					</ul>
				</div>
				
				<div class="tab-content">
					<?php 
					if  ($taxonomies) {
						foreach ($taxonomies  as $taxonomy ) {
					?>
					<div role="tabpanel" class="tab-pane" id="<?php echo $taxonomy->term_id; ?>">
						<p class="shadow"><?php echo $taxonomy->name; ?></p>
						<h3 class="tab-heading"><?php _e('Researchs','achau');  ?> <b><?php echo __('year','achau');  ?> <span><?php echo $taxonomy->name; ?></span></b></h3>
						<div class="row">
						<?php
						$args=array(
							'post_type' => 'expert',
							'posts_per_page' => -1,
							'post_status'    => 'publish',
							'orderby'        => 'ID',
							'order'          => 'DESC',
							'tax_query' => array(
								array(
									'taxonomy' => 'ex-year',
									'terms' => $taxonomy->slug,
									'field' => 'slug',
									'operator' => 'IN'
								)
							 )
						);
						$tabs = new wp_query($args);
						if( $tabs->have_posts() ):
							while ($tabs->have_posts()): $tabs->the_post();
								get_template_part('template-parts/expert/content', 'expert');
							endwhile;
							echo '</ul>';
						endif;
						wp_reset_query();
						?>
						</div>
					</div>
					<?php
						}
					} 
					?>
				</div>
			</div>
		</div>
	</div>
</div><!-- #site-content -->
<?php get_footer(); ?>