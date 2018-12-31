<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package maple-studio
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ttg_wp_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ttg_wp_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ttg_wp_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'ttg_wp_pingback_header' );

/**
 * Friendly Block Titles
 *
 * @link http://serversideguy.com/2017/03/28/how-can-i-create-custom-titles-for-advanced-custom-fields-flexible-content-blocks/
 */
function my_layout_title( $title, $field, $layout, $i ) {
	if ( $value = get_sub_field( 'layout_title' ) ) {
		return $value;
	} else {
		foreach ( $layout['sub_fields'] as $sub ) {
			if ( $sub['name'] == 'layout_title' ) {
				$key = $sub['key'];
				if ( is_array( $field['value'] ) && array_key_exists( $i, $field['value']) && $value = $field['value'][$i][$key] )
					return $value;
			}
		}
	}
	return $title;
}

add_filter( 'acf/fields/flexible_content/layout_title', 'my_layout_title', 10, 4 );

/**
 * Remove 'Archives' and 'Category' strings in archive pages
 */
add_filter( 'get_the_archive_title', function ( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_post_type_archive( array( 'work', 'post', 'project' ) ) ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
});

/**
 * Return 6 posts per page for Work
 */
function set_posts_per_page_for_work_cpt( $query ) {
	if ( !is_admin() && $query->is_main_query() && is_post_type_archive( array( 'work', 'project' ) ) ) {
		$query->set( 'posts_per_page', '6' );
	}
}

add_action( 'pre_get_posts', 'set_posts_per_page_for_work_cpt' );

/**
 * Update Google Maps API key for ACF
 */
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyCJ6QXR6UlBS2h0i9vjjgiQ72RkYDD4UWs');
}

add_action('acf/init', 'my_acf_init');

/**
 * Update Gravity Forms HTML markup
 */
add_filter( 'gform_field_content', function( $field_content, $field ) {
	// Append to frontend only
	if ( ! IS_ADMIN ) {
		$field_content = str_replace( '</div>', '<label>' . $field->label . '</label><span class="bar"></span></div">', $field_content );
	}
	return $field_content;
}, 10, 5 );
