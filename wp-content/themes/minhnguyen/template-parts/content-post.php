<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package maple-studio
 */

global $post;
$featured = get_the_post_thumbnail_url( $post, 'full' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-featured py-30 bg-cover bg-center bg-no-repeat w-full mb-40 lg:mb-80 flex flex-wrap justify-center items-center" style="background-image:url(<?php echo esc_url( $featured ); ?>);">
		<div class="w-auto post-header text-center relative z-50 px-20">
			<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="back-to-blog flex flex-wrap items-center text-white uppercase	text-12px leading-lg justify-center">
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" alt="<?php the_title(); ?>" class="mr-5">
			 	<span>TRỞ VỀ DANH SÁCH</span>
			</a>
			<?php the_title( '<h1 class="entry-title text-4xl lg:text-5xl leading-normal font-normal text-white">', '</h1>' ); ?>
			<span class="date text-center font-normal text-sm block text-white tracking-wide leading-normal"><?php the_time( 'F j, Y' ); ?></span>
		</div>
	</div>

	<div class="container">
		<div class="w-full flex flex-wrap-reverse lg:flex-wrap">
			<div class="post-content w-full <?php echo get_field( 'visible_info' ) ? 'lg:w-1/2' : ''; ?> text-justify">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

<!-- Post Navigation -->
<?php
$next_post = get_adjacent_post( false, '', false );
$prev_post = get_adjacent_post( false, '', true );
if ( $next_post ) {
	$next_post_link_url = get_permalink( $next_post->ID );
}
if ( $prev_post ) {
	$prev_post_link_url = get_permalink( $prev_post->ID );
}
?>
<div class="post-navigation w-full overflow-auto flex flex-wrap">
	<?php
	if ( $prev_post ) :
		$thumbnail = get_the_post_thumbnail_url( $prev_post, 'large' );
	?>
	<div class="post-prev dark-overlay w-full lg:w-1/2 bg-cover bg-center bg-no-repeat flex flex-wrap items-center justify-center" style="background-image:url(<?php echo esc_url( $thumbnail ); ?>);">
		<div class="w-full xl:w-5/6 px-20 xl:px-0 relative z-50">
			<a href="<?php echo esc_url( $prev_post_link_url ); ?>" class="back-to-blog flex flex-wrap items-center text-white uppercase	text-12px leading-lg justify-center">
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" alt="<?php the_title(); ?>" class="mr-5">
				<span>Bài Trước</span>
			</a>
			<a title="<?php echo esc_html( $prev_post->post_title ); ?>" class="block no-underline uppercase tracking-wide text-white font-bold text-xl leading-lg w-full text-center" href="<?php echo esc_url( $prev_post_link_url ); ?>">
				<?php echo '<span>' . $prev_post->post_title . '</span>'; ?>
			</a>
		</div>
	</div>
	<?php endif; ?>
	<?php
	if ( $next_post ) :
		$thumbnail = get_the_post_thumbnail_url( $next_post, 'large' );
	?>
	<div class="post-next dark-overlay w-full lg:w-1/2 bg-cover bg-center bg-no-repeat flex flex-wrap items-center justify-center" style="background-image:url(<?php echo esc_url( $thumbnail ); ?>);">
		<div class="w-full xl:w-5/6 px-20 xl:px-0 relative z-50">
			<a href="<?php echo esc_url( $next_post_link_url ); ?>" class="back-to-blog flex flex-wrap items-center text-white uppercase	text-12px leading-lg justify-center">
				<span>Bài Tiếp Theo</span>
				<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-left.png" alt="<?php the_title(); ?>" class="ml-5">
			</a>
			<a title="<?php echo esc_html( $next_post->post_title ); ?>" class="block no-underline uppercase tracking-wide text-white font-bold text-xl leading-lg w-full text-center" href="<?php echo esc_url( $next_post_link_url ); ?>">
				<?php echo '<span>' . $next_post->post_title . '</span>'; ?>
			</a>
		</div>
	</div>
	<?php endif; ?>
</div>