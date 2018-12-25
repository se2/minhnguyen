<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maple-studio
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer">
			<div class="site-info container">
				<?php the_field( 'footer_text', 'option' ); ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->

	</div><!-- #site-canvas -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
