<?php

/**
 * The template for displaying pages under the Service Category taxonomy
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();

$service_category = get_queried_object();

$args = array(
    'post_type'      => 'services',
    'posts_per_page' => -1,
    'tax_query'      => array(
        array(
            'taxonomy' => 'service-category',
            'field' => 'slug',
            'terms'    => $service_category->slug,
        ),
    ),
);

$service_posts = new WP_Query($args);

$images = get_field('images', $service_category);

?>

<main id="primary" class="site-main">
    <div class="container padding">
        <?php

        if ($service_posts->have_posts()) : ?>

            <div class="services-list">
                <?php while ($service_posts->have_posts()) :
                    $service_posts->the_post(); ?>
                    <div>
                        <div>
                            <p><?php the_title(); ?></p>
                            <p><?php echo esc_html(get_field('duration')); ?></p>
                        </div>
                        <p><?php echo esc_html(get_field('price')); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>

        <?php endif; ?>

        <div>
            <?php foreach ($images as $image) : ?>
                <img src="<?php echo $image['url']; ?>" alt="">
            <?php endforeach; ?>
        </div>
    </div>
</main>

<?php
get_footer();
