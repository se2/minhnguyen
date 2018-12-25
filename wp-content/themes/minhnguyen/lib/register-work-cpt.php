<?php
/**
 * Register Work Custom Post Type
 *
 * @category   CPT
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

function work_cpt() {

	$labels = array(
		'name'                  => _x( 'Works', 'Post Type General Name', 'minhnguyen' ),
		'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'minhnguyen' ),
		'menu_name'             => __( 'Works', 'minhnguyen' ),
		'name_admin_bar'        => __( 'Work', 'minhnguyen' ),
		'archives'              => __( 'Work Archives', 'minhnguyen' ),
		'attributes'            => __( 'Work Attributes', 'minhnguyen' ),
		'parent_item_colon'     => __( 'Parent Work:', 'minhnguyen' ),
		'all_items'             => __( 'All Works', 'minhnguyen' ),
		'add_new_item'          => __( 'Add New Work', 'minhnguyen' ),
		'add_new'               => __( 'Add New', 'minhnguyen' ),
		'new_item'              => __( 'New Work', 'minhnguyen' ),
		'edit_item'             => __( 'Edit Work', 'minhnguyen' ),
		'update_item'           => __( 'Update Work', 'minhnguyen' ),
		'view_item'             => __( 'View Work', 'minhnguyen' ),
		'view_items'            => __( 'View Works', 'minhnguyen' ),
		'search_items'          => __( 'Search Works', 'minhnguyen' ),
		'not_found'             => __( 'Not found', 'minhnguyen' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'minhnguyen' ),
		'featured_image'        => __( 'Featured Image', 'minhnguyen' ),
		'set_featured_image'    => __( 'Set featured image', 'minhnguyen' ),
		'remove_featured_image' => __( 'Remove featured image', 'minhnguyen' ),
		'use_featured_image'    => __( 'Use as featured image', 'minhnguyen' ),
		'insert_into_item'      => __( 'Insert into work', 'minhnguyen' ),
		'uploaded_to_this_item' => __( 'Uploaded to this work', 'minhnguyen' ),
		'items_list'            => __( 'Works list', 'minhnguyen' ),
		'items_list_navigation' => __( 'Works list navigation', 'minhnguyen' ),
		'filter_items_list'     => __( 'Filter works list', 'minhnguyen' ),
	);
	$args = array(
		'label'                 => __( 'Work', 'minhnguyen' ),
		'description'           => __( 'Works', 'minhnguyen' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'          => true,
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => array(
			'slug'       => 'cong-trinh',
			'with_front' => true
		),
		'capability_type'       => 'page',
		'menu_icon'             => 'dashicons-camera',
	);
	register_post_type( 'work', $args );

	// Work Category
	register_taxonomy(
		'work_cat',
		'work',
		array(
			'hierarchical' => true,
			'label'        => 'Work Categories',
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => '/', // This controls the base slug that will display before each term
				'with_front' => false // Don't display the category base before
			)
		)
	);

}
add_action( 'init', 'work_cpt', 0 );
