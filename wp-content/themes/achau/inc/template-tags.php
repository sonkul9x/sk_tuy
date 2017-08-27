<?php 
if(! function_exists('achau_the_custom_logo')) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function achau_the_custom_logo() {
	if(function_exists('the_custom_logo')) {
		the_custom_logo();
	}
}
endif;

//REMOVE TITLE CATEGORIES
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});
if ( ! function_exists( 'achau_pagination' ) ) :
/* Pagination */
function achau_pagination() {
	global $wp_query;

	$big = 999999999; // need an unlikely integer
 
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'prev_text'    => wp_kses(__('<i class="fa fa-chevron-left"></i>', 'achau'), array('i' => array('class' => array()))),
		'next_text'    => wp_kses(__('<i class="fa fa-chevron-right"></i>', 'achau'), array('i' => array('class' => array()))),
	) );
}
endif;

//Change search form
function achau_search_form($form) {
	if(get_search_query()!=''){
		$search_str = get_search_query();
	} else {
		$search_str = esc_html__('Search...', 'achau');
	}
	
	$form = '<form role="search" method="get" id="blogsearchform" class="searchform" action="' . esc_url(home_url('/')). '" >
	<div class="form-input">
		<input class="input_text" type="text" value="'.esc_attr($search_str).'" name="s" id="search_input" />
		<button class="button" type="submit" id="blogsearchsubmit"><i class="fa fa-search"></i></button>
		<input type="hidden" name="post_type" value="post,page,product,expert,gallery" />
		</div>
	</form>';
	
	$inlineJS = '
		jQuery(document).ready(function(){
			jQuery("#search_input").focus(function(){
				if(jQuery(this).val()=="'. esc_html__('Search...', 'achau').'"){
					jQuery(this).val("");
				}
			});
			jQuery("#search_input").focusout(function(){
				if(jQuery(this).val()==""){
					jQuery(this).val("'. esc_html__('Search...', 'achau').'");
				}
			});
			jQuery("#blogsearchsubmit").on("click", function(){
				if(jQuery("#search_input").val()=="'. esc_html__('Search...', 'achau').'" || jQuery("#search_input").val()==""){
					jQuery("#search_input").focus();
					return false;
				}
			});
		});
	';
	wp_add_inline_script('achau-js', $inlineJS);
	return $form;
}
add_filter('get_search_form', 'achau_search_form');

/*
* Function for News Page
*/

function achau_get_title_category($cat) {
	$category = get_category($cat);
	$achau_options 	= get_option("achau_options");
	?>
	<div class="st-title">
		<?php if ($cat == $achau_options['choose_cat_1']) : ?>
			<h1><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" title="<?php echo esc_attr($category->name); ?>"><?php echo esc_html($category->name); ?></a></h1>
		<?php else : ?>
			<h2><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" title="<?php echo esc_attr($category->name); ?>"><?php echo esc_html($category->name); ?></a></h2>
		<?php endif ?>
		<a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" title="<?php echo esc_attr($category->name); ?>" class="view-all"><?php _e('View all', 'achau'); ?></a>
	</div>
	<?php
}

//GET POSTS OF CATEGORIES
function achau_get_posts($type, $cat, $posts_per_page) {
	$type = $type;
	
	switch($type){
		case 'featured' : 
			$query_args               = array(
				'posts_per_page' => $posts_per_page,
				'post_status'    => 'publish',
				'post_type'      => 'post',
				'cat'			 => $cat,
				'meta_key' => '_is_ns_featured_post', 
				'meta_value' => 'yes',
				'orderby'        => 'date',
				'order'          => 'DESC',
			);
			break;
		default:
			$query_args               = array(
				'posts_per_page' => $posts_per_page,
				'post_status'    => 'publish',
				'post_type'      => 'post',
				'cat'			 => $cat,
				'orderby'        => 'date',
				'order'          => 'DESC',
			);
			break;
	}
	$query              = new WP_Query( $query_args );
	return $query;
}

function achau_render_posts ($type, $cat, $posts_per_page, $desc = 20, $style = 'default') {
	
	global $post, $style, $desc;
	$r = achau_get_posts ($type, $cat, $posts_per_page);
	ob_start();
	if ( $r->have_posts() ) {
		while ( $r->have_posts() ) {
			$r->the_post();
			get_template_part('template-parts/post', $style);
		}
	}
	wp_reset_postdata();
	$content = ob_get_clean();

	return $content;
}

function achau_render_posts_shortcode($atts) {
	
	global $style, $desc;
	$atts = shortcode_atts(
		array(
			'type' => 'latest',
			'cat' => '1',
			'number' => '6',
			'desc' => '20',
			'style' => 'default'
		),
		$atts
	);
	$style = $atts['style'];
	$desc = $atts['desc'];
	$content = achau_render_posts($atts['type'], $atts['cat'], $atts['number'], $desc , $style);

	return $content;
}

add_shortcode( 'achau_posts', 'achau_render_posts_shortcode' );

/*FEATURED POSTS*/
function achau_get_featured_posts($posts_per_page) {
	$query_args = array(
		'posts_per_page' => $posts_per_page,
		'post_status'    => 'publish',
		'post_type'      => 'post',
		'meta_key' => '_is_ns_featured_post', 
		'meta_value' => 'yes',
		'orderby'        => 'date',
		'order'          => 'DESC',
	);
	$query              = new WP_Query( $query_args );
	return $query;
}

function achau_render_featured_posts ( $posts_per_page, $desc = 20, $style = 'default') {
	
	global $post, $style, $desc;
	$r = achau_get_featured_posts($posts_per_page);
	ob_start();
	if ( $r->have_posts() ) {
		while ( $r->have_posts() ) {
			$r->the_post();
			get_template_part('template-parts/post', $style);
		}
	}
	wp_reset_postdata();
	$content = ob_get_clean();

	return $content;
}

function achau_render_featured_posts_shortcode($atts) {
	
	global $style, $desc;
	$atts = shortcode_atts(
		array(
			'number' => '6',
			'desc' => '20',
			'style' => 'default'
		),
		$atts
	);
	$style = $atts['style'];
	$desc = $atts['desc'];
	$content = achau_render_featured_posts($atts['number'], $desc , $style);

	return $content;
}

add_shortcode( 'achau_featured_posts', 'achau_render_featured_posts_shortcode' );

// ARCHIVE
if(! function_exists('achau_post_thumbnail')) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own achau_post_thumbnail() function to override in a child theme.
 *
 */
function achau_post_thumbnail() {
	$sticky_ids = get_option( 'sticky_posts' );
	if(post_password_required() || is_attachment() || ! has_post_thumbnail()) {
		return;
	}
	$hasThumb = 'has-thumb';
	if(has_post_thumbnail() && get_the_post_thumbnail() == NULL){
		$hasThumb = 'no-thumb';
	}
	if(!is_singular()) :
		?>
		<div class="post-thumbnail <?php echo esc_attr($hasThumb); ?>">
			<a class="link-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail('post_category', array('alt' => the_title_attribute('echo=0'))); ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php
	else : 
		?>
		<div class="post-thumbnail <?php echo esc_attr($hasThumb); ?>">
			<a class="link-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail('', array('alt' => the_title_attribute('echo=0'))); ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php
	endif; // End is_singular()
}
endif;


if(! function_exists('achau_post_thumbnail_sticky')) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own achau_post_thumbnail() function to override in a child theme.
 *
 */
function achau_post_thumbnail_sticky() {
	$sticky_ids = get_option( 'sticky_posts' );
	if(post_password_required() || is_attachment() || ! has_post_thumbnail()) {
		return;
	}
	$hasThumb = 'has-thumb';
	if(has_post_thumbnail() && get_the_post_thumbnail() == NULL){
		$hasThumb = 'no-thumb';
	}
	if(!is_singular()) :
		?>
		<div class="post-thumbnail <?php echo esc_attr($hasThumb); ?>">
			<a class="link-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail('post_sticky', array('alt' => the_title_attribute('echo=0'))); ?>
			</a>
		</div><!-- .post-thumbnail -->
		<?php
	endif; // End is_singular()
}
endif;

//RESGITER WIDGET POSTS
include get_template_directory() . '/inc/widgets/widget-recent-posts.php';
 
add_action("widgets_init", "load_custom_widgets_wordpress");
function load_custom_widgets_wordpress() {
	unregister_widget("WP_Widget_Recent_Posts");
	register_widget("Widget_Recent_Posts");
}


//SHARE

function achau_share_this_post() {
	global $post;
	?>
	<div class="share-this">
		<a target="_blank" href="https://www.facebook.com/sharer.php?s=100&amp;p%5Btitle%5D=<?php echo get_the_title(); ?>&amp;p%5Burl%5D=<?php echo urlencode(get_permalink(get_the_ID())); ?>" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	
		<a target="_blank" href="https://twitter.com/share?url=<?php echo urlencode(get_permalink(get_the_ID())); ?>&amp;text=<?php echo get_the_title(); ?>" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
		
		<a target="_blank" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink(get_the_ID())); ?>&amp;title=<?php echo get_the_title(); ?>" class="gplus" onclick='javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;'><i class="fa fa-google-plus" aria-hidden="true"></i></a>
		
		<a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink(get_the_ID())); ?>&amp;description=<?php echo get_the_excerpt(); ?>&amp;media=<?php the_post_thumbnail_url(); ?>" class="pinterest" onclick="window.open(this.href); return false;"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
		<?php
		if (is_single()) :
		?>
		<a href="" class="sh_print" onclick="window.print();"></a>
		<?php
		endif;
		?>
	</div>
	<?php
}
