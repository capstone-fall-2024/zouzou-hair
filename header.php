<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zouzou-hair-theme
 */

$store_info = get_store_info();

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="edmonton, garneau, hair, haircuts, styling, color, balayage, ombre, extensions, highlights, keratin, blowout, salon, barber, updos, curls, straightening, fringe, layers, bridal, pixie, weaves, toning">
	<meta name="description" content="Zouzou Hair is a hair salon in the heart of Edmonton's Garneau area. We are passionate in the art of hair and we want to ensure you have an unforgettable experience every time you visit.">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'zouzou-hair-theme'); ?></a>
		<header id="masthead" class="site-header" aria-label="Site Header">
			<div class="sup-header" aria-labelledby="store-info">
				<div class="container sup-header-flex">
					<?php if ($store_info): ?>
						<p id="store-info"><?php echo esc_html($store_info['hours']); ?></p>
						<p><?php echo esc_html($store_info['phone']); ?></p>
						<p><?php echo esc_html($store_info['location']); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="main-header">
				<div class="container main-header-flex">
					<div class="site-branding">
						<?php
						echo "<div class=\"site-logo\">";
						the_custom_logo();
						echo "</div>";
						if (is_front_page()) :
						?>
							<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="Home"><?php bloginfo('name'); ?></a></h1>
						<?php
						else :
						?>
							<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="Home"><?php bloginfo('name'); ?></a></p>
						<?php
						endif;
						$zouzou_hair_theme_description = get_bloginfo('description', 'display');
						if ($zouzou_hair_theme_description || is_customize_preview()) :
						?>
							<p class="site-description"><?php echo $zouzou_hair_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
														?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
					<nav id="site-navigation" class="main-navigation" aria-labelledby="main-navigation">
						<h2 id="main-navigation">Main Navigation</h2>
						<button class="toggle-btn" aria-label="Toggle to open mobile menu" aria-controls="primary-menu" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
							</svg>
						</button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary'
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</header><!-- #masthead -->