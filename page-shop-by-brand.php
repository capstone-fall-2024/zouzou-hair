<?php

/**
 * Template Name: Shop by Brand
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();

$product_categories = get_terms(array(
    'taxonomy'      => 'product_cat',
    'hide_empty'    => true
))

?>
<main id="primary" class="site-main">
    <div class="container padding">
    <section>
        <h1>Shop by Brand</h1>
        <div class="back">
            <a href="<?php echo esc_url(home_url('/shop')); ?>"><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                    Back to all products</span></a>
            <?php get_search_form(); ?>
        </div>
        <?php
        if (!empty($product_categories) && !is_wp_error($product_categories)) { ?>

            <ul class="category-loop">
                <?php foreach ($product_categories as $product_category) {
                    echo '<li class="category">';

                    $args = array(
                        'post_type'      => 'product',
                        'posts_per_page' => 1,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'term_id',
                                'terms'    => $product_category->term_id,
                            ),
                        ),
                    );

                    $product_image = new WP_Query($args);

                    if ($product_image->have_posts()) {
                        $product_image->the_post();
                        if (has_post_thumbnail()) {
                            echo '<a href="' . esc_url(get_term_link($product_category)) . '">';
                            the_post_thumbnail('woocommerce_thumbnail');
                        } else {
                            echo '<a href="' . esc_url(get_term_link($product_category)) . '">';
                            woocommerce_subcategory_thumbnail($product_category);
                        }
                    }
                    echo '<h2>' . esc_html($product_category->name) . '</h2>';
                    echo '</a>';
                    echo '</li>';
                } ?>
            </ul>
        <?php
        } else {
            do_action('woocommerce_no_products_found');
        }
        ?>
    </section>
    </div>
</main><!-- #main -->

<?php
get_footer();
