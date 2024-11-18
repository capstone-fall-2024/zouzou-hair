<?php

/**
 * Template Name: About
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package zouzou-hair-theme
 */

get_header();


$args = array(
    'post_type'      => 'members',
    'posts_per_page' => -1,

    'order' => 'ASC'
);
$member_posts = new WP_Query($args);

$image = get_field('images');
?>

<main id="primary" class="site-main">
    <section>
        <div class="about-banner image-padding">
            <div class="container">
                <h1>About</h1>
            </div>
        </div>
    </section>
    <div class="container padding">
        <section>
            <div class="intro-text">
                <div>
                    <div class="red-bar"></div>
                    <p>We believe that great hair is the foundation of confidence. Our team <br> of expert stylists delivers personalized, high-quality services ensuring you <br> leave feeling your absolute best.</p>
                </div>
            </div>
        </section>

        <section class="about-content">
            <ul class="team-list">
                <?php if ($member_posts->have_posts()) : ?>
                    <?php while ($member_posts->have_posts()) : $member_posts->the_post(); ?>
                        <li class="team-member">
                            <div class="image-container">
                                <?php if (get_field('image')) : ?>
                                    <img class="member-image" src="<?php the_field('image'); ?>" alt="<?php the_title(); ?> - Team Member">
                                    <div class="overlay"></div>
                                <?php endif; ?>
                            </div>
                            <div class="member-info">
                                <h2 class="member-name"><?php the_title(); ?></h2>
                                <p class="member-position"><?php echo esc_html(get_field('position')); ?></p>
                                <p class="member-intro"><?php echo esc_html(get_field('introduction')); ?></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </section>
    </div>
</main><!-- #main -->

<?php
get_footer();
