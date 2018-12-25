<?php
/**
 * Register Project Custom Post Type
 *
 * @category   CPT
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

function project_cpt() {

	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'minhnguyen' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'minhnguyen' ),
		'menu_name'             => __( 'Projects', 'minhnguyen' ),
		'name_admin_bar'        => __( 'Project', 'minhnguyen' ),
		'archives'              => __( 'Project Archives', 'minhnguyen' ),
		'attributes'            => __( 'Project Attributes', 'minhnguyen' ),
		'parent_item_colon'     => __( 'Parent Project:', 'minhnguyen' ),
		'all_items'             => __( 'All Projects', 'minhnguyen' ),
		'add_new_item'          => __( 'Add New Project', 'minhnguyen' ),
		'add_new'               => __( 'Add New', 'minhnguyen' ),
		'new_item'              => __( 'New Project', 'minhnguyen' ),
		'edit_item'             => __( 'Edit Project', 'minhnguyen' ),
		'update_item'           => __( 'Update Project', 'minhnguyen' ),
		'view_item'             => __( 'View Project', 'minhnguyen' ),
		'view_items'            => __( 'View Projects', 'minhnguyen' ),
		'search_items'          => __( 'Search Project', 'minhnguyen' ),
		'not_found'             => __( 'Not found', 'minhnguyen' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'minhnguyen' ),
		'featured_image'        => __( 'Featured Image', 'minhnguyen' ),
		'set_featured_image'    => __( 'Set featured image', 'minhnguyen' ),
		'remove_featured_image' => __( 'Remove featured image', 'minhnguyen' ),
		'use_featured_image'    => __( 'Use as featured image', 'minhnguyen' ),
		'insert_into_item'      => __( 'Insert into project', 'minhnguyen' ),
		'uploaded_to_this_item' => __( 'Uploaded to this project', 'minhnguyen' ),
		'items_list'            => __( 'Projects list', 'minhnguyen' ),
		'items_list_navigation' => __( 'Projects list navigation', 'minhnguyen' ),
		'filter_items_list'     => __( 'Filter projects list', 'minhnguyen' ),
	);
	$args = array(
		'label'                 => __( 'Project', 'minhnguyen' ),
		'description'           => __( 'Projects', 'minhnguyen' ),
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
			'slug'       => 'du-an',
			'with_front' => true
		),
		'capability_type'       => 'page',
		'menu_icon'             => 'dashicons-format-image',
	);
	register_post_type( 'project', $args );

	// Project Category
	register_taxonomy(
		'project_cat',
		'project',
		array(
			'hierarchical' => true,
			'label'        => 'Project Categories',
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => '/', // This controls the base slug that will display before each term
				'with_front' => false // Don't display the category base before
			)
		)
	);

}
add_action( 'init', 'project_cpt', 0 );
