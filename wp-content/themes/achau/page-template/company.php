<?php
/**
 * Template Name: Company
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header(); ?>
<script>
jQuery(document).ready(function($) {
	$('.template-company').onepage_scroll({
		sectionContainer: 'div.st-layer',
		responsiveFallback: 1200,
		loop: true
	});
});
</script>
<div id="site-content" class="main-container no-padding header-fixed template-company">
	<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</div><!-- #site-content -->

<?php get_footer(); ?>