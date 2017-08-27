<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package A Chau
 */
$achau_options = get_option("achau_options");
get_header(); ?>
<div id="site-content" class="main-container max1300 site-archive">
	<div class="container">
		<div class="row">
			<div id="content" class="col-xs-12 col-lg-<?php echo is_active_sidebar('sidebar-1') ? 9 : 12; ?>">
				<main id="main" class="site-main" role="main">
					<header class="page-header default">
						<h1 class="page-title"><?php the_archive_title(); ?></h1>
					</header><!-- .page-header -->
					<?php if(is_category('105') || is_category('106')) : ?>
					<div class="bn-events">
						<div class="item-event">
							<img src="<?php echo $achau_options['bn_events']['0']['image']; ?>" alt="<?php echo $achau_options['bn_events']['0']['title']; ?>"/>
						</div>
						<div class="list-event visible-nav">
							<div class="row">
								<div class="inner owl-carousel owl-theme">
									<?php
									$i = 0;
									foreach($achau_options['bn_events'] as $banner) {
										$i++;
										$image = $banner['image'];
										$url = $banner['url'];
										$title = $banner['title'];
										?>
										<div class="event">
											<a href="" data-id="<?php echo $i; ?>" data-src="<?php echo $image; ?>" data-title="<?php echo $title; ?>">
												<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>"/>
											</a>
										</div>
										<?php
									}
									?>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php if(have_posts()) : ?>
						<?php /* Start the Loop */ ?>
						<?php 
						$loop = 0;
						while(have_posts()) : the_post(); $loop++;
							if ($loop == 1) :
								get_template_part('template-parts/content', 'sticky');
							endif;
							if ($loop > 1) :
						?>
							<?php
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php(where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part('template-parts/content', get_post_format());
							?>

						<?php 
							endif; 
							//$loop++;
						endwhile; 
						?>
						<div class="clear clearfix"></div>
						<div class="pagination">
							<?php achau_pagination(); ?>
						</div>
					<?php else : ?>

						<?php get_template_part('template-parts/content', 'none'); ?>

					<?php endif; ?>
				</main><!-- #main -->
			</div><!-- #content -->

			<?php get_sidebar(); ?>
		</div>
	</div>
</div><!-- #site-content -->
<?php get_footer(); ?>
