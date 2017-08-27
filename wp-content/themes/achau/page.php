<?php
/**
 * Template Name: Catalogue
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header(); ?>
<div id="site-content" class="main-container default-page">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div><!-- #site-content -->
<?php get_footer(); ?>