<?php
/**
 * Testimonials Slider ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$bg   = 'background-color:' . get_sub_field( 'background' ) . ';';
$args = array(
	'post_type'      => 'testimonial',
	'posts_per_page' => get_sub_field( 'limit' ),
	'orderby'        => 'date',
	'order'          => 'DESC',
);
$testimonials = get_posts( $args );
?>
<section class="page-block page-block--testimonials" style="<?php echo esc_attr( $bg ); ?>">
	<div class="page-block__inner container">
		<div class="w-full px-20">
			<?php if ( get_sub_field( 'title' ) ) : ?>
			<h2 class="block-title text-center text-4xl md:text-5xl uppercase tracking-wide"><?php the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>
		</div>
		<?php if ( $testimonials ) : ?>
		<div class="testimonials-slider">
			<?php
			foreach ( $testimonials as $key => $t ) :
				$avatar = get_the_post_thumbnail_url( $t, 'thumbnail' );
			?>
			<div class="slide">
				<div class="flex flex-wrap">
					<div class="w-full lg:w-1/2 test-info">
						<div class="flex items-center">
							<div class="avatar bg-cover bg-center bg-no-repeat" style="background-image:url(<?php echo esc_url( $avatar ); ?>);"></div>
							<div class="test-heading">
								<p class="test-title text-primary font-bold text-base"><?php echo esc_html( $t->post_title ); ?></p>
								<p class="test-subtitle font-normal text-base"><?php the_field( 'testimonial_title', $t->ID ); ?></p>
							</div>
						</div>
						<hr class="w-full">
						<div class="flex flex-wrap items-start justify-between lg:justify-center">
							<div class="quote-mark">
								<img src="<?php echo get_template_directory_uri(); ?>/images/quote.png" alt="quote">
							</div>
							<div class="quote-content">
								<p><?php echo $t->post_content; ?></p>
							</div>
						</div>
					</div>
					<div class="w-full lg:w-1/2 test-media bg-cover bg-center bg-no-repeat flex items-center justify-center" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/demo-media.png);">
						<a href="#!">
							<img src="<?php echo get_template_directory_uri(); ?>/images/play.png" alt="Play" class="relative z-10 play">
						</a>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
  </div>
</section>
