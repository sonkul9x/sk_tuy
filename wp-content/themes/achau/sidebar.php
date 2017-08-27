<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package A Chau
 */

if(is_active_sidebar('sidebar-1')) : ?>

<div id="sidebar" class="col-xs-12 col-lg-3 widget-area" role="complementary">
	<?php dynamic_sidebar('sidebar-1'); ?>
</div><!-- #sidebar -->

<?php endif; ?>
