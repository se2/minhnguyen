<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maple-studio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex flex-wrap loop-row items-center' ); ?>>
	<?php $thumb = get_the_post_thumbnail_url( $post, 'medium' ); ?>
	<div class="post-loop-thumbnail w-full bg-cover bg-center bg-no-repeat" style="background-image:url(<?php echo esc_url( $thumb ); ?>);">
		<a href="<?php the_permalink(); ?>" class="block w-full h-full"></a>
	</div>
	<div class="post-loop-content w-full text-left">
		<span class="date font-bold text-sm block text-black tracking-wide"><?php the_time( 'n.j.Y' ); ?></span>
		<a class="no-underline" href="<?php the_permalink(); ?>"><h2 class="uppercase text-secondary tracking-wide title"><?php the_title(); ?></h2></a>
		<?php if ( get_field( 'post_author' ) ) : ?>
		<span class="posted-by capitalize">
			<span class="byline"> by <span class="author vcard"><a class="url fn n pointer-events-none cursor-default" href="#!"><?php the_field( 'post_author' ); ?></a></span></span>
		</span>
		<?php endif; ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="button border uppercase font-bold">Read</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
