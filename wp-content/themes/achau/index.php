<?php
/**
 * The main template file
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header(); ?>
<div id="site-content" class="main-container">
	<div class="container">
		<div class="row">
			<div id="content" class="col-xs-12 col-md-<?php echo is_active_sidebar('sidebar-1') ? 9 : 12; ?>">
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
							get_template_part('template-parts/content', get_post_format());
						?>

					<?php endwhile; ?>
					<div class="clear clearfix"></div>
					<?php the_posts_navigation(); ?>

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