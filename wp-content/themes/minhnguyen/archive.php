<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maple-studio
 */

get_header();
?>

	<div class="w-full bg-grey-light overflow-auto mb-60">
		<h1 class="blog-title uppercase text-primary tracking-wide text-center text-4xl leading-none">
			<?php the_archive_title(); ?>
		</h1>
	</div>

	<!-- Blog main loop -->
	<div class="container flex flex-wrap px-20 2xl:px-0 main-loop">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
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
