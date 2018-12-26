<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maple-studio
 */

global $post;
$featured = get_the_post_thumbnail_url( $post, 'full' );
$images   = get_field( 'work_gallery' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-single' ); ?>>

	<div class="post-featured bg-cover bg-center bg-no-repeat w-full mb-40 lg:mb-80" style="background-image:url(<?php echo esc_url( $featured ); ?>);"></div>

	<div class="container">
		<div class="w-full flex flex-wrap-reverse lg:flex-wrap">
			<div class="post-content w-full <?php echo get_field( 'visible_info' ) ? 'lg:w-1/2' : ''; ?> text-justify">
				<?php
				the_title( '<h1 class="entry-title text-2xl mb-30 leading-tighter">', '</h1>' );
				the_content();
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

		<?php if ( $images ) : ?>
		<div class="work-gallery w-full">
			<?php foreach ( $images as $key => $image ) : ?>
			<a href="<?php echo esc_url( $image['url'] ); ?>" data-lightbox="gallery-<?php the_ID(); ?>" class="block w-full mb-40 overflow-auto" data-title="<?php the_title(); ?>">
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php the_title(); ?>" class="w-full">
			</a>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
