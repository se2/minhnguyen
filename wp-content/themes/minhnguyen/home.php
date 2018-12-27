<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ttg-wp-theme
 */

get_header();
?>

	<!-- Blog main loop -->
	<div class="container flex flex-wrap main-loop <?php echo get_post_type(); ?>">
		<div id="primary" class="content-area w-full">
			<main id="main" class="site-main w-full flex flex-wrap">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'loop' );
				endwhile;
				// Posts pagination
				if ( function_exists( 'custom_pagination' ) ) {
					custom_pagination();
				} else {
					the_posts_navigation();
				}
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>

	<?php get_template_part( 'template-parts/partials/page', 'footer' ); ?>

<?php
get_footer();
