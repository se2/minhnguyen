<?php
/**
 * Center Slider ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$slides = get_sub_field( 'slides' );
?>

<div class="page-block page-block--center-slider">
	<div class="container">
		<div class="w-full flex flex-wrap justify-between mb-60 items-center">
			<div class="w-full lg:w-3/5">
				<h2 class="block-title text-4xl md:text-5xl uppercase tracking-wide"><?php the_sub_field( 'title' ); ?></h2>
				<p class="block-subtitle text-sm"><?php the_sub_field( 'subtitle' ); ?></p>
			</div>
			<div class="w-full lg:w-2/5 text-center lg:text-right mt-30 lg:mt-0">
				<?php the_cta( get_sub_field( 'cta' ), 'button uppercase inline-block' ); ?>
			</div>
		</div>
	</div>
	<?php if ( $slides ) : ?>
	<div class="center-slider px-20 md:px-0">
		<?php foreach ( $slides as $key => $slide ) : ?>
		<div class="slide bg-cover bg-center bg-no-repeat outline-none" style="background-image:url(<?php echo esc_url( $slide['slide_image'] ); ?>);">
			<div class="flex items-end w-full h-full">
				<a href="<?php echo esc_url( $slide['slide_link'] ); ?>">
					<h3 class="text-white text-2xl px-30 py-20 leading-normal w-full lg:w-2/3 relative z-50 opacity-0"><?php echo esc_html( $slide['slide_title'] ); ?></h3>
				</a>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>