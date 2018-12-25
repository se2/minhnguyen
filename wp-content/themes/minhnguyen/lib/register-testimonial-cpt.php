<?php
/**
 * Register Testimonial Custom Post Type
 *
 * @category   CPT
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

function testimonial_cpt() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'minhnguyen' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'minhnguyen' ),
		'menu_name'             => __( 'Testimonials', 'minhnguyen' ),
		'name_admin_bar'        => __( 'Testimonial', 'minhnguyen' ),
		'archives'              => __( 'Testimonial Archives', 'minhnguyen' ),
		'attributes'            => __( 'Testimonial Attributes', 'minhnguyen' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'minhnguyen' ),
		'all_items'             => __( 'All Testimonials', 'minhnguyen' ),
		'add_new_item'          => __( 'Add New Testimonial', 'minhnguyen' ),
		'add_new'               => __( 'Add New', 'minhnguyen' ),
		'new_item'              => __( 'New Testimonial', 'minhnguyen' ),
		'edit_item'             => __( 'Edit Testimonial', 'minhnguyen' ),
		'update_item'           => __( 'Update Testimonial', 'minhnguyen' ),
		'view_item'             => __( 'View Testimonial', 'minhnguyen' ),
		'view_items'            => __( 'View Testimonials', 'minhnguyen' ),
		'search_items'          => __( 'Search Testimonial', 'minhnguyen' ),
		'not_found'             => __( 'Not found', 'minhnguyen' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'minhnguyen' ),
		'featured_image'        => __( 'Featured Image', 'minhnguyen' ),
		'set_featured_image'    => __( 'Set featured image', 'minhnguyen' ),
		'remove_featured_image' => __( 'Remove featured image', 'minhnguyen' ),
		'use_featured_image'    => __( 'Use as featured image', 'minhnguyen' ),
		'insert_into_item'      => __( 'Insert into testimonial', 'minhnguyen' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'minhnguyen' ),
		'items_list'            => __( 'Testimonials list', 'minhnguyen' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'minhnguyen' ),
		'filter_items_list'     => __( 'Filter testimonials list', 'minhnguyen' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'minhnguyen' ),
		'description'           => __( 'Customer Testimonials', 'minhnguyen' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
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
		'capability_type'       => 'page',
		'menu_icon'             => 'dashicons-testimonial',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'testimonial_cpt', 0 );