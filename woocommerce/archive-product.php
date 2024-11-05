<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

?>

<main>
	<section>
		<div class="shop-banner">
			<div class="container image-padding">
				<h1>Shop</h1>
				<a href="<?php echo esc_url(home_url('/featured-items')); ?>" class="button">Featured Items</a>
				<a href="<?php echo esc_url(home_url('/shop-by-brand')); ?>" class="button">Shop by Brand</a>
			</div>
		</div>
		<div class="container padding">
			<div class="intro-text">
				<div>
					<div class="red-bar"></div>
					<p>Explore our selection of premium hair care products and professional styling tools to keep your hair looking its best.<br> Whether you're looking for nourishing shampoos, hydrating conditioners, or the latest styling equipment, we’ve got you covered.</p>
				</div>
				<p class="promo">All orders over $50 receive free shipping!</p>
			</div>

			<section>
				<div class="product-search">
					<h2>All Products</h2>
					<?php get_search_form(); ?>
				</div>
				<?php

				if (woocommerce_product_loop()) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					do_action('woocommerce_before_shop_loop');

					woocommerce_product_loop_start();

					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action('woocommerce_shop_loop');

							wc_get_template_part('content', 'product');
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action('woocommerce_after_shop_loop');
				} else {
					/**
					 * Hook: woocommerce_no_products_found.
					 *
					 * @hooked wc_no_products_found - 10
					 */
					do_action('woocommerce_no_products_found');
				} ?>
			</section>

			<?php
			/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action('woocommerce_after_main_content');
			?>
		</div>
	</section>
</main>

<?php

get_footer('shop'); ?>