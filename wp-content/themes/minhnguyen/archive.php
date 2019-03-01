<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maple-studio
 */

get_header();

$post_types = array( 'work', 'project' );
?>

	<?php if ( !is_post_type_archive( $post_types ) ) : ?>
	<div class="w-full overflow-auto">
		<h1 class="blog-title uppercase text-primary tracking-wide text-center text-4xl leading-loose">
			<?php the_archive_title(); ?>
		</h1>
	</div>
	<?php endif; ?>

	<!-- Blog main loop -->
	<div class="main-loop <?php echo get_post_type(); ?>">
		<div id="primary" class="content-area w-full <?php echo !is_post_type_archive( $post_types ) ? 'container' : ''; ?>">
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
	</div>

	<?php get_template_part( 'template-parts/partials/page', 'footer' ); ?>

<?php
get_footer();
