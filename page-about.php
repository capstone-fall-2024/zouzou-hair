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
<div class="container padding">

<section class="intro-text">
<div class="intro-text">
            <div>
                <div class="red-bar"></div>
                <p>We believe that great hair is the foundation of confidence. Our team <br> of expert stylists delivers personalized, high-quality services ensuring you <br> leave feeling your absolute best.</p>
            </div>
            <p><span>All Students receive a 10% discount on our services</span></p>
        </div>
            
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
                        <?php
                            if(get_field('image')):?>
                            
                            <img src="<?php the_field('image'); ?>" alt="This is an image of a member of our stylist team">
                            <?php
                            endif;
                            ?>
                        
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
