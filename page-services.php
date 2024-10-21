<?php

/**
 * Template Name: Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();

$args = array(
    'post_type'      => 'services',
    'posts_per_page' => -1,
    'tax_query'      => array(
        array(
            'taxonomy' => 'service-category',
            'field' => 'slug',
            'terms'    => $service->slug,
        ),
    ),
);
$service_posts = new WP_Query($args);

?>
<main id="primary" class="site-main">

    <div class="container padding">

        <div class="intro-text">
            <p>Test</p>
            <p>At Zouzou Hair, we offer a variety of services to make sure you get the exact look you want.<br>Browse our services and previous works down below!</p>
        </div>

        <p>All Students receive a 10% discount on our services</p>

        <?php
        $services = get_terms(array(
            'taxonomy'   => 'service-category',
            'hide_empty' => false
        ));
        if (!empty($services) && !is_wp_error($services)) {

            foreach ($services as $service) : 
                $service_link = get_term_link($service);
            ?>
                <div class="service">
                    <h2><a href="<?php echo esc_url($service_link); ?>"><?php echo esc_html($service->name) ?></a></h2>
                <?php
                if ($service_posts->have_posts()) : ?>
                    <div class="services-list">
                        <?php
                        while ($service_posts->have_posts()) :
                            $service_posts->the_post(); ?>
                            <div class="service-bar">
                                <div>
                                    <p><?php the_title(); ?></p>
                                    <p><?php echo esc_html(get_field('duration')); ?></p>
                                </div>
                                <p><?php echo esc_html(get_field('price')); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div> <!-- end of service-list div -->
                </div> <!-- end of service div -->
        <?php
                endif;
                wp_reset_postdata();

            endforeach; // end of foreach loop
        } // end of service if condition
        ?>
    </div>


</main><!-- #main -->

<?php
get_footer();
