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
		<div class="container padding">
			<div>
				<h2>Services</h2>
				<p class="services-deal">All Students receive a 10% discount on all our services</p>
				<div class="home-services-flex">
					<a href="#">
						<div class="womens-cuts">
							<h3 class="services-titles">Women's Cuts</h3>
						</div>
					</a>
					<a href="#">
						<div class="mens-cuts">
							<h3 class="services-titles">Men's Cuts</h3>
						</div>
					</a>
					<a href="#">
						<div class="nonbinary-cuts">
							<h3 class="services-titles">Nonbinary</h3>
						</div>
					</a>
					<a href="#">
						<div class="coloring">
							<h3 class="services-titles">Coloring</h3>
						</div>
					</a>
					<a href="#">
						<div class="styling">
							<h3 class="services-titles">Styling</h3>
						</div>
					</a>
					<a href="#">
						<div class="hair-botox">
							<h3 class="services-titles">Hair Botox</h3>
						</div>
					</a>
				</div>
				<a href="https://www.fresha.com/a/zouzou-hair-edmonton-8718-109-street-northwest-ln6gfkqc/booking?menu=true" class="button">Book your Appointment!</a>
			</div>
			
		</div>
		<div class="home-intro">
			<div class=" container padding home-intro-background">
				<p>Zouzou Hair opened in 2014, bringing a remarkable Hair Salon & Barbershop experience to the historic Garneau neighborhood in Edmonton, Alberta.</p>
				<p>With 215 reviews on Google with a 4.8 star rating, Head Stylist/Owner Joseph Hayek is proven to deliver professional results and a welcoming experience to every appointment.</p>
			</div>
		</div>
		<div class="container padding">
		<h2>Featured Product</h2>
		<p>All orders over $50 receive free shipping!</p>
		<!-- Featured products here -->
		<a href="<?php echo esc_url(home_url('/shop')); ?>" class="button">Shop</a>
		</div>
		<div class="reviews">
			<div class=" container padding">
				<h2 class="reviews-title">Reviews</h2>
				<p>Reviews go here</p>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
