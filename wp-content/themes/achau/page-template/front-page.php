<?php
/**
 * Template Name: Home
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header(); ?>
<div id="site-content" class="main-container no-padding header-fixed front-page">
	<div class="container">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div><!-- #site-content -->
<?php get_footer('2'); ?>