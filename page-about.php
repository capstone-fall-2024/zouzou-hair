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

$image = '';
$image = get_field('images', $image);

                                if (!empty($image)) {
                                    foreach ($image as $image) {
                                        if (!empty($image)) {
                                ?>
                                            <img src="<?php echo $image['url']; ?>" alt="">
                                <?php }
                                    }
                                } 


?>
<main id="primary" class="site-main">
<div class="container padding">

<section class="intro-text">

            <p>At Zouzou Hair, we offer a variety of services to make sure you get the exact look you want.<br>Browse our services and previous works down below!</p>
</section>
    

        
    <section class="about-content">
        <ul class="team-list">
            <li><?php
            if ($member_posts->have_posts()) : ?>

            <div class="members-list">
                <?php while ($member_posts->have_posts()) :
                    $member_posts->the_post(); ?>
                    <div class="members-bar">
                        <div>
                            <p><?php the_title(); ?></p>
                            <p><?php echo esc_html(get_field('position')); ?></p>
                        </div>
                        <p><?php echo esc_html(get_field('introduction')); ?></p>
                        <img src="<?php echo $image['url']; ?>" alt="This is an image of a member of our stylist team">

                        
                    </div>
                <?php endwhile; ?>
            </div>

                <?php endif; ?>

                </li>
        </ul>
    </section>
</div>
</main><!-- #main -->

<?php
get_footer();
