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
<?php if( isset($_GET['gallery'])): ?>
	<?php include( TEMPLATEPATH.'/template-parts/gallery-detail.php' ); ?>
<?php else: ?>
<div id="site-content" class="main-container max1300 single-post">
	<div class="site-breadcrumb">
		<div class="container">
			<?php achau_breadcrumbs(); ?>
		</div>
	</div><!-- .site-breadcrumb -->
	
	<div class="container">
		<div class="row">
			<div id="content" class="col-xs-12 col-lg-<?php echo is_active_sidebar('sidebar-1') ? 9 : 12; ?>">
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
								get_template_part('template-parts/content', 'single');
							?>
						<?php endwhile; ?>
					<?php endif; ?>
				</main><!-- #main -->
			</div><!-- #content -->

			<?php get_sidebar(); ?>
		</div>
	</div>
	<div class="related-posts">
		<div class="container">
			<div class="st-title"><h2 class="style-1 no-arrow"><a href="#"><?php _e('Related Posts', 'achau'); ?></a></h2></div>
			<div class="related owl-carousel owl-theme">
				<?php
				/*
				 * Code hiển thị bài viết liên quan trong cùng 1 category
				 * Code by levantoan.com
				 */
				$categories = get_the_category(get_the_ID());
				if ($categories){
					$category_ids = array();
					foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
					$args=array(
						'category__in' => $category_ids,
						'post__not_in' => array(get_the_ID()),
						'posts_per_page' => 6,
					);
					$related = new wp_query($args);
					if( $related->have_posts() ):
						while ($related->have_posts()): $related->the_post();
							get_template_part('template-parts/post', 'related');
						endwhile;
						echo '</ul>';
					endif;
					wp_reset_query();
				}
				?>
			</div>
			</div>
		</div>
	</div>
</div><!-- #site-content -->
<?php endif; ?>
<?php get_footer(); ?>
