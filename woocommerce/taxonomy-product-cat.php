<?php

/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header('shop'); ?>

<div class="container padding">
	<h1>Shop By Brand: <?php single_term_title(); ?></h1>
	<div class="back"><a href="<?php echo esc_url(home_url('/shop-by-brand')); ?>"><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>Back to all brands</span></a></div>
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
	do_action('woocommerce_after_main_content'); ?>
</div>

<?php get_footer('shop');
?>