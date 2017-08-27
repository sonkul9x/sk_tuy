<?php
global $post;
$class = '';
$cat_id = lang_object_ids( 121 ,'category-book');
$term = get_term( $cat_id, 'category-book' );
$count = $term->count;

if($count < 3){
	$class = 'col-md-6';
}else{
	$class = 'col-md-4';
}
$thumb		= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
$thumb_url 	= $thumb['0'];
?>
<div class="col-xs-12 <?php echo $class; ?> item-book">
	<div class="item-book-i">
		<?php
		$file = get_field('tai_sach');
		$filename_only = basename( get_attached_file( $file['id'] ) );
		?>
		<a href="<?php echo $file['url'];?>" target="_blank">
			<ul class="box-books">
				<li class="cover"><img src="<?php echo $thumb_url; ?>" alt="<?php echo get_the_title(); ?>" /></li>
				<li class="page page1"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/catalogue-page-2.png" alt="<?php echo get_the_title(); ?>" /></li>
				<li class="page page2"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/catalogue-page-2.png" alt="<?php echo get_the_title(); ?>" /></li>
				<li class="page page3"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/catalogue-page-2.png" alt="<?php echo get_the_title(); ?>" /></li>
			</ul>
		</a>
		<a href="<?php echo $file['url'];?>" target="_blank" class="btn-download" ><?php echo __('Download', 'achau'); ?></a>
	</div>
</div>