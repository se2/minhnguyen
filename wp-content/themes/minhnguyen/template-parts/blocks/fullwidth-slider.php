<?php
/**
 * Fullwidth Slider ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$slides   = get_sub_field( 'slides' );
?>

<div class="page-block pafe-block--full-slider">
	<?php if ( $slides ) : ?>
	<div class="fullwidth-slider">
		<?php foreach ( $slides as $key => $slide ) : ?>
		<div class="slide bg-cover bg-no-repeat bg-center outline-none" style="background-image:url(<?php echo esc_url( $slide['url'] ); ?>);"></div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
</div>
