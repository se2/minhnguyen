<?php
/**
 * Content Editor ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$bg = 'background-color:' . get_sub_field( 'background' ) . ';';
?>
<section class="page-block page-block--editor" style="<?php echo esc_attr( $bg ); ?>">
	<div class="page-block__inner container">
		<div class="w-full px-20">
			<?php if ( get_sub_field( 'title' ) ) : ?>
			<h2 class="block-title text-center"><?php the_sub_field( 'title' ); ?></h2>
			<hr class="bg-grey">
			<?php endif; ?>
			<?php if ( get_sub_field( 'subtitle' ) ) : ?>
			<p class="block-subtitle text-center text-grey-dark text-base px-10 mb-20"><?php the_sub_field( 'subtitle' ); ?></p>
			<?php endif; ?>
			<?php the_sub_field( 'editor' ); ?>
		</div>
  </div>
</section>
