<?php
/**
 * Icons List ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$bg    = 'background-color:' . get_sub_field( 'background' ) . ';';
$icons = get_sub_field( 'icons' );
$image = get_sub_field( 'left_image' );
?>
<section class="page-block page-block--icons-list pt-40 pb-60 lg:pb-120" style="<?php echo esc_attr( $bg ); ?>">
	<div class="page-block__inner container flex flex-wrap md:items-center lg:items-start">
		<div class="w-full text-center">
			<?php if ( get_sub_field( 'title' ) ) : ?>
			<h2 class="block-title text-4xl md:text-32px uppercase tracking-wide text-center"><?php the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>
			<p class="subtitle text-sm text-grey leading-xl mx-auto"><?php the_sub_field( 'subtitle' ); ?></p>
		</div>
		<?php if ( $image ) : ?>
		<div class="w-full lg:w-3/5 text-center lg:text-left lg:pr-60 mb-40 lg:mb-0">
			<img class="w-full lg:w-auto" src="<?php echo esc_url( $image ); ?>" alt="<?php echo wp_strip_all_tags( get_sub_field( 'title' ) ); ?>">
		</div>
		<?php endif; ?>
		<div class="w-full <?php echo $image ? 'lg:w-2/5' : ''; ?> lg:mt-20">
			<div class="icons-list lg:pr-20">
				<?php foreach ( $icons as $key => $icon ) : ?>
				<div class="icon-item mb-50">
					<div class="icon-heading flex flex-wrap items-start">
						<img src="<?php echo $icon['icon']; ?>" alt="<?php echo $icon['label']; ?>">
						<h3 class="text-2xl"><?php echo $icon['label']; ?></h3>
					</div>
					<p class="leading-xl text-grey mt-20"><?php echo $icon['description']; ?></p>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
  </div>
</section>
