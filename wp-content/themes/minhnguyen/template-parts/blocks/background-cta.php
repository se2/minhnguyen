<?php
/**
 * Background CTA ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$bg_type = get_sub_field( 'background_type' );
$bg      = 'background-color:' . get_sub_field( 'background' ) . ';';
if ( $bg_type === 'image' ) {
	$bg = 'background-image:url(' . get_sub_field( 'background_image' ) . ');';
}
?>
<section class="page-block page-block--bg-cta bg-cover bg-no-repeat bg-center" style="<?php echo esc_attr( $bg ); ?>">
	<div class="page-block__inner container text-center">
		<div class="w-full px-20">
			<?php if ( get_sub_field( 'subtitle' ) ) : ?>
			<p class="block-subtitle tracking-wide text-center text-white text-lg"><?php the_sub_field( 'subtitle' ); ?></p>
			<?php endif; ?>
			<?php if ( get_sub_field( 'title' ) ) : ?>
			<h2 class="block-title text-center text-white text-4xl md:text-5xl lg:text-6xl font-bold uppercase tracking-wide"><?php the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>
			<?php the_cta( get_sub_field( 'cta' ), 'button inline-block' ); ?>
		</div>
  </div>
</section>
