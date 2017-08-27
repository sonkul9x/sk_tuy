<?php 
function achau_breadcrumbs() {
	$showOnHome = 0;
	$showCurrent = 1;
	$delimiter = '<span class="separator"> / </span>';
	$home = esc_html__('Home', 'achau'); // chữ thay thế cho phần 'Home' link
	$before = '<span class="current">'; // thẻ html đằng trước mỗi link 
	$after = '</span>'; // thẻ đằng sau mỗi link

	global $post;
	$homeLink = home_url();
	
	if (is_home() || is_front_page()) {
		if ($showOnHome == 1) echo '<div class="crumbs"><a href="' . esc_url($homeLink) . '">' . $home . '</a></div>';

	} else {
		echo '<div id="crumbs">';
			echo '<a href="' . esc_url($homeLink) . '">' . $home . '</a> ' . $delimiter . ' ';

				if ( is_category() ) {
				$thisCat = get_category(get_query_var('cat'), false);
				if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
				echo ($before) . single_cat_title('', false) . $after;

			} elseif ( is_search() ) {
				echo ($before) . esc_html__('Search results for', 'achau'). ' "' . get_search_query() . '"' . $after;

			} elseif ( is_day() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
				echo ($before) . get_the_time('d') . $after;

			} elseif ( is_month() ) {
				echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
				echo ($before) . get_the_time('F') . $after;

			} elseif ( is_year() ) {
				echo ($before) . get_the_time('Y') . $after;

			} elseif ( is_single() && !is_attachment() ) {
				if ( get_post_type() != 'post' ) {
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					echo '<a href="' . esc_url($homeLink . '/' . $slug['slug']) . '/">' . esc_html($post_type->labels->singular_name) . '</a>';
					if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
				} else {
					$cat = get_the_category(); $cat = $cat[0];
					$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
					if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
					echo ($cats);
					if ($showCurrent == 1) echo ($before) . get_the_title() . $after;
				}

			} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
				$post_type = get_post_type_object(get_post_type());
				echo ($before) . esc_html($post_type->labels->singular_name) . $after;

			} elseif ( is_attachment() ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id    = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo ' ' . $crumb . ' ' . $delimiter . ' ';
				echo $before . '' . get_the_title() . '' . $after;

			} elseif ( is_page() && !$post->post_parent ) {
				if ($showCurrent == 1) echo ($before) . get_the_title() . $after;

			} elseif ( is_page() && $post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo ($breadcrumbs[$i]);
					if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
				}
				if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

			} elseif ( is_tag() ) {
				echo ($before) . esc_html__('Posts tagged', 'achau'). ' "' . single_tag_title('', false) . '"' . $after;

			} elseif ( is_author() ) {
				global $author;
				$userdata = get_userdata($author);
				echo ($before) .  esc_html__('Articles posted by ', 'achau') . esc_html($userdata->display_name) . $after;

			} elseif ( is_404() ) {
				echo ($before) . esc_html__('Error 404', 'achau') . $after;
			}

			if ( get_query_var('paged') ) {
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
				echo esc_html__('Page', 'achau') . ' ' . get_query_var('paged');
				if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
			}
		echo '</div>';

	}
} // end achau_breadcrumbs()

?>