<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maple-studio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'flex flex-wrap loop-row items-center relative' ); ?>>
	<?php $thumb = get_the_post_thumbnail_url( $post, 'large' ); ?>
	<div class="post-loop-thumbnail w-full bg-cover bg-center bg-no-repeat" style="background-image:url(<?php echo esc_url( $thumb ); ?>);">
	</div>
	<a href="<?php the_permalink(); ?>" class="block w-full h-full absolute flex flex-wrap items-center justify-center post-link">
		<div class="w-full">
			<h2 class="text-center uppercase text-primary tracking-wide title text-lg leading-tighter px-20"><?php the_title(); ?></h2>
			<span class="date text-center font-normal text-12px block text-white tracking-wide leading-tighter"><?php the_time( 'F j, Y' ); ?></span>
		</div>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->

