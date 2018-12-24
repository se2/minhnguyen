<?php
/**
 * Enqueue scripts and styles.
 */
function ttg_wp_scripts() {
	// Slick
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/js/slick-1.8.1/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/js/slick-1.8.1/slick-theme.css' );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick-1.8.1/slick.min.js', ['jquery'] );

	wp_enqueue_style('ttg-wp-style', get_template_directory_uri() . '/dist/app.css');
  wp_enqueue_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery']);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ttg_wp_scripts' );
