<?php

/**
 * Template Name: Services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();

?>
<main id="primary" class="site-main services-page">

    <div class="container padding">

        <div class="intro-text">
            <div>
                <div class="red-bar"></div>
                <p>At Zouzou Hair, we offer a variety of services to make sure you get the exact look you want.<br>Browse our services and previous works down below!</p>
            </div>
            <p><span>All Students receive a 10% discount on our services</span></p>
        </div>

        <?php
        $services = get_terms(array(
            'taxonomy'   => 'service-category',
            'hide_empty' => false,
            'orderby'    => 'term_id',
            'order'      => 'ASC'
        ));

        if (!empty($services) && !is_wp_error($services)) {
            foreach ($services as $service) :
                $service_link = get_term_link($service); ?>
                <section class="services">
                    <h2><?php echo esc_html($service->name); ?></h2>
                    <div>
                        <?php

                        $args = array(
                            'post_type'      => 'services',
                            'posts_per_page' => -1,
                            'tax_query'      => array(
                                array(
                                    'taxonomy'  => 'service-category',
                                    'field'     => 'slug',
                                    'terms'     => $service->slug
                                ),
                            ),
                            'order' => 'ASC'
                        );
                        $service_posts = new WP_Query($args);

                        if ($service_posts->have_posts()) : ?>

                            <div class="services-list">
                                <?php while ($service_posts->have_posts()) :
                                    $service_posts->the_post(); ?>
                                    <div class="service-bar">
                                        <div>
                                            <p><?php the_title(); ?></p>
                                            <p><?php echo esc_html(get_field('duration')); ?></p>
                                        </div>
                                        <p><?php echo esc_html(get_field('price')); ?></p>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif;

                        ?>
                        <div>
                            <div class="gallery">

                                <?php
                                $images = get_field('images', $service);

                                if (!empty($images)) {
                                    foreach ($images as $image) {
                                        if (!empty($image)) {
                                ?>
                                            <img src="<?php echo $image['url']; ?>" alt="Previous works for <?php echo $service->name; ?>">
                                <?php }
                                    }
                                } ?>
                            </div>

                            <div class="button-end">
                                <a href="<?php echo esc_url($service_link); ?>" class="button">View Our Previous Work</a>
                            </div>
                        </div>
                    </div> 
                </section>
        <?php
                wp_reset_postdata();
            endforeach;
        }
        ?>
    </div>


</main>

<?php
get_footer();
