<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="front-banner banner-content">
		<div class="container padding">
			<div class="home-header">
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
			</div>
		</div>
	</div>
	<div class="container padding">
		<div class="zouzou-intro-home">
			<div class="red-scissors-intro">
				<div>
					<p>At <span class="zouzou-title">Zouzou Hair</span> , </p>
				</div>
				<div>
					<p>We believe that great hair is the foundation of a more confident you.</p>
				</div>
				<div>
					<p>Our skilled stylists offer everything from fresh cuts to bold colors, all in a friendly and relaxed setting. Let us create a look that’s perfect for you!</p>
				</div>
			</div>
			<div class="red-scissors">
				<img src="https://zouzou-hair.web.dmitcapstone.ca/wordpress/wp-content/uploads/2024/11/mobile-intro-scissors.webp" alt="Red Scissors">
			</div>
		</div>
		<section>
			<div class="services-heading-title">
				<h2>Services</h2>
				<p class="promo">All Students receive a 10% discount on all our services</p>
			</div>
			<div class="home-services-flex">
				<a href="<?php echo esc_url(home_url('/service-category/womens-cuts')); ?>">
					<div class="womens-cuts">
						<h3 class="services-titles">Women's Cuts</h3>
					</div>
				</a>
				<a href="<?php echo esc_url(home_url('/service-category/mens-cuts')); ?>">
					<div class="mens-cuts">
						<h3 class="services-titles">Men's Cuts</h3>
					</div>
				</a>
				<a href="<?php echo esc_url(home_url('/service-category/nonbinary')); ?>">
					<div class="nonbinary-cuts">
						<h3 class="services-titles">Nonbinary</h3>
					</div>
				</a>
				<a href="<?php echo esc_url(home_url('/service-category/colour')); ?>">
					<div class="coloring">
						<h3 class="services-titles">Coloring</h3>
					</div>
				</a>
				<a href="<?php echo esc_url(home_url('/service-category/styling')); ?>">
					<div class="styling">
						<h3 class="services-titles">Styling</h3>
					</div>
				</a>
				<a href="<?php echo esc_url(home_url('/service-category/hair-botox')); ?>">
					<div class="hair-botox">
						<h3 class="services-titles">Hair Botox</h3>
					</div>
				</a>
			</div>
			<a href="https://www.fresha.com/a/zouzou-hair-edmonton-8718-109-street-northwest-ln6gfkqc/booking?menu=true" class="button">Book your Appointment!</a>
		</section>

	</div>
	<div class="home-intro">
		<div class=" container padding home-intro-background">
			<p><?php echo nl2br(esc_html(get_field('paragraph_1'))); ?></p>
			<p><?php echo nl2br(esc_html(get_field('paragraph_2'))); ?></p>
		</div>
	</div>
	<section class="container padding">
		<h2>Featured Product</h2>
		<p class="promo">All orders over $50 receive free shipping!</p>
		<div class="featured-products">
			<?php echo do_shortcode('[products limit="4" visibility="featured"]'); ?>
			<div>
				<a href="<?php echo esc_url(home_url('/featured-items')); ?>" class="button">View more featured products</a>
				<a href="<?php echo esc_url(home_url('/shop')); ?>" class="button">View all products</a>
			</div>
		</div>
	</section>
	<section class="reviews">
		<div class=" container padding">
			<h2 class="reviews-title">Reviews</h2>
			<?php echo apply_shortcodes('[trustindex no-registration=google]'); ?>
		</div>
	</section>
</main><!-- #main -->

<?php
get_footer();
