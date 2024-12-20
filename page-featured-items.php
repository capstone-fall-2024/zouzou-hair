<?php

/**
 * Template Name: Featured Items
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();

$meta_query  = WC()->query->get_meta_query();
$tax_query   = WC()->query->get_tax_query();
$tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN',
);

$args = array(
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'posts_per_page'      => -1,
    'meta_query'          => $meta_query,
    'tax_query'           => $tax_query,
);

$featured_items = new WP_Query($args);

?>
<main id="primary" class="site-main" aria-labelledby="featured-items-heading">
    <div class="container padding">
        <section>
            <h1 id="featured-items-heading">Featured Items</h1>
            <div class="back"><a href="<?php echo esc_url(home_url('/shop')); ?>" aria-label="Go back to the shop page"><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>Back to all products</span></a>
            <?php get_search_form(); ?>
        </div>

        <?php if ($featured_items->have_posts()) { ?>
            <div>
                <ul class="product-loop" aria-label="List of featured products">
                    <?php while ($featured_items->have_posts()) {
                        $featured_items->the_post(); ?>

                        <?php wc_get_template_part('content', 'product'); ?>

                    <?php
                    } ?>
                </ul>
            </div>
        <?php } ?>
        </section>
    </div>
</main>

<?php
get_footer();
