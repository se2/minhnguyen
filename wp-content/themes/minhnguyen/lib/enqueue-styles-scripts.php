<?php
/**
 * Enqueue scripts and styles.
 */
function ttg_wp_scripts() {
	// Slick
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/js/slick-1.8.1/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/js/slick-1.8.1/slick-theme.css' );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick-1.8.1/slick.min.js', ['jquery'] );

	// Lightbox2
	wp_enqueue_style( 'lightbox2', get_template_directory_uri() . '/js/lightbox2/dist/css/lightbox.min.css' );
	wp_enqueue_script( 'lightbox2', get_template_directory_uri() . '/js/lightbox2/dist/js/lightbox.min.js', ['jquery'] );

	// Magnific Popup
	wp_enqueue_style( 'magnificpopup', get_template_directory_uri() . '/js/magnificpopup/magnific-popup.css' );
	wp_enqueue_script( 'magnificpopup', get_template_directory_uri() . '/js/magnificpopup/jquery.magnific-popup.min.js', ['jquery'] );

	// Smooth Scroll
	wp_enqueue_script( 'smoothscroll', 'https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll@14/dist/smooth-scroll.polyfills.min.js', ['jquery'] );

	wp_enqueue_style('ttg-wp-style', get_template_directory_uri() . '/dist/app.css');
  wp_enqueue_script('app', get_template_directory_uri() . '/dist/app.js', ['jquery']);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ttg_wp_scripts' );
