<?php 
add_action( 'init', 'achau_expert_init' );
/**
 * Register a expert post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function achau_expert_init() {
	$labels = array(
		'name'               => _x( 'Experts', 'post type general name', 'achau' ),
		'singular_name'      => _x( 'Expert', 'post type singular name', 'achau' ),
		'menu_name'          => _x( 'Experts', 'admin menu', 'achau' ),
		'name_admin_bar'     => _x( 'Expert', 'add new on admin bar', 'achau' ),
		'add_new'            => _x( 'Add New', 'expert', 'achau' ),
		'add_new_item'       => __( 'Add New Expert', 'achau' ),
		'new_item'           => __( 'New Expert', 'achau' ),
		'edit_item'          => __( 'Edit Expert', 'achau' ),
		'view_item'          => __( 'View Expert', 'achau' ),
		'all_items'          => __( 'All Experts', 'achau' ),
		'search_items'       => __( 'Search Experts', 'achau' ),
		'parent_item_colon'  => __( 'Parent Experts:', 'achau' ),
		'not_found'          => __( 'No experts found.', 'achau' ),
		'not_found_in_trash' => __( 'No experts found in Trash.', 'achau' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'achau' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'expert' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail',)
	);

	register_post_type( 'expert', $args );
}

add_action( 'init', 'create_expert_tax' );

function create_expert_tax() {
	register_taxonomy(
		'ex-year',
		'expert',
		array(
			'label' => __( 'Years' ),
			'rewrite' => array( 'slug' => 'ex-year' ),
			'hierarchical' => true,
			'public'       => true,
			'show_ui'      => true,
			'query_var'    => true
		)
	);
}

//POST TYPE GALLERY
$args = array(
    "label"                         => "Category", 
    "singular_label"                => "Category", 
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => false,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'                       => false,
    'query_var'                     => true
);

register_taxonomy( 'category-gallery', 'gallery', $args );

add_action('init', 'gallery_register'); 
 
function gallery_register() {  
    $themename = 'achau';
    $labels = array(
        'name'               => __('Gallery', 'post type general name', $themename),
        'singular_name'      => __('Gallery Item', 'post type singular name', $themename),
        'add_new'            => __('Add New', 'gallery item', $themename),
        'add_new_item'       => __('Add New', $themename),
        'edit_item'          => __('Edit', $themename),
        'new_item'           => __('Add New', $themename),
        'view_item'          => __('View', $themename),
        'search_items'       => __('Search', $themename),
        'not_found'          => __('No gallery items have been added yet', $themename),
        'not_found_in_trash' => __('Nothing found in Trash', $themename),
        'parent_item_colon'  => ''
    );
    $args = array(  
        'labels'            => $labels,  
        'public'            => true,  
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menus' => false,
        'rewrite'           => false,
        'supports'          => array('title', 'editor', 'thumbnail'),
        'has_archive'       => true,
        'taxonomies'        => array('category-gallery')
       );  
    register_post_type( 'gallery' , $args );  
}

//POST TYPE BOOK
add_action( 'init', 'achau_books_init' );
function achau_books_init() {
	$labels = array(
		'name'               => _x( 'Books', 'post type general name', 'achau' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'achau' ),
		'menu_name'          => _x( 'Books', 'admin menu', 'achau' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'achau' ),
		'add_new'            => _x( 'Add New', 'book', 'achau' ),
		'add_new_item'       => __( 'Add New Book', 'achau' ),
		'new_item'           => __( 'New Book', 'achau' ),
		'edit_item'          => __( 'Edit Book', 'achau' ),
		'view_item'          => __( 'View Book', 'achau' ),
		'all_items'          => __( 'All Books', 'achau' ),
		'search_items'       => __( 'Search Books', 'achau' ),
		'parent_item_colon'  => __( 'Parent Books:', 'achau' ),
		'not_found'          => __( 'No books found.', 'achau' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'achau' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'achau' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail',)
	);

	register_post_type( 'book', $args );
}

add_action( 'init', 'create_book_tax' );
function create_book_tax() {
	register_taxonomy(
		'category-book',
		'book',
		array(
			'label' => __( 'Category' ),
			'rewrite' => array( 'slug' => 'category-book' ),
			'hierarchical' => true,
			'public'       => true,
			'show_ui'      => true,
			'query_var'    => true
		)
	);
}
