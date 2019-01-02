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
$slider_id    = uniqid( 'testimonials-slider-' . get_the_ID() . '-' );
?>
<section class="page-block page-block--testimonials" style="<?php echo esc_attr( $bg ); ?>">
	<div class="page-block__inner container">
		<div class="w-full px-20">
			<?php if ( get_sub_field( 'title' ) ) : ?>
			<h2 class="block-title text-center text-4xl md:text-5xl uppercase tracking-wide"><?php the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>
		</div>
		<?php if ( $testimonials ) : ?>
		<div class="testimonials-slider" id="<?php echo esc_attr( $slider_id ); ?>">
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
					<?php
					$media_type   = get_field( 'testimonial_media_type', $t );
					$thumbnail    = get_template_directory_uri() . '/images/demo-media.png';
					$href         = '#!';
					if ( $media_type === 'gallery' ) {
						$gallery   = get_field( 'testimonial_gallery', $t );
						$thumbnail = $href = $gallery[0]['url'];
					} elseif ( $media_type === 'video' ) {
						$href = get_field( 'embed_video_link', $t );
						$thumbnail    = get_field( 'youtube_video_thumbnail', $t ) ? get_field( 'youtube_video_thumbnail', $t ) : get_video_thumbnail( $href );
					}
					?>
					<div class="w-full lg:w-1/2 test-media bg-cover bg-center bg-no-repeat flex items-center justify-center" style="background-image:url(<?php echo esc_url( $thumbnail ); ?>);">
						<a data-slider="<?php echo esc_attr( $slider_id ); ?>" data-effect="mfp-zoom-in" class="<?php echo ( $media_type === 'video' ) ? 'js-popup' : ''; ?>" href="<?php echo esc_url( $href ); ?>" <?php echo ( $media_type === 'gallery' ) ? 'data-lightbox="gallery-' . $t->ID . '"' : ''; ?>>
							<img src="<?php echo get_template_directory_uri(); ?>/images/play.png" alt="Play" class="relative z-10 play">
						</a>
						<?php
						if ( $media_type === 'gallery' ) :
							for ( $i = 1; $i < count( $gallery ); $i++ ) :
						?>
						<a href="<?php echo esc_url( $gallery[ $i ]['url'] ); ?>" data-lightbox="gallery-<?php echo esc_attr( $t->ID ); ?>"></a>
						<?php
							endfor;
						endif;
						?>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
	<script>
	var $ = jQuery;
	$(".js-popup").magnificPopup({
		type: "iframe",
		// Delay in milliseconds before popup is removed
		removalDelay: 500,
		// Class that is added to popup wrapper and background
		// make it unique to apply your CSS animations just to this exact popup
		callbacks: {
			beforeOpen: function() {
				$("#" + this.st.el.attr('data-slider')).slick("slickPause");
				this.st.mainClass = this.st.el.attr('data-effect');
			},
			close: function() {
				$("#" + this.st.el.attr('data-slider')).slick("slickPlay").slick('setOption', 'autoplay', true).slick('setOption', 'autoplaySpeed', 4000);
			}
		},
		midClick: true, // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
		iframe: {
			markup:
				'<div class="mfp-iframe-scaler mfp-with-anim">' +
				'<div class="mfp-close"></div>' +
				'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
				'<div class="mfp-title">Some caption</div>' +
				'</div>'
		},
	});

	</script>
</section>
