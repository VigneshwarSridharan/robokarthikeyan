<?php
/**
 *
 * @package robokarthikeyan
 */

// Our custom post type function
function create_posttype() {

	register_post_type( 'art',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Art List' ),
				'singular_name' => __( 'Art' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'art'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


/*
* Creating a function to create our CPT
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Arts', 'Post Type General Name', 'robokarthikeyan' ),
		'singular_name'       => _x( 'Art', 'Post Type Singular Name', 'robokarthikeyan' ),
		'menu_name'           => __( 'Arts', 'robokarthikeyan' ),
		'parent_item_colon'   => __( 'Parent Art', 'robokarthikeyan' ),
		'all_items'           => __( 'All Art', 'robokarthikeyan' ),
		'view_item'           => __( 'View Art', 'robokarthikeyan' ),
		'add_new_item'        => __( 'Add New Art', 'robokarthikeyan' ),
		'add_new'             => __( 'Add New', 'robokarthikeyan' ),
		'edit_item'           => __( 'Edit Art', 'robokarthikeyan' ),
		'update_item'         => __( 'Update Art', 'robokarthikeyan' ),
		'search_items'        => __( 'Search Art', 'robokarthikeyan' ),
		'not_found'           => __( 'Not Found', 'robokarthikeyan' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'robokarthikeyan' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'art', 'robokarthikeyan' ),
		'description'         => __( 'Art and reviews', 'robokarthikeyan' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions' ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'art', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init', 'custom_post_type', 0 );
