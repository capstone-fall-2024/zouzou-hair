<?php

/**
 * Template Name: Shop by Brand
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();

$product_categories = get_terms( array(
    'taxonomy'      => 'product_cat',
    'hide_empty'    => false
))

?>
<main id="primary" class="site-main">
    <div class="container padding">

    <?php get_search_form(); ?>
    
        <?php
        if (!empty($product_categories) && !is_wp_error($product_categories)) {
            woocommerce_product_loop_start();

            foreach ( $product_categories as $product_category ) {
                echo '<li class="product-category">';
                
                // Link to category page.
                echo '<a href="' . esc_url( get_term_link( $product_category ) ) . '">';
                
                // Display the category thumbnail.
                woocommerce_subcategory_thumbnail( $product_category );
                
                // Display the category name.
                echo '<h2>' . esc_html( $product_category->name ) . '</h2>';
    
                // Display product count.
                echo '<span class="count">' . esc_html( $product_category->count ) . ' products</span>';
                echo '</a></li>';
            }
    
            woocommerce_product_loop_end();
    
        } else {
            // Show 'No Categories Found' if none are available.
            do_action( 'woocommerce_no_products_found' );
        }
        
        ?>
    </div>
</main><!-- #main -->

<?php
get_footer();
