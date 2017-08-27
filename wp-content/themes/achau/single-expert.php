<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package A Chau
 */
$achau_options = get_option("achau_options");
global $post, $style, $desc;
get_header(); ?>
<div id="site-content" class="main-container max1300 single-expert">
	<div class="site-breadcrumb">
		<div class="container">
			<?php achau_breadcrumbs(); ?>
		</div>
	</div><!-- .site-breadcrumb -->
	
	<div class="container">
		<div id="content">
			<main id="main" class="site-main" role="main">
				<?php if(have_posts()) : ?>
					<?php /* Start the Loop */ ?>
					<?php while(have_posts()) : the_post(); ?>

						<?php
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php(where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part('template-parts/expert/content-single', 'expert');
						?>
					<?php endwhile; ?>
				<?php endif; ?>
			</main><!-- #main -->
		</div><!-- #content -->
	</div>
	<div class="latest-posts">
		<div class="container">
			<div class="st-title"><h2 class="style-1 no-arrow"><a href="#"><?php _e('Latest Posts', 'achau'); ?></a></h2></div>
			<div class="row">
				<div class="latest owl-carousel owl-theme">
					<?php
					$args=array(
						'post_type' => 'expert',
						'posts_per_page' => 6,
					);
					$related = new wp_query($args);
					if( $related->have_posts() ):
						while ($related->have_posts()): $related->the_post();
							get_template_part('template-parts/expert/content', 'expert');
						endwhile;
						echo '</ul>';
					endif;
					wp_reset_query();
					?>
				</div>
			</div>
		</div>
	</div>
</div><!-- #site-content -->
<?php get_footer(); ?>
