<?php
/**
 * Template part for displaying single Work and Project
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maple-studio
 */

global $post;
$featured = get_the_post_thumbnail_url( $post, 'full' );
$images   = get_field( 'work_gallery' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-featured bg-cover bg-center bg-no-repeat w-full mb-40 lg:mb-80" style="background-image:url(<?php echo esc_url( $featured ); ?>);"></div>

	<div class="container">
		<div class="w-full flex flex-wrap-reverse lg:flex-wrap">
			<div class="post-excerpt w-full <?php echo get_field( 'visible_info' ) ? 'lg:w-1/2 lg:pr-70' : ''; ?> text-justify">
				<?php
				the_title( '<h1 class="entry-title text-2xl mb-30 leading-tighter">', '</h1>' );
				the_excerpt();
				?>
			</div>
			<?php if ( get_field( 'visible_info' ) ) : ?>
			<div class="post-info w-full lg:w-1/2">
				<h1 class="entry-title text-2xl mb-30 leading-tighter">
					Chi tiết dự án
				</h1>
				<div class="w-full flex flex-wrap">
					<?php
					$metadata = array(
						array(
							'icon'    => get_template_directory_uri() . '/images/chu-dau-tu.png',
							'heading' => 'Chủ đầu tư',
							'field'   => 'chu_dau_tu'
						),
						array(
							'icon'    => get_template_directory_uri() . '/images/dien-tich.png',
							'heading' => 'Diện tích xây dựng',
							'field'   => 'dien_tich'
						),
						array(
							'icon'    => get_template_directory_uri() . '/images/hoan-thanh.png',
							'heading' => 'Hoàn thành',
							'field'   => 'hoan_thanh'
						),
						array(
							'icon'    => get_template_directory_uri() . '/images/thiet-ke.png',
							'heading' => 'Thiết kế & Thi công',
							'field'   => 'thiet_ke'
						),
					);
					foreach ( $metadata as $key => $meta ) : ?>
					<div class="w-1/2 flex flex-wrap items-start metadata pb-30 md:pr-30">
						<img src="<?php echo esc_url( $meta['icon'] ); ?>" alt="">
						<div class="pb-30">
							<p class="font-bold text-black text-sm leading-tiny"><?php echo esc_html( $meta['heading'] ); ?></p>
							<p class="text-grey italic text-sm leading-tiny"><?php the_field( $meta['field'] ); ?></p>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<div class="w-full post-content">
			<?php the_content(); ?>
		</div>

		<?php if ( $images ) : ?>
		<div class="work-gallery w-full">
			<?php foreach ( $images as $key => $image ) : ?>
			<a href="<?php echo esc_url( $image['url'] ); ?>" data-lightbox="gallery-<?php the_ID(); ?>" class="block w-full text-center overflow-hidden" data-title="<?php echo ( $image['caption'] ) ? $image['caption'] : get_the_title(); ?>">
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo ( $image['alt'] ) ? $image['alt'] : get_the_title(); ?>" class="<?php echo ( $image['width'] < $image['height'] ) ? 'w-auto' : 'w-full'; ?>">
			</a>
			<p class="caption text-primary lg:px-20 pt-10">
				<?php echo $image['caption']; ?>
			</p>
			<p class="description lg:px-20 <?php echo ( $key < count( $images ) - 1 ) ? 'mb-40' : ''; ?>">
				<?php echo $image['description']; ?>
			</p>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
