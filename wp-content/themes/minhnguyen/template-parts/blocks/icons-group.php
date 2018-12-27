<?php
/**
 * Icons Group ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$icons = get_sub_field( 'icons' );
?>

<div class="page-block page-block--icons">
	<div class="container">
		<div class="w-full flex flex-wrap justify-between mb-60 items-center">
			<h2 class="w-full block-title text-4xl md:text-5xl uppercase tracking-wide text-center mb-10"><?php the_sub_field( 'title' ); ?></h2>
			<p class="block-subtitle text-sm w-full lg:w-3/5 mx-auto text-center"><?php the_sub_field( 'subtitle' ); ?></p>
		</div>
		<?php if ( $icons ) : ?>
		<div class="w-full flex flex-wrap icons-group">
			<?php foreach ( $icons as $key => $icon ) : ?>
			<div class="icon-group w-1/2 md:w-1/4 text-center mb-40 md:mb-0">
				<div class="w-full icon-image flex justify-center items-center">
					<img src="<?php echo esc_url( $icon['icon'] ); ?>" alt="<?php echo esc_url( $icon['description'] ); ?>">
				</div>
				<p class="icon-figure text-lg text-black leading-normal"><?php echo $icon['figure'] ?></p>
				<hr>
				<p class="icon-desc leading-normal text-base uppercase text-grey"><?php echo $icon['description']; ?></p>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</div>