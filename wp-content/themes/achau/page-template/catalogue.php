<?php
/**
 * Template Name: Catalogue
 *
 * @package A Chau
 *
 */
$achau_options = get_option("achau_options");
get_header(); ?>
<div id="site-content" class="main-container header-fixed template-catalogue">
	<div class="container">
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<div class="all-catalogue">
			<div class="row">
				<?php
				$cat_id = lang_object_ids( 121 ,'category-book');
				$args=array(
					'post_type' => 'book',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'category-book',
							'terms' => $cat_id,
							'field' => 'term_id',
							'operator' => 'IN'
						)
					 )
				);
				$book = new wp_query($args);
				if( $book->have_posts() ):
					while ($book->have_posts()): $book->the_post();
						get_template_part('template-parts/book/content', 'catalogue');
					endwhile;
					echo '</ul>';
				endif;
				wp_reset_query();
				?>
			</div>
		</div>
	</div>
</div><!-- #site-content -->
<?php get_footer(); ?>