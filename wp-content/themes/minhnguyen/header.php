<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package maple-studio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- FontAwesome 5.6.3 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!-- Roboto -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=latin-ext,vietnamese" rel="stylesheet">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="site">

	<div id="site-canvas" class="relative w-full h-full">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'minhnguyen' ); ?></a>

		<div class="offcanvas-menu block lg:hidden" id="mobile-menu">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-left',
				'menu_id'        => 'primary-left',
				'container'      => false,
			) );
			wp_nav_menu( array(
				'theme_location' => 'menu-right',
				'menu_id'        => 'primary-right',
				'container'      => false,
			) );
			?>
		</div>

		<header id="masthead" class="site-header w-full <?php echo is_front_page() ? 'absolute bg-transparent' : 'bg-white'; ?>">

			<div class="wrapper container container--wide flex flex-wrap items-center justify-between h-full">

				<div class="site-socials">
					<?php
					$socials = get_field( 'social_accounts', 'option' );
					if ( $socials ) :
					?>
					<ul class="socials-list list-reset">
						<?php foreach ( $socials as $key => $social ) : ?>
						<li class="social inline-block">
							<a target="_blank" href="<?php echo esc_url( $social['social_url'] ); ?>" class="block rounded-full flex items-center justify-center">
								<i class="<?php echo esc_attr( $social['social_service'] ); ?>"></i>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</div>

				<div class="center-nav flex flex-wrap items-center justify-center">

					<nav id="left-navigation" class="left-navigation hidden lg:block">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-left',
							'menu_id'        => 'primary-left',
						) );
						?>
					</nav><!-- #site-navigation -->

					<div class="site-branding">
						<?php $logo = is_front_page() ? get_field( 'white_logo', 'option' ) : get_field( 'dark_logo', 'option' ); ?>
						<a href="<?php the_clean_url(); ?>">
							<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="site-logo">
						</a>
					</div>

					<nav id="right-navigation" class="right-navigation hidden lg:block">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-right',
							'menu_id'        => 'primary-right',
						) );
						?>
					</nav><!-- #site-navigation -->

				</div>

				<div class="toggle-button text-right">
					<button class="hamburger hamburger--collapse outline-none inline-block lg:hidden" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

			</div>

		</header><!-- #masthead -->

		<div id="content" class="site-content">
