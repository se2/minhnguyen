<?php
/**
 * Content Editor ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$bg    = 'background-color:' . get_sub_field( 'background' ) . ';';
$image = get_sub_field( 'image' );
?>
<section class="page-block page-block--editor pt-40 pb-60 lg:pb-120" style="<?php echo esc_attr( $bg ); ?>">
	<div class="page-block__inner container flex flex-wrap items-center lg:px-40 xl:px-120">
		<div class="w-full <?php echo $image ? 'lg:w-1/2 mb-40 lg:mb-0' : ''; ?>">
			<?php if ( get_sub_field( 'title' ) ) : ?>
			<h2 class="block-title text-4xl md:text-32px uppercase tracking-wide"><?php the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>
			<?php the_sub_field( 'editor' ); ?>
		</div>
		<?php if ( $image ) : ?>
		<div class="w-full lg:w-1/2 text-center lg:text-right lg:pl-40">
			<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo wp_strip_all_tags( get_sub_field( 'title' ) ); ?>">
		</div>
		<?php endif; ?>
  </div>
</section>
