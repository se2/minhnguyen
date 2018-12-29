<?php
/**
 * Timeline ACF Module
 *
 * @category   ACF Modules
 * @package    Lib
 * @author     Maple Studio
 * @link       http://maplestudio.vn/
 */

$bg     = 'background-color:' . get_sub_field( 'background' ) . ';';
$events = get_sub_field( 'events' );
?>
<section class="page-block page-block--timeline pt-60 pb-60" style="<?php echo esc_attr( $bg ); ?>">
	<div class="page-block__inner flex flex-wrap items-center container">
		<div class="w-full">
			<?php if ( get_sub_field( 'title' ) ) : ?>
			<h2 class="block-title text-4xl md:text-5xl uppercase tracking-wide leading-sm"><?php the_sub_field( 'title' ); ?></h2>
			<?php endif; ?>
		</div>
		<?php
		if ( $events ) :
			$slide_id = uniqid( 'page-' . get_the_ID() . '-' );
		?>
		<div class="w-full events-nav relative flex-wrap hidden md:flex">
			<?php foreach ( $events as $key => $evt ) : ?>
			<div class="flex-1 text-center leading-0 event-<?php echo esc_attr( $key ); ?>">
				<a href="#!" class="text-black" data-slide="<?php echo esc_attr( $key ); ?>" data-id="<?php echo esc_attr( $slide_id ); ?>">
					<p class="leading-none text-center text-sm mb-10 leading-tiny"><?php echo $evt['event_time']; ?></p>
					<span class="inline-block dot <?php echo ( $key === 0 ) ? 'dot--past' : ''; ?>"></span>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="grey-bar"></div>
			<div class="timeline-bar" style="width:<?php echo ( 100 / count( $events ) / 2 ); ?>%"></div>
			<div class="timeline-dot" style="left:calc(<?php echo ( 100 / count( $events ) / 2 ); ?>% - 6px)"></div>
		</div>
		<div class="w-full events-slider mx-auto" id="<?php echo esc_attr( $slide_id ); ?>">
			<?php foreach ( $events as $key => $evt ) : ?>
			<div class="event-slide outline-none">
				<span class="leading-none text-sm mb-10 leading-tiny block md:hidden"><?php echo $evt['event_time']; ?></span>
				<h3 class="text-2xl leading-lg text-black font-normal"><?php echo $evt['event_title']; ?></h3>
				<?php echo $evt['event_description']; ?>
			</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
  </div>
</section>
