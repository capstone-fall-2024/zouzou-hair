<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package zouzou-hair-theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container padding">
			<section class="error-404 not-found">
				<p><span>404</span></p>
			<h2>Oh, snip!</h2>
			<p>It looks like the page you're looking for is having a bad hair day!</p>
			<p>Click the button below to head back to the homepage and get back on track.</p>
			<a href="<?php echo esc_url(home_url('/')); ?>" class="button" rel="home">Back to Home</a>
			</section><!-- .error-404 -->
		</div>

	</main><!-- #main -->

<?php
get_footer();
