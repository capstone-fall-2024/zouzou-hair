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

$banner = '';

if (is_front_page()) {
	$banner = 'front-banner';
	$banner_text = 'front-content';
} elseif (is_page('contact')) {
	$banner = 'contact-banner';
} elseif (is_page('about')) {
	$banner = 'about-banner';
} elseif (is_page('services')) {
	$banner = 'services-banner';
} elseif (is_shop()) {
	$banner = 'shop-banner';
} else {
	$banner = 'default-banner';
};

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'zouzou-hair-theme'); ?></a>
		<div class="<?php echo esc_attr($banner); ?>">
		<header id="masthead" class="site-header">
				<div class="sup-header">
					<div class="container sup-header-flex">
						<?php if ($store_info): ?>
							<p><?php echo esc_html($store_info['hours']); ?></p>
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
							if (is_front_page() && is_home()) :
							?>
								<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<?php
							else :
							?>
								<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<?php
							endif;
							$zouzou_hair_theme_description = get_bloginfo('description', 'display');
							if ($zouzou_hair_theme_description || is_customize_preview()) :
							?>
								<p class="site-description"><?php echo $zouzou_hair_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
															?></p>
							<?php endif; ?>
						</div><!-- .site-branding -->
						<nav id="site-navigation" class="main-navigation">
							<button class="toggle-btn" aria-controls="primary-menu" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
									<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
								</svg>
							</button>
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
								)
							);
							?>
						</nav><!-- #site-navigation -->
					</div>
				</div>
			</header><!-- #masthead -->
			<?php if ($banner === 'front-banner') : ?>
				<div class="banner-content">
					<div class="container padding">
						<section class="home-header">
							<div>
								<p>Let us craft your </p>
								<p class="signature-look">Signature Look.</p>
								<p>Edmonton's Finest Salon & Barbershop</p>
								<a href="<?php echo esc_url(home_url('/shop')); ?>" class="button">Shop</a>
								<a href="https://www.fresha.com/a/zouzou-hair-edmonton-8718-109-street-northwest-ln6gfkqc/booking?menu=true" class="button">Book an Appointment</a>
							</div>
							<div class="zouzou-intro-header">
								<p>At <span class="zouzou-title">Zouzou Hair</span> , </p>
								<p>We believe that great hair is the foundation of a more confident you.
								</p>
								<p>Our skilled stylists offer everything from fresh cuts to bold colors, all in a friendly and relaxed setting. Let us create a look that’s perfect for you!</p>
							</div>
						</section>
					</div>
				</div>
			<?php elseif ($banner === 'shop-banner') : ?>
				<section class="container image-padding">
					<h1>Shop</h1>
					<a href="<?php echo esc_url(home_url('/featured-items')); ?>" class="button">Featured Items</a>
					<a href="<?php echo esc_url(home_url('/shop-by-brand')); ?>" class="button">Shop by Brand</a>
				</section>
			<?php elseif ((is_woocommerce() && !is_shop()) || is_cart() || is_checkout()) : ?>
				<!-- hides the header space below the nav; h1 is automatically set by the woocommerce template -->
			<?php elseif (is_tax() || is_category() || is_tag()) : ?>
				<section class="container padding">
					<h1><?php single_term_title(); ?></h1>
				</section>
			<?php elseif (is_search()) : ?>
				<section class="container padding">
					<h1><?php printf(esc_html__('Search Results for: %s', 'zouzou-hair-theme'), '<span>' . get_search_query() . '</span>'); ?></h1>
				</section>
			<?php elseif (is_page('featured-items') || is_page('shop-by-brand')) : ?>
				<section class="container padding">
					<h1><?php the_title(); ?></h1>
				</section>
			<?php else : ?>
				<section class="container image-padding">
					<h1><?php the_title(); ?></h1>
				</section>
			<?php endif; ?>
		</div>