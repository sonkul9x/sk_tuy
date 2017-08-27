<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package A Chau
 */
$achau_options = get_option("achau_options");
$wp_query;
get_header(); ?>
<div id="site-content" class="main-container max1040 template-search">
	<div class="page-header">
		<div class="container">
			<h1 class="page-title"><?php _e('Seach results', 'achau'); ?></h1>
		</div>
	</div><!-- .site-breadcrumb -->
	
	<div id="content">
		<div class="container">
			<main id="main" class="site-main" role="main">
				<p class="result"><?php echo __('Search results have ', 'achau').'<span>'.$wp_query->found_posts.'</span>'.__(' for', 'achau'). ' "' . get_search_query().'"'; ?></p>
				
				<?php if(have_posts()) : ?>
					<?php /* Start the Loop */ ?>
					<?php while(have_posts()) : the_post(); ?>
					
						
						<?php
							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php(where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part('template-parts/content','search');
						?>

					<?php endwhile; ?>
					<div class="clear clearfix"></div>
					<div class="pagination">
						<?php achau_pagination(); ?>
					</div>
				<?php else : ?>

					<?php get_template_part('template-parts/content', 'none'); ?>

				<?php endif; ?>
			</main><!-- #main -->
		</div><!-- #content -->
	</div>
</div><!-- #site-content -->
<?php get_footer(); ?>
